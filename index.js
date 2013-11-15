/*

    ECT fast template with coffee script
    
    
http://coffeescript.org/
http://ectjs.com/
https://github.com/visionmedia/consolidate.js

https://github.com/RandomEtc/ejs-locals
https://github.com/visionmedia/ejs/tree/master/examples


https://github.com/chovy/express-template-demo

http://stackoverflow.com/questions/12209607/using-layout-view-in-express-with-consolidate-and-mustache





*/


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

