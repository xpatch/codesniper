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


var couchdb = { ip: '10.0.1.16', port: '5984', url: 'http://10.0.1.16:5984' };


function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }


var app = express();

app.engine('html', cons.ect);
app.set('view engine', 'html');
app.set('views', __dirname + '/views');
app.use(express.bodyParser());
app.use(express.static('static'));


app.get('/', function (req,res) {
    res.render('add', {title:'Teh Title'} );
});

/*
app.get('/', function (req,res) {
    res.render('add', {title:'Teh Title'} );
});
*/

app.post('/search/:query', function (req,res) {
  
  request.post(
    { 
      uri: couchdb.url+'/codesniper?include_docs=true', 
      json: {} 
    }, 
    function (post_err,post_res,post_body) {
      console.log(post_body);
      res.send(200); 
    }
  );

  
});

app.post('/add', function (req,res) {
  
  var json_data = { src: req.body.src, filename: req.body.filename };
  request.post({ uri: couchdb.url+'/codesniper', json: json_data }, function (err,res,body) {  
    clog(err);
    clog(body);
      
  });
  
  res.send(201); 
  
});



if( process.env.PORT ) { 
  console.log("Listening on "+process.env.PORT);
  app.listen(process.env.PORT);
} else {
  console.log("Listening on 8900");
  app.listen(8900,'0.0.0.0');
}

