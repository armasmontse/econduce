/* globals google: false */
/* globals station_marker: false */

import debounce from 'lodash.debounce'
import R, {
    all,
    any,
    ap,
    assoc,
    compose,
    concat,
    evolve,
    equals,
    empty,
    find,
    filter,
    flatten,
    has,
    isEmpty,
    keys,
    lensProp,
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
    values,
	zipWith,
} from 'ramda'

import {Box} from './functors'
import { 
    calcRoute,
    calculateLatLngsCenter,
    calculateMarkersCenter,
    filterMarkers,
    generateLocationMarkers,
    generateSelectOptions,
    getAndProcessStations,
    getClosestStation,
    getDirections,
    getGeoJSON,
    getPossibleAddresses,
    getStationsSortedByDistance,
    makeLatLng,
    makeMarker,
    makeOption,
    makeUpdateSearchOptions,
    possibleStations,
    renderRoute,
    setCenter,
	makeSimpleMarker,
} from './map-ubicaciones/mostly-pure-helpers'
import {styles} from './map-styles'
import {mapFiltersSlider} from './sliders'
import {makeSationWidget} from './map-ubicaciones/templates'

const noop = (() => {})
const tap = x => {console.log(x); return x}
const tapN = n => x => { console.log(n, x); return x }        
const devlog = x => false ? console.log(x) : noop
const notEmpty = compose(not, isEmpty)

export const cltvo_map = function($){
    //DOM and State
    let map, lat, lng, address
    
    let zonas_econduce = [],
        zonas_econduce_polygons = []
    
    let //markers
        no_marker =  { 
            setIcon: noop,
            setZIndex: noop,
			setMap: noop,
        },
		origin_location_marker = no_marker,
        user_marker = no_marker,
		destination_location_marker = no_marker,
        station_markers = [], 
        charger_markers = [], 
        scooter_markers = [], 
        all_stations = []//definido en initMap
    
    let routeRenderers = []

    let //filtros
        to = $('#filters-desktop'),
        to_mobile = $('#filters-mobile'),
        selected_filter = '', 
        filters = $('.map-filters_JS')/*slider*/, 
        mobile_filters_toggle = $('#map-mobile-filters__container')
    
    let get_route = $('#get_route'),//span button
        reset_route = $('#reset_route');//span button
    let //inputs
        no_station = {},
        //location
        user_closest_station = no_station,
        user_address = $('#user-address'),//input
		reset_input_address_btn = $('#map__reset-address'),
        no_user_location = {},
        user_location = no_user_location,
        user_location_icon = $('#user_location_icon'),
        user_input_container = $('#user_input_container'),
        //destination
        destination_closest_station = no_station,
        user_address_destination = $('#user-address--destination'),//input
		reset_input_destination_btn = $('#map__reset-destination'),
        no_user_destination = {},
        user_destination = no_user_destination,
        destination_input_container = $('#user_input_container--destination')
        
    let //possible locations, destinations and stations
        possible_user_locations = [{center:{}, lat:0, lng:0, address:''}],
        possible_user_destinations = [{center:{}, lat:0, lng:0, address:''}],
        possible_stations = [];
    
    let //select option
        //location
        search_options = $('#map-search-options'),
        search_options_container = $('#map__search-options-container--main'),
        search_option = $('.search-option_JS'),
        //destination
        destination_search_options = $('#map-search-options--destination'),
        destination_search_options_container = $('#map__search-options-container--destination'),
        destination_search_option = $('.search-option--destination_JS')
        // buscar = $('#user-search')//button

    let //widget
        map_station_widget = $('#map-station-widget-container'),
        selected_station = {//definido en el handler de station_markers
            station: { nombre: ''},
            marker: {no_marker}
        }


    //funciones semi-puras //no lo son porque se les pasan muchas variables de estado

    const updateLocationSearchOptions = makeUpdateSearchOptions({
        input: user_address,
        search_options: search_options,
        search_options_container: search_options_container,
        search_option: search_option,
        option_selector: '.search-option_JS',
        onSelectedOption: maybeRenderRoute => ({ lat, lng, address }) => {
            devlog('updateLocationSearchOptions')
            user_location = { lat, lng }
            user_marker.setPosition(user_location);
            user_marker.setVisible(true);
            search_options_container.css({overflow: 'hidden', padding:0})
            selectUserLocationSearchOption(address)
            maybeRenderRoute(user_location, user_destination)
                // .then(tap)
                .then(afterMaybeRenderRoute)
                .then(() => {
                     if (address !== '') { 
                        destination_input_container.fadeIn('fast') 
                    }
                })
            }
        })
        
        const updateDestinationSearchOptions = makeUpdateSearchOptions({
            input: user_address_destination,
            search_options: destination_search_options,
            search_options_container: destination_search_options_container,
            search_option: destination_search_option,
            option_selector: '.search-option--destination_JS',
            onSelectedOption: maybeRenderRoute => ({ lat, lng, address }) => {
                devlog('updateDestinationSearchOptions')
                user_destination = { lat, lng }
                destination_search_options_container.css({ overflow: 'hidden', padding: 0 })
                selectUserDestinationSearchOption(address)
                if (address !== '') { destination_input_container.fadeIn('fast') }
                maybeRenderRoute(user_location, user_destination)
                // .then(tap)
                .then(afterMaybeRenderRoute)
        }
    })
    
    //esta no es pura por el efecto secundario sobre routeRenderers y la llamada a resetRoute
    const maybeRenderRoute = (user_location, user_destination) => {
        const invalidInput = compose(
            not,
            all(equals(true)),
            ap([has('lat'), has('lng')]),
        )([user_location, user_destination])
        

        let stations = concat(all_stations, scooter_markers)
        if (invalidInput) { return Promise.resolve({ latLngs: [user_location, user_destination], stations: {}, destinationIsInEconduceZone: false}) }
        

        let destinationIsInEconduceZone = pipe(
            R.map(zone_poly => google.maps.geometry.poly.containsLocation(makeLatLng(user_destination), zone_poly)),
            any(equals(true))
        )(zonas_econduce_polygons) 

        let userClosestStation = getClosestStation(user_location, stations)
        let destinationClosestStation = getClosestStation(user_destination, stations)

        let routeSteps = destinationIsInEconduceZone 
            ? [ calcRoute(user_location, userClosestStation.latLng, 'WALKING'),
                calcRoute(userClosestStation.latLng, user_destination, 'DRIVING')]
            : [ calcRoute(user_location, userClosestStation.latLng, 'WALKING'),
                calcRoute(userClosestStation.latLng, destinationClosestStation.latLng, 'DRIVING'),
                calcRoute(destinationClosestStation.latLng, user_destination, 'WALKING')]
        
        resetRoute() 
		let coloredRoutes = [
			renderRoute(map, '#f37049'),
			renderRoute(map, '#00a7ce'),
			renderRoute(map, '#f37049')
		]        

        return Promise.all(routeSteps)
            .then(zipWith((routeFn, step) => routeFn(step), coloredRoutes))
            .then(routeRenderers_ => {//!!!
                routeRenderers = routeRenderers_
            })
            .then(_ => ({
                destinationIsInEconduceZone,
                latLngs: [
                    user_location, 
                    user_destination, 
                    userClosestStation.latLng,
                    destinationClosestStation.latLng],
                stations: {
                    userClosestStation,
                    destinationClosestStation}}))
            .catch(tap)
    }

	const setDirectionsMarkers = (marker_to_reset, icon, latLng) => {
		if (notEmpty(latLng)) {
			user_marker.setVisible(false)
			marker_to_reset.setMap(null)
			let marker = makeSimpleMarker(map, icon, latLng)
			marker.setZIndex(google.maps.Marker.MAX_ZINDEX + 10)
			return marker
		} else {
			return marker_to_reset
		}
	}

    const afterMaybeRenderRoute = ({ latLngs, stations, destinationIsInEconduceZone }) => {
		//origin and destionation markers
		let [user_location_, user_destination_] = latLngs
		origin_location_marker = setDirectionsMarkers(origin_location_marker, window.origin_marker, user_location_)
		destination_location_marker = setDirectionsMarkers(destination_location_marker, window.destination_marker, user_destination_)
		//map
        setCenter(map)(latLngs)
		//stations
        maybeSelectStations(stations, destinationIsInEconduceZone)
        user_closest_station = pathOr(no_station, ['userClosestStation'], stations)
        destination_closest_station = pathOr(no_station, ['destinationClosestStation'], stations)
        return { latLngs, stations }
    }
        
    
    
    //Handlers
    const addHandlers = () => {
        map.addListener("click", function (event) {
            lat = event.latLng.lat();
            lng = event.latLng.lng();
            locateAddress({ location: { lat: lat, lng: lng } });
            user_marker.setPosition({ lat: lat, lng: lng });
            user_location = { lat, lng }
        });

        user_marker.addListener('dragend', function () {
            lat = user_marker.internalPosition.lat();
            lng = user_marker.internalPosition.lng();
            user_location = { lat, lng }
            locateAddress({ location: { lat, lng } });
        });

        station_markers.forEach(({marker}) => {
            marker.addListener('click', (m) => {
                let latLng = R.map(l => l(),  m.latLng)
                let station_marker = find(m_ => {//google maps no renderea los marcadores exactamente donde se le indicó, por lo que nuestras latitudes y longitudes difieren ligeramente de ellas, nosotros redondeamos hasta el 7mo decimal, esto posiblemente funcione bien, pero habrá que ver
                    let lat_dif = m_.latLng.lat.toFixed(7) - latLng.lat.toFixed(7)
                    let lng_dif = m_.latLng.lng.toFixed(7) - latLng.lng.toFixed(7)                
                     return  lat_dif === lng_dif//curzamos los dedos para que siempre sea 0
                }, station_markers)

                let selected_station_ =  {
                    station: find(st => station_marker.nombre === st.nombre, all_stations),
                    marker: station_marker
                }
                
                renderStationWidget(selected_station_.station)
                
                maybeResetSelectedStationIcon() //si hay algun marcador previamente seleccionado, reseteamos el icono, al menos de que sea el de alguna estacion de ruta
                
                station_marker.marker.setIcon({
                    url: window.selected_charger_marker,
                    scaledSize: new google.maps.Size(31.36, 44.8)
                })
                station_marker.marker.setZIndex(google.maps.Marker.MAX_ZINDEX++)

                selected_station = selected_station_

            })
        })
        // marker.setZIndex(google.maps.Marker.MAX_ZINDEX + 1)

        filters.on('click', function (evt) {
            evt.stopPropagation()
            selected_filter = evt.target.dataset.zona
            $('.map-filters__option_JS').removeClass('selected')
            $(evt.target).addClass('selected')

            //marcadostation_markers, evt.target.dataset.zona)
            mobile_filters_toggle.toggleClass('open')
            if (selected_filter !== undefined && selected_filter !== "") {
                mobile_filters_toggle.find('.map-mobile-filters__selecciona span').text(selected_filter)
            } else {
                mobile_filters_toggle.find('.map-mobile-filters__selecciona span').text('Selecciona tu colonia')
            }

            //station select options
            if (user_location !== no_user_location) {
                let { lat, lng } = user_location
            }

            filterMarkers(station_markers, selected_filter)
                .then(([inside, outside]) => {
                    inside.forEach(location => { location.marker.setVisible(true) })
                    outside.forEach(location => { location.marker.setVisible(false) })
                    map.setCenter(calculateMarkersCenter(inside))
                    map.setZoom(15)
                })
        });

        reset_route.on('click', resetRoute)

        user_location_icon.on('click', (e) => {
            e.stopPropagation();
            geoLocateUser()
        })
        
        user_address.on('keyup', debounce(() => {
            getPossibleAddresses({address: user_address.val()})
                .then(possible_user_locations => {
					if (user_address.val() === '') {
						reset_input_address_btn.hide()
					} else {
						reset_input_address_btn.show()
					}
                    updateLocationSearchOptions(possible_user_locations, maybeRenderRoute)
                })
                .catch(tap)
        }, 150))

        user_address_destination.on('keyup', debounce(() => {
            getPossibleAddresses({address: user_address_destination.val()})
                .then(possible_user_destinations => {
					if (user_address_destination.val() === '') {
						reset_input_destination_btn.hide()
					} else {
						reset_input_destination_btn.show()
					}
                    updateDestinationSearchOptions(possible_user_destinations, maybeRenderRoute)
                })
                .catch(tap)
        }, 150))
        
		reset_input_address_btn.on('click', () => {
			//escondemos todo y reseteamos estados
			selectUserLocationSearchOption('')
			resetRoute()
			maybeSelectStations({}, false)
		})

		reset_input_destination_btn.on('click', () => {
			//escondemos todo y reseteamos estados
			selectUserDestinationSearchOption('')
			resetRoute()
			maybeSelectStations({}, false)
		})

        mobile_filters_toggle.on('click', () => mobile_filters_toggle.toggleClass('open'))

    }
    
    function selectUserLocationSearchOption(address) {
        devlog('corre selectUserLocationSearchOption')
        user_address.val(address);
        possible_user_locations = []
        search_options.html('')
    }

    function selectUserDestinationSearchOption(address) {
        devlog('corre selectUserDestinationsSearchOption')
        user_address_destination.val(address);
        possible_user_destinations = []
        destination_search_options.html('')
    }

    function maybeSelectStations({ userClosestStation, destinationClosestStation }, destinationIsInEconduceZone) {
        const findStationMarker = stations =>  pipe(
            filter(marker => marker.nombre === stations.nombre),
            pathOr(no_marker, [0, 'marker']),
        )(station_markers)

        const findScooterMarker = scooters =>  pipe(
            filter(marker => marker.numero === scooters.numero),
            pathOr(no_marker, [0, 'marker']),
        )(scooter_markers)
        
        station_markers
            .map(pathOr({setIcon: noop}, ['marker']))
            .forEach(marker => {
                marker.setIcon({
                    url: window.charger_marker,
                    scaledSize: new google.maps.Size(31.36, 44.8)
                })
            })

        if (userClosestStation !== undefined) {
            let station = findStationMarker(userClosestStation)
            if (station !== no_marker) {
                station.setIcon({
                    url: window.selected_charger_marker,
                    scaledSize: new google.maps.Size(31.36, 44.8)
                })
                station.setZIndex(google.maps.Marker.MAX_ZINDEX++)
            } else {
                let scooter = findScooterMarker(userClosestStation)
                scooter.setIcon({
                    url: window.selected_scooter_marker,
                    scaledSize: new google.maps.Size(31.36, 44.8)
                })
                scooter.setZIndex(google.maps.Marker.MAX_ZINDEX++)
            }
        }
        
        if (destinationClosestStation !== undefined && !destinationIsInEconduceZone) {
            let station = findStationMarker(destinationClosestStation)
            if (station !== no_marker) {
                station.setIcon({
                    url: window.selected_charger_marker,
                    scaledSize: new google.maps.Size(31.36, 44.8)
                })
                station.setZIndex(google.maps.Marker.MAX_ZINDEX++)
            } else {
                let scooter = findScooterMarker(destinationClosestStation)
                scooter.setIcon({
                    url: window.selected_scooter_marker,
                    scaledSize: new google.maps.Size(31.36, 44.8)
                })
                scooter.setZIndex(google.maps.Marker.MAX_ZINDEX++)
            }
        }
    } 

    function renderStationWidget(station) {
        user_input_container.hide()
        destination_input_container.hide()
        
        map_station_widget
            .html(makeSationWidget(station))
            .fadeIn('fast')

        $('#map-widget-back')
            .off('click')
            .on('click', () => {
                map_station_widget.hide()
                user_input_container.fadeIn('fast')
                destination_input_container.fadeIn('fast')
                maybeResetSelectedStationIcon()
            })
    }

    function maybeResetSelectedStationIcon() {
        if (selected_station.station.nombre !== user_closest_station.nombre && selected_station.station.nombre !== destination_closest_station.nombre) {
            let marker = pathOr(no_marker, ['marker', 'marker'], selected_station)
            marker.setIcon({//aun es el marcador de la estación anteriormente seleccionada
                url: window.charger_marker,
                scaledSize: new google.maps.Size(31.36, 44.8),
            })            
        }
    }

    function locateAddress(location_obj) {
        return getPossibleAddresses(location_obj)
            // .then(tap)
            .then((results) => {
                const { center, lat, lng, address: address_ } = results[0]
                map.setCenter(center);
                user_location = {lat, lng}
                user_marker.setPosition(center);
                user_marker.setVisible(true);

                if (map.zoom < 10) { map.setZoom(10); }
                map.panTo(center);//parece que evita que el marker desaparezca en ciertas ocasiones, después de que una ruta se setea

                address = address_;
                user_address.val(address)
                if (address !== '') { 
                    destination_input_container.fadeIn('fast') 
                }
            })
            .catch(tapN("error"))
    }

    //geolocation
    function geoLocateUser() {
        // console.log('geoloc');
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            //   console.log("position", position);
            user_location = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
                // console.log("user_location", user_location);
            locateAddress({location: user_location})
           
          }, function(err) {
            console.log('no se pudo obtener la locación', err);
          });
        } else {
          // Browser doesn't support Geolocation
          console.log('no se pudo obtener la locación', "Browser doesn't support Geolocation");
        }
    }


    function resetRoute() {
        routeRenderers.forEach(renderer => {renderer.setMap(null)})
        routeRenderers = []
    }

    return {
        initMap() {
            Promise.all([getAndProcessStations(), getGeoJSON()])
                .then(([{ estaciones, scooters }, geoData]) => {
                    zonas_econduce = geoData.zonas_econduce
                    zonas_econduce_polygons = geoData.zonas_econduce_polygons

                    all_stations = estaciones

                    let dom_map = document.getElementById('map')

                    if (dom_map === null) { return }

                    map = new google.maps.Map(dom_map, {
                        center: { lat: 19.423997, lng: -99.175638 },
                        zoom: 13,
						scrollwheel: false,
                        styles
                    });

                    map.data.addGeoJson(zonas_econduce)
					devlog(zonas_econduce)
                    map.data.setStyle({
                        fillColor: '#00BFEA',
                        strokeColor: '#00BFEA'
                    })

                    user_marker = new google.maps.Marker({//Es el punto del usuario
                        map: map,
                        position: map.center,
                        draggable: true,
                        visible: false,
                        icon: {
							url: user_marker_,
							// scaledSize: new google.maps.Size(31.36, 44.8)
						},

                    });

                    [station_markers, scooter_markers] = generateLocationMarkers(map, all_stations, scooters);

                    generateSelectOptions(all_stations)
                        .then(({ desktop, mobile }) => {
                            to.html(desktop);
                            to_mobile.html(mobile);
                            mapFiltersSlider()//inicializa el slider con las opciones
                        })


                    addHandlers()
                })
                .catch(tap)
        }
    };
}(jQuery);
