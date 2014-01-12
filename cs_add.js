#!/usr/local/bin/node


function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }

var fs = require('fs');
var request = require('request');
var colors = require('colors');
var config = require('./config');


var data = "";
var couchdb = config.couchdb;




var filename = process.argv[2];

if( !filename ) {
  console.log("Usage: cs_add.js <filename>");
  process.exit(0);
}
console.log("Filename:"+filename);

try {
  data = fs.readFileSync(filename);
  
  var json_data = { src: data.toString(), filename: filename };

  request.post({ uri: couchdb.url+'/codesniper', json: json_data }, function (err,res,body) {  
    if (err) return(console.log("Import failure".red));
    console.log("Import success".green)
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
