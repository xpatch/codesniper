#!/usr/local/bin/node

function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }

var fs = require('fs');
var exec = require('child_process').exec;
var request = require('request');
var config = require('./config');


var data = "";
var couchdb = config.couchdb;
var command = process.argv[2];
var desc = process.argv[3];

if( !command ) {
  console.log("Usage: cmds_add.js '<command>' '<description>'");
  process.exit(0);
}


function parse_command (cmd) {

  var out = new Array();

  var splited = cmd.split(" ");
  //clog(splited);

  //var child = exec("man "+splited[0]+" | grep '\\-\\-'",function (error,stdout,stderr) {
  var child = exec("man "+splited[0]+" ",function (error,stdout,stderr) {
    //console.log(error);
    //console.log(stdout);

    var switches = stdout.split("\n");
    var current_switch = new Object();
    for( var i in switches ) {

      //console.log(i+" = "+ switches[i].trim() );
      //var current_line = switches[i].trim().substring(0,1); 
      //console.log("prefix: "+current_line.substring(0,2) );

      var current_line = switches[i].trim(); 
      
      if( current_line.substring(0,2) === "--" ) {
        var split_switch = switches[i].trim().split(" ");
        current_switch.name = split_switch[0];
        current_switch.description = current_line.substring(split_switch[0].length).trim(); 
        //console.log( i + " = " + current_line );
        clog(current_switch);

      }


    }

    var json_data = { cmd: command };
    /*
    request.post({ uri: couchdb.url+'/cmdsniper', json: json_data }, function (err,res,body) {
      clog(err);
      clog(body);
        
    });
    */



  });


}



parse_command(command);








/* sw=2 ts=2 expandtab */
