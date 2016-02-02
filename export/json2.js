/**
 * Author: hancong05@meituan.com
 * Date: 16/2/2
 */

'use strict';

var fs = require('fs');

var content = fs.readFileSync('./a/data.txt', {
    encoding: 'utf-8'
});

content = JSON.parse(content);

content = content.map(function (item) {
    return '{"code": ' + JSON.stringify(JSON.stringify(item, null, 4), null, 4) + '}';
});

content = content.join(',');

var tpl = '[{"title": "错误返回码说明","list": [{"code": null}]},{"title": "正确返回示例","list": [$content]},{"title": "错误返回示例","list": [{"label": "错误示例：","code": null}]},{"title": "示例代码","list": [{"label": "JSON示例：","code": null}]}]';

tpl = tpl.replace('$content', content);

tpl = JSON.parse(tpl);

tpl = JSON.stringify(tpl, null, 4);

tpl = '"returns": ' + tpl;

fs.writeFileSync('./a/a.txt', tpl);