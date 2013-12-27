#!/usr/local/bin/node

function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }

var fs = require('fs');
var request = require('request');


var data = "";


var couchdb = { ip: '10.0.1.16', port: '5984', url: 'http://10.0.1.16:5984' };


var filename = process.argv[2];

if( !filename ) {
  console.log("Usage: cs_add.js <filename>");
  process.exit(0);
}
console.log("Filename:"+filename);

try {
  data = fs.readFileSync(filename);
  console.log("File exists, data is fine");
  console.log(data);
 var json_data = { src: req.body.src, filename: req.body.filename };

  clog(json_data);

  request.post({ uri: couchdb.url+'/codesniper', json: json_data }, function (err,res,body) {  
    clog(err);
    clog(body);
      
  });
  



/*
  request.post(
    { 
      uri: couchdb.url+'/codesniper?include_docs=true', 
      json: {} 
    }, 
    function (post_err,post_res,post_body) {
      console.log(post_body);
      res.send(200); 
    }
  );
*/

 
} catch (e) {

  console.log("ErrorX:");
  console.log(e);
  process.exit(0);

} 









/* sw=2 ts=2 expandtab */
