/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "./js/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

	'use strict';
	
	Object.defineProperty(exports, "__esModule", {
	    value: true
	});
	
	var _slicedToArray = function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"]) _i["return"](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError("Invalid attempt to destructure non-iterable instance"); } }; }();
	
	var footerAnimation = exports.footerAnimation = function footerAnimation() {
	    //Colores
	    var gris = '#999',
	        amarillo = '#FFCD00',
	        rojo = '#FF0312',
	        verde = '#00B443';
	
	    //Timelines
	
	    var _map = [1, 2, 3, 4, 5].map(function () {
	        return new TimelineMax({ repeat: -1, repeatDelay: 0 });
	    }),
	        _map2 = _slicedToArray(_map, 5),
	        moto1T = _map2[0],
	        moto2T = _map2[1],
	        moto3T = _map2[2],
	        semaforo1 = _map2[3],
	        semaforo2 = _map2[4];
	
	    //Nodos
	
	
	    var _map3 = [1, 2, 3].map(function (n) {
	        return '.cycles-muneco' + n + '__container';
	    }),
	        _map4 = _slicedToArray(_map3, 3),
	        moto1 = _map4[0],
	        moto2 = _map4[1],
	        moto3 = _map4[2];
	
	    var _map5 = ['rojo', 'amarillo', 'verde'].map(function (c) {
	        return '.cycles-semaforo1__container .semaforo-' + c + ' circle';
	    }),
	        _map6 = _slicedToArray(_map5, 3),
	        rojo1 = _map6[0],
	        ama1 = _map6[1],
	        verde1 = _map6[2];
	
	    var _map7 = ['rojo', 'amarillo', 'verde'].map(function (c) {
	        return '.cycles-semaforo2__container .semaforo-' + c + ' circle';
	    }),
	        _map8 = _slicedToArray(_map7, 3),
	        rojo2 = _map8[0],
	        ama2 = _map8[1],
	        verde2 = _map8[2];
	
	    //Cada una dela siguientes dura 15 segundos
	
	
	    moto1T.to(moto1, 5, { left: '68%', ease: Power3.easeOut }) //avanza hasta el segundo semáforo
	    .to(moto1, 3, { delay: 3, left: '140%', ease: Power2.easeIn }) //de detiene y luego avanza
	    .to(moto1, 4, {}); //fuera de la pantalla
	
	    moto2T.to(moto2, 2.5, { delay: 4.5, left: '34%' }) //avanza hasta el primer semáforo
	    .to(moto2, 4.5, { delay: 1.5, left: '140%', ease: Power3.easeIn }) //se detiene y luego avanza hasta el final
	    .to(moto2, 2, {}); //fuera de la pantalla
	
	    moto3T.to(moto3, 3.5, { delay: 11.5, left: '140%', ease: Power2.easeIn }) //le van a poner una multa
	    .to(moto3, 0, {});
	
	    // el semáforo1 está desfasado del semáforo2 por +0.5s, fuera de eso son iguales
	    semaforo2.to(verde2, 0.1, { fill: gris, delay: 3, ease: Power2.easeIn }).to(ama2, 0.1, { fill: amarillo, ease: Power2.easeIn }).to(ama2, 0.1, { fill: gris, delay: 1.4 }).to(rojo2, 0.1, { fill: rojo }).to(rojo2, 2.7, { fill: rojo }).to(rojo2, 0.1, { fill: gris }).to(verde2, 0.1, { fill: verde }).to(verde2, 7.3, { fill: verde });
	
	    semaforo1.to(verde1, 0.1, { fill: gris, delay: 3.5, ease: Power2.easeIn }).to(ama1, 0.1, { fill: amarillo, ease: Power2.easeIn }).to(ama1, 0.1, { fill: gris, delay: 1.4 }).to(rojo1, 0.1, { fill: rojo }).to(rojo1, 2.7, { fill: rojo }).to(rojo1, 0.1, { fill: gris }).to(verde1, 0.1, { fill: verde }).to(verde1, 6.8, { fill: verde });
	};

/***/ })
/******/ ]);
//# sourceMappingURL=animation.js.map