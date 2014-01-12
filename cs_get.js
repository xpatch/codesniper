#!/usr/local/bin/node

function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }

var fs = require('fs');
var request = require('request');
var colors = require('colors');
var config = require('./config');


var data = "";
var couchdb = config.couchdb;

//lines of context
var adj = 3;

var keyword = process.argv[2];



request.get({ uri: couchdb.url+'/codesniper/_all_docs?include_docs=true' }, function (err,res,body) {  

  var body_parse = JSON.parse(body);
  var results = new Object();

  for( var i in body_parse.rows ) {

    var doc = body_parse.rows[i].doc;

    if( doc.src && doc.filename && keyword ) {

      var lines = doc.src.split("\n");

      if( !results[doc.filename] ) {
        results[doc.filename] = new Object();
        results[doc.filename]['context'] = new Object();
        results[doc.filename]['hits'] = new Object();
        results[doc.filename]['hits']['total'] = 0;
      }

     for( var i = 0; i < lines.length; i++ ) {
      //for( var line in lines ) {

        if( lines[i].indexOf(keyword) > 0 ) {
          var adjecent_lines  = [];
          var line_index = i;


          //results[doc.filename]['hits'].push(lines[i]);
          results[doc.filename]['hits'][i.toString()] = lines[i];
          results[doc.filename]['hits']['total']++;
          

          if( (i - adj) > 0 ) line_index -= adj;

          for( var line_x = line_index; line_x < (line_index+4); line_x++ ) {
            if( lines[line_x] ) results[doc.filename]['context'][line_x.toString()] = lines[line_x];
            //console.log("Adding: "+lines[line_x]);
          }


        }   // if keyword found on line
      }     // loop through lines

      
      console.log("Searching "+doc.filename+" Hits:"+results[doc.filename]['hits']['total'] );

    }       // if the doc structure is known
  }         // end loop through docs

  clog(results);



    
});








/* sw=2 ts=2 expandtab */
