


var express = require('express');


var app = express();

app.use(function(req,res,next){

    console.log('%s %s', req.method, req.url);
    

    next();
    
});


app.use(function(req,res,next){

    
    res.send("testing test");
    
    next(); 
});



console.log("adsf");


    

//app.listen(process.env.PORT,'0.0.0.0');



app.listen('2323','172.17.0.3');







