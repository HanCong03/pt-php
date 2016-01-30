/**
 * Author: hancong05@meituan.com
 * Date: 16/1/18
 */

'use strict';

(function () {
    jQuery.datetimepicker.setLocale('zh');

    var $container = initDatepicker();
    var $picker = $container.find('.datepicker-container');
    var currentInputNode = null;
    var lastDate = null;

    jQuery(function () {
        $container.appendTo(document.body);

        $picker.datetimepicker({
            format:'Y-m-d',
            inline: true,
            lang: 'zh',
            timepicker: false,
            onSelectDate: function (ct) {
                lastDate = format(ct);
            }
        });

        $container.find('.xdsoft_today_button').on('click', function (e) {
            lastDate = format(new Date());
        });

        $('input[date-picker]').each(function (index, input) {
            DatePicker.bind(input);
        });
    });

    var lastActiveTime = -1;

    window.DatePicker = {
        bind: function (inputNode) {
            $(inputNode).on('focus mousedown', function (e) {
                if (e.timeStamp - lastActiveTime < 300) {
                    return;
                }

                lastActiveTime = e.timeStamp;

                currentInputNode = this;
                lastDate = getDate(this);

                $picker.datetimepicker({
                    value: lastDate
                });

                var rect = this.getBoundingClientRect();

                $container.css({
                    top: rect.bottom - 1,
                    left: rect.left
                });

                $(this).one('blur', close);

                listenScroll(this);
            }).on('keydown', function (e) {
                if (e.keyCode !== 9) {
                    e.preventDefault();
                }
            });
        }
    };

    $container.on('mousedown', function (e) {
        e.preventDefault();
    });

    $container.find('.datepicker-btn-current').on('mousedown', function () {
        currentInputNode.value = '至今';
        close();
    });

    $container.find('.datepicker-btn-ok').on('mousedown', function () {
        currentInputNode.value = lastDate;
        close();
    });

    function close() {
        if (!currentInputNode) {
            return;
        }

        lastActiveTime = -1;

        $container.css({
            top: -100000,
            left: -100000
        });

        currentInputNode = null;

        $container.find('.xdsoft_select').hide();

        $(document).off('scroll.GLOBAL_DATE_PICKER');
    }

    function listenScroll(inputNode) {
        $(document).on('scroll.GLOBAL_DATE_PICKER', function (e) {
            var rect = inputNode.getBoundingClientRect();

            $container.css({
                top: rect.bottom - 1,
                left: rect.left
            });
        });
    }

    function getDate(inputNode) {
        var value = inputNode.value;

        if (!value || value === '至今') {
            return currentDate();
        }

        return value;
    }

    function currentDate() {
        return format(new Date());
    }

    function initDatepicker() {
        $picker = $('<div class="global-datepicker-wrap"></div>');

        $picker.html('<div class="datepicker-container"></div>' +
            '<div class="datepicker-btns">' +
            '<button type="button" class="datepicker-btn datepicker-btn-current">至今</button>' +
            '<button type="button" class="datepicker-btn datepicker-btn-ok">确定</button>' +
            '</div>');

        return $picker;
    }

    function format(date) {
        var result = [date.getFullYear(), date.getMonth() + 1, date.getDate()];

        if (result[1] < 10) {
            result[1] = '0' + result[1];
        }

        if (result[2] < 10) {
            result[2] = '0' + result[2];
        }

        return result.join('-');
    }
})();