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
	 * Date: 16/1/18
	 */

	'use strict';

	__webpack_require__(2);
	__webpack_require__(7);

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/18
	 */

	'use strict';

	__webpack_require__(3);

	var addWork = __webpack_require__(4);
	var resetWork = __webpack_require__(6);

	jQuery(function () {
	    // Modify
	    $(".work-table").on('click', '.edit-work', function (e) {
	        e.preventDefault();

	        var $workContainer = $(this).parents('td:eq(0)');

	        record($("input", $workContainer));

	        $workContainer.find('.edit-work-box').show();
	        $workContainer.find('.work-item').hide();

	        // Delete
	    }).on('click', '.del-work', function (e) {
	        e.preventDefault();

	        var $workContainer = $(this).parents('tr:eq(0)');
	        $workContainer.remove();

	        // Add
	    }).on('click', '.add-work-btn', function (e) {
	        var $workContainer = $(this).parents('table:eq(0)');

	        addWork($workContainer);
	    }).on('click', '.reset-work-btn', function (e) {
	        var $workContainer = $(this).parents('table:eq(0)');

	        resetWork($workContainer);
	    });
	});

	function record(inputNodes) {
	    for (var i = 0, len = inputNodes.length; i < len; i++) {
	        inputNodes[i].record = inputNodes[i].value;
	    }
	}

/***/ },
/* 3 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/18
	 */

	'use strict';

	jQuery(function () {
	    $('.work-table').on('click', '.modify-work-btn', modify).on('click', '.cancel-work-btn', cancel);
	});

	function modify(e) {
	    var $modifyTable = $(e.target).parents('table:eq(0)');

	    var companyNode = $modifyTable.find('.company')[0];
	    var startDateNode = $modifyTable.find('.start-date')[0];
	    var endDateNode = $modifyTable.find('.end-date')[0];
	    var jobNode = $modifyTable.find('.job')[0];

	    var company = companyNode.value;
	    var startDate = startDateNode.value;
	    var endDate = endDateNode.value;
	    var job = jobNode.value;

	    ScreenLock.showSubmit();

	    $.ajax({
	        url: '/api/modifyWork',
	        data: {
	            company: company,
	            startDate: startDate,
	            endDate: endDate,
	            job: job
	        },
	        success: function success(res) {
	            var html = '';

	            if (res.error) {
	                ScreenLock.alert('修改失败:' + res.error.message);
	            } else {
	                ScreenLock.alert('修改成功');

	                html += '<p>' + company + '（' + startDate + ' — ' + endDate + '）' + '</p>';
	                html += '<p>' + job + '</p>';

	                updateRecord(companyNode, company);
	                updateRecord(startDateNode, startDate);
	                updateRecord(endDateNode, endDate);
	                updateRecord(jobNode, job);

	                var $workContainer = $modifyTable.parents('td:eq(0)');

	                $workContainer.find('.work-info').html(html);

	                $workContainer.find('.work-item').show();
	                $workContainer.find('.edit-work-box').hide();
	            }
	        },
	        error: function error() {
	            ScreenLock.alert('网络错误');
	        }
	    });
	}

	function cancel(e) {
	    var $modifyTable = $(e.target).parents('table:eq(0)');

	    var companyNode = $modifyTable.find('.company')[0];
	    var startDateNode = $modifyTable.find('.start-date')[0];
	    var endDateNode = $modifyTable.find('.end-date')[0];
	    var jobNode = $modifyTable.find('.job')[0];

	    reset(companyNode);
	    reset(startDateNode);
	    reset(endDateNode);
	    reset(jobNode);

	    var $workContainer = $modifyTable.parents('td:eq(0)');

	    $workContainer.find('.work-item').show();
	    $workContainer.find('.edit-work-box').hide();
	}

	function updateRecord(node, value) {
	    node.record = value;
	}

	function reset(node) {
	    node.value = node.record;
	}

/***/ },
/* 4 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/19
	 */

	'use strict';

	var TPL = __webpack_require__(5);

	var resetWork = __webpack_require__(6);

	module.exports = function ($workContainer) {
	    var companyNode = $workContainer.find('.company')[0];
	    var startDateNode = $workContainer.find('.start-date')[0];
	    var endDateNode = $workContainer.find('.end-date')[0];
	    var jobNode = $workContainer.find('.job')[0];

	    var data = {
	        company: companyNode.value,
	        startDate: startDateNode.value,
	        endDate: endDateNode.value,
	        job: jobNode.value
	    };

	    ScreenLock.showSubmit();

	    $.ajax({
	        url: '/api/addWork',
	        data: data,
	        success: function success(res) {
	            var html = '';
	            var $modifyTable;

	            if (res.error) {
	                ScreenLock.alert('添加失败:' + res.error.message);
	            } else {
	                ScreenLock.alert('添加成功');

	                html = TPL.replace(/\$\{([^}]+)\}/gi, function (match, key) {
	                    return data[key] || '';
	                });

	                $modifyTable = $workContainer.parents('tr:eq(0)');

	                var $newWork = $(html).insertBefore($modifyTable);

	                DatePicker.bind($newWork.find('.start-date,.end-date'));

	                resetWork($workContainer);
	            }
	        },
	        error: function error() {
	            ScreenLock.alert('网络错误');
	        }
	    });
	};

/***/ },
/* 5 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/19
	 */

	'use strict';

	module.exports = '<tr>' + '<td>' + '<div class="work-item">' + '<div class="work-info">' + '<p>${company}（${startDate} — ${endDate}）</p>' + '<p>${job}</p>' + '</div>' + '<a href="#" class="hint-link edit-work">编辑</a>' + '<a href="#" class="hint-link del-work">删除</a>' + '</div>' + '<div class="edit-work-box">' + '<table>' + '<tbody>' + '<tr>' + '<th>公司名称</th>' + '<td>' + '<input type="text" class="company" value="${company}">' + '</td>' + '</tr>' + '<tr>' + '<th>职位</th>' + '<td>' + '<input type="text" value="${job}" class="job">' + '</td>' + '</tr>' + '<tr>' + '<th>在职时间</th>' + '<td>' + '<input type="text" date-picker value="${startDate}" class="date-input start-date">' + '<span class="line"></span>' + '<input type="text" date-picker value="${endDate}" class="date-input end-date">' + '</td>' + '</tr>' + '<tr>' + '<th></th>' + '<td>' + '<button type="button" class="std-btn modify-work-btn">修改</button>' + '<button type="button" class="std-btn cancel-work-btn">取消</button>' + '</td>' + '</tr>' + '</tbody>' + '</table>' + '</div>' + '</td>' + '</tr>';

/***/ },
/* 6 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/19
	 */

	'use strict';

	module.exports = function ($workContainer) {
	  $workContainer.find('input').val('');
	};

/***/ },
/* 7 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/18
	 */

	'use strict';

	__webpack_require__(8);

	var addEdu = __webpack_require__(9);
	var resetEdu = __webpack_require__(11);

	jQuery(function () {
	    // Modify
	    $(".edu-table").on('click', '.edit-edu', function (e) {
	        e.preventDefault();

	        var $eduContainer = $(this).parents('td:eq(0)');

	        record($eduContainer);

	        $eduContainer.find('.edit-edu-box').show();
	        $eduContainer.find('.edu-item').hide();

	        // Delete
	    }).on('click', '.del-edu', function (e) {
	        e.preventDefault();

	        var $eduContainer = $(this).parents('tr:eq(0)');
	        $eduContainer.remove();

	        // Add
	    }).on('click', '.add-edu-btn', function (e) {
	        var $eduContainer = $(this).parents('table:eq(0)');

	        addEdu($eduContainer);
	    }).on('click', '.reset-edu-btn', function (e) {
	        var $eduContainer = $(this).parents('table:eq(0)');

	        resetEdu($eduContainer);
	    });
	});

	function record($eduContainer) {
	    var eles = $eduContainer.find('input,select');

	    for (var i = 0, len = eles.length; i < len; i++) {
	        eles[i].record = eles[i].value;
	    }
	}

/***/ },
/* 8 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/18
	 */

	'use strict';

	jQuery(function () {
	    $('.edu-table').on('click', '.modify-edu-btn', modify).on('click', '.cancel-edu-btn', cancel);
	});

	function modify(e) {
	    var $modifyTable = $(e.target).parents('table:eq(0)');

	    var schoolNode = $modifyTable.find('.school')[0];
	    var degreeNode = $modifyTable.find('.degree')[0];
	    var startDateNode = $modifyTable.find('.start-date')[0];
	    var endDateNode = $modifyTable.find('.end-date')[0];
	    var majorNode = $modifyTable.find('.major')[0];

	    var school = schoolNode.value;
	    var startDate = startDateNode.value;
	    var endDate = endDateNode.value;
	    var major = majorNode.value;
	    var degree = degreeNode.value;

	    ScreenLock.showSubmit();

	    $.ajax({
	        url: '/api/modifyEdu',
	        data: {
	            school: school,
	            startDate: startDate,
	            endDate: endDate,
	            major: major,
	            degree: degree
	        },
	        success: function success(res) {
	            var html = '';

	            if (res.error) {
	                ScreenLock.alert('修改失败:' + res.error.message);
	            } else {
	                ScreenLock.alert('修改成功');

	                html += '<p>' + school + '（' + startDate + ' — ' + endDate + '）' + '</p>';
	                html += '<p><span>' + degree + '</span><span>' + major + '</span></p>';

	                updateRecord(schoolNode, school);
	                updateRecord(startDateNode, startDate);
	                updateRecord(endDateNode, endDate);
	                updateRecord(degreeNode, degree);
	                updateRecord(majorNode, major);

	                var $eduContainer = $modifyTable.parents('td:eq(0)');

	                $eduContainer.find('.edu-info').html(html);

	                $eduContainer.find('.edu-item').show();
	                $eduContainer.find('.edit-edu-box').hide();
	            }
	        },
	        error: function error() {
	            ScreenLock.alert('网络错误');
	        }
	    });
	}

	function cancel(e) {
	    var $modifyTable = $(e.target).parents('table:eq(0)');

	    var schoolNode = $modifyTable.find('.school')[0];
	    var startDateNode = $modifyTable.find('.start-date')[0];
	    var endDateNode = $modifyTable.find('.end-date')[0];
	    var degreeNode = $modifyTable.find('.degree')[0];
	    var majorNode = $modifyTable.find('.major')[0];

	    reset(schoolNode);
	    reset(startDateNode);
	    reset(endDateNode);
	    resetSelect(degreeNode);
	    reset(majorNode);

	    var $eduContainer = $modifyTable.parents('td:eq(0)');

	    $eduContainer.find('.edu-item').show();
	    $eduContainer.find('.edit-edu-box').hide();
	}

	function updateRecord(node, value) {
	    node.record = value;
	}

	function reset(node) {
	    node.value = node.record;
	}

	function resetSelect(node) {
	    node.xSelect.selectValue(node.record);
	}

/***/ },
/* 9 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/19
	 */

	'use strict';

	var TPL = __webpack_require__(10);

	var resetEdu = __webpack_require__(11);

	module.exports = function ($eduContainer) {
	    var schoolNode = $eduContainer.find('.school')[0];
	    var degreeNode = $eduContainer.find('.degree')[0];
	    var startDateNode = $eduContainer.find('.start-date')[0];
	    var endDateNode = $eduContainer.find('.end-date')[0];
	    var majorNode = $eduContainer.find('.major')[0];

	    var data = {
	        school: schoolNode.value,
	        degree: degreeNode.value,
	        startDate: startDateNode.value,
	        endDate: endDateNode.value,
	        major: majorNode.value
	    };

	    ScreenLock.showSubmit();

	    $.ajax({
	        url: '/api/addEdu',
	        data: data,
	        success: function success(res) {
	            var html = '';
	            var $modifyTable;

	            if (res.error) {
	                ScreenLock.alert('添加失败:' + res.error.message);
	            } else {
	                ScreenLock.alert('添加成功');

	                html = TPL.replace(/\$\{([^}]+)\}/gi, function (match, key) {
	                    return data[key] || '';
	                });

	                $modifyTable = $eduContainer.parents('tr:eq(0)');

	                var $newEdu = $(html).insertBefore($modifyTable);

	                DatePicker.bind($newEdu.find('.start-date,.end-date'));

	                var xSelect = new XSelect($newEdu.find('.degree:eq(0)')[0]);

	                xSelect.selectValue(data.degree);

	                resetEdu($eduContainer);
	            }
	        },
	        error: function error() {
	            ScreenLock.alert('网络错误');
	        }
	    });
	};

/***/ },
/* 10 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/19
	 */

	'use strict';

	module.exports = '<tr>' + '<td>' + '<div class="edu-item">' + '<div class="edu-info">' + '<p>${school}（${startDate} — ${endDate}）</p>' + '<p><span>${degree}</span><span>${major}</span></p>' + '</div>' + '<a href="#" class="hint-link edit-edu">编辑</a>' + '<a href="#" class="hint-link del-edu">删除</a>' + '</div>' + '<div class="edit-edu-box">' + '<table>' + '<tbody>' + '<tr>' + '<th>学校名称</th>' + '<td>' + '<input type="text" class="school" value="${school}">' + '</td>' + '</tr>' + '<tr>' + '<th>学历</th>' + '<td>' + '<select x-class="degree-select" class="degree">' + '<option>博士</option>' + '<option>硕士</option>' + '<option>本科</option>' + '<option>大专</option>' + '<option>高中</option>' + '<option>初中</option>' + '<option>小学</option>' + '</select>' + '</td>' + '</tr>' + '<tr>' + '<th>专业</th>' + '<td>' + '<input type="text" value="${major}" class="major">' + '</td>' + '</tr>' + '<tr>' + '<th>在职时间</th>' + '<td>' + '<input type="text" date-picker value="${startDate}" class="date-input start-date">' + '<span class="line"></span>' + '<input type="text" date-picker value="${endDate}" class="date-input end-date">' + '</td>' + '</tr>' + '<tr>' + '<th></th>' + '<td>' + '<button type="button" class="std-btn modify-edu-btn">修改</button>' + '<button type="button" class="std-btn cancel-edu-btn">取消</button>' + '</td>' + '</tr>' + '</tbody>' + '</table>' + '</div>' + '</td>' + '</tr>';

/***/ },
/* 11 */
/***/ function(module, exports) {

	/**
	 * Author: hancong05@meituan.com
	 * Date: 16/1/19
	 */

	'use strict';

	module.exports = function ($eduContainer) {
	  var selectNode = $eduContainer.find('select')[0];

	  $eduContainer.find('input').val('');
	  selectNode.xSelect.selectValue(selectNode.options[2].value);
	};

/***/ }
/******/ ]);