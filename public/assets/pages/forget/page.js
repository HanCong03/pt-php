/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	"use strict";

	__webpack_require__(1);

/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/17
	 */

	'use strict';

	__webpack_require__(2);

	jQuery(function () {
	    var validate = __webpack_require__(3);
	    var showErrors = __webpack_require__(4);
	    var submit = __webpack_require__(5);

	    $(document.forms['forget-form']).on('submit', function (e) {
	        var errors = validate(this);

	        if (errors) {
	            e.preventDefault();
	            e.stopPropagation();
	            showErrors(errors);
	        } else {
	            //submit(this, (function (err, data) {
	            //    checkSetpUsernameResult(this, err, data);
	            //}).bind(this));
	        }
	    });

	    function checkSetpUsernameResult(form, err, res) {
	        var errors = [];

	        if (err) {
	            alert('网络错误');
	            return;
	        }

	        var elements = form.elements;

	        if (res.error) {
	            for (var key in res.error) {
	                if (!res.error.hasOwnProperty(key)) {
	                    continue;
	                }

	                if (elements[key]) {
	                    errors.push({
	                        ele: elements[key],
	                        message: res.error[key]
	                    });
	                }
	            }

	            showErrors(errors);
	        } else {
	            location.href = res.data.redirect;
	        }
	    }
	});

/***/ },
/* 2 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/17
	 */

	'use strict';

	var ALPHABET = 'abcdefghijklmnopqrstuvwxyz'.split('');

	jQuery(function ($) {
	    var verifyCode = $('#verifyCode')[0];
	    var refreshBtn = $('#refreshBtn')[0];

	    $(refreshBtn).on('click', function (e) {
	        this.disabled = true;

	        verifyCode.src = next(verifyCode.src);
	    });

	    $(verifyCode).on('load error', function () {
	        refreshBtn.disabled = false;
	    });
	});

	function next(url) {
	    url = url.split('?')[0];
	    return url + '?' + random() + Date.now();
	}

	function random() {
	    var result = [];

	    for (var i = 0, len = 6; i < len; i++) {
	        result[i] = ALPHABET[Math.floor(Math.random() * 10)];
	    }

	    return result.join('');
	}

/***/ },
/* 3 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/17
	 */

	'use strict';

	module.exports = function (form) {
	    var username = form.elements['username'].value;
	    var verifyCode = form.elements['verify-code'].value;

	    var result = [];
	    var error = undefined;

	    error = validateUsername(username);

	    if (error) {
	        result.push({
	            ele: form.elements['username'],
	            message: error
	        });
	    }

	    error = validateVerifyCode(verifyCode);

	    if (error) {
	        result.push({
	            ele: form.elements['verify-code'],
	            message: error
	        });
	    }

	    return result.length ? result : null;
	};

	function validateUsername(value) {
	    if (value.trim() === '') {
	        return '请输入手机号/邮箱';
	    }

	    if (!/^(1[0-9]{10}|[\S]+@[a-z0-9_\-]+\.[a-z]{2,})$/i.test(value)) {
	        return '请输入正确的手机号/邮箱';
	    }

	    return null;
	}

	function validateVerifyCode(value) {
	    if (value.trim() === '') {
	        return '请输入验证码';
	    }

	    if (!/^[a-z]{4}$/i.test(value)) {
	        return '请输入正确的验证码';
	    }
	}

/***/ },
/* 4 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/17
	 */

	'use strict';

	module.exports = function (errors) {
	    errors.forEach(function (err) {
	        var $parent = $(err.ele.parentNode);
	        var $msg = $(err.ele.parentNode.lastElementChild);

	        if ($parent[0].hasError) {
	            return;
	        }

	        $parent[0].hasError = true;

	        $msg.html(err.message);

	        $parent.one('input', function () {
	            $parent.removeClass('error');
	            $msg.html('');
	            $parent[0].hasError = false;
	        });

	        $parent.addClass('error');
	    });

	    errors[0].ele.focus();
	};

/***/ },
/* 5 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/17
	 */

	'use strict';

	module.exports = function (form, cb) {
	    $.post({
	        url: form.action,
	        method: form.method,
	        success: function success(res) {
	            cb(false, res);
	        },
	        error: function error(err) {
	            cb(true, err);
	        }
	    });
	};

/***/ }
/******/ ]);