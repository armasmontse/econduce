import {makeCounterAndLaunch, makeCounter_, launch} from './animation-and-counter-launcher'
const $ = jQuery
const w = $(window)



w.load(() => {
    if(document.getElementById('home_counter')) {
        makeCounterAndLaunch('https://mi.econduce.mx/api/viajes/contador.json', 'count',  100, 200)
    } else {
        // launch(makeCounter_(180, 20, 400))
		makeCounterAndLaunch('https://mi.econduce.mx/api/viajes/contador.json', 'co2', 20, 400)

    }
})
