/**
 * Author: hancong05@meituan.com
 * Date: 16/1/25
 */

'use strict';

jQuery(function ($) {
    var $userBox = $('.user-box');

    $('.user-box>label').on('click', function (e) {
        e.stopPropagation();

        $userBox.toggleClass('open');

        $(document).on('mousedown.USER_BOX', function (e) {
            if (!$.contains($userBox[0], e.target)) {
                $userBox.removeClass('open');
            }

            $(document).off('mousedown.USER_BOX');
        });
    });

    $('a', $userBox).on('click', function () {
        $userBox.removeClass('open');
    });
});