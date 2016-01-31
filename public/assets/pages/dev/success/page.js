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
	__webpack_require__(2);
	__webpack_require__(4);
	__webpack_require__(5);
	__webpack_require__(3);

/***/ },
/* 1 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/23
	 */

	'use strict';

	module.exports = function (form) {
	    var eles = form.elements;

	    for (var i = 0, len = eles.length; i < len; i++) {
	        $(eles[i]).trigger('input');
	    }
	};

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/23
	 */

	'use strict';

	jQuery(function ($) {
	    var validate = __webpack_require__(3);
	    var showErrors = __webpack_require__(4);
	    var clearErrors = __webpack_require__(1);
	    var submit = __webpack_require__(5);

	    var modifyForm = document.forms['modify-form'];
	    var isShow = false;

	    // 进入修改
	    $(".modify-link").on('click', function () {
	        if (isShow) {
	            return;
	        }

	        isShow = true;

	        enableForm(modifyForm);
	    });

	    // 取消
	    $(".cancel-btn").on('click', function () {
	        if (!isShow) {
	            return;
	        }

	        isShow = false;

	        clearErrors(modifyForm);
	        disableForm(modifyForm);
	    });

	    initSubmitEvent();

	    function initSubmitEvent() {
	        $(modifyForm).on('submit', function (e) {
	            e.preventDefault();

	            var errors = validate(this);

	            if (errors) {
	                showErrors(this, errors);
	            } else {
	                submit(this, submitSuccess);
	            }
	        });
	    }

	    function enableForm(form) {
	        var eles = form.elements;

	        for (var i = 0, len = eles.length; i < len; i++) {
	            eles[i].record = eles[i].value;
	            eles[i].disabled = false;
	        }

	        $(".btn-row").show();
	    }

	    function disableForm(form) {
	        var eles = form.elements;

	        for (var i = 0, len = eles.length; i < len; i++) {
	            eles[i].value = eles[i].record;
	            eles[i].disabled = true;
	        }

	        $(".btn-row").hide();
	    }

	    function submitSuccess(form) {
	        var eles = form.elements;

	        for (var i = 0, len = eles.length; i < len; i++) {
	            eles[i].disabled = true;
	        }

	        $(".btn-row").hide();

	        isShow = false;
	    }
	});

/***/ },
/* 3 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/23
	 */

	'use strict';

	module.exports = function (form) {
	    var eles = form.elements;

	    var errors = [];

	    var err = validateName(eles['contacts-name']);

	    if (err) {
	        errors.push(err);
	    }

	    err = validatePhone(eles['contacts-phone']);

	    if (err) {
	        errors.push(err);
	    }

	    err = validateEmail(eles['contacts-email']);

	    if (err) {
	        errors.push(err);
	    }

	    if (errors.length === 0) {
	        return null;
	    }

	    return errors;
	};

	function validateName(inputNode) {
	    var value = inputNode.value.trim();

	    if (!value) {
	        return {
	            node: 'contacts-name',
	            message: '请填写联系人姓名'
	        };
	    }

	    // 中文
	    if (/[\u4e00-\u9fa5]/.test(value)) {
	        if (value.length < 2 || value.length > 5) {
	            return {
	                node: 'contacts-name',
	                message: '请填写正确的联系人姓名'
	            };
	        }

	        // 其他语言(英文)
	    } else if (value.length < 6 || value.length > 16) {
	            return {
	                node: 'contacts-name',
	                message: '请填写正确的联系人姓名'
	            };
	        }

	    return null;
	}

	function validatePhone(inputNode) {
	    var value = inputNode.value.trim();

	    if (!value) {
	        return {
	            node: 'contacts-phone',
	            message: '请填写联系人手机号码'
	        };
	    }

	    if (!/^1[0-9]{10}$/.test(value)) {
	        return {
	            node: 'contacts-phone',
	            message: '请填写正确的联系人手机号码'
	        };
	    }

	    return null;
	}

	function validateEmail(inputNode) {
	    var value = inputNode.value.trim();

	    if (!value) {
	        return {
	            node: 'contacts-email',
	            message: '请填写联系人手机邮箱'
	        };
	    }

	    if (!/^[a-z0-9_\-\.]+@[a-z0-9_\-]+\.[a-z]{2,}$/i.test(value)) {
	        return {
	            node: 'contacts-email',
	            message: '请填写正确的联系人手机邮箱'
	        };
	    }

	    return null;
	}

/***/ },
/* 4 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/23
	 */

	'use strict';

	module.exports = function (form, errors) {
	    var eles = form.elements;

	    for (var i = 0, len = errors.length; i < len; i++) {
	        showError(eles, errors[i]);
	    }

	    eles[errors[0].node].focus();
	};

	function showError(eles, error) {
	    var $node = $(eles[error.node].parentNode);

	    if ($node.hasClass('error')) {
	        return;
	    }

	    var messageNode = document.createElement('i');
	    messageNode.innerHTML = error.message;

	    $node.append(messageNode);

	    $node.addClass('error').one('input', function () {
	        $node.removeClass('error');
	        $(messageNode).remove();
	    });
	}

/***/ },
/* 5 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/23
	 */

	'use strict';

	module.exports = function (form, cb) {
	    ScreenLock.showSubmit('提交中...');

	    var eles = form.elements;
	    var params = {};

	    for (var i = 0, len = eles.length; i < len; i++) {
	        params[eles[i].name] = eles[i].value;
	    }

	    $.ajax({
	        url: form.action,
	        method: 'POST',
	        data: params,
	        success: function success(res) {
	            if (res.error) {
	                ScreenLock.alert('提交失败: ' + res.error.message);
	            } else {
	                ScreenLock.alert('修改成功');
	                cb(form);
	            }
	        },
	        error: function error(err) {
	            ScreenLock.alert('通信错误');
	        }
	    });
	};

/***/ }
/******/ ]);