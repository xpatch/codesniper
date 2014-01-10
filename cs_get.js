#!/usr/local/bin/node

function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }

var fs = require('fs');
var request = require('request');
var colors = require('colors');
var config = require('./config');


var data = "";


//var couchdb = { ip: '10.0.1.16', port: '5984', url: 'http://10.0.1.16:5984' };
var couchdb = { ip: '127.0.0.1', port: '5984', url: 'http://127.0.0.1:5984' };


var keyword = process.argv[2];



request.get({ uri: couchdb.url+'/codesniper/_all_docs?include_docs=true' }, function (err,res,body) {  

  var body_parse = JSON.parse(body);

  for( var i in body_parse.rows ) {

    var doc = body_parse.rows[i].doc;

    if( doc.filename && keyword ) {
      //console.log("Keyword Index:"+doc.src.indexOf(keyword));
      if( doc.src.indexOf(keyword) > 0 ) console.log(doc.src);
    }

    if( !keyword ) console.log(doc.src);

  }

    
});








/* sw=2 ts=2 expandtab */
