import h from 'hyperscript'
import hh from 'hyperscript-helpers'
import R, {map, append, pipe, prepend, toUpper, over, lensPath, join, values} from 'ramda'

const { div, p, img, span, h3 } = hh(h)

const capitalize = pipe(
  over(lensPath([0]), toUpper), 
  values, 
  join(''))
  
  const empty = div({style:'display:none'})
  
  const icons = {
    direccion: window.widget_marker,
    descripcion: window.widget_address,
    horarios: window.widget_hours,
    ruta: window.widget_route
  }
  
  const tap = x => { console.log(x); return x }

  export const makeSationWidget = station => {
    let ms = element_modifier => `map-station-widget${element_modifier}`
    let row = (icon_url, text) =>
    div({ className: ms('__row') },
    [ div({ className: ms('__icon-container') }, [img({ src: icon_url })])
    , p({ className: ms('__p') }, text),
  ])
  
    let header = div({className: ms('__header')}, [
            h3( {className: ms('__ttl')}, station.colonia + ', ' + station.nombre),
            span({className: ms('__back'), id:'map-widget-back'}, 'X')
        ])
  
    let content = div({ className: ms('__content') }, [
        ['direccion', 'descripcion'].map(row_name => row(icons[row_name], station[row_name])),
    
        row(icons.horarios, //horarios
            pipe(
                map(([day, {abre, cierra, allday, cerrado}]) => {
                    let span_ = hour => span({ style: 'display:block' }, hour)

                    if(Number(cerrado) === 1) { return span_(`${capitalize(day)}: cerrado`) }

                    if(Number(allday) === 1) { return span_(`${capitalize(day)}: 24hrs`) }

                    return span_(`${capitalize(day)} ${abre} a ${cierra}`)
                }),
                prepend(span({ style: 'display:block' }, 'Horario:'))
            )(station.horarios))
    ])
    
    let footer = station.image 
        ? div({ className: ms('__footer'), 
                style: `background-image: url(${station.image})` })
        : empty
    
    return div({className: ms('')}, [
        header, 
        content, 
        footer
    ])
  }
  
  