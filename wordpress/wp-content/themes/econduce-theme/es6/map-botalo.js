/* globals google: false */
import axios from 'axios'
import R, {
  forEach,
  head, 
  keys, 
  last, 
  map, 
  merge, 
  mergeAll, 
  mergeWith, 
  pathOr, 
  pipe, 
  sortBy, 
  split, 
  toPairs, 
} from 'ramda'
import {priceTableRow} from './map-botalo/templates'

const tap = x => {console.log(x); return x}

export const botaloMap = () => 
  axios.get('https://api.mapbox.com/v4/econduce.n61kji6p/features.json?access_token=pk.eyJ1IjoiZWNvbmR1Y2UiLCJhIjoiOWE5ZDQ3NDZlZWJkYWY2ZWY3MzI0NGM1MzM3ZjA1MWIifQ.CA5umhN6zx6FUt_YbfiknA')
    // .then(tap)
    .then(pathOr({}, ['data']))
    // .then(tap)
    .then(zonas_botalo => {
      const dom_map = document.getElementById('botalo-map')
      
      if (dom_map === null) {return}
      
      const map = new google.maps.Map(dom_map, {
        center: { lat: 19.423997, lng: -99.175638 },
          zoom: 12
      });
      
      const marker = new google.maps.Marker({
         position: {lat:0,lng: 0},
          map
       });

      const infowindow = new google.maps.InfoWindow({ content: '' })

      map.data.addGeoJson(zonas_botalo)

      map.data.setStyle(layer => {
          return {
              fillColor: layer.f.fill,
              strokeColor: layer.f.stroke
          }
      })

      map.data.addListener('mouseover', function(event) {
          map.data.revertStyle();
          map.data.overrideStyle(event.feature, {strokeWeight: 6});
      });

      map.data.addListener('click', function(event) {
          let lat = event.latLng.lat()
          let lng = event.latLng.lng()
         
          marker.setPosition({lat, lng})
          infowindow.setContent(event.feature.f.title)
          infowindow.open(map, marker)

          map.data.revertStyle()
          map.data.overrideStyle(event.feature, {strokeWeight: 6})
      });

    })
    .catch(console.log)

//trae los precios de botalo
export const getBotaloPricesTable = () => {
  let tbody = document.getElementById('table-botalo__body')
  if(tbody === null) {return}
  
  return axios.get('http://mi.econduce.mx/api/viajes/precios_botalo.json')
    .then(pathOr({}, ['data', 'precios_botalo']))
    .then(precios_obj =>//transformamos el objeto para imprimir facilmente el template :: {dia: [{zona: precio}], noche: [{zona: precio}]} -> {zona: {dia:precio, noche:precio}, ...}
      pipe(
        keys,
        R.map(dia_o_noche => 
          mergeAll(
            R.map(
              zona => 
                ({ [zona]: { [dia_o_noche] : precios_obj[dia_o_noche][zona] } }), 
              keys(precios_obj[dia_o_noche])))
        ),
        ([dia, noche]) => mergeWith(merge, dia, noche)
      )(precios_obj))
    .then(pipe(//Sort de las zonas
      toPairs,//{zona_<number>: {*}} -> [[zona_<number>, {*}]]
      sortBy(pipe( // ['zona_<number>', {*}] -> <number> // extraemos los numero de las propiedades (zona_1, zona_2, etc.) y los comparamos para ordenarlos
          head, split('_'), last, Number))))
    .then(map(priceTableRow))
    .then(forEach(row => { tbody.appendChild(row) }))
    // .then(tap)

}  
    
