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

	jQuery(function () {
	    var validate = __webpack_require__(2);
	    var showErrors = __webpack_require__(3);
	    var submit = __webpack_require__(4);

	    $(document.forms['reset-pwd-form']).on('submit', function (e) {
	        e.preventDefault();
	        e.stopPropagation();

	        var errors = validate(this);

	        if (errors) {
	            showErrors(errors);
	        } else {
	            submit(this, function (err, data) {
	                check(this, err, data);
	            }.bind(this));
	        }
	    });

	    function check(form, err, res) {
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

	module.exports = function (form) {
	    var pwd = form.elements['pwd'].value;
	    var confirmPwd = form.elements['confirm-pwd'].value;

	    var result = [];
	    var error = undefined;

	    error = validatePwd(pwd);

	    if (error) {
	        result.push({
	            ele: form.elements['pwd'],
	            message: error
	        });
	    }

	    error = validateConfirmPwd(confirmPwd, pwd);

	    if (pwd !== confirmPwd) {
	        result.push({
	            ele: form.elements['confirm-pwd'],
	            message: error
	        });
	    }

	    return result.length ? result : null;
	};

	function validatePwd(value) {
	    if (!value) {
	        return '请输入新的密码';
	    }

	    if (!/^[\s\S]{6,19}$/i.test(value)) {
	        return '请输入6-19位英文、字母、数字或符号';
	    }
	}

	function validateConfirmPwd(value, pwd) {
	    if (!value) {
	        return '请输入确认密码';
	    }

	    if (value !== pwd) {
	        return '两次输入密码不一致';
	    }
	}

/***/ },
/* 3 */
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
/* 4 */
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
	        data: $(form).serializeArray(),
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