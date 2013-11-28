#!/usr/local/bin/node

var fs = require('fs');

function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }

var  int_max = -2147483647;
var uint_max = 4294967295;
var  int_max_64 = -9223372036854775807;
var uint_max_64 = 18446744073709551615;

//var four_bytes = 0xffff;

//console.log("four bytes: "+four_bytes);

/*
console.log("integer max 64: "+int_max_64);
console.log("unsigned integer max 64: "+uint_max_64);

console.log("integer max: "+int_max);
console.log("unsigned integer max: "+uint_max);
*/

//var testx = parseInt(44);jjjjjjjjjjjjjjj
//console.log("int testx: "+testx);

/*
var test = new Buffer(4);
var int_max_buff = new Buffer([int_max]);
var uint_max_buff = new Buffer([uint_max]);

var int_max_64_buff = new Buffer([int_max_64]);
var uint_max_64_buff = new Buffer([uint_max_64]);


var bytes = new Buffer([0xff,0xff,0xff,0xff]);
var bytex = new Buffer([0xf0,0xf1,0xf2,0xf3,0xf4,0xf5,0xf6,0xf7]);
*/



//console.log( bytex.readDoubleLE(0) );
//console.log( bytex.readDoubleBE(0) );

//bytex.writeDoubleBE(0xf0f1f2f3f4f5f6f7);


//console.log( bytex );
var bytex = new Buffer([0xDE,0xAD,0xBE,0xEF,0xCA,0xFE,0xBA,0xBE]);
clog(bytex);

var buf = new Buffer(8);
buf.writeDoubleBE(0xdeadbeefcafebabe, 0);
console.log( buf );
clog(buf);






/*
clog( bytex );

clog(int_max_buff);
clog(uint_max_buff);

clog(int_max_64_buff);
clog(uint_max_64_buff);
*/

fs.writeFileSync( '/tmp/test.dat', buf );

