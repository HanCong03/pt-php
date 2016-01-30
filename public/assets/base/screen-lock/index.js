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

        alert: function (message) {
            $(document).trigger('dialog-close');
            initAlert(message || '');
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

    function initAlert(message) {
        initMask();
        $mask.html('<div class="alert-tip"><p>' + message + '</p><button class="dialog-ok-btn" type="button">确认</button></div>');
    }

    function initDialog(node) {
        initMask();
        $mask.html('');
        $mask.append(node);
    }
})();