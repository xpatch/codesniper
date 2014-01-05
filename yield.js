function* sleep(ms) {

  yield function (cb) {
    setTimeout(cb,ms);
  }

}
  var start = (new Date()).getTime();
  console.log("Diff:"+(new Date()).getTime()-start);


