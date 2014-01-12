#!/usr/local/bin/node


function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }

var fs = require('fs');
var request = require('request');
var colors = require('colors');
var config = require('./config');


var data = "";
var couchdb = config.couchdb;


var filename = process.argv[2];


request.get({ uri: couchdb.url+'/codesniper/_design/generic/_view/dirid'}, function (err,res,body) {  
  var docs = JSON.parse(body).rows;
  for( var doc in docs ) {
    if( docs[doc]['key'] == filename ) {
      request.get({ uri: couchdb.url+'/codesniper/'+docs[doc]['id']}, function (err,res,body) {  
        var zdoc = JSON.parse(body);
        request.del({ uri: couchdb.url+'/codesniper/'+docs[doc]['id']+'?rev='+zdoc['_rev'] }, function (err,res,body) {  

          console.log(body);


        });
      });

    }
  

  } 


});







/* sw=2 ts=2 expandtab */
