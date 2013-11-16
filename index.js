/*

    ECT fast template with coffee script
    
    Hogan.js - Twitter template engine.
    
    http://expressjs.com/api.html#app.engine    
    
    
    
http://coffeescript.org/
http://ectjs.com/
https://github.com/visionmedia/consolidate.js

https://github.com/RandomEtc/ejs-locals
https://github.com/visionmedia/ejs/tree/master/examples


https://github.com/chovy/express-template-demo

http://stackoverflow.com/questions/12209607/using-layout-view-in-express-with-consolidate-and-mustache


*/


var express = require('express');
var cons = require('consolidate');
var inspect = require('util').inspect;

function clog( data ) { console.log( inspect( data, { colors: true, depth: null, showHidden: true }) ); }


var app = express();


app.set('views', __dirname + '/views');
var ECT = require('ect');
var ectRenderer = ECT({ 
  watch: true, 
  cache:false,
  root: __dirname + '/views',
  //open: '{{',
  //close: '}}'
});

app.engine('ect', ectRenderer.render);
app.set('view engine', 'ect');

/*
app.engine('ect', cons.ect);
app.set('view engine', 'ect');
*/
/*
app.locals = {
    title: '&copy;0d3 5n1p3&reg;'
};
*/



app.get('/', function (req,res) {
    res.render('index', {title:'test title'});
//    res.render('index.ect',{title:'punk monkeyness'});
    //res.locals({title: 'test title'});
    //res.render('index',{title: 'test'});
});


/*
app.get( '/', function(req,res,next){
    res.send('Alo?');
});
*/




app.listen(process.env.PORT);
