/**
 * Author: hancong05@meituan.com
 * Date: 16/1/19
 */

'use strict';

(function () {
    window.CitySelect = CitySelect;

    jQuery(function () {
        $("input[city-select]").each(function (index, item) {
            new CitySelect(item, CITY_DATA);
        });
    });

    function CitySelect(inputNode, data) {
        this.rootNode = document.createElement('div');

        this.inputNode = inputNode;
        this.data = formatData(data);
        this.rootNode.className = 'city-select';

        this.selectors = [];
        this.values = initValues(this.data, this.inputNode.value);

        this.proSelect = this.initProSelect();
        this.citySelect = this.initCitySelect();
        this.distSelect = this.initDistrictSelect();

        this.rootNode.appendChild(this.proSelect.getRootNode());
        this.rootNode.appendChild(this.citySelect.getRootNode());
        this.rootNode.appendChild(this.distSelect.getRootNode());

        this.initEvent();

        $(this.rootNode).insertBefore(inputNode);
    }

    $.extend(CitySelect.prototype, {
        initEvent: function () {
            var _self = this;

            this.proSelect.onchange(function (value, index) {
                _self.changePro(value, index);
            });

            this.citySelect.onchange(function (value, index) {
                _self.changeCity(value, index);
            });

            this.distSelect.onchange(function (value, index) {
                _self.changeDist(value, index);
            });
        },

        changePro: function (value, index) {
            if (index === 0) {
                this.values = [];
            } else {
                this.values = [value];
            }

            this.resetCity();
            this.resetDist();

            this.syncInputNodeValue();
        },

        changeCity: function (value, index) {
            if (index === 0) {
                this.values.length = 1;
            } else {
                this.values.length = 2;
                this.values[1] = value;
            }

            this.resetDist();
            this.syncInputNodeValue();
        },

        changeDist: function (value, index) {
            if (index === 0) {
                this.values.length = 2;
            } else {
                this.values[2] = value;
            }

            this.syncInputNodeValue();
        },

        syncInputNodeValue: function () {
            this.inputNode.value = this.values.join(',');
        },

        resetCity: function () {
            var cityInfo = this.getCityInfo();
            this.citySelect.reset(cityInfo.list);
        },

        resetDist: function () {
            var distInfo = this.getDistrictInfo();
            this.distSelect.reset(distInfo.list);
        },

        initProSelect: function () {
            var index = !this.values[0] ? 0 : this.data.list.indexOf(this.values[0]) + 1;
            return new ZSelect(['请选择省份'].concat(this.data.list), index);
        },

        getCityInfo: function () {
            var proData = this.data.map[this.values[0]];
            var value = this.values[1];

            if (!proData) {
                return {
                    list: ['请选择城市'],
                    index: 0
                };
            } else {
                return {
                    list: ['请选择城市'].concat(proData.list),
                    index: proData.list.indexOf(value) + 1
                };
            }
        },

        initCitySelect: function () {
            var cityInfo = this.getCityInfo();
            return new ZSelect(cityInfo.list, cityInfo.index);
        },

        getDistrictInfo: function () {
            var proData = this.data.map[this.values[0]];

            if (!proData) {
                return {
                    list: ['请选择区/县'],
                    index: 0
                };
            }

            var cityData = proData.map[this.values[1]];

            if (!cityData) {
                return {
                    list: ['请选择区/县'],
                    index: 0
                };
            }

            var value = this.values[2];
            var index = cityData.list.indexOf(value) + 1;

            return {
                list: ['请选择区/县'].concat(cityData.list),
                index: index
            };
        },

        initDistrictSelect: function () {
            var distInfo = this.getDistrictInfo();
            return new ZSelect(distInfo.list, distInfo.index);
        }
    });

    /*--- z-select start ---*/
    function ZSelect(data, index) {
        this.rootNode = document.createElement('div');

        this.data = data;
        this.selectedIndex = index || 0;

        this.rootNode.className = 'city-sub-select';

        this.cb = function () {};

        this.render();
        this.initEvent();
    }

    $.extend(ZSelect.prototype, {
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
        },

        onchange: function (cb) {
            this.cb = cb;
        },

        getRootNode: function () {
            return this.rootNode;
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

            this.close();

            this.cb(this.data[this.selectedIndex], index);
        },

        reset: function (data, index) {
            this.data = data;
            this.selectedIndex = index || 0;

            this.render();
        },

        updateLabel: function () {
            $('.label', this.rootNode).html(this.data[this.selectedIndex]);
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
            var currentLabel = this.data[selectedIndex];

            var options = this.data.map(function (item, index) {
                labels.push(item);

                if (index === selectedIndex) {
                    return '<li data-index="' + index + '" class="selected">' + item + '</li>';
                } else {
                    return '<li data-index="' + index + '">' + item + '</li>';
                }
            });

            this.rootNode.innerHTML = '<label><span><span class="label">' + currentLabel + '</span><span class="hidden">' + labels.join('<br>') + '</span></span></label><ul>' + options.join('') + '</ul>';
        }
    });
    /*--- z-select end ---*/

    function formatData(data) {
        var list = [];
        var map = {};

        var name;

        for (var i = 0, len = data.length; i < len; i++) {
            if (typeof data[i] === 'string') {
                name = data[i];
                map[name] = name;
            } else {
                name = data[i].name;
                map[name] = formatData(data[i].sub);
            }

            list.push(name);
        }

        return {
            list: list,
            map: map
        };
    }

    function initValues(data, value) {
        var result = [];
        var current = data;

        value = value.split(',', 3);

        for (var i = 0, len = value.length; i < len; i++) {
            if (!value[i]) {
                return result;
            }

            current = current.map[value[i]];

            if (!current) {
                return result;
            }

            result.push(value[i]);
        }

        return result;
    }
})();