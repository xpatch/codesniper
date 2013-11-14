

var request = require('request');
var inspect = require('util').inspect;
var async = require('async');

var couchdb = { ip: '172.17.0.3', port: '5984', url: 'http://172.17.0.3:5984' };



/*
request('http://127.0.0.1:5984', function( err, res, body ) {
	var data = JSON.parse( res.body );
	console.log( inspect( data, { colors: true }) );
});
*/

function clog( data ) { console.log( inspect( data, { colors: true, depth: null, showHidden: true }) ); }

function setup( cb ) {

	async.series([
		function (cb) { 	
			request(couchdb.url, function( err, res, body ) {

				var data = JSON.parse( res.body );
				clog( data );
				cb();

			});
		},
		function (cb) {

			request(couchdb.url+'/accounts', function( err, res, body ) {
				
				var data = JSON.parse( res.body );
				clog( data );
				cb();


			});

		},
		function (cb) {
			request.put(couchdb.url+'/accounts', function( err, res, body ) {
				
				var data = JSON.parse( res.body );
				clog( data );
				cb();


			});



		}



	],
	cb);


}


setup(function(){
	console.log('setup complete');


});









