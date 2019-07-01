import {
    join,
    pipe,
    split
} from 'ramda'
import capitalize from 'lodash.capitalize'
import h from 'hyperscript'
import hh from 'hyperscript-helpers'

import { parseMoney } from '../theme-helpers'

const { tr, td, span } = hh(h)

export const priceTableRow = ([zone_name, { dia: price_dia, noche: price_noche }]) =>
    tr([
        td('.zone-blue', 
            pipe(split('_'),join(' '),capitalize)
                (zone_name)),
        td([
            span('7am-9pm'),
            span('9pm-7am')
        ]),
        td([
            span(parseMoney(price_dia / 100)),
            span(parseMoney(price_noche / 100))
        ])
    ])
