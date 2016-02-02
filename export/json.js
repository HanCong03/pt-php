/**
 * Author: hancong05@meituan.com
 * Date: 16/2/2
 */

'use strict';

var fs = require('fs');

var content = fs.readFileSync('./a/data.txt', {
    encoding: 'utf-8'
});

content = content.trim();

content = content.split(/\n\n/);

if (content.length !== 2) {
    console.log('数据错误', content.length);
    process.exit(127);
}

content[0] = content[0];

content[1] = JSON.stringify(JSON.parse(content[1]), null, 4);

content = content.join('\n\n');

var tpl = '[{"title": "错误返回码说明","list": [{"code": null}]},{"title": "正确返回示例","list": [{"code": "${content}"}]},{"title": "错误返回示例","list": [{"label": "错误示例：","code": null}]},{"title": "示例代码","list": [{"label": "JSON示例：","code": null}]}]';

content = JSON.stringify(content);

tpl = tpl.replace('"${content}"', content);

tpl = JSON.parse(tpl);

tpl = JSON.stringify(tpl, null, 4);

tpl = '"returns": ' + tpl;

fs.writeFile('./a/a.txt', tpl);