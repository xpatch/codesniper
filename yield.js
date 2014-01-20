
var request = require('request');

function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }



  /*
  function* foo(x) {

    console.log("foo 1 x:"+x);
    //yield x + 1;
    console.log("foo 2 x:"+x);

    console.log("foo 3 x:"+x);
    return x;
  }
  */


  function *testx ( timex ) {


    var start = (new Date()).getTime();
    console.log( start );

    //sleep(10000);
    setTimeout( function *() { 
      yield 'bork bork'; 

    },3500);

    var end = (new Date()).getTime();
    console.log( end );
    console.log("Diff:"+( end - start ) );
     

  }



  function *synchro(x) {
    var self = this;

    console.log(x);
    var original = 'oriiiiiii';

    var start = (new Date()).getTime();
    console.log( start );

    setTimeout( function () { 

      original = 'oooooooooooo';

      self.next();

    },3500);

    yield 1;

    console.log(x);

    var end = (new Date()).getTime();
    console.log( end );
    console.log("Diff:"+( end - start ) );
     
    return(original);


  }

  function test(y) {

    var synx = new synchro(10);


  }


  console.log("synchs");
  var synx = new synchro(10).next();
  //synx.next();





  //console.log("calling testx");
  //var dx = testx(0);
  //dx.next();









function* sleep(ms) {
  yield function (callback) {
    setTimeout(callback, ms);
  };
}

/*
  console.log("new foo");
  var gen = new foo(5);

  clog(gen);
  //gen.next();
 
  setTimeout(function () {
    console.log("gen.next() 2");
    var genret = gen.next();
    clog(genret);
    if( !genret.done ) gen.next();
    console.log("timeout done");


  }, 2000);
*/
 


