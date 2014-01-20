

function clog( data ) { console.log( require('util').inspect( data, { colors: true, depth: null, showHidden: true }) ); }

/*
function* sleep(ms) {


  yield function (cb) {
    setTimeout(cb,ms);
  }

}
*/



  //var test = sleep(1000);
  //
  /*
 *
 * 1389588798733
 * new foo
 * gen.next() 1
 * foo 1 x:5
 * 1389588798757
 * Diff:24
 * gen.next() 2
 * foo 2 x:5
 * foo 3 x:5
 * timeout done
 */

function* foo(x) {

  console.log("foo 1 x:"+x);
  //yield x + 1;
  console.log("foo 2 x:"+x);

  console.log("foo 3 x:"+x);
  return x;
}


  var start = (new Date()).getTime();
  console.log( start );
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
 

  /*
  console.log("gen.next() 1");
  gen.next();


  setTimeout(function () {
    console.log("gen.next() 2");
    gen.next();
    console.log("timeout done");


  }, 2000);
  */


  var end = (new Date()).getTime();
  console.log( end );
  console.log("Diff:"+( end - start ) );








