/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
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
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /home/mnbtech/Projects/EasyInventory/resources/js/app.js: Identifier 'router' has already been declared (20:6)\n\n\u001b[0m \u001b[90m 18 | \u001b[39m})\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 19 | \u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 20 | \u001b[39m\u001b[36mconst\u001b[39m router \u001b[33m=\u001b[39m \u001b[36mnew\u001b[39m \u001b[33mVueRouter\u001b[39m({\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m      \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 21 | \u001b[39m    routes \u001b[90m// short for `routes: routes`\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 22 | \u001b[39m})\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 23 | \u001b[39m\u001b[90m// https://flaviocopes.com/vue-router/\u001b[39m\u001b[0m\n    at Parser.raise (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:6930:17)\n    at ScopeHandler.checkRedeclarationInScope (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:4240:12)\n    at ScopeHandler.declareName (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:4206:12)\n    at Parser.checkLVal (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:8763:22)\n    at Parser.parseVarId (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:11284:10)\n    at Parser.parseVar (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:11259:12)\n    at Parser.parseVarStatement (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:11081:10)\n    at Parser.parseStatementContent (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:10678:21)\n    at Parser.parseStatement (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:10611:17)\n    at Parser.parseBlockOrModuleBlockBody (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:11187:25)\n    at Parser.parseBlockBody (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:11174:10)\n    at Parser.parseTopLevel (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:10542:10)\n    at Parser.parse (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:12051:10)\n    at parse (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/parser/lib/index.js:12102:38)\n    at parser (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/core/lib/transformation/normalize-file.js:168:34)\n    at normalizeFile (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/core/lib/transformation/normalize-file.js:102:11)\n    at runSync (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/core/lib/transformation/index.js:44:43)\n    at runAsync (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/core/lib/transformation/index.js:35:14)\n    at process.nextTick (/home/mnbtech/Projects/EasyInventory/node_modules/@babel/core/lib/transform.js:34:34)\n    at _combinedTickCallback (internal/process/next_tick.js:131:7)\n    at process._tickCallback (internal/process/next_tick.js:180:9)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/mnbtech/Projects/EasyInventory/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /home/mnbtech/Projects/EasyInventory/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });