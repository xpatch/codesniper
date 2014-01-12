#!/usr/local/bin/node


function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }

var fs = require('fs');
var request = require('request');
var colors = require('colors');
var config = require('./config');


var data = "";
var couchdb = config.couchdb;




request.get({ uri: couchdb.url+'/codesniper/_design/generic/_view/dirid'}, function (err,res,body) {  


  var docz = JSON.parse(body).rows;
  for( var doc in docz ) {
    console.log(docz[doc]['key']);

  }


});







/* sw=2 ts=2 expandtab */
