


var express = require('express');
var couchdb = require('couchdb-api');
var request = require('request');


var app = express();


var dbc = couchdb.srv('http://172.17.0.10:5984');






/*
app.use(function(req,res,next) {
    console.log('%s %s', req.method, req.url);
    next();
});

app.get('/',function(req,res){
   
   res.send('testingz');
    
});

app.listen(process.env.PORT);
*/





//app.listen(process.env.PORT,'0.0.0.0');
//app.listen('2323','172.17.0.3');







