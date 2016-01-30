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
	 * Date: 16/1/21
	 */

	'use strict';

	jQuery(function ($) {
	    var validateForm = __webpack_require__(2);

	    $(document.forms['login-form']).on('submit', function (e) {
	        e.preventDefault();

	        var errors = validateForm(this);
	        var eles = this.elements;

	        if (errors) {
	            showErrors(this, errors);
	        } else {
	            $.ajax({
	                url: this.action,
	                method: 'POST',
	                data: {
	                    username: eles.username.value,
	                    password: eles.password.value,
	                    remember: eles.remember.checked ? 'true' : 'false'
	                },
	                success: function success(res) {
	                    if (res.error) {
	                        ScreenLock.alert('登录失败: ' + res.error.message);
	                    } else {
	                        location.href = '/';
	                    }
	                },
	                error: function error() {
	                    ScreenLock.alert('登录出错');
	                }
	            });
	        }
	    });

	    function showErrors(form, errors) {
	        var eles = form.elements;
	        var err;
	        var $messageNode;
	        var hasFocus = false;

	        for (var i = 0, len = errors.length; i < len; i++) {
	            err = errors[i];

	            if (!hasFocus) {
	                hasFocus = true;
	                eles[err.node].focus();
	            }

	            $messageNode = $(eles[err.node].parentNode).addClass('error').find('i:eq(0)');

	            $messageNode.html(err.message);

	            initEvent($(eles[err.node]));
	        }
	    }

	    function initEvent($node) {
	        $node.one('input', function () {
	            $node.html('');
	            $node.parent().removeClass('error');
	        });
	    }
	});

/***/ },
/* 2 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/21
	 */

	'use strict';

	module.exports = function (form) {
	    var eles = form.elements;

	    var errors = [];
	    var err;

	    err = validateUsername(eles.username);

	    if (err) {
	        errors.push(err);
	    }

	    err = validatePassword(eles.password);

	    if (err) {
	        errors.push(err);
	    }

	    if (errors.length) {
	        return errors;
	    }

	    return null;
	};

	function validateUsername(usernameNode) {
	    var value = usernameNode.value;

	    if (!value.trim()) {
	        return {
	            node: 'username',
	            message: '请输入手机号/邮箱'
	        };
	    }

	    if (!/^(1[0-9]{10}|[\s\S]+@[a-z0-9\._\-]+\.[a-z]{2,})$/i.test(value)) {
	        return {
	            node: 'username',
	            message: '请输入正确的手机号/邮箱'
	        };
	    }

	    return null;
	}

	function validatePassword(passwordNode) {
	    var value = passwordNode.value;

	    if (!value) {
	        return {
	            node: 'password',
	            message: '请输入密码'
	        };
	    }

	    if (value.length < 6) {
	        return {
	            node: 'password',
	            message: '请输入正确的密码'
	        };
	    }

	    return null;
	}

/***/ }
/******/ ]);