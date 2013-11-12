        request('http://'+couchdb_ip+':'+couchdb_port+'/accounts/_design/accounts/_view/listing_by_id?include_docs=true', function( error, response, body) {
                if( !error && response.statusCode == 200 ) {
                        allAccounts = JSON.parse(response.body);
                        for( i in allAccounts.rows ) {
                                var rec = allAccounts.rows[i];
                                if( rec.value != null ) {
                                        //accountRealm[rec.value.id] = rec.value.realm;
                                        accountRealm[rec.value.id] = rec.doc;
                                        //console.log(rec.doc.name);
                                        numReqs++;
                                        //getRealmDevices( rec.doc );
                                }

                        }
                }
        }).on('complete',function() {

                console.log("got complete event")

                for( r in accountRealm ) {
                        getRealmDevices( accountRealm[r] );
                }

        });
