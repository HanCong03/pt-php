/**
 * Author: hancong05@meituan.com
 * Date: 16/1/19
 */

'use strict';

(function () {
    window.XSelect = XSelect;

    jQuery(function () {
        $('select[x-select]').each(function (index, selectNode) {
            new XSelect(selectNode);
        });
    });

    function XSelect(selectNode) {
        this.selectNode = selectNode;
        selectNode.xSelect = this;

        this.rootNode = selectNode.ownerDocument.createElement('div');

        this.data = readData(selectNode);
        this.selectedIndex = selectNode.selectedIndex;

        this.rootNode.className = (selectNode.getAttribute("x-class") || '') + ' x-select';

        this.render();

        $(this.rootNode).insertBefore(selectNode);

        $(selectNode).hide();

        this.initEvent();
    }

    $.extend(XSelect.prototype, {
        initEvent: function () {
            var _self = this;
            var $rootNode = $(this.rootNode);

            $rootNode.on('click', '>label', function (e) {
                _self.toggle();
            }).on('click', '>ul>li', function (e) {
                _self.change(+this.getAttribute('data-index'));
            }).hover(function () {
                $rootNode.addClass('hover-in');
            }, function () {
                $rootNode.removeClass('hover-in');
            });

            $(this.selectNode).on('change', function () {
                _self.change(this.selectedIndex);
            });
        },

        select: function (index) {
            if (index < 0 || index >= this.data.length) {
                return;
            }

            this.change(index);
        },

        selectValue: function (value) {
            var index = findValue(this.data, value);

            if (index === -1) {
                return;
            }

            this.change(index);
        },

        setLabel: function (label) {
            var index = findLabel(this.data, label);

            if (index === -1) {
                return;
            }

            this.change(index);
        },

        toggle: function () {
            if ($(this.rootNode).hasClass('opened')) {
                this.close();
            } else {
                this.open();
            }
        },

        change: function (index) {
            if (this.selectedIndex === index) {
                this.close();
                return;
            }

            var $options = $('>ul>li', this.rootNode);

            $options[this.selectedIndex].className = '';
            $options[index].className = 'selected';

            this.selectedIndex = index;
            this.updateLabel();

            this.selectNode.selectedIndex = index;

            this.close();
        },

        updateLabel: function () {
            $('.label', this.rootNode).html(this.data[this.selectedIndex].label);
        },

        open: function () {
            var _self = this;
            var rootNode = this.rootNode;
            var scrollTop = (this.selectedIndex - 1) * 50;

            $(rootNode).addClass('opened');
            $('>ul', rootNode)[0].scrollTop = scrollTop;

            $(document).on('mousedown.XSELECT', function (e) {
                if ($.contains(rootNode, e.target)) {
                    return;
                }

                _self.close();
            });
        },

        close: function () {
            $(this.rootNode).removeClass('opened');
            $(document).off('mousedown.XSELECT');
        },

        render: function () {
            var labels = [];
            var selectedIndex = this.selectedIndex;
            var currentLabel = this.data[selectedIndex].label;

            var options = this.data.map(function (item, index) {
                labels.push(item.label);

                if (index === selectedIndex) {
                    return '<li data-index="' + index + '" class="selected">' + item.label + '</li>';
                } else {
                    return '<li data-index="' + index + '">' + item.label + '</li>';
                }
            });

            this.rootNode.innerHTML = '<label><span><span class="label">' + currentLabel + '</span><span class="hidden">' + labels.join('<br>') + '</span></span></label><ul>' + options.join('') + '</ul>';
        }
    });

    function findValue(data, value) {
        for (var i = 0, len = data.length; i < len; i++) {
            if (data[i].value === value) {
                return i;
            }
        }

        return -1;
    }

    function findLabel(data, label) {
        for (var i = 0, len = data.length; i < len; i++) {
            if (data[i].label === label) {
                return i;
            }
        }

        return -1;
    }

    function readData(selectNode) {
        var data = [];
        var options = selectNode.options;
        var current;

        for (var i = 0, len = options.length; i < len; i++) {
            current = options[i];

            data.push({
                label: current.label || current.value,
                value: current.value || current.label
            });
        }

        return data;
    }
})();