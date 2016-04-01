
var fs = require('fs');
var http = require('http');
var BlueButton = require('bluebutton');

var args = process.argv[2];
var xml = fs.readFileSync(args, 'utf-8');
try {
    var myRecord = BlueButton(xml);
    var json = myRecord.data.json();
} catch (ex) {
    var json = 'error';
}

fs.writeFile(process.argv[3], json, function (err) {
    console.log('hello');
});
//console.log(json);
