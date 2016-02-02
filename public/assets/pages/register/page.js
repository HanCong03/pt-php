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
	    var validate = __webpack_require__(5);
	    var showErrors = __webpack_require__(4);
	    var submit = __webpack_require__(6);

	    $(document.forms['register-form']).on('submit', function (e) {
	        e.preventDefault();
	        e.stopPropagation();

	        var errors = validate(this);

	        if (errors) {
	            showErrors(errors);
	        } else {
	            if (/^1[0-9]{10}$/.test(this.elements.username.value)) {
	                // phone
	                this.elements.type.value = 2;
	            } else {
	                // email
	                this.elements.type.value = 1;
	            }

	            submit(this, function (err, data) {
	                check(this, err, data);
	            }.bind(this));
	        }
	    });

	    function check(form, err, res) {
	        if (err) {
	            alert('网络错误');
	            return;
	        }

	        if (res.error) {
	            ScreenLock.alert('注册失败', res.error.message || '');
	        } else {
	            ScreenLock.alert('注册成功', '点击确认后跳转到登陆页', function () {
	                location.href = '/login';
	            });
	        }
	    }
	});

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/17
	 */

	'use strict';

	jQuery(function ($) {
	    var validateUsername = __webpack_require__(3);
	    var showErrors = __webpack_require__(4);
	    var refreshBtn = $('#refreshBtn')[0];
	    var INTERVAL = 60;
	    var form = document.forms['register-form'];

	    $(refreshBtn).on('click', function (e) {
	        var errors = validateUsername(form);

	        if (errors) {
	            showErrors(errors);
	            return;
	        }

	        this.disabled = true;

	        showRefresh();

	        $.get('/api-data/refresh-verify-code', {
	            username: form.elements.username.value
	        }, function (res) {
	            if (res.error) {
	                ScreenLock.alert('验证码发送失败', res.error.message);
	                reset();
	                return;
	            }

	            startTimer();
	        });
	    });

	    function reset() {
	        refreshBtn.disabled = false;
	        refreshBtn.innerHTML = '重新获取验证码';
	    }

	    function showRefresh() {
	        refreshBtn.innerHTML = '验证码发送中';
	    }

	    function startTimer() {
	        INTERVAL = 60;
	        next();
	    }

	    function next() {
	        refreshBtn.innerHTML = INTERVAL + 's后可重新获取';

	        setTimeout(function () {
	            INTERVAL--;

	            if (INTERVAL === 0) {
	                reset();
	            } else {
	                next();
	            }
	        }, 1000);
	    }
	});

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
	    var error = undefined;

	    error = validateUsername(username);

	    if (error) {
	        return [{
	            ele: form.elements['username'],
	            message: error
	        }];
	    }

	    return null;
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

	module.exports = function (form) {
	    var username = form.elements['username'].value;
	    var verifyCode = form.elements['verify-code'].value;
	    var pwd = form.elements['pwd'].value;
	    var confirmPwd = form.elements['confirm-pwd'].value;

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

	    error = validatePwd(pwd);

	    if (error) {
	        result.push({
	            ele: form.elements['pwd'],
	            message: error
	        });
	    }

	    error = validateConfirmPwd(confirmPwd, pwd);

	    if (error) {
	        result.push({
	            ele: form.elements['confirm-pwd'],
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

	    if (!/^[0-9]{6}$/.test(value)) {
	        return '请输入正确的验证码';
	    }
	}

	function validatePwd(value) {
	    if (!value) {
	        return '请输入密码';
	    }

	    if (!/^[\x21-\x7e]{6,19}$/.test(value)) {
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
/* 6 */
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