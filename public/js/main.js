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

/***/ "./resources/js/helpers.js":
/*!*********************************!*\
  !*** ./resources/js/helpers.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var routes = __webpack_require__(/*! ./routes.json */ "./resources/js/routes.json");

var baseUrl = config.webServer.url;

exports.route = function () {
  var args = Array.prototype.slice.call(arguments);
  var name = args.shift();

  if (routes[name] === undefined) {
    console.error('Unknown route ', name);
  } else {
    return baseUrl + '/' + routes[name].split('/').map(function (s) {
      return s[0] == '{' ? args.shift() : s;
    }).join('/');
  }
};

exports.showBodyLoader = function () {
  $("#loading").css({
    'display': 'block'
  });
};

exports.hideBodyLoader = function () {
  $("#loading").css({
    'display': 'none'
  });
};

/***/ }),

/***/ "./resources/js/main.compile.js":
/*!**************************************!*\
  !*** ./resources/js/main.compile.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./helpers.js */ "./resources/js/helpers.js");
/* harmony import */ var _helpers_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_helpers_js__WEBPACK_IMPORTED_MODULE_0__);

$(document).ready(function () {
  function initUsersDataTable() {
    var usersTable = $("#usersTable");

    if (usersTable.length > 0) {
      $("#usersTable").DataTable();
    }
  } /////////// Init User database //////////


  initUsersDataTable(); /////////////////////////////////////////
  /////////// Handle new user form actions //////////

  function computeUserName() {
    $("#username").val('');
    var username = '';
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();

    if (firstName && lastName) {
      username = lastName + '.' + firstName;
    }

    $("#username").val(username);
  }

  function generateSecuredPassword() {
    $.ajax({
      url: Object(_helpers_js__WEBPACK_IMPORTED_MODULE_0__["route"])('admin.users.create.getSecuredPassword'),
      method: 'GET',
      success: function success(result) {
        result = $.parseJSON(result);
        $("#password").val(result);
      }
    });
  }

  $(".NewUserForm #firstName").on('change', function () {
    computeUserName();
  });
  $(".NewUserForm #lastName").on('change', function () {
    computeUserName();
  });
  $(".generateSecuredPassword").on('click', function () {
    generateSecuredPassword();
  }); ///////////////////////////////////////////////////
});

/***/ }),

/***/ "./resources/js/routes.json":
/*!**********************************!*\
  !*** ./resources/js/routes.json ***!
  \**********************************/
/*! exports provided: , auth.login.view, auth.login.handle, admin.index, admin.users.index, admin.users.create, admin.users.create.post, admin.users.create.getSecuredPassword, default */
/***/ (function(module) {

module.exports = {"":"api/user","auth.login.view":"auth/login","auth.login.handle":"auth/login","admin.index":"admin","admin.users.index":"admin/users","admin.users.create":"admin/users/create","admin.users.create.post":"admin/users/create","admin.users.create.getSecuredPassword":"admin/users/getSecuredPassword"};

/***/ }),

/***/ 0:
/*!********************************************!*\
  !*** multi ./resources/js/main.compile.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\baguel_project\resources\js\main.compile.js */"./resources/js/main.compile.js");


/***/ })

/******/ });