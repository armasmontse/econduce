import './flor.js'
import {cltvo_map} from './map-ubicaciones.js'
import './map-botalo'
import {botaloMap, getBotaloPricesTable} from './map-botalo'
import { showAndPlayVideo, headerScroll, toogleFooterMenus } from './theme-helpers'
import {tablesdrops}	from './tableDrops.js';
const $ = jQuery
window.cltvo_map = cltvo_map
window.botaloMap = botaloMap


$(window).load(() => {
    showAndPlayVideo('#aprende-iframe__container', '#aprende-iframe__cover-image')
	headerScroll('#header_arrow')
	toogleFooterMenus('.show-menu__JS')
    tablesdrops();
    getBotaloPricesTable()
})
