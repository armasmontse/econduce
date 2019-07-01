const $ = jQuery

//type Unit :: String
//type Template :: String
//type ChangeNumber :: IO DOM

const reverse = arr => arr.reduce((acc, s) => {acc.unshift(s); return acc}, [])

const merge = (acc, obj) => Object.assign(acc, obj)

const repeat = (n, thing) => {
    let arr = []
    for(let i = 0; i < n; i++) {
        arr.push(thing)
    }
    return arr;
}


export const makeCounter = (count_to, count_from_offset, speed) => {
    // console.log("count_to", count_to);

    
    const count_from = count_to - count_from_offset
    
    //count_from_arr :: Int -> [String]
    const [count_from_arr, count_to_arr] = ((count_from, count_to) => {
        let cf = (count_from+'').split('')
        let ct = (count_to+'').split('')
        let unit_diff = ct.length - cf.length
        return unit_diff > 0
        ? [repeat(unit_diff, '0').concat(cf), ct]
        : [cf, ct]
    })(count_from, count_to)
    
    //count_from_reversed :: [String] -> [String]
    const count_from_reversed = reverse(count_from_arr)
    
    // units :: [Unit]
    const units = ['unidad', 'decena', 'centena', 'milena','diezmilena', 'cienmilena', 'millolena', 'diezmillolena', 'cienmillolena']
    
    //numbers :: Int -> Int -> Template
    const numberContainer = (n) => (init_num)  => {
        return `
        <li class="${ init_num === n  ? 'active' : init_num === n - 1 ? 'before' : '' }">
             <span>
                <div class="up">
                    <div class="shadow"></div>
                    <div class="inn">${n}</div>
                </div>
                <div class="down">
                    <div class="shadow"></div>
                    <div class="inn">${n}</div>
                </div>
            </span>
        </li>`
    }
    
    //commaContainer :: Template
    const commaContainer =
		`<ul class="counter comma">
			<li class="active">
				<span>
					<div class="up">
						<div class="shadow"></div>
						<div class="inn">,</div>
					</div>
					<div class="down">
						<div class="shadow"></div>
						<div class="inn">,</div>
					</div>
				</span>
			</li>
		</ul>`
		    
    
    //numbers :: [Int] -> [Int -> String]
    const numbers = [0,1,2,3,4,5,6,7,8,9].map(numberContainer)
    
    // available_units :: [Unit]
    const available_units = units.slice(0, count_to_arr.length)
    
    // counters :: [Template]
    const counters =available_units
	    .map((unit, i) => {
	        
	        let init_num = Number(count_from_reversed[i])
	        
	        let rightmost_number_class_when_zero = init_num === 0 && i === available_units.length-1 ? 'is-zero' : ''
	        
	        return `
	        <ul class="counter ${unit} ${rightmost_number_class_when_zero}">
	        	${numbers.map(fn => fn(init_num)).join('')}
	        </ul>
	        `
	    })


    const addCommas = (counters) =>
    counters.reduceRight(
        (acc, counter, last_index) => {
            let maybeCommaContainer =
            last_index%3 === 0 && last_index !== 0
            ? commaContainer
            : ''
            return acc.concat(counter+maybeCommaContainer)
        },
        []
    )

    // play :: DOM $("ul"+unit_class+" li.active")  -> ChangeNumber
    const play = (number) => {
        number.addClass("before")
        .removeClass("active")
        .next("li")
        .addClass("active")
        .closest("body")
        .addClass("counter-play_JS");
    }

    //unitPlay :: Unit -> () -> ChangeNumber
    const unitPlay = (unit_class) => () => {
        let number = $("ul"+unit_class+" li.active");
        $("body").removeClass("counter-play_JS");
        
        if (number.html() == undefined) {//es cualquier numero
            number = $("ul"+unit_class+" li").eq(0);
            play(number)
            
        } else if (number.is(":last-child")) {//es el último número
            $("ul"+unit_class+" li").removeClass("before");
            number.addClass("before").removeClass("active");
            number = $("ul"+unit_class+" li").eq(0);
            number.addClass("active")
            .closest("body")
            .addClass("counter-play_JS");
        } else {
            $("ul"+unit_class+" li").removeClass("before");
            $("ul"+unit_class).removeClass('is-zero')
            play(number)
        }
    }

    //unitChangers :: { Unit: (Unit -> () -> ChangeNumber) }
    const unitChangers =
    count_from_reversed
    .map((n, i) => {
        let num = Number(n)
        let init_num = (num - 1) === -1 ? 9 : num - 1
        let up = unitPlay('.'+units[i])
        return {[units[i]] : up}
    })
    .reduce(merge, {})

    // count_state :: {Unit : Int}
    const count_state =
    	count_from_reversed
   		 	.map((n, i) => ({[units[i]]: Number(n)}))
    		.reduce(merge, {})

    // changeCountState :: Int -> ChangeNumber
    const changeCountState = one => {//esta funcion es impura y muta el obejto de count_state y también cambia la cuenta
        let incUnit = (units, unit_index) => {
            let unit_name = units[unit_index]
            
            count_state[unit_name] = count_state[unit_name] + one
            
            // console.log("unit_name", unit_name);
            unitChangers[unit_name]()//generamos el cambio en el DOM
            
            if(count_state[unit_name] > 9) {
                count_state[unit_name] = 0
                return incUnit(units, unit_index + 1)
            }
        }
        incUnit(units, 0)
    }

    // countTo0 :: Int -> Int ->  () -> ChangeNumber
    const countTo0 = (from, every) => () => {
        let count = from
        let id = setInterval(() => {
            count = count - 1
            changeCountState(1)
            // console.log(count_state);
            if (count === -1) { clearInterval(id)}
        }, every);
    }


    // makeCounters :: Template -> () -> IO DOMTemplate && ChangeNumber
    const makeCounters = counters => () =>  {
        $('.counter__container_JS').html(counters.join(''))
        changeCountState(1)
    }

    return {
        /*LLamamos a las funciones*/
        // initCounter :: () -> IO DOMTemplate
        initCounter: makeCounters(addCommas(counters)),
        // startCount :: () -> ChangeNumber
        startCount: countTo0(count_to - count_from , speed)
    }
}