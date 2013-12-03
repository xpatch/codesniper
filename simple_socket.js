#!/usr/local/bin/node


var g = new Object();
g.debug = false;


var http = require('http');
var WebSocketServer = require('websocket').server;

var lan_xml = fs.readFileSync('lan.xml');
var json_initial_state = parser.toJson(lan_xml);
var json_object = null;

var interfaces = os.networkInterfaces();


var version = '1.0';
var listen_ip = '0.0.0.0';
var listen_tcp_port = 8080;
var socket_timeout_in_ms = 7000;

var subscribers = [];
var total_subscribers = 0;

var nmap_timing = " -T5 ";




//cLog( interfaces );


for( var i in interfaces ) {

	if( i === 'lo' )  continue;

	var addrx = interfaces[i][0]['address'];	
	cLog( "Address: "+addrx );

	var octet = addrx.indexOf('.');
	octet = addrx.indexOf('.',octet+1);
	octet = addrx.indexOf('.',octet+1);
	addrx = addrx.substr(0,octet+1);
	//var nmap_cmd_line = "nmap -T5 -oX - "+addrx+"1-254";
	var nmap_cmd_line = "nmap -A -O -oX - "+nmap_timing+addrx+"1-254";
	//var nmap_cmd_line = "nmap -A -O -oX - "+addrx+"1-39";
	cLog("Starting NMAP scan: "+addrx+"1-254");
	cLog("Command: "+nmap_cmd_line);
	child = exec(nmap_cmd_line, function ( error, stdout, stderr ) {
		
		json_initial_state = parser.toJson(stdout);
		json_object = JSON.parse(json_initial_state);

		cLog( json_object );
		cLog("Completed NMAP scan: "+addrx+"1-254");

			
		
	});

}



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

/*
cLog( "Starting LAN Scan" );
child = exec("nmap -T5 -oX - 10.0.1.1-39", function ( error, stdout, stderr ) {
//child = exec("nmap -T5 -oX - 192.168.139.1-254", function ( error, stdout, stderr ) {
//child = exec("nmap -T5 -oX - 10.0.1.1-255", function ( error, stdout, stderr ) {
	json_initial_state = parser.toJson(stdout);
	var json_object = JSON.parse(json_initial_state);
	//console.log( util.inspect( json_object, { colors: true, depth: null }) );
	//console.log(bldblu+"Finished LAN Scan"+txtrst);
	cLog( json_object );
	cLog( "Finished LAN Scan" );
});
*/



//var jsono = JSON.parse( json );





var server = http.createServer(function(request, response) {
	console.log((new Date()) + ' Received request for ' + request.url);
	response.writeHead(404);
	response.end();
});

server.listen( listen_tcp_port, function() {
	//console.log((new Date()) + ' Server is listening on port 8080');
	//console.log(bldblu+"NMAP Socket v1.0.0 "+bldred+listen_ip+bldwht+":"+bldred+listen_tcp_port+txtrst);
	cLog(bldblu+"NMAP Socket v1.0.0 "+bldred+listen_ip+bldwht+":"+bldred+listen_tcp_port+txtrst);
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
    
	var connection = request.accept('echo-protocol', request.origin);


	cLog(connection.remoteAddress + ' Connection accepted.');
	subscribers[connection.remoteAddress] = connection;
	//console.log(subscribers);


	connection.on('message', function(message) {

		if (message.type === 'utf8') {
			
			if( message.utf8Data.indexOf('nmap.initState') == 0 ) {
				connection.sendUTF(json_initial_state);
			} else {
				var cData = JSON.parse( message.utf8Data );

				cLog( util.inspect( cData, { colors: true, depth: null }) );

				if( cData.type != undefined && cData.type.indexOf('cmd') == 0 ) {
					
					var cache_file = "/tmp/"+cData.cmd+".json";
					var cache_stat = null;
					var json_data  = null;
					var json_object  = null;

					if( fs.existsSync(cache_file) == true ) {
						cLog("Loading file: "+cache_file);
						cache_stat = fs.statSync(cache_file);
						json_data = fs.readFileSync(cache_file);
						json_object = JSON.parse(json_data);

						console.log( util.inspect( json_object, { colors: true, depth: null }) );
						
						
						connection.sendUTF( json_data );
						return;

					} 

					if( json_data == null ) {
						var cmd_to_run = "nmap --traceroute -oX - "+nmap_timing+cData.cmd;
						//var cmd_to_run = "nmap --traceroute -oX - "+cData.cmd;
						cLog(bldred+"Running: "+bldblu+cmd_to_run+txtrst);
						child = exec(cmd_to_run, function ( error, stdout, stderr ) {


							json_data = parser.toJson(stdout);
							json_object = JSON.parse(json_data);

							fs.writeFileSync("/tmp/"+cData.cmd+".json", json_data);
							connection.sendUTF( json_data );

							console.log( util.inspect( json_object, { colors: true, depth: null }) );
							return;

						});
					}
				} else {
					cLog("sending ack");
					connection.sendUTF('{"response":"ack"}');
				}
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








