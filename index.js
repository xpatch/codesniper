


var express = require('express');
var request = require('request');
var engines = require('consolidate');




var app = express();

app.locals = {
    
    title: '&copy;0d3 5n1p3&reg;',
    engine: 'sniper'
    
};




app.get( '/', function(req,res,next){


    res.send('Alo?');

    
    
    
});




app.listen(3000);

