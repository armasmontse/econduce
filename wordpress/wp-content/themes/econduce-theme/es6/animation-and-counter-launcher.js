import axios from 'axios'
import {pathOr} from 'ramda'
import {footerAnimation} from './animation'
import {makeCounter} from './counter'

const $ = jQuery
const w = $(window)
const tap = x => {console.log(x); return x}

export const makeCounter_ = makeCounter


const mainLauncher = (counter) => {
    
    const contador_section = $('.contador_JS')
    if (contador_section.length === 0) { return }
    let contador_pos = contador_section.offset().top
    let w_top = w.scrollTop()
    let launched = false
    
    let launcher =  () => {
        if(w_top + w.height()> contador_pos + 350 && launched === false) {
            launched = true
            counter.startCount()
            footerAnimation()   
        }
    }

    w.scroll(() => {
        w_top = w.scrollTop()
        launcher()
    })

    w.resize(() => {
        contador_pos = contador_section.offset().top
    })
}


export const launch = counter => {
    counter.initCounter()
    mainLauncher(counter)
}

export const makeCounterAndLaunch = (url, field_to_get, count_from_offset, speed) =>
    axios.get(url)
		.then(pathOr(1000, ['data', field_to_get]))
		.then(Math.round)//evitamos problemas con nuestra funcionalidad del contador, que no parsea correctamente los floats
		// .then(tap)
        .then(count_to => count_to - 2)//parche porque se estan agregando dos uidades extras, y de momento no s'e por qu'e
        .then(count_to => makeCounter(count_to, count_from_offset, speed))
        .then(counter => launch(counter))
        .catch(console.log)