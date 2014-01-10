

var request = require('request');
var inspect = require('util').inspect;
var async = require('async');

var couchdb = { ip: '172.17.0.10', port: '5984', url: 'http://172.17.0.10:5984' };
//var couchdb = { ip: '127.0.0.1', port: '5984', url: 'http://127.0.0.1:5984' };



/*
request('http://127.0.0.1:5984', function( err, res, body ) {
	var data = JSON.parse( res.body );
	console.log( inspect( data, { colors: true }) );
});
*/

function clog( data ) { console.log( inspect( data, { colors: true, depth: null, showHidden: true }) ); }

function setup( done ) {

	async.series([
		function (cb) { 	
			request(couchdb.url, function( err, res, body ) {

				var data = JSON.parse( body );
				clog( data );
				cb();

			});
		},
		function (cb) {

			request(couchdb.url+'/codesniper', function( err, res, body ) {
				
				var data = JSON.parse( body );
				clog( data );
				cb();


			});

		},
		function (cb) {
			request.put(couchdb.url+'/codesniper', function( err, res, body ) {
				
				var data = JSON.parse( body );
				clog( data );
				cb();


			});
		}
	],
	done);


}


setup(function(){
	console.log('setup complete');


});









