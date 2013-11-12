#!/usr/local/bin/node

var txtblk = String.fromCharCode(0x1B)+'[0;30m';
var txtred = String.fromCharCode(0x1B)+'[0;31m';
var txtgrn = String.fromCharCode(0x1B)+'[0;32m';
var txtylw = String.fromCharCode(0x1B)+'[0;33m';
var txtblu = String.fromCharCode(0x1B)+'[0;34m';
var txtpur = String.fromCharCode(0x1B)+'[0;35m';
var txtcyn = String.fromCharCode(0x1B)+'[0;36m';
var txtwht = String.fromCharCode(0x1B)+'[0;37m';

var bldblk = String.fromCharCode(0x1B)+'[1;30m';
var bldred = String.fromCharCode(0x1B)+'[1;31m';
var bldgrn = String.fromCharCode(0x1B)+'[1;32m';
var bldylw = String.fromCharCode(0x1B)+'[1;33m';
var bldblu = String.fromCharCode(0x1B)+'[1;34m';
var bldpur = String.fromCharCode(0x1B)+'[1;35m';
var bldcyn = String.fromCharCode(0x1B)+'[1;36m';
var bldwht = String.fromCharCode(0x1B)+'[1;37m';

var undblk = String.fromCharCode(0x1B)+'[4;30m';
var undred = String.fromCharCode(0x1B)+'[4;31m';
var undgrn = String.fromCharCode(0x1B)+'[4;32m';
var undylw = String.fromCharCode(0x1B)+'[4;33m';
var undblu = String.fromCharCode(0x1B)+'[4;34m';
var undpur = String.fromCharCode(0x1B)+'[4;35m';
var undcyn = String.fromCharCode(0x1B)+'[4;36m';
var undwht = String.fromCharCode(0x1B)+'[4;37m';


var bakblk = String.fromCharCode(0x1B)+'[40m';
var bakred = String.fromCharCode(0x1B)+'[41m';
var bakgrn = String.fromCharCode(0x1B)+'[42m';
var bakylw = String.fromCharCode(0x1B)+'[43m';
var bakblu = String.fromCharCode(0x1B)+'[44m';
var bakpur = String.fromCharCode(0x1B)+'[45m';
var bakcyn = String.fromCharCode(0x1B)+'[46m';
var bakwht = String.fromCharCode(0x1B)+'[47m';

var txtrst = String.fromCharCode(0x1B)+'[0m';


var my_eof = String.fromCharCode(0x0D)+String.fromCharCode(0x0A)+String.fromCharCode(0x0D)+String.fromCharCode(0x0A);
var my_eol = String.fromCharCode(0x0D)+String.fromCharCode(0x0A);



var g = new Object();
g.debug = false;


var net = require('net');
var amqp = require('amqp');
var http = require('http');
var fs = require('fs');
var request = require('request');

var WebSocketServer = require('websocket').server;
var exec = require('child_process').exec, child;

var couchdb_ip = 'localhost';
var couchdb_port = 5984;

var amqp_ip = 'localhost';
var amqp_port = 5672;

var version = '1.0';
var listen_ip = '0.0.0.0';
var listen_tcp_port = 8080;
var socket_timeout_in_ms = 7000;


var amqp_connection = amqp.createConnection({ host: amqp_ip });
//var initial_state = JSON.parse( fs.readFileSync('init.json') );
var initial_state = JSON.parse( fs.readFileSync('init.nmap.json') );
var initial_injection = fs.readFileSync('injector.js');


var subscribers = [];
var total_subscribers = 0;



console.log(bldblu+"CouchDB "+bldred+couchdb_ip+bldwht+":"+bldred+couchdb_port+txtrst);


/*
function broadcast( param ) {
	var total = 0;

	for( i in subscribers ) {
		//subscribers[i].sendUTF('{ "success": "false", "test" : "function() { console.log(\'testering\'); }" }');
		subscribers[i].sendUTF('{ "success": "false", "test" : "console.log(\'testering\');" }');
		total++;
	}

	if( total_subscribers != total ) {
	
		total_subscribers = total;
		console.log((new Date()) +' Total Subscribers: ' + total );	
	}



}

setInterval( broadcast, 7000 );
*/



var server = http.createServer(function(request, response) {
	console.log((new Date()) + ' Received request for ' + request.url);
	response.writeHead(404);
	response.end();
});

server.listen( listen_tcp_port, function() {
	//console.log((new Date()) + ' Server is listening on port 8080');
	console.log(bldblu+"NMAP3D v1.0.0 "+bldred+listen_ip+bldwht+":"+bldred+listen_tcp_port+txtrst);
});

wsServer = new WebSocketServer({
	httpServer: server,
	// You should not use autoAcceptConnections for production
	// applications, as it defeats all standard cross-origin protection
	// facilities built into the protocol and the browser.  You should
	// *always* verify the connection's origin and decide whether or not
	// to accept it.
	autoAcceptConnections: false
});

function originIsAllowed(origin) {
	// put logic here to detect whether the specified origin is allowed.
	console.log(origin);
	return true;
}

wsServer.on('request', function(request) {

	if (!originIsAllowed(request.origin)) {
		// Make sure we only accept requests from an allowed origin
		request.reject();
		console.log((new Date()) + ' Connection from origin ' + request.origin + ' rejected.');
		return;
	}
    
	var connection = request.accept('echo-protocol', request.origin);


	console.log((new Date()) + ' ' + connection.remoteAddress + ' Connection accepted.');
	subscribers[connection.remoteAddress] = connection;
	//console.log(subscribers);


	connection.on('message', function(message) {

		if (message.type === 'utf8') {

			//console.log('Received Message: ' + message.utf8Data);
			
			if( message.utf8Data.indexOf('nmap.initState') == 0 ) {
				connection.sendUTF(JSON.stringify(initial_state));
			} else {
				var cData = JSON.parse( message.utf8Data );
				console.log( cData );









				if( cData.type != undefined && cData.type.indexOf('cmd') == 0 ) {
					//console.log("Executing command:"+cData.cmd);

					//child = exec(cData.cmd, function ( error, stdout, stderr ) {
					child = exec("./gethost.php "+cData.cmd, function ( error, stdout, stderr ) {

						connection.sendUTF( stdout );
						//console.log( stdout );

					});




					
				}
				//connection.sendUTF('{"empty":"garbage"}');
			}


		} else if (message.type === 'binary') {
			console.log('Received Binary Message of ' + message.binaryData.length + ' bytes');
			connection.sendBytes(message.binaryData);
		}

	});

	connection.on('close', function(reasonCode, description) {
		console.log((new Date()) + ' ' + connection.remoteAddress + ' disconnected.');
		delete subscribers[connection.remoteAddress];
	});
});








amqp_connection.addListener('ready', function() {
	console.log(bldblu+amqp_connection.serverProperties.product+" "+bldred+amqp_ip+bldwht+":"+bldred+amqp_port+txtrst+bldred+txtrst);

	amqp_connection.exchange('nmapq', { type: 'topic',  confirm: false }, function(exchange) {
		console.log('Exchange ' + bldblu +exchange.name+txtrst + ' is open');

		//auto que name generation
		amqp_connection.queue('', function (queue) {

			console.log('Queue '+bldblu+ queue.name+txtrst + ' is open');
			queue.bind( exchange, 'registration.success.*.*' );
			queue.subscribe( { ack: false }, function( json, headers, deliveryInfo, m ) {

				var reg = new Object();
				reg.user_agent = json['User-Agent'];
				reg.jsonAll = json;
				
				for( i in subscribers ) subscribers[i].send( JSON.stringify( reg ) );

			});
		});
	});
});


