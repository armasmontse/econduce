!function(modules){function __webpack_require__(moduleId){if(installedModules[moduleId])return installedModules[moduleId].exports;var module=installedModules[moduleId]={exports:{},id:moduleId,loaded:!1};return modules[moduleId].call(module.exports,module,module.exports,__webpack_require__),module.loaded=!0,module.exports}var installedModules={};return __webpack_require__.m=modules,__webpack_require__.c=installedModules,__webpack_require__.p="./js/",__webpack_require__(0)}({0:function(module,exports,__webpack_require__){"use strict";var _animationAndCounterLauncher=__webpack_require__(23),$=jQuery,w=$(window);w.load(function(){document.getElementById("home_counter")?(0,_animationAndCounterLauncher.makeCounterAndLaunch)("https://mi.econduce.mx/api/viajes/contador.json","count",100,200):(0,_animationAndCounterLauncher.makeCounterAndLaunch)("https://mi.econduce.mx/api/viajes/contador.json","co2",20,400)})},5:function(module,exports){module.exports=R},8:function(module,exports){module.exports=axios},23:function(module,exports,__webpack_require__){"use strict";function _interopRequireDefault(obj){return obj&&obj.__esModule?obj:{default:obj}}Object.defineProperty(exports,"__esModule",{value:!0}),exports.makeCounterAndLaunch=exports.launch=exports.makeCounter_=void 0;var _axios=__webpack_require__(8),_axios2=_interopRequireDefault(_axios),_ramda=__webpack_require__(5),_animation=__webpack_require__(24),_counter=__webpack_require__(25),$=jQuery,w=$(window),mainLauncher=(exports.makeCounter_=_counter.makeCounter,function(counter){var contador_section=$(".contador_JS");if(0!==contador_section.length){var contador_pos=contador_section.offset().top,w_top=w.scrollTop(),launched=!1,launcher=function(){w_top+w.height()>contador_pos+350&&launched===!1&&(launched=!0,counter.startCount(),(0,_animation.footerAnimation)())};w.scroll(function(){w_top=w.scrollTop(),launcher()}),w.resize(function(){contador_pos=contador_section.offset().top})}}),launch=exports.launch=function(counter){counter.initCounter(),mainLauncher(counter)};exports.makeCounterAndLaunch=function(url,field_to_get,count_from_offset,speed){return _axios2.default.get(url).then((0,_ramda.pathOr)(1e3,["data",field_to_get])).then(Math.round).then(function(count_to){return count_to-2}).then(function(count_to){return(0,_counter.makeCounter)(count_to,count_from_offset,speed)}).then(function(counter){return launch(counter)}).catch(console.log)}},24:function(module,exports){"use strict";Object.defineProperty(exports,"__esModule",{value:!0});var _slicedToArray=function(){function sliceIterator(arr,i){var _arr=[],_n=!0,_d=!1,_e=void 0;try{for(var _s,_i=arr[Symbol.iterator]();!(_n=(_s=_i.next()).done)&&(_arr.push(_s.value),!i||_arr.length!==i);_n=!0);}catch(err){_d=!0,_e=err}finally{try{!_n&&_i.return&&_i.return()}finally{if(_d)throw _e}}return _arr}return function(arr,i){if(Array.isArray(arr))return arr;if(Symbol.iterator in Object(arr))return sliceIterator(arr,i);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}();exports.footerAnimation=function(){var gris="#999",amarillo="#FFCD00",rojo="#FF0312",verde="#00B443",vapor="#00D9F3",_map=[1,2,3,1,2,1,2,3,4,5,6].map(function(){return new TimelineMax({repeat:-1,repeatDelay:0})}),_map2=_slicedToArray(_map,11),moto1T=_map2[0],moto2T=_map2[1],moto3T=_map2[2],semaforo1=_map2[3],semaforo2=_map2[4],nube1T=_map2[5],nube2T=_map2[6],nube3T=_map2[7],nube4T=_map2[8],nube5T=_map2[9],nube6T=_map2[10],_map3=[1,2,3].map(function(n){return".cycles-muneco"+n+"__container"}),_map4=_slicedToArray(_map3,3),moto1=_map4[0],moto2=_map4[1],moto3=_map4[2],_map5=["rojo","amarillo","verde"].map(function(c){return".cycles-semaforo1__container .semaforo-"+c+" circle"}),_map6=_slicedToArray(_map5,3),rojo1=_map6[0],ama1=_map6[1],verde1=_map6[2],_map7=["rojo","amarillo","verde"].map(function(c){return".cycles-semaforo2__container .semaforo-"+c+" circle"}),_map8=_slicedToArray(_map7,3),rojo2=_map8[0],ama2=_map8[1],verde2=_map8[2],_map9=[1,2,3,4,5,6].map(function(n){return"#nube"+n}),_map10=_slicedToArray(_map9,6),nube1=_map10[0],nube2=_map10[1],nube3=_map10[2],nube4=_map10[3],nube5=_map10[4],nube6=_map10[5],nubesAnimation=function(timeline,nube){var duration=80+100*Math.random(),w_width=jQuery(window).width(),initial_position=jQuery(nube).offset().left/w_width*100;timeline.to(nube,2*duration/3,{x:2e3,delay:10*Math.random(),ease:Power1.easeInOut}).to(nube,duration/3,{x:3e3,fill:"transparent"}).to(nube,.1,{x:-500}).to(nube,20,{fill:vapor,x:initial_position,ease:Power1.easeInOut})};[[nube1T,nube1],[nube2T,nube2],[nube3T,nube3],[nube4T,nube4],[nube5T,nube5],[nube6T,nube6]].forEach(function(_ref){var _ref2=_slicedToArray(_ref,2),timeline=_ref2[0],nube=_ref2[1];return nubesAnimation(timeline,nube)}),moto1T.to(moto1,5,{left:"68%",ease:Power3.easeOut}).to(moto1,3,{delay:3,left:"140%",ease:Power2.easeIn}).to(moto1,4,{}),moto2T.to(moto2,2.5,{delay:4.5,left:"34%"}).to(moto2,5.5,{delay:1.5,left:"140%",ease:Power3.easeIn}).to(moto2,1,{}),moto3T.to(moto3,4.5,{delay:10.5,left:"130%",ease:Power1.easeIn}).to(moto3,0,{}),semaforo2.to(verde2,.1,{fill:gris,delay:3,ease:Power2.easeIn}).to(ama2,.1,{fill:amarillo,ease:Power2.easeIn}).to(ama2,.1,{fill:gris,delay:1.4}).to(rojo2,.1,{fill:rojo}).to(rojo2,2.7,{}).to(rojo2,.1,{fill:gris}).to(verde2,.1,{fill:verde}).to(verde2,7.3,{fill:verde}),semaforo1.to(verde1,.1,{fill:gris,delay:3.5,ease:Power2.easeIn}).to(ama1,.1,{fill:amarillo,ease:Power2.easeIn}).to(ama1,.1,{fill:gris,delay:1.4}).to(rojo1,.1,{fill:rojo}).to(rojo1,2.7,{}).to(rojo1,.1,{fill:gris}).to(verde1,.1,{fill:verde}).to(verde1,6.8,{fill:verde})}},25:function(module,exports){"use strict";function _defineProperty(obj,key,value){return key in obj?Object.defineProperty(obj,key,{value:value,enumerable:!0,configurable:!0,writable:!0}):obj[key]=value,obj}Object.defineProperty(exports,"__esModule",{value:!0});var _slicedToArray=function(){function sliceIterator(arr,i){var _arr=[],_n=!0,_d=!1,_e=void 0;try{for(var _s,_i=arr[Symbol.iterator]();!(_n=(_s=_i.next()).done)&&(_arr.push(_s.value),!i||_arr.length!==i);_n=!0);}catch(err){_d=!0,_e=err}finally{try{!_n&&_i.return&&_i.return()}finally{if(_d)throw _e}}return _arr}return function(arr,i){if(Array.isArray(arr))return arr;if(Symbol.iterator in Object(arr))return sliceIterator(arr,i);throw new TypeError("Invalid attempt to destructure non-iterable instance")}}(),$=jQuery,reverse=function(arr){return arr.reduce(function(acc,s){return acc.unshift(s),acc},[])},merge=function(acc,obj){return Object.assign(acc,obj)},repeat=function(n,thing){for(var arr=[],i=0;i<n;i++)arr.push(thing);return arr};exports.makeCounter=function(count_to,count_from_offset,speed){var count_from=count_to-count_from_offset,_ref=function(count_from,count_to){var cf=(count_from+"").split(""),ct=(count_to+"").split(""),unit_diff=ct.length-cf.length;return unit_diff>0?[repeat(unit_diff,"0").concat(cf),ct]:[cf,ct]}(count_from,count_to),_ref2=_slicedToArray(_ref,2),count_from_arr=_ref2[0],count_to_arr=_ref2[1],count_from_reversed=reverse(count_from_arr),units=["unidad","decena","centena","milena","diezmilena","cienmilena","millolena","diezmillolena","cienmillolena"],numberContainer=function(n){return function(init_num){return'\n        <li class="'+(init_num===n?"active":init_num===n-1?"before":"")+'">\n             <span>\n                <div class="up">\n                    <div class="shadow"></div>\n                    <div class="inn">'+n+'</div>\n                </div>\n                <div class="down">\n                    <div class="shadow"></div>\n                    <div class="inn">'+n+"</div>\n                </div>\n            </span>\n        </li>"}},commaContainer='<ul class="counter comma">\n\t\t\t<li class="active">\n\t\t\t\t<span>\n\t\t\t\t\t<div class="up">\n\t\t\t\t\t\t<div class="shadow"></div>\n\t\t\t\t\t\t<div class="inn">,</div>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class="down">\n\t\t\t\t\t\t<div class="shadow"></div>\n\t\t\t\t\t\t<div class="inn">,</div>\n\t\t\t\t\t</div>\n\t\t\t\t</span>\n\t\t\t</li>\n\t\t</ul>',numbers=[0,1,2,3,4,5,6,7,8,9].map(numberContainer),available_units=units.slice(0,count_to_arr.length),counters=available_units.map(function(unit,i){var init_num=Number(count_from_reversed[i]),rightmost_number_class_when_zero=0===init_num&&i===available_units.length-1?"is-zero":"";return'\n\t        <ul class="counter '+unit+" "+rightmost_number_class_when_zero+'">\n\t        \t'+numbers.map(function(fn){return fn(init_num)}).join("")+"\n\t        </ul>\n\t        "}),addCommas=function(counters){return counters.reduceRight(function(acc,counter,last_index){var maybeCommaContainer=last_index%3===0&&0!==last_index?commaContainer:"";return acc.concat(counter+maybeCommaContainer)},[])},play=function(number){number.addClass("before").removeClass("active").next("li").addClass("active").closest("body").addClass("counter-play_JS")},unitPlay=function(unit_class){return function(){var number=$("ul"+unit_class+" li.active");$("body").removeClass("counter-play_JS"),void 0==number.html()?(number=$("ul"+unit_class+" li").eq(0),play(number)):number.is(":last-child")?($("ul"+unit_class+" li").removeClass("before"),number.addClass("before").removeClass("active"),number=$("ul"+unit_class+" li").eq(0),number.addClass("active").closest("body").addClass("counter-play_JS")):($("ul"+unit_class+" li").removeClass("before"),$("ul"+unit_class).removeClass("is-zero"),play(number))}},unitChangers=count_from_reversed.map(function(n,i){var up=(Number(n),unitPlay("."+units[i]));return _defineProperty({},units[i],up)}).reduce(merge,{}),count_state=count_from_reversed.map(function(n,i){return _defineProperty({},units[i],Number(n))}).reduce(merge,{}),changeCountState=function(one){var incUnit=function incUnit(units,unit_index){var unit_name=units[unit_index];if(count_state[unit_name]=count_state[unit_name]+one,unitChangers[unit_name](),count_state[unit_name]>9)return count_state[unit_name]=0,incUnit(units,unit_index+1)};incUnit(units,0)},countTo0=function(from,every){return function(){var count=from,id=setInterval(function(){count-=1,changeCountState(1),count===-1&&clearInterval(id)},every)}},makeCounters=function(counters){return function(){$(".counter__container_JS").html(counters.join("")),changeCountState(1)}};return{initCounter:makeCounters(addCommas(counters)),startCount:countTo0(count_to-count_from,speed)}}}});