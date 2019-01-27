var http = require('http');
var url = require('url');
var fs = require('fs');
http.createServer(function (req, res) {
    console.log('request received');
   var q = url.parse(req.url, true).query;
    var file = fs.writeFile('./'+q.file,q.content,function(err){
  
    });
  	console.log(q);
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.end('_res("Thành Công")');
}).listen(8888);