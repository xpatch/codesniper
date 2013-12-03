<!doctype html>
<html lang="en">
<head>
	<title>Dead Pixel :(</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<style>

	.info {
		position: absolute;
		background-color: black;
		opacity: 0.8;
		color: white;
		text-align: center;
		top: 0px;
		width: 100%;
	}

	.info a {
		color: #00ffff;
		display: none;
	}
	/*
	.login  {
		z-index: 100;
		position: absolute;
		padding: 10px;
		top: 300px;
		left: 600px;
		box-shadow: 0px 0px 20px rgba(0,0,255,0.5);
		border: 1px solid rgba(127,255,255,0.25);
		cursor: default;
	}
	
	.login input[type="text"], input[type="password"] {
		box-shadow: 0px 0px 20px rgba(0,0,255,0.5);
		border: 0px solid rgba(127,255,255,0.25);
	}
	*/


	.x-panel input[type="text"], input[type="password"] {
		box-shadow: 0px 0px 20px rgba(0,0,255,0.5);
		border: 0px solid rgba(127,255,255,0.25);
		background: transparent url('images/transparent.png');
	}


	.system  {
		width: 240px;
		height: 180px;
		box-shadow: 0px 0px 20px rgba(0,255,0,0.5);
		border: 1px solid rgba(127,255,255,0.25);
		cursor: default;
		display: none;
	}

	.system .logo {
		position: absolute;
		top: 10px;
		left: 10px;
		overflow:hidden;
		color: rgba(127,255,255,0.75);
	}



	.system .ip {
		position: absolute;
		top: 10px;
		right: 10px;
		font-size: 20px;
		color: rgba(255,255,255,0.75);
	}


	.system .centerx {
		position: absolute;
		top: 40px;
		width: 100%;
		font-size: 20px;
		text-align: center;
		color: rgba(255,255,255,0.75);
		font-weight: bold;

		-webkit-filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
		-moz-filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
		-o-filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
		-ms-filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
		filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
	}





	.system .details {
		position: absolute;
		bottom: 5px;
		width: 100%;
		font-size: 10px;
		text-align: center;
		color: rgba(255,255,255,0.75);
	}










	.element {
		width: 140px;
		height: 180px;
		box-shadow: 0px 0px 20px rgba(0,255,255,0.5);
		border: 1px solid rgba(127,255,255,0.25);
		cursor: default;
	}

	.element:hover {
		box-shadow: 0px 0px 20px rgba(0,255,255,0.75);
		border: 1px solid rgba(127,255,255,0.75);
	}

	.element .number {
		position: absolute;
		top: 20px;
		right: 20px;
		font-size: 20px;
		color: rgba(127,255,255,0.75);
	}

	.element .symbol {
		position: absolute;
		top: 40px;
		width: 100%;
		font-size: 70px;
		text-align: center;
		color: rgba(255,255,255,0.75);
		font-weight: bold;

		-webkit-filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
		-moz-filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
		-o-filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
		-ms-filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
		filter: drop-shadow(0px 0px 20px rgba(0,255,255,0.95));
	}

	.element .details {
		position: absolute;
		top: 125px;
		width: 100%;
		font-size: 18px;
		text-align: center;
		color: rgba(127,255,255,0.75);
	}










	#message {
		position: absolute;
		background-color: transparent;
		opacity: 0.8;
		color: white;
		text-align: left;
		top: 0px;
		left: 0px;
		width: 100%;
		filter: alpha(opacity=80);
		font-size: 8pt;


	}
	#realminfo {
		position: absolute;
		background-color: transparent;
		color: white;
		text-align: right;
		top: 0px;
		right: 0px;
		width: 600px;
		opacity: 0.8;
		filter: alpha(opacity=80);
		font-size: 8pt;


	}

	#cmdline {
		position: absolute;
		background-color: transparent;
		color: white;
		text-align: left;
		bottom: 40px;
		left: 10px;
		width: 600px;
		opacity: 0.8;
		filter: alpha(opacity=80);
		font-size: 8pt;
		border: 1px solid blue;
		z-index: 100;





	}



	body {
		font-family: Monospace;
		font-weight: bold;
		/*background-color: #ccccff;*/
		background-color: #000000;
		margin: 0px;
		overflow: hidden;



		background:transparent url(deadpixel-small.png) bottom right no-repeat;
		background-color: black;
		text-color: white;
		color: white;
		font-family: "Courier New", Courier, monospace;
		font-size: 9pt;
	}
	a:link {
		text-color: white;
		color: white;
		font-family: "Courier New", Courier, monospace;
		font-size: 9pt;
		text-decoration: none;
	}
	a:hover {
		text-color: white;
		color: white;
		font-family: "Courier New", Courier, monospace;
		font-size: 9pt;
		text-decoration: none;
	}
	a:visited {
		text-color: white;
		color: white;
		font-family: "Courier New", Courier, monospace;
		font-size: 9pt;
		text-decoration: none;
	}
	a:active {
		text-color: white;
		color: white;
		font-family: "Courier New", Courier, monospace;
		font-size: 9pt;
		text-decoration: none;
	}





</style>

</head>

<body>
<div id="message"></div>
<div id="realminfo"></div>
<div class="info"></div>
<input type="text" name="cmd" id="cmdline" style='display: none' onkeypress="return(cmdKeyPress(event));" />
<!--<script src="js/three.min.js"></script>-->
<script src="js/three.js"></script>
<script src="js/tween.min.js"></script>
<script src="js/php.min.js"></script>
<script src="js/controls/HybridControls.js"></script>
<script src="js/THREEx.KeyboardState.js"></script>
<script src="js/CSS3DRenderer.js"></script>

<link rel="stylesheet" type="text/css" href="ext/resources/css/ext-all-gray.css" />
<script type="text/javascript" src="ext/ext-all.js"></script>

<!--
<link rel="stylesheet" type="text/css" href="ext/resources/css/ext-all.css" />
<link rel="stylesheet" type="text/css" href="ext/resources/css/ext-all-gray.css" />

<script type="text/javascript" src="ext/ext-all.js"></script>
-->


<!--
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
<link rel=stylesheet href="css/jquery-ui.css" />
<link rel=stylesheet href="css/info.css"/>
-->
  
	<script type="text/javascript">

	Ext.Loader.setConfig({enabled:true});

	Ext.require([
	    'Ext.window.Window',
	    'Ext.util.Cookies',
	    'Ext.form.*',
	    'Ext.JSON.*'
	]);

	Ext.onReady(function(){



		/****************************************************
		*
		* BUG UNTIL 4.0.7 
		* http://www.sencha.com/forum/showthread.php?136576-4.0.2-formBind-no-longer-functions/page2
		*
		****************************************************/
		Ext.override(Ext.form.Basic, {
		 getBoundItems: function() {
		  var boundItems = this._boundItems;
		  if (!boundItems || boundItems.getCount() == 0) {
		   boundItems = this._boundItems = Ext.create('Ext.util.MixedCollection');
		   boundItems.addAll(this.owner.query('[formBind]'));
		  }
		  return boundItems;
		 },
		 initialize: function(){
		  this.callOverridden();
		  this.owner.on('beforerender', this.checkValidity, this);
		 }
		});  


		var submitConfig = {
			method: 'POST',
			waitTitle:'Connecting',
			waitMsg: 'Authorizing...',

			success:function(){ 
				var redirect = 'main.php'; 
				window.location = redirect;
			},
			failure:function(form, action){ 
				if(action.failureType == 'server'){ 
					obj = Ext.JSON.decode(action.response.responseText); 

					if( obj.reason != null ) {
						Ext.Msg.alert('Login Failed!', obj.reason); 
					}

				} else { 
					Ext.Msg.alert('Warning!', 'Authentication server is unreachable : ' + action.response.responseText); 
				} 
				form.getForm().reset(); 
			} 
		};




		var win;
		var loginform;

		if( !win ) {


			loginform = Ext.create('Ext.form.Panel', {
				bodyPadding: 5,
				labelWidth:75,
                                frame: false,
                                defaultType: 'textfield',
                                url:'login.php', 
				timeout: 5,
				items: [{
					fieldLabel: 'Username',
					name: 'username',
					id: 'username',
					value: Ext.util.Cookies.get("USERNAME"),
					allowBlank: false
				},{
					fieldLabel: 'Password',
					name: 'pword',
					id: 'pword',
					inputType: 'password',
					minLength: 4,
					maxLength: 16,
					minLengthText: 'Passwords must be at least 4 characters long.',
					validateOnBlur: true,
					allowBlank: false,
					enableKeyEvents: true,
					listeners: {
						keypress: function(field, e){
							if (e.getKey() == e.ENTER) {
								var form = this.up('form').getForm();	
								if( form.isValid() ) {						
									form.submit(submitConfig); 
								}
							}
						}
					}

				}],

				buttons: [{

					text:'Login',
					formBind: true, 
					disabled: true,
					handler: function() {
						var form = this.up('form').getForm();	
						if( form.isValid() ) {						
							form.submit(submitConfig); 
						}


					}
				}]


			});

			
			win = Ext.create('Ext.window.Window', {
				title: 'Login',
				layout: 'fit',
				width: 320,
				height: 130,
				closeable: false,
				closeAction: Ext.emptyFn,
				items: [loginform]

			});
		}

		win.show();
	});




	</script>


<script>

// standard global variables
var container, controls, stats, projector, raycaster, loader;
var orthoCamera, orthoScene;
var cssScene, cssCamera, cssRenderer;
var glScene, glCamera, glRenderer;
var ootput, realminfo;

var mouse = new THREE.Vector2(), INTERSECTED;
var camera_dest = new THREE.Vector3();
var gameSocket;

// custom global variables
var last_update, message;
var globals = new Object();
var app = new Object();

app.hosts = new Object();
app.routes = new Array();
app.materials = new Array();
app.net = new Array(); 
app.tiles = new Array();
app.lights = new Array();

app.flying = 0;
app.console_timer = null;
app.console = 0;
app.floor = true;
app.shadow = false;

globals.follow = true;

globals.focus = null;
globals.focus_name = "";
globals.zoom_finished = 0;
globals.pixel_switch = 0;


globals.width = window.innerWidth || 2;
globals.height = window.innerHeight || 2;
globals.halfWidth = globals.width / 2;
globals.halfHeight = globals.height / 2;



var offset = new THREE.Vector3(), INTERSECTED, SELECTED;





function cmdKeyPress(e){

        //delete
        if( e.keyCode == 8 ) { }

        //up
        if( e.keyCode == 38 ) { }

        //down
        if( e.keyCode == 40 ) { }

        //enter
        if( e.keyCode == 13 ) {
                //sendcmd(document.getElementById('cmd').value);
                var cmd = document.getElementById('cmdline').value;
		var packet = new Object();
		packet.cmd = cmd;
		packet.type = 'cmd';

		gameSocket.send( json_encode(packet) );

		document.getElementById('cmdline').value = '';
		document.getElementById('cmdline').style.display = 'none';
		app.keyboard.pause();
                return(false);
        } 

        //other non function keys
	/*
        if( e.keyCode == 0 ) {
                document.cursorPosition += fontWidth;
                document.getElementById('cmd').style.backgroundPosition = document.cursorPosition+"px 0px";
        }
	*/
	return(true);

}


function cLog( outString, dest ) {
	if( dest != undefined ) {
		document.getElementById(dest).innerHTML += outString+"<br/>";
	} else {
		ootput.innerHTML += outString+"<br/>";
	}
}

function onDocumentMouseMove( event ) {

	event.preventDefault();

	mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
	mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;

	if( app.net[ app.network ] == undefined || app.net[app.network].hosts == undefined ) return;


	//app.materials.blueglow.uniforms.viewVector.value = glCamera.position;

	var vector = new THREE.Vector3( mouse.x, mouse.y, 0.5 );
	app.projector.unprojectVector( vector, glCamera );

	var raycaster = new THREE.Raycaster( glCamera.position, vector.sub( glCamera.position ).normalize() );
	var intersects = raycaster.intersectObjects( app.net[app.network].hosts.children, true );

	if( intersects.length > 0 ) {
			
	} else {


	}





}

function onWindowResize() {


        if( globals.width == window.innerWidth && globals.height == window.innerHeight ) return;


        globals.width = window.innerWidth || 2;
        globals.height = window.innerHeight || 2;
        globals.halfWidth = globals.width / 2;
        globals.halfHeight = globals.height / 2;

        glRenderer.setSize( window.innerWidth, window.innerHeight );
        if( cssRenderer ) cssRenderer.setSize( window.innerWidth, window.innerHeight );

        glCamera.aspect = window.innerWidth / window.innerHeight;
        glCamera.updateProjectionMatrix();


        
        if( globals.composer ) {
                //app.depthTarget.setSize( window.innerWidth, window.innerHeight );
		if( app.depthTarget ) {
			app.depthTarget.dispose();
			app.depthTarget = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { minFilter: THREE.NearestFilter, magFilter: THREE.NearestFilter, format: THREE.RGBAFormat } );
			console.debug( app.depthTarget );
		}
                app.effectFXAA.uniforms[ 'resolution' ].value.set( 1 / globals.width, 1 / globals.height );
                globals.composer.reset();
        }

}


function flyTo( selected ) {

	
	app.flying = 1;
	


	if( controls != undefined ) {
		app.current_selection = controls.center;		
		//var tween_camera_focus = new TWEEN.Tween( { x: controls.center.x, y: controls.center.y, z: controls.center.z } )
		var tween_camera_focus = new TWEEN.Tween( { x: app.current_selection.x, y: app.current_selection.y, z: app.current_selection.z } )
		.to( { x: selected.x, y: selected.y, z: selected.z }, 1000 )
		.onUpdate( function () {
		
			//if( controls != undefined ) {
			controls.center.x = this.x;
			controls.center.y = this.y;
			controls.center.z = this.z;
			//}
			
			//glCamera.lookAt( this.x, this.y, this.z);
			glCamera.lookAt( this );

		} )
		.onComplete( function() { app.current_selection = selected; }  )
		.start();
					
		//.onComplete( function() { app.flying = 0; } )

		var tween_glCamera_position = new TWEEN.Tween( { x: glCamera.position.x, y: glCamera.position.y, z: glCamera.position.z } )
		.to( { x: selected.x, y: selected.y + 1.2, z: selected.z }, 2000 )
		.onUpdate( function () {

			var differ = new THREE.Vector3();

			differ.x = Math.abs( Math.abs(selected.x) - Math.abs(this.x));
			differ.y = Math.abs( Math.abs(selected.y) - Math.abs(this.y));
			differ.z = Math.abs( Math.abs(selected.z) - Math.abs(this.z));
			
			if( differ.x > 3.3 ) glCamera.position.x = this.x; 
			//if( differ.y > 1.1 ) glCamera.position.y = this.y; 
			glCamera.position.y = this.y;
			if( differ.z > 3.3 ) glCamera.position.z = this.z; 
			
			//glCamera.updateProjectionMatrix();

		} )
		.onComplete( function() { app.flying = 0; } )
		.start();

		//.onComplete( function() { app.flying = 0; camera.lookAt( selected.x, selected.y, selected.z); } )
			
	} else {

		//glCamera.position.set( selected.x - 1.1, selected.y, selected.z - 1.1 );
		glCamera.position.set( 0, 4, 0 );
		//glCamera.lookAt( selected.x, selected.y, selected.z);
		app.current_selection = selected;

	}
	

}






function onDocumentMouseDown( event ) {

	event.preventDefault();

	var vector = new THREE.Vector3( mouse.x, mouse.y, 0.5 );
	app.projector.unprojectVector( vector, glCamera );

	var raycaster = new THREE.Raycaster( glCamera.position, vector.sub( glCamera.position ).normalize() );
	if( gameSocket != null ) {
		gameSocket.send(json_encode(glCamera.position));
	}

	//var intersects = raycaster.intersectObjects( app.net[app.network].children, true );
	var intersects = raycaster.intersectObjects( glScene.children, true );

	/* if( intersects.length == 0 ) { intersects = raycaster.intersectObjects( glScene.children, true ); } */

	if( intersects.length > 0 ) {
		SELECTED = intersects[ 0 ].object;
		if( SELECTED.matrix && SELECTED.matrix ) {
			if( SELECTED.tile != undefined ) {
				if( SELECTED.tile.doNotHide == undefined || SELECTED.tile.doNotHide == false ) {
					SELECTED.tile.doNotHide = true;
					document.getElementById('message').appendChild( SELECTED.tilex );
				} else {
					SELECTED.tile.doNotHide = false;
				}
			} else {

				var selpos = SELECTED.matrixWorld.getPosition();
				if( SELECTED.clickable != undefined && SELECTED.clickable == true ) {
					app.selected_route = SELECTED.routeNum;
					app.selected_hop = SELECTED.hopNum;
					flyTo(selpos);				
				}
			}
		}
	}
}

function onDocumentMouseUp( event ) {

	event.preventDefault();

	/*
	controls.enabled = true;

	if ( INTERSECTED ) {

		//plane.position.copy( INTERSECTED.position );

		SELECTED = null;

	}

	//container.style.cursor = 'auto';
	*/

}






if( gameSocket == null ) {

	gameSocket = new WebSocket("ws://<?=$_SERVER['SERVER_NAME']?>:8081/socketserver", "game-protocol");

	gameSocket.onopen = function(event) {

		var sent = gameSocket.send("game.initState");

		gameSocket.onmessage = function(message) { 

			//globals.initialState = json_decode(message.data); 
			var msg = json_decode(message.data); 
			console.log(msg);

			/*
				Create objects for initial state.
			*/
			gameSocket.onmessage = function( message ) {
				//console.log(message);
				msg = json_decode( message.data );	
				console.log(msg);

						
			}// gameSocket.onmessage
		}
		
	}
}






// FUNCTIONS 		
function init() {

	//ootput = document.getElementById('message').innerHTML;
	//realminfo = document.getElementById('realminfo').innerHTML;


        ootput = document.getElementById('message');
        realminfo = document.getElementById('realminfo');

	//login = document.getElementById('login');
	//username = document.getElementById('username');
	//console.log(username);
	//username.focus();
	


        glScene = new THREE.Scene();
        cssScene = new THREE.Scene();
        orthoScene = new THREE.Scene();



        glCamera = new THREE.PerspectiveCamera( 45, globals.width / globals.height, 0.1, 20000);
        glCamera.aspect = window.innerWidth / window.innerHeight;
        glCamera.position.set(-25, 15,-25);

        //controls = new THREE.HybridControls( glCamera );
        app.current_selection = glScene.position;
        app.start = Date.now();
        app.startx = (new Date()).getTime();

//	glRenderer = new THREE.WebGLRenderer( { antialias: true, brightness: 2 } );
	glRenderer = new THREE.WebGLRenderer( { antialias: false } );
	glRenderer.setSize(globals.width, globals.height);
	glRenderer.autoClear = false;
	//glRenderer.setClearColor( 0x000000, 1 );


        //app.renderDest = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { minFilter: THREE.NearestFilter, magFilter: THREE.NearestFilter, format: THREE.RGBAFormat } );
        //globals.composer = new THREE.EffectComposer( glRenderer );
        cssRenderer     = new THREE.CSS3DRenderer();
        //orthoCamera = new THREE.OrthographicCamera( -globals.halfWidth, globals.halfWidth, globals.halfHeight, -globals.halfHeight, 0, 1 );
        //orthoCamera = new THREE.OrthographicCamera( 0, globals.width, 0, globals.height, 0, 1 );
	app.keyboard = new THREEx.KeyboardState();
	app.clock = new THREE.Clock();
        app.projector = new THREE.Projector();

	app.keyboard.pause();

        // when window resizes, also resize this renderer

        glRenderer.domElement.style.position = 'absolute';
        glRenderer.domElement.style.top      = 0;
        glRenderer.domElement.style.zIndex   = 1;


        container = document.createElement( 'div' );
        document.body.appendChild( container );
        container.appendChild( glRenderer.domElement );

        if( cssRenderer ) {
                cssRenderer.setSize( window.innerWidth, window.innerHeight );
                cssRenderer.domElement.style.position = 'absolute';
                cssRenderer.domElement.style.top          = 0;
                cssRenderer.domElement.style.margin       = 0;
                cssRenderer.domElement.style.padding  = 0;
                cssRenderer.domElement.style.zIndex   = 2;
                document.body.appendChild( cssRenderer.domElement );
                container.appendChild( cssRenderer.domElement );
        }

        if( app.shadow ) {
                glRenderer.shadowMapEnabled = app.shadow;
                glRenderer.gammaInput = true;
                glRenderer.gammaOutput = true;
                glRenderer.physicallyBasedShading = true;
                glRenderer.shadowMapType = THREE.PCFShadowMap;
                //glRenderer.setClearColor( 0xFFFFFF, 1 );
                //glRenderer.shadowMapSoft = false;
                //glRenderer.shadowMapDebug = true;
        }


	
	var spotlight = new THREE.SpotLight(0xFFFFFFFF);
	spotlight.position.set(0,80,0);
	spotlight.shadowDarkness = 0.95;
	spotlight.intensity = 1;
	spotlight.castShadow = app.shadow;
	spotlight.target.position.set(0,0,0);


        if( app.shadow ) {      
                spotlight.castShadow = app.shadow;

                spotlight.shadowMapWidth = 4096;
                spotlight.shadowMapHeight = 4096;

                spotlight.shadowCameraNear = 1;
                spotlight.shadowCameraFar = 60;
                spotlight.shadowCameraFov = 90;
        }

	glScene.add(spotlight);
	app.lights.push(spotlight);






        if( orthoCamera != undefined ) {
                orthoCamera.lookAt( glScene.position );

                //var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), quadmat );
                //orthoScene.add( quad );
        }




        if( globals.composer ) {


		/*
                app.depthTarget = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { minFilter: THREE.NearestFilter, magFilter: THREE.NearestFilter, format: THREE.RGBAFormat } );
                app.effectSSAO = new THREE.ShaderPass( THREE.SSAOShader );
                app.effectSSAO.uniforms[ 'tDepth' ].value = app.depthTarget;
                //app.effectSSAO.uniforms[ 'size' ].value.set( window.innerWidth, window.innerHeight );
                app.effectSSAO.uniforms[ 'size' ].value.set( 2048, 2048 );
                app.effectSSAO.uniforms[ 'cameraNear' ].value = glCamera.near;
                app.effectSSAO.uniforms[ 'cameraFar' ].value = glCamera.far;
                app.effectSSAO.uniforms[ 'onlyAO' ].value = 0;
                //app.effectSSAO.renderToScreen = true;

                app.depthPassPlugin = new THREE.DepthPassPlugin();
                app.depthPassPlugin.renderTarget = app.depthTarget;
                glRenderer.addPrePlugin( app.depthPassPlugin );
		*/

                app.effectBloom = new THREE.BloomPass( 1.8, 13, 1.8, 512 );

                app.effectFXAA = new THREE.ShaderPass( THREE.FXAAShader );
                app.effectFXAA.uniforms[ 'resolution' ].value.set( 1 / globals.width, 1 / globals.height );
                app.effectFXAA.renderToScreen = true;



                globals.composer.addPass( new THREE.RenderPass( glScene, glCamera ) );
                if( app.effectSSAO ) globals.composer.addPass( app.effectSSAO );
                if( app.effectBloom ) globals.composer.addPass( app.effectBloom );
                globals.composer.addPass( app.effectFXAA );

        }



	/*
	if( app.floor == true ) {
	//if( true ) {

		// floor: mesh to receive shadows
		//var grid_material =  new THREE.LineBasicMaterial( { color: 0xD0D0D0, wireframe: true } );

		var grid_material = new THREE.MeshPhongMaterial({ 
			color: 0xD0D0D0, 
			wireframe: true, 
			side: THREE.DoubleSide 
		});

		var floorTexture = new THREE.ImageUtils.loadTexture( 'images/textures/checkerboard.bmp' );
		floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping; 
		//floorTexture.anisotropy = 16;
		floorTexture.repeat.set( 50, 50 );
		app.materials['floor'] = new THREE.MeshPhongMaterial( { map: floorTexture, side: THREE.DoubleSide } );

		var floorGeometry = new THREE.PlaneGeometry( 250, 250, 50, 50);
		var floor = new THREE.Mesh(floorGeometry, app.materials.floor );
		//floor.notClickable = true;
		floor.clickable = false;
		//var floor = new THREE.Mesh(floorGeometry, app.materials['floor']);
		//var floor = new THREE.Mesh(floorGeometry, app.materials['digibrain']);
		floor.doNotHide = true;

		floor.position.y = -4.8927349827394;
		floor.rotation.x = -(Math.PI / 2);
		// Note the mesh is flagged to receive shadows
		//floor.receiveShadow = true;
		glScene.add(floor);
	}
	*/
	var floor = new THREE.GridHelper( 200, 10 );
	floor.setColors( 0x0000ff, 0x808080 );
	floor.position.y = -4.8927349827394;
	glScene.add( floor );


	window.addEventListener( 'resize', onWindowResize, false );
	document.addEventListener( 'mousemove', onDocumentMouseMove, false );
	document.addEventListener( 'mousedown', onDocumentMouseDown, false );
	document.addEventListener( 'mouseup', onDocumentMouseUp, false );

	/*
	app.meshx = new THREE.Mesh( new THREE.IcosahedronGeometry( 0.1, 3 ), PATCH.materials.matrix);
	glScene.add( app.meshx );

	controls.center.x = app.meshx.position.x;
	controls.center.y = app.meshx.position.y;
	controls.center.z = app.meshx.position.z;
	*/

	/*
        app.login = document.createElement( 'div' );
	app.login.className = 'login';
        document.body.appendChild( app.login );
	console.log( app.login );
	var form = app.login.element.createElement('form');
	var username = form.createElement('input');
	*/

	
}








function animate() {


	requestAnimationFrame( animate );
	update();
	render();		
}




function update() {

	var isXpressed = app.keyboard.pressed("x");
	var isRpressed = app.keyboard.pressed("r");
	var isCpressed = app.keyboard.pressed("c");
	var isYpressed = app.keyboard.pressed("y");
	var isEpressed = app.keyboard.pressed("e");
	var isUPpressed = app.keyboard.pressed("w");
	var isDOWNpressed = app.keyboard.pressed("s");
	var isESCpressed = app.keyboard.pressed("escape");
	//var isCONSOLEpressed = app.keyboard.pressed("backtick");
	var isCONSOLEpressed = app.keyboard.pressed("tab");



	if( isCONSOLEpressed ) {

		app.keyboard.pause();
		//cLog("console: "+app.console );
		//controls.enabled = false;
		//app.console = app.console == 1 ? 0 : 1;
		document.getElementById('cmdline').style.display = '';

		return;

	}


	app.keyboard.pause();
	setTimeout(app.keyboard.pause(),1000);


	if( isUPpressed ) {

		return;

	} 

	if( isDOWNpressed ) {

	
		return;
	} 




	if( isCpressed ) {
		ootput.innerHTML = "";
		realminfo.innerHTML = "";
	}


	if ( isRpressed ) {
		//flyTo( app.meshx.position );
		//glCamera.updateProjectionMatrix();
		console.log("CAMERA X:"+glCamera.position.x+" Y:"+glCamera.position.y+" Z:"+glCamera.position.z);

	}

	if( isESCpressed ) {
		//flyTo( app.hosts[0].mesh.position );
		if( controls != undefined ) {
			flyTo( glScene.position );
		} else {
			glCamera.position.set(-5,5,-5);
			glCamera.lookAt(glScene.position);	

		}
	
		app.current_selection = glScene.position;
	}

	

	TWEEN.update();	
	if( controls ) { controls.update(); }
	//stats.update();
}


function render() {
	
	//var delta = clock.getDelta();
	var ltime = ( (new Date()).getTime() - app.startx )/1000.0;

//	PATCH.materials.matrix.uniforms.time.value = ltime/50;
//	app.materials.digibrain.uniforms.iGlobalTime.value = ltime;

//	var viewVector = new THREE.Vector3().subVectors( glCamera.position, controls.center );
	

	
        if( globals.composer != undefined ) {

                glRenderer.autoClear = false;
                glRenderer.autoUpdateObjects = true;
                glRenderer.shadowMapEnabled = app.shadow;
                if( app.effectSSAO ) app.depthPassPlugin.enabled = true;

                glRenderer.render( glScene, glCamera, globals.composer.renderTarget2, true );

                glRenderer.shadowMapEnabled = false;
                if( app.effectSSAO ) app.depthPassPlugin.enabled = false;

                globals.composer.render(0.1);


        } else {


		if( app.renderDest ) {
                	glRenderer.render( glScene, glCamera, app.renderDest, true );
		} else {
			glRenderer.render( glScene, glCamera );
		}

                if( orthoCamera ) renderer.render( orthoScene, orthoCamera );
                //if( cssRenderer ) cssRenderer.render( cssScene, glCamera );
        }

	//for( var t in app.tiles ) app.tiles[t].lookAt( glCamera.position );
	if( cssRenderer ) cssRenderer.render( cssScene, glCamera );




}

init();
animate();

</script>

<!--
<div class="login" id="login">
<form>
<table>
<tr><td>Username:</td><td><input type="text" name="username" id="username" /></td></tr>
<tr><td>Password:</td><td><input type="password" name="password" id="password" /></td></tr>
<tr><td>&nbsp;</td><td><input type="button" value="login" /></td></tr>
</table>
</form>
</div>
-->

</body>
</html>
