
var request = require('request');
var colors = require('colors');
var util = require('util');
var events = require('events');
var config = require('./config');

var couchdb = config.couchdb;




var CodeSniper = function (config) {
  events.EventEmitter.call(this);
  this.url = config.couchdb.url;
};


util.inherits( CodeSniper, events.EventEmitter );

CodeSniper.prototype.Search = function (keyword, cb) {

  var self = this;

  //lines of context
  var adj = 3;

  request.get({ uri: this.url+'/codesniper/_all_docs?include_docs=true' }, function (err,res,body) {  

    var body_parse = JSON.parse(body);
    var results = new Object();

    for( var i in body_parse.rows ) {

      var doc = body_parse.rows[i].doc;

      if( doc.src && doc.filename && keyword ) {

        var lines = doc.src.split("\n");

        if( !results[doc.filename] ) {
          results[doc.filename] = new Object();
          results[doc.filename]['context'] = new Array();
          results[doc.filename]['hits'] = new Object();
          results[doc.filename]['hits']['total'] = 0;
        }

       for( var line = 0; line < lines.length; line++ ) {
        //for( var line in lines ) {

          if( lines[line].indexOf(keyword) > 0 ) {
            var adjecent_lines  = new Object();
            var line_index = line;


            results[doc.filename]['hits'][line.toString()] = lines[line];
            results[doc.filename]['hits']['total']++;
            

            if( (line - adj) > 0 ) line_index -= adj;

            for( var line_x = line_index; line_x < (line+adj+1); line_x++ ) {
              if( lines[line_x] ) {
                adjecent_lines[line_x.toString()] = lines[line_x];
              } else {
                adjecent_lines[line_x.toString()] = "";
              }
             
            }

            results[doc.filename]['context'].push(adjecent_lines);
            line += adj + 1;

          }   // if keyword found on line
        }     // loop through lines

        
        console.log("Searching "+doc.filename+" Hits:"+results[doc.filename]['hits']['total'] );
        if( results[doc.filename]['hits']['total'] == 0 ) delete results[doc.filename];
      }       // if the doc structure is known
    }         // end loop through docs


    self.emit('results', results);
    cb(null, results);
    return(results);
    

      
  });

};



module.exports = CodeSniper;


/* sw=2 ts=2 expandtab */
