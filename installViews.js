#!/usr/local/bin/node


var request = require('request');
var async = require('async');
var fs = require('fs');

var config = require('./config');
var couchdb = config.couchdb;



function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }


var data = JSON.parse(fs.readFileSync('couch_view.json'));


request.get({
  uri: couchdb.url+'/codesniper/_design/generic',
  json: {}
  },
  function (err,res,body) {
    if( err ) {
      console.log(err);
      return;
    }
    if( body ) {

      data['_rev'] = body['_rev'];

      request.put({ 
          uri: couchdb.url+'/codesniper/_design/generic',
          json: data
        },
        function (err,res,body) {
          clog(body); 
        }
      );
    }


  }
);




