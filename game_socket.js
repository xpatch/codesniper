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


var util = require('util');
var http = require('http');
var net = require('net');
var fs = require('fs');
var request = require('request');
var os = require('os');
var WebSocketServer = require('websocket').server;
var exec = require('child_process').exec, child;

var json_initial_state = '{ "success": true }';
var json_object = null;

var interfaces = os.networkInterfaces();


var version = '1.0';
var listen_ip = '0.0.0.0';
var listen_tcp_port = 8081;
var socket_timeout_in_ms = 7000;

var subscribers = [];
var total_subscribers = 0;






//process.exit(0);


function cLog( log_line ) {

	var d = new Date();
	var ds = d.getFullYear()+'-'+d.getMonth()+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds()+' - ';

	if( typeof(log_line) === 'string' ) {
		console.log(bldblu + ds + txtrst + log_line );
		return;
	}

	if( typeof(log_line) === 'object' ) {
		console.log(bldblu+ ds + ' - ' + txtrst + util.inspect( log_line, { colors: true, depth: null }));
		return;
	}



}



var server = http.createServer(function(request, response) {
	console.log((new Date()) + ' Received request for ' + request.url);
	response.writeHead(404);
	response.end();
});

server.listen( listen_tcp_port, function() {
	//console.log((new Date()) + ' Server is listening on port 8080');
	//console.log(bldblu+"NMAP Socket v1.0.0 "+bldred+listen_ip+bldwht+":"+bldred+listen_tcp_port+txtrst);
	cLog(bldblu+"Game Socket v1.0.0 "+bldred+listen_ip+bldwht+":"+bldred+listen_tcp_port+txtrst);
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

	if( !originIsAllowed(request.origin) ) {
		// Make sure we only accept requests from an allowed origin
		request.reject();
		console.log((new Date()) + ' Connection from origin ' + request.origin + ' rejected.');
		return;
	}
    
	var connection = request.accept('game-protocol', request.origin);


	cLog(connection.remoteAddress + ' Connection accepted.');
	subscribers[connection.remoteAddress] = connection;
	//console.log(subscribers);


	connection.on('message', function(message) {

		if (message.type === 'utf8') {
			
			if( message.utf8Data.indexOf('game.initState') == 0 ) {
				connection.sendUTF(json_initial_state);
			} else {
				var cData = JSON.parse( message.utf8Data );

				cLog( util.inspect( cData, { colors: true, depth: null }) );

					
				cLog("sending ack");
				connection.sendUTF('{"response":"ack"}');
			}


		} else if (message.type === 'binary') {
			console.log('Received Binary Message of ' + message.binaryData.length + ' bytes');
			connection.sendBytes(message.binaryData);
		}

	});

	connection.on('close', function(reasonCode, description) {
		cLog(connection.remoteAddress + ' disconnected.');
		delete subscribers[connection.remoteAddress];
	});
});








