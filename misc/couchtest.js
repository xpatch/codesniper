




var couchdb = require('couchdb-api');

var couchdb_ip = 'localhost';
var couchdb_port = 5984;


var localcdb = couchdb.srv("http://"+couchdb_ip+":"+couchdb_port);


var account_db = couchdb.db("accounts");
var designdoc = couchdb.db("accounts").designDoc("accounts");
var listing_by_realm = couchdb.db("accounts").designDoc("accounts").view("listing_by_realm");





