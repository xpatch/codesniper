


var request = require('request');
var async = require('async');
var fs = require('fs');

var couchdb = { ip: '10.0.1.16', port: '5984', url: 'http://10.0.1.16:5984' };

function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }


var data = JSON.parse(fs.readFileSync('couch_view.json'));


request.get({
  uri: couchdb.url+'/codesniper/_design/generic',
  json: {}
  },
  function (err,res,body) {

    //clog(body);
    if( body ) data['_rev'] = body['_rev'];

    request.put({ 
        uri: couchdb.url+'/codesniper/_design/generic',
        json: data
      },
      function (err,res,body) {
        clog(body); 
      }
    );





  }
);




