/**
 * Author: hancong05@meituan.com
 * Date: 16/2/2
 */

'use strict';

var fs = require('fs');

var content = fs.readFileSync('./a/data.txt', {
    encoding: 'utf-8'
});
content = JSON.stringify(content.trim());

var tpl = '"examples": [\n{\n"code": $content\n}\n],';

tpl = tpl.replace('$content', content);

fs.writeFile('./a/a.txt', tpl);