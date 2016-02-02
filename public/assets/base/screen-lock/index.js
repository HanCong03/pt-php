/**
 * Author: hancong05@meituan.com
 * Date: 16/1/18
 */

'use strict';

(function () {
    var $mask = null;
    var isShow = false;

    window.ScreenLock = {
        showSubmit: function () {
            $(document).trigger('dialog-close');
            initSubmit();
            show();
        },

        alert: function (message, subMessage, cb) {
            $(document).trigger('dialog-close');

            if (typeof subMessage === 'function') {
                cb = subMessage;
                subMessage = null;
            }

            initAlert('normal', message || '', subMessage, cb);
            show();
        },

        error: function (message, subMessage, cb) {
            $(document).trigger('dialog-close');

            if (typeof subMessage === 'function') {
                cb = subMessage;
                subMessage = null;
            }

            initAlert('error', message || '', subMessage, cb);
            show();
        },

        dialog: function (node, showClassName) {
            $(document).trigger('dialog-close');

            var placeholder = document.createElement('div');
            placeholder.style.display = 'none';
            node.parentNode.replaceChild(placeholder, node);

            initDialog(node);

            $(node).addClass(showClassName || 'show');

            $(document).one('dialog-close', function () {
                $(node).removeClass(showClassName || 'show');
                placeholder.parentNode.replaceChild(node, placeholder);
                placeholder = null;
            });

            show();
        },

        hide: function () {
            if (!$mask) {
                return;
            }

            hide();

            $(document).trigger('dialog-close');
        }
    };

    function show() {
        if (isShow) {
            return;
        }

        isShow = true;

        $mask.show();
        $mask.on('wheel.SCREEN_LOCK', function (e) {
            e.preventDefault();
            e.stopPropagation();
        });
    }

    function hide() {
        if (!isShow) {
            return;
        }

        isShow = false;

        $mask.hide();
        $mask.off('wheel.SCREEN_LOCK');
    }

    function initMask() {
        if ($mask) {
            return;
        }

        $mask = $('<div class="screen-lock"></div>');

        $mask.on('click', '.dialog-ok-btn', function (e) {
            hide();
        });

        $mask.appendTo(document.body);
    }

    function initSubmit() {
        initMask();
        $mask.html('<div class="submit-tip"><img src="/assets/loading.gif" width="107px" height="103px"></div>');
    }

    function initAlert(className, message, subMessage, cb) {
        initMask();

        var subHtml = subMessage ? '<i class="subtitle">' + subMessage + '</i>' : '';

        $mask.html('<div class="alert-tip ' + className + '"><p>' + message + '</p>' +subHtml  + '<button class="dialog-ok-btn" type="button">确认</button></div>');

        if (cb) {
            $mask.one('click', '.dialog-ok-btn', function () {
                cb();
            });
        }
    }

    function initDialog(node) {
        initMask();
        $mask.html('');
        $mask.append(node);
    }
})();