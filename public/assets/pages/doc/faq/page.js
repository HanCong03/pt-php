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

/***/ },
/* 1 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/24
	 */

	'use strict';

	jQuery(function ($) {
	    var backupText = $('#questionDialog .message').html();
	    var isSubmit = false;

	    $('.question-btn').on('click', function (e) {
	        open();
	    });

	    $('.close-dialog-btn,.cancel-btn', '#questionDialog').on('click', function () {
	        if (isSubmit) {
	            return;
	        }

	        close();
	    });

	    $('#questionDialog .ok-btn').on('click', function (e) {
	        if (isSubmit) {
	            return;
	        }

	        submit();
	    });

	    $('#questionDialog .tip-btn').on('click', closeDialogError);

	    function open() {
	        var $dialog = $('#questionDialog');
	        var textarea = $dialog.find('textarea')[0];

	        textarea.value = '';
	        ScreenLock.dialog($dialog[0]);
	        textarea.focus();
	    }

	    function close() {
	        clear();
	        ScreenLock.hide();
	    }

	    function clear() {
	        $('#questionDialog textarea').trigger('input').val('');
	    }

	    function submit() {
	        var content = $('#questionDialog textarea').val().trim();
	        var form = document.forms['question-form'];

	        isSubmit = true;

	        if (!content) {
	            showError('内容不能为空');
	            isSubmit = false;
	            return;
	        }

	        if (content.length > 200) {
	            showError('内容长度过长');
	            isSubmit = false;
	            return;
	        }

	        $.ajax({
	            url: form.action,
	            method: 'POST',
	            data: {
	                content: content
	            },
	            error: function error() {
	                isSubmit = false;
	                showDialogError('网络错误');
	            },
	            success: function success(res) {
	                isSubmit = false;

	                if (res.error) {
	                    showDialogError('提交失败: ' + (res.error.message || ''));
	                } else {
	                    ScreenLock.alert('提交成功');
	                }
	            }
	        });
	    }

	    function showError(content) {
	        $('#questionDialog textarea').one('input', function () {
	            $('#questionDialog .message').html(backupText);
	            $('#questionDialog .dialog-body').removeClass('error');
	        });

	        $('#questionDialog .message').html(content);
	        $('#questionDialog .dialog-body').addClass('error');
	    }

	    function showDialogError(message) {
	        $('#questionDialog .tip-message').html(message);
	        $('#questionDialog .tip-box').show();
	    }

	    function closeDialogError() {
	        $('#questionDialog .tip-box').hide();
	    }
	});

/***/ },
/* 2 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/2/1
	 */

	'use strict';

	jQuery(function ($) {
	    $('.sub-menu>label').on('click', function () {
	        var $mainItem = $(this.parentNode);
	        var $ul = $('>ul', $mainItem);

	        if ($mainItem.hasClass('opened')) {
	            $ul.slideUp(300);
	        } else {
	            $ul.slideDown(300);
	        }

	        $mainItem.toggleClass('opened');
	    });
	});

/***/ }
/******/ ]);