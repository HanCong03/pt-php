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

	jQuery(function ($) {
	    var uploader = __webpack_require__(2);
	    var submitHeadImage = __webpack_require__(3);
	    var init = __webpack_require__(4);
	    var $img = null;

	    var $uploadInput = $('.file-btn input');
	    var $reuploadInput = $('.reupload-btn input');

	    uploader(change);

	    $(".file-btn").on('click', function () {
	        $uploadInput.trigger('click');
	    });

	    $uploadInput.on('click', function (e) {
	        e.stopPropagation();
	    });

	    $(".reupload-btn").on('click', function () {
	        $reuploadInput.trigger('click');
	    });

	    $reuploadInput.on('click', function (e) {
	        e.stopPropagation();
	    });

	    $('.cancel-btn').on('click', reset);

	    $(document.forms['modify-head-form']).on('submit', function (e) {
	        e.preventDefault();
	        e.stopPropagation();

	        $('.submit-btn')[0].disabled = true;

	        var canvas = $img.cropper('getCroppedCanvas', {
	            width: 160,
	            height: 160,
	            fillColor: '#818181'
	        });

	        ScreenLock.showSubmit();
	        submitHeadImage(canvas.toDataURL('image/png'), submitCallback);
	    });

	    function reset() {
	        if ($img) {
	            $('#modifyBox').removeClass('modifying');
	            $img.cropper('clear');
	        }
	    }

	    function change(url) {
	        $('#modifyBox').addClass('modifying');

	        if (!$img) {
	            $img = init(url);
	        } else {
	            $img.cropper('reset').cropper('replace', url);
	        }
	    }

	    function submitCallback(err, res) {
	        $('.submit-btn')[0].disabled = false;

	        if (err) {
	            ScreenLock.alert('网络错误');
	        } else {
	            if (res.error) {
	                ScreenLock.alert(res.error.message);
	            } else {
	                ScreenLock.alert('修改成功');
	                reset();
	                $(".user-head").attr("src", res.data.img);
	            }
	        }
	    }
	});

/***/ },
/* 2 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/25
	 */

	'use strict';

	module.exports = function (cb) {
	    var uploader = WebUploader.create({
	        // swf文件路径
	        swf: '/assets/Uploader.swf',
	        disableGlobalDnd: true,
	        pick: {
	            id: '.upload-file-container',
	            multiple: false
	        },
	        accept: [{
	            title: 'Images',
	            extensions: 'bmp,jpg,jpeg,png',
	            mimeTypes: 'image/*'
	        }],
	        thumb: null,
	        compress: false,
	        resize: false
	    });

	    uploader.on('fileQueued', function (file) {
	        uploader.reset();
	        console.log('xx');
	        uploader.makeThumb(file, function (err, dataUrl) {
	            if (err) {
	                alert('读取本地文件错误');
	            } else {
	                cb(dataUrl);
	            }
	        });
	    });
	};

/***/ },
/* 3 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/17
	 */

	'use strict';

	module.exports = function (base64, cb) {
	    var form = document.forms['modify-head-form'];

	    $.ajax({
	        url: form.action,
	        method: form.method,
	        data: {
	            img: base64
	        },
	        success: function success(res) {
	            cb(false, res);
	        },
	        error: function error(err) {
	            cb(true, err);
	        }
	    });
	};

/***/ },
/* 4 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/17
	 */

	'use strict';

	module.exports = function (url) {
	    var imageFile = document.getElementById('imageFile');

	    imageFile.src = url;

	    return $(imageFile).cropper({
	        aspectRatio: 1 / 1,
	        viewMode: 3,
	        preview: '.modify-preview-box .preview-img-wrap'
	    });
	};

/***/ }
/******/ ]);