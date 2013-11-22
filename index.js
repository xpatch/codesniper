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
var request = require('request');


var couchdb = { ip: '172.17.0.3', port: '5984', url: 'http://172.17.0.3:5984' };


function clog( data ) { console.log( inspect( data, { colors: true, depth: null, showHidden: true }) ); }


var app = express();


/*
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
*/


app.engine('html', cons.ect);
app.set('view engine', 'html');
app.set('views', __dirname + '/views');
app.use(express.bodyParser());
app.use(express.static('static'));

//app.engine('ect', cons.ect);
//app.set('view engine', 'ect');
/*
app.locals = { title: '&copy;0d3 5n1p3&reg;' };
*/



app.get('/', function (req,res) {
    res.render('add', {title:'Teh Title'} );
});





app.post('/add', function (req,res) {
  
  clog(req.body.src);
  //clog(req.params);
  //clog(req.query);
  var json_data = { src: req.body.src, filename: req.body.filename };
  request.post({ uri: couchdb.url+'/codesniper', json: json_data }, function (err,res,body) {  
    clog(err);
    clog(body);
      
  });
  
  res.send(201); 
  
});



/*
app.get( '/', function(req,res,next){ res.send('Alo?'); });
*/



if( process.env.PORT ) { 
  console.log("Listening on "+process.env.PORT);
  app.listen(process.env.PORT);
} else {
  console.log("Listening on 8900");
  app.listen(8900);
}

