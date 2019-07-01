import axios from 'axios'
import R, {
    assoc,
    compose,
    equals,
    evolve,
    filter,
    find,
    isEmpty,
    keys,
    lensProp,
    merge,
    not,
    over,
    partition,
    path,
    pathOr,
    pipe,
    prop,
    reduce,
    split,
    trim,
    uniq,
    values,
 } from 'ramda'

const $ = jQuery
const splitHead = splitable => compose(pathOr('', [0]), split(splitable))
const tap = x => { console.log(x); return x }

//Nota: Algunas funciones son ligeramente impuras porque lidian con el dom o con google maps

export const getAndProcessStations = () =>
    axios.get('https://mi.econduce.mx/api/estaciones/mostrar.json')
        .then(pathOr([], ['data', 'data']))//{estaciones, scooters}
        .then(over(lensProp('estaciones'),
            compose(
                R.map(station => assoc('address', station.direccion, station)),//copiamos direccion a address para satisafacer nuestra el api de este modulo
                R.map(
                    evolve({
                        id: Number,
                        latLng: R.map(parseFloat),
                        descripcion: compose(//quitamos los horarios dela descripción
                            trim,
                            splitHead('Horario'),
                            splitHead('<br> <br>'),
                            splitHead('<br><br>')),
                        horarios: week =>//nos aseguramos de que los días queden ordenados de lunes a viernes
                            compose(
                                filter(compose(not, isEmpty)),
                                R.map(day => week[day] ? [day, week[day]] : []))
                                (["lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo"])
                    })))))
        .then(over(lensProp('scooters'),
            R.map(scooter => assoc('latLng', { lat: Number(scooter.lat), lng: Number(scooter.lng) }, scooter))))
        .catch(tap)

export const getGeoJSON = () =>
    axios.get("https://api.mapbox.com/datasets/v1/econduce/cj4u19nck0deo2wph4kuigg0n/features?access_token=sk.eyJ1IjoiZWNvbmR1Y2UiLCJhIjoiY2o4ZGdudzExMG81bTMzb2swaTZvMXQxMCJ9.kZ_l4w9wvNaGizBlD_sRTA")
        .then(pathOr([], ['data']))
        .then(over(lensProp('features'),
            R.filter(compose(
                equals('zona'),
                path(['properties', 'type'])))))
        .then(zonas_econduce => ({
            zonas_econduce,
            zonas_econduce_polygons: pipe(//para saber si usuario va a la zona econduce en maybeRenderRoute
                pathOr([], ['features']),
                R.map(pathOr([], ['geometry', 'coordinates'])),
                R.map(R.map(R.map(([lng, lat]) => ({ lat, lng })))),
                R.map(latLngs => new google.maps.Polygon({ paths: latLngs }))
            )(zonas_econduce)
        }))
        // .then(tapN('geojson'))               
        .catch(tap)


export const makeMarker = (map, marker_url) => dir =>
    ({
        colonia: dir.colonia,
        nombre: dir.nombre,
        recarga: dir.recarga,
        latLng: dir.latLng,
        numero: dir.numero,
        marker: new google.maps.Marker({
            map: map,
            position: dir.latLng,
            draggable: false,
            icon: {
                url: marker_url,
                // scaledSize: new google.maps.Size(39.2, 56),//opcion grande
                scaledSize: new google.maps.Size(31.36, 44.8)
            },
            zIndex: 100
        })
    })
export const makeSimpleMarker = (map, marker_url, latLng) => 
	new google.maps.Marker({
		map: map,
		position: latLng,
		draggable: false,
		icon: {
			url: marker_url,
        	scaledSize: new google.maps.Size(31.36, 44.8)
		},
		zIndex: 100
	})

export const makeLatLng = ({ lat, lng }) => new google.maps.LatLng(lat, lng)

//getStationsSortedByDistance :: origin_latlng -> [location] -> location
export const getStationsSortedByDistance = (origin_latlng, arrival_locations) => {


    const computeDistance = (origin_latlng) => (arrival_latlng) =>
        google.maps.geometry.spherical.computeDistanceBetween(
            makeLatLng(origin_latlng), makeLatLng(arrival_latlng)
        )

    const fromOrigin = computeDistance(origin_latlng)

    //assignDistance :: {latLng, *} -> {latLng, distance}
    const assignDistance = test =>
        Object.assign(
            {},
            test,
            { distance: fromOrigin(test.latLng) }
        )

    return arrival_locations
        .map(assignDistance)
        .sort((a, b) => a.distance - b.distance)
}

//getClosestStation :: origin_latlng -> [location] -> location
export const getClosestStation = (origin_latlng, arrival_locations) => {
    let sorted_stations = getStationsSortedByDistance(origin_latlng, arrival_locations)
    return sorted_stations.length > 0 ? sorted_stations[0] : {}
}

export const getDirections = (locations, filter) => {
    filter = filter || '';
    return locations
        .filter(function (locacion) { return filter === '' ? true : locacion.colonia === filter; });
}

export const makeOption = (className) => {
    return (function (location, index) {
        let p = document.createElement('p')
        p.className = className
        p.dataset.index = index
        p.dataset.address = location.address
        p.appendChild(document.createTextNode(location.address))
        return p
    })
}

export const possibleStations = (station, stations_chargers) => 
     stations_chargers.filter(
        place => station === ''
            ? true
            : place.colonia === station
    )

export const generateLocationMarkers = (map, stations, scooters) => [
    getDirections(stations, '').map(makeMarker(map, charger_marker)),
    getDirections(scooters, '').map(makeMarker(map, scooter_marker))
]

export const generateSelectOptions = (locations, filter) => {
    let dirs = getDirections(locations, filter);
    let colonias = uniq(dirs.map(dir => dir.colonia))

    let opts_desktop = colonias
        .map(colonia => $(`<div class="swiper-slide map-filters__slide map-filters__option_JS" data-zona="${colonia}">${colonia}</div>`));
    let all = [$('<div class="swiper-slide map-filters__slide map-filters__option_JS selected" data-zona="">Todas</div>')]

    let divisor = i => i !== colonias.length - 1 ? `<div class="map-mobile-filters__divisor"></div>` : ''
    let opts_mobile = colonias
        .map((colonia, i) => {
            return $(`<div class="map-mobile-filters__filters map-filters__option_JS" data-zona="${colonia}">${colonia}</div>${divisor(i)}`)
        });
    let all_mobile = [$('<div class="map-mobile-filters__filters map-filters__option_JS selected" data-zona="">Todas</div>')]

    return Promise.resolve({ desktop: all.concat(opts_desktop), mobile: all_mobile.concat(divisor(0), opts_mobile)})
}

//StationMarkers {
//     colonia: String,
//     marker: {
//         position: {
//             lat: (() -> Number),
//             lng: (() -> Number)
//         }
//     }
// }

// filterMarkers :: [StationMarkers] -> 'filter' -> Promise(Pair([StationMarkers], [StationMarkers]))
export const filterMarkers = (location_markers, filter) => 
    Promise.resolve(partition(
        location => filter === '' || location.colonia === filter,
        location_markers))

//calculateLatLngsCenter :: [{lat, lng}] -> {lat, lng}
export const calculateLatLngsCenter = latLngs => 
    pipe(
        reduce(([accLat, accLng], [lat, lng]) => [accLat + lat, accLng + lng], [0, 0]),
        ([lat, lng]) => ({ lat: lat / latLngs.length, lng: lng / latLngs.length }))
        (latLngs)

// calculateMarkersCenter :: [StationMarkers] -> {lat, lng}
export const calculateMarkersCenter = pipe(
        R.map(pipe(
            path(['marker', 'position']),
            ({ lat, lng }) => [lat(), lng()])),
            calculateLatLngsCenter)

export const makeUpdateSearchOptions =
    ({ search_options, search_options_container, input, search_option, option_selector, onSelectedOption }) =>
        (possible_locations, maybeRenderRoute) => {
            let lat, lng, address;

            let options = input.val().length > 0
                ? possible_locations.map(makeOption(option_selector.replace('.', '').replace('#', '')))
                : []

            search_options.html(options)
            search_options_container.css({overflow: 'visible', padding:'10px 0 0'})
            search_option = $(option_selector)
            search_option.off('click')
            search_option.on('click',
                pipe(
                    pathOr(-1, ['target', 'dataset', 'index']),
                    index => possible_locations[index],
                    onSelectedOption(maybeRenderRoute)))}

export const calcRoute = (from, to, travel_mode) => {
    const request = {
        origin: from,
        destination: to,
        travelMode: google.maps.TravelMode[travel_mode.toUpperCase()],
        unitSystem: google.maps.UnitSystem.METRIC
    }

    return new Promise((resolve, reject) =>
        new google.maps.DirectionsService()
            .route(request, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    resolve({ result, status })
                    return
                } else {
                    reject({ result, status })
                    return
                }
            }))
}

export const renderRoute = (map, color) => ({ result, status }) => 
    new google.maps.DirectionsRenderer({
        suppressMarkers: true,
        polylineOptions: {
			strokeColor: color
        },
        preserveViewport: true,
        directions: result,
        map
    })

export const getPossibleAddresses = location_obj =>
    new Promise((resolve, reject) =>
    new google.maps.Geocoder()
        .geocode(merge(
            keys(location_obj)[0] !== 'address' 
                ? {} 
                : {componentRestrictions: { country: 'MX', administrativeArea: 'CDMX' }}, 
            location_obj),
            function (results, status) {
                if (status !== google.maps.GeocoderStatus.OK) {
                    reject(results)
                } else {
                    resolve(results.map(res => ({
                        center: res.geometry.location,
                        lat: res.geometry.location.lat(),
                        lng: res.geometry.location.lng(),
                        address: res.formatted_address
                    })))
                }
            }))


export const setCenter = map => latLngsArr => {
    let latLngs = filter(compose(not, isEmpty), latLngsArr)

    map.setCenter(pipe(
        R.map(({ lat, lng }) => [lat, lng]),
        calculateLatLngsCenter
    )(latLngs))

    if (latLngs.length > 1) {
        map.fitBounds(latLngs.reduce((bounds, latLng) =>
            bounds.extend(makeLatLng(latLng)),
            new google.maps.LatLngBounds()))
    }
}