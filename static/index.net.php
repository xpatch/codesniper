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
<script src="js/php.min.js"></script>
<script src="js/tween.min.js"></script>
<script src="js/stats.min.js"></script>
<script src="js/ParticleEngine.js"></script>
<!--
<script src="js/renderers/WebGLDeferredRenderer.js"></script>
<script src="js/ShaderDeferred.js"></script>
-->

<script src="js/Detector.js"></script>


<script src="js/shaders/SSAOShader.js"></script>
<script src="js/shaders/FXAAShader.js"></script>
<script src="js/shaders/BleachBypassShader.js"></script>
<script src="js/shaders/ColorifyShader.js"></script>
<script src="js/shaders/ConvolutionShader.js"></script>
<script src="js/shaders/CopyShader.js"></script>
<script src="js/shaders/DotScreenShader.js"></script>
<script src="js/shaders/FilmShader.js"></script>
<script src="js/shaders/HorizontalBlurShader.js"></script>
<script src="js/shaders/SepiaShader.js"></script>
<script src="js/shaders/VerticalBlurShader.js"></script>
<script src="js/shaders/VignetteShader.js"></script>
<script src="js/shaders/RGBShiftShader.js"></script>

<script src="js/postprocessing/EffectComposer.js"></script>
<script src="js/postprocessing/RenderPass.js"></script>
<script src="js/postprocessing/BloomPass.js"></script>
<script src="js/postprocessing/FilmPass.js"></script>
<script src="js/postprocessing/DotScreenPass.js"></script>
<script src="js/postprocessing/TexturePass.js"></script>
<script src="js/postprocessing/ShaderPass.js"></script>
<script src="js/postprocessing/MaskPass.js"></script>

<script src="js/modifiers/SubdivisionModifier.js"></script>

<script src="js/controls/HybridControls.js"></script>
<!--
<script src="js/controls/OrbitControls.js"></script>
<script src="js/controls/TrackballControls.js"></script>
<script src="js/controls/FlyControls.js"></script>
-->
<script src="js/THREEx.KeyboardState.js"></script>
<script src="js/THREEx.FullScreen.js"></script>
<script src="js/THREEx.WindowResize.js"></script>
<script src="js/CSS3DRenderer.js"></script>
<script src="js/PATCH.js"></script>

<?php include('shadertoy.php'); ?>


<script type="x-shader/x-vertex" id="vertexShader">
varying vec2 vUv;
varying vec3 vNormal;
 
void main() {
        vUv = uv;
        vNormal = normal;
        gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );
}       
</script>

<script type="x-shader/x-vertex" id="vertexShaderX">
void main() { gl_Position = vec4(position.x,position.y,0.0,1.0); }       
</script>

<script type="x-shader/x-vertex" id="vertexShaderMatrix">
varying vec2 vUv;
varying vec3 vNormal;
//uniform vec3 vlightx;

//uniform vec3 customColor;
 
void main() {
 
        vUv = uv;
        vNormal = normal;

        gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );
 
}       
</script>



<script type="x-shader/x-fragment" id="fragmentShaderMatrix">
<?php echo file_get_contents('glsl/classicnoise3D.glsl'); ?>


varying vec2 vUv;
varying vec3 vNormal;
//uniform vec3 vlightx;
uniform float time;

uniform sampler2D tDiffuse;
 
void main() {

	/*
	vec3 light = vec3( 0.5, 2.2, -1.0 );
	light = normalize( light );
	float dProd = max( 0.0, dot( vNormal, light) );
	*/

	//vec3 light = normalize( vlightx );
	//float dProd = max( 0.0, dot( vNormal, light) );

	//vec4 sample = texture2D(tDiffuse, 
 
	// colour is RGBA: u, v, 0, 1
	//gl_FragColor = vec4( vec3( vUv, 0. ), 1. );
	//gl_FragColor = vec4( 1, 0, 0, 1. );
	//gl_FragColor = vec4( dProd , dProd, dProd, 1.0 - dProd );
	//gl_FragColor = vec4( dProd , dProd, dProd, 1.0  );
	//gl_FragColor = vec4( cnoise(gl_Position) , 1.0  );
	
	//float time = 0.0234234234;
      
	/*
        float r = pnoise( .75 * ( vNormal + time ), vec3( 10.0 ) );
        float g = pnoise( .8  * ( vNormal + time ), vec3( 10.0 ) );
        float b = pnoise( .9  * ( vNormal + time ), vec3( 10.0 ) );
        float n = pnoise( 1.5 * ( vNormal + time ), vec3( 10.0 ) );
        n = pow( .001, n );
	*/



        //float c = cnoise( ( vNormal + time ) );
        float c = cnoise( 28.234 * (vNormal + time)  );
 
	/*
        float r = cnoise( .7 * (vNormal + time) );
        float g = cnoise( .8 * (vNormal + time) );
        float b = cnoise( .9 * (vNormal + time) );
	*/



        //float n = 10.0 * pnoise( 5.0 * ( vNormal + time ), vec3( 10.0 ) ) * pnoise( .5 * ( vNormal + time ), vec3( 10.0 ) );
        //n += .5 * pnoise( 4.0 * vNormal, vec3( 10.0 ) );

        //vec3 color = vec3( r + n, g + n, b + n );
        //vec3 color = vec3( c , 0.0, 0.0 );
        //vec3 color = vec3( r , g, b );
        //gl_FragColor = vec4( color, 1.0 );

	/*
        vec3 color = vec3( c , c, 0 );
	gl_FragColor = vec4( color, c  );
	*/

	if( c <= 0.7 ) {
		//vec3 color = vec3( c , 0, 0 );
		vec3 color = vec3( 0 , 0, c );
		gl_FragColor = vec4( color, 1  );
	} else {
		vec3 color = vec3( 1 , 1, 1 );
		gl_FragColor = vec4( color, 1  );
	}

	//gl_FragColor = vec4( dProd , dProd, dProd, 1.  );


 
}
</script>


<script>

// standard global variables
var container, controls, projector, raycaster, loader;
var orthoCamera, orthoScene;
var cssScene, cssCamera, cssRenderer;
var glScene, glCamera, glRenderer;
var ootput, realminfo;

var mouse = new THREE.Vector2(), INTERSECTED;
var camera_dest = new THREE.Vector3();
var nmapSocket;

// custom global variables
var last_update, message;
var globals = new Object();
var app = new Object();

app.hosts = new Object();
app.routes = new Array();
app.materials = new Array();
app.net = new Array(); 

app.netd = new Array();

//app.netx = new Array();
app.netz = new Array();
app.tiles = new Array();
app.lights = new Array();

app.flying = 0;
app.console_timer = null;
app.console = 0;
app.floor = false;
app.shadow = false;
app.selected_route = null;
app.selected_hop = null;

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

		nmapSocket.send( json_encode(packet) );

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


function ip2pos( ip ) {
	var o = new Object();
	//o.x = 
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
		app.hovering = intersects[ 0 ].object;
		//console.debug( app.hovering );
		if( app.hovering.tile ) app.hovering.tile.element.style.display = 'block';
		//console.debug( app.hovering.tile.element.style );
		
	} else {
		for( var t in app.tiles ) {
			if( app.tiles[t].doNotHide == undefined || app.tiles[t].doNotHide == false ) app.tiles[t].element.style.display = 'none';
		}


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
	if( nmapSocket != null ) {
		nmapSocket.send(json_encode(glCamera.position));
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
					//ootput.innerHTML = "<div class='system'>"+SELECTED.tile.element.innerHTML+"</div>";
					//ootput = SELECTED.tile;
					//ootput.innerHTML = SELECTED.tile.element.innerHTML;
					console.debug( SELECTED.tilex );
					console.debug( ootput );
					document.getElementById('message').appendChild( SELECTED.tilex );
					//console.debug( SELECTED.tile.element );
				} else {
					SELECTED.tile.doNotHide = false;
				}
			} else {

				var selpos = SELECTED.matrixWorld.getPosition();
				app.selected_route = SELECTED.routeNum;
				app.selected_hop = SELECTED.hopNum;
				flyTo(selpos);				
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



function setSignScaleNet( ) {

        for( var i in app.netz ) {
		for( var x in app.netz[i] ) {
			var host = app.netz[i][x];
			if( host.sign != undefined ) {
				host.sign.scale.set( host.material.map.image.width/50, host.material.map.image.height/50, 1.0 );
				host.material.map.needsUpdate = true;
			}
		}
        }
	

	//glScene.traverse( function ( mesh ) { mesh.visible = false; });
	glScene.traverse( function ( mesh ) { 
		if( mesh.sign != undefined && mesh.smaterial != undefined ) {
			mesh.sign.scale.set(mesh.smaterial.map.image.width/50, mesh.smaterial.map.image.height/50, 1.0); 
			mesh.smaterial.map.needsUpdate = true;
		}
	});


	

}

setInterval( "setSignScaleNet()",1000);


function meshNetwork( name ) {


        var line_geometry = new THREE.Geometry();
	var prev_geometry = null;
	var mesh = new THREE.Object3D();
	var per_ring = 20;
	//var per_ring = 8;
	var ring_number = 1;
	var offline_hosts = 0;
	var offline_hide = false;
	


	// app.net is for Object3D info
	if( app.net[app.network] == undefined ) {
		app.net[app.network] = new THREE.Object3D();
		app.net[app.network].hosts = new THREE.Object3D();
		app.net[app.network].name = app.network;
		app.net[app.network].zoomed = false;
		app.net[app.network].add( app.net[app.network].hosts );
		glScene.add( app.net[app.network] );
		
		app.net[app.network].sphere = new THREE.Mesh(  new THREE.IcosahedronGeometry( 0.6, 3 ), app.materials.blueglow );
		app.net[app.network].material = new THREE.SpriteMaterial({ 
			color: 0xffffff,
			transparent: true,
			useScreenCoordinates: false,
			map: new THREE.ImageUtils.loadTexture( 'text2png.php?text='+name+".0" )
		
		});

		app.net[app.network].sign = new THREE.Sprite( app.net[app.network].material );
		app.net[app.network].sign.scale.set( 4.8, 1.2, 1.0 );
		//app.net[app.network].sign.position.set( 0, 1.2, 0 );
		app.net[app.network].add( app.net[app.network].sign );
		app.net[app.network].add( app.net[app.network].sphere );

		/*
		mesh.sign = new THREE.Sprite( mesh.material );
		mesh.sign.scale.set( 4.8, 1.2, 1.0);
		mesh.add(mesh.sign);
		app.net[name].add( mesh );
		*/

	}
	//mesh.position.set(0, 0, 0);

	

	for( octet1 in app.netz[name] ) {

		var host = app.netz[name][octet1];
		var nmap = app.netz[name][octet1];
		var o1 = parseInt(octet1) - offline_hosts;
		var ro = ( 2 * Math.PI ) / per_ring;

		

		// increase radias for every per ring
		//var ring_number = parseInt((o1+per_ring)/per_ring);


		var r = 9 * ring_number;
		var mod_ring = o1 % per_ring;
		if( mod_ring == 0 ) ring_number++;

		var o = new Object();
		o.x = Math.cos(  mod_ring  * ro ) * r;
		o.y = 0;
		o.z = Math.sin(  mod_ring  * ro ) * r;

		//console.debug("ring number: "+ring_number+"/"+per_ring+" mod ring: "+mod_ring);

		//if( host.logo_image == null ) host.logo_image = new THREE.ImageUtils.loadTexture( "logo/Unknown.png" );

		host.material = new THREE.SpriteMaterial({ 
			color: 0xffffff,
			transparent: true,
			useScreenCoordinates: false,
			map: new THREE.ImageUtils.loadTexture( 'text2png.php?text='+octet1 )
		});

		if( host.status.state === 'up' ) {



			host.sphere = new THREE.Mesh(  new THREE.IcosahedronGeometry( 0.6, 3 ), app.materials.greenglow );
			//host.sphere = new THREE.Mesh(  new SphereGeometry( 0.6, 16, 16, Math.PI/2, Math.PI*2, 0, Math.PI), app.materials.greenglow );
			//console.debug( nmap );
			host.sphere.textports  = '';

			if( nmap.ports && nmap.ports.port ) {
				if( nmap.ports.port.length != undefined ) {
					for( var p in nmap.ports.port ) {
						var port = nmap.ports.port[p];
						host.sphere.textports += port.portid+",";
					}
					host.sphere.textports = host.sphere.textports.substring(0, host.sphere.textports.length - 1);
				} else {
					host.sphere.textports = nmap.ports.port.portid;

				}
			}
			


			host.sphere.image = "logo/Unknown.png";

			if( nmap.os != undefined && nmap.os.osmatch != undefined && nmap.os.osmatch[0] != undefined ) {
				var os_data = nmap.os.osmatch[0].name.split(' ');
				host.sphere.image = "logo/"+os_data[0]+".png";
			}
			
			var system = document.createElement( 'div' );
			system.className = 'system';
			system.style.backgroundColor = 'rgba( 0, 255, 0, 0.1)';

			var logo = document.createElement( 'img' );
			logo.className = 'logo';
			logo.src = host.sphere.image;
			logo.width = 32;
			logo.height = 32;
			system.appendChild( logo );

			var ip = document.createElement( 'div' );
			ip.className = 'ip';
			ip.textContent = name+'.'+octet1;
			system.appendChild( ip );

			var centerx = document.createElement( 'div' );
			centerx.className = 'centerx';
			centerx.textContent = '';
			system.appendChild( centerx );

			var details = document.createElement( 'div' );
			details.className = 'details';
			//details.innerHTML = '21234234234' + '<br>' + 'x3ff22';
			details.innerHTML = host.sphere.textports;
			system.appendChild( details );


			var tile = new THREE.CSS3DObject( system );
			//tile.scale.set(0.05, 0.05, 0.05);
			tile.scale.set(0.01, 0.01, 0.01);
			tile.position.set( o.x, o.y+2, o.z );

			cssScene.add( tile );
			app.tiles.push( tile );
			//tile.lookAt( glCamera.position );
			host.sphere.tile = tile;
			host.sphere.tilex = system;


		} 

		if( host.status.state === 'down' ) {
			if( offline_hide == true ) {
				offline_hosts++;
				continue;
			}
			host.sphere = new THREE.Mesh(  new THREE.IcosahedronGeometry( 0.6, 3 ), app.materials.redglow );
		} 


		host.sphere.nmap = app.netz[name][octet1];
		host.sphere.name = name+"."+octet1;





		host.sign = new THREE.Sprite( host.material );
		host.sign.scale.set( 0.5, 0.1, 1.0);
		//host.sign.position.set( o.x, o.y, o.z );
		//app.net[name].add( host.sign );

		host.sphere.add( host.sign );
		host.sphere.position.set( o.x, o.y, o.z );
		line_geometry.vertices.push( new THREE.Vector3( o.x, o.y, o.z ) );

		//glScene.add( host.sphere );
		app.net[name].hosts.add( host.sphere );

	}


	app.net[name].hosts.add( new THREE.Line( line_geometry, PATCH.materials.matrix ) );



}








function meshHosts( ) {



	for( var i in app.hosts ) {
		var host = app.hosts[i];


		if( host.address != undefined && host.address[0] != undefined ) {
			if( host.name == undefined ) host.name = host.address[0].addr;
			host.ipaddr = host.address[0].addr.split('.');
		} 

		if( host.address != undefined && host.address.addr != undefined ) {
			if( host.name == undefined ) host.name = host.address.addr;
			host.ipaddr = host.address.addr.split('.');
		}


		var ip = host.ipaddr;
		app.network = ip[0]+'.'+ip[1]+'.'+ip[2];

		
		// app.netz is for network information
		if( app.netz[app.network] == undefined ) { app.netz[app.network] = new Array(); }
		app.netz[app.network][parseInt(ip[3])] = host;


	}




	//meshNetwork( app.network );



}



function meshIPV4( depth, above ) {

	if( depth > 1 ) return;

	var per_ring = 20;
	var ring_number = 1;
	var radial_step_size = 18;
	var ro = ( 2 * Math.PI ) / per_ring;
	var net_mesh = new THREE.Object3D();


	for( var octet = 1; octet < 255; octet++ ) {


		var host = new THREE.Mesh(  new THREE.IcosahedronGeometry( 0.6, 3 ), app.materials.redglow );
                var o = new Object();
                var r = 9 * ring_number;
                var mod_ring = octet % per_ring;



                if( mod_ring == 0 ) ring_number++;

                o.x = Math.cos(  mod_ring  * ro ) * r;
                o.y = 0;
                o.z = Math.sin(  mod_ring  * ro ) * r;

		host.smaterial = new THREE.SpriteMaterial({ 
			color: 0xffffff,
			transparent: true,
			useScreenCoordinates: false,
			map: new THREE.ImageUtils.loadTexture( 'text2png.php?text='+octet )
		});


		host.sign = new THREE.Sprite( host.smaterial );
		host.sign.scale.set( 1.1, 1.1, 1.0);

		host.add( host.sign );
		host.position.set( o.x, o.y, o.z );

		//meshIPV4( depth+1, host );

		net_mesh.add( host );



	}

	above.add( net_mesh );

}



// FUNCTIONS 		
function init() {

	//ootput = document.getElementById('message').innerHTML;
	//realminfo = document.getElementById('realminfo').innerHTML;


        ootput = document.getElementById('message');
        realminfo = document.getElementById('realminfo');

        glScene = new THREE.Scene();
        cssScene = new THREE.Scene();
        orthoScene = new THREE.Scene();



        glCamera = new THREE.PerspectiveCamera( 45, globals.width / globals.height, 0.1, 20000);
        glCamera.aspect = window.innerWidth / window.innerHeight;
        glCamera.position.set(-25, 15,-25);

        controls = new THREE.HybridControls( glCamera );
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


	var tex16 = new THREE.ImageUtils.loadTexture( "shadertoy/tex16.png" )
	tex16.wrapS = THREE.RepeatWrapping;
	tex16.wrapT = THREE.RepeatWrapping;
	tex16.repeat.set( 10, 10 );	


	app.materials.redglow = PATCH.materials.glow.clone();
	app.materials.redglow.uniforms.viewVector.value = glCamera.position;
	app.materials.redglow.uniforms.glowColor.value = new THREE.Color(0xff0000);
	app.materials.redglow.depthTest = false;

	app.materials.greenglow = PATCH.materials.glow.clone();
	app.materials.greenglow.uniforms.viewVector.value = glCamera.position;
	app.materials.greenglow.uniforms.glowColor.value = new THREE.Color(0x00ff00);
	app.materials.greenglow.depthTest = false;

	app.materials.blueglow = PATCH.materials.glow.clone();
	app.materials.blueglow.uniforms.viewVector.value = glCamera.position;
	app.materials.blueglow.uniforms.glowColor.value = new THREE.Color(0x0000ff);
	app.materials.blueglow.depthTest = false;



	/*
	app.materials['glow'] = new THREE.ShaderMaterial({
		uniforms: { 
			"c":   { type: "f", value: 1.0 },
			"p":   { type: "f", value: 1.4 },
			glowColor: { type: "c", value: new THREE.Color(0x0000ff) },
			viewVector: { type: "v3", value: glCamera.position },
		},
		vertexShader:   document.getElementById( 'vertexShaderGlow'   ).textContent,
		fragmentShader: document.getElementById( 'fragmentShaderGlow' ).textContent,
		side: THREE.FrontSide,
		blending: THREE.AdditiveBlending,
		depthTest:    false,
		transparent: true



	});
	*/

	

	if( app.floor == true ) {
	//if( true ) {

		// floor: mesh to receive shadows
		var floorTexture = new THREE.ImageUtils.loadTexture( 'images/textures/checkerboard.bmp' );
		floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping; 
		//floorTexture.anisotropy = 16;
		floorTexture.repeat.set( 50, 50 );
		app.materials['floor'] = new THREE.MeshPhongMaterial( { map: floorTexture, side: THREE.DoubleSide } );

		var floorGeometry = new THREE.PlaneGeometry( 150, 150, 10, 10);
		//var floorGeometry = new THREE.TorusGeometry( 100, 40, 32, 48 );
		/*
		floorGeometry.computeFaceNormals();
		floorGeometry.computeVertexNormals();
		floorGeometry.computeCentroids();
		floorGeometry.computeTangents();
		*/
		var floor = new THREE.Mesh(floorGeometry, app.materials['floor']);
		floor.doNotHide = true;

		floor.position.y = -4.8927349827394;
		floor.rotation.x = -(Math.PI / 2);
		// Note the mesh is flagged to receive shadows
		//floor.receiveShadow = true;
		glScene.add(floor);
	}

	window.addEventListener( 'resize', onWindowResize, false );
	document.addEventListener( 'mousemove', onDocumentMouseMove, false );
	document.addEventListener( 'mousedown', onDocumentMouseDown, false );
	document.addEventListener( 'mouseup', onDocumentMouseUp, false );

	app.meshx = new THREE.Mesh( new THREE.IcosahedronGeometry( 0.1, 3 ), PATCH.materials.matrix);
	glScene.add( app.meshx );

	controls.center.x = app.meshx.position.x;
	controls.center.y = app.meshx.position.y;
	controls.center.z = app.meshx.position.z;

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

		var newHop = (parseInt(app.selected_hop) + 1).toString();
		if( app.selected_route && app.selected_hop && app.routes[app.selected_route][ newHop ] != undefined ) {
			app.selected_hop = newHop;
			var destpos = app.routes[app.selected_route][ app.selected_hop ].mesh.position;
			flyTo( destpos );

		}
		return;

	} 

	if( isDOWNpressed ) {

		var newHop = (parseInt(app.selected_hop) - 1).toString();
		if( app.selected_route && app.selected_hop && app.routes[app.selected_route][ newHop ] != undefined ) {
			app.selected_hop = newHop;
			var destpos = app.routes[app.selected_route][ app.selected_hop ].mesh.position;
			flyTo( destpos );

		}
		
		return;
	} 




	if ( isEpressed ) {
		console.debug( app.net[app.network].children[0] );

		var network = app.net[app.network];
		var sphere  = network.sphere;
		var hosts   = network.hosts;

		
		if( !network.zoomed ) {
			var hosts_shrink = new TWEEN.Tween( { x: hosts.scale.x, y: hosts.scale.y, z: hosts.scale.z } )
			.to( { x: 0.01 , y: 0.01, z: 0.01 }, 1000 )
			.onUpdate( function () { hosts.scale.set( this.x, this.y, this.z ); })
			.onComplete( function() { 
				app.net[app.network].hosts.traverse( function ( objmesh ) { objmesh.visible = false; });
				app.net[app.network].zoomed = true;
			})
			.start();
		
			var sphere_zoom = new TWEEN.Tween( { x: sphere.scale.x, y: sphere.scale.y, z: sphere.scale.z } )
			.to( { x: 5.0 , y: 5.0, z: 5.0 }, 1000 )
			.onUpdate( function () { sphere.scale.set( this.x, this.y, this.z ); })
			.start();


		} else {

			app.net[app.network].hosts.traverse( function ( objmesh ) { objmesh.visible = true; });

			var hosts_shrink = new TWEEN.Tween( { x: hosts.scale.x, y: hosts.scale.y, z: hosts.scale.z } )
			.to( { x: 1.0 , y: 1.0, z: 1.0 }, 1000 )
			.onUpdate( function () { hosts.scale.set( this.x, this.y, this.z ); })
			.onComplete( function() { app.net[app.network].zoomed = false; })
			.start();
		
			var sphere_zoom = new TWEEN.Tween( { x: sphere.scale.x, y: sphere.scale.y, z: sphere.scale.z } )
			.to( { x: 1.0 , y: 1.0, z: 1.0 }, 1000 )
			.onUpdate( function () { sphere.scale.set( this.x, this.y, this.z ); })
			.start();
		}
		


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
}


function render() {
	
	//var delta = clock.getDelta();
	var ltime = ( (new Date()).getTime() - app.startx )/1000.0;

	PATCH.materials.matrix.uniforms.time.value = ltime/50;

	var viewVector = new THREE.Vector3().subVectors( glCamera.position, controls.center );
	//app.materials.blueglow.uniforms.viewVector.value = new THREE.Vector3().subVectors( glCamera.position, controls.center );
	app.materials.blueglow.uniforms.viewVector.value = viewVector;
	app.materials.redglow.uniforms.viewVector.value = viewVector;
	app.materials.greenglow.uniforms.viewVector.value = viewVector;
	
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

	for( var t in app.tiles ) app.tiles[t].lookAt( glCamera.position );
	if( cssRenderer ) cssRenderer.render( cssScene, glCamera );




}



if( nmapSocket == null ) {

	nmapSocket = new WebSocket("ws://<?=$_SERVER['SERVER_NAME']?>:8080/socketserver", "echo-protocol");

	init();

	meshIPV4( 1, glScene );

	animate();

	nmapSocket.onopen = function(event) {

		var sent = nmapSocket.send("nmap.initState");

		nmapSocket.onmessage = function(message) { 

			/*
			var nmap_response = json_decode(message.data); 
			app.hosts = nmap_response.nmaprun.host;
			meshHosts();
			*/
			

			/*
				Create objects for initial state.
			*/
			nmapSocket.onmessage = function( message ) {
				msg = json_decode( message.data );	
				/*
				if( msg.nmaprun == undefined ) return;
				if( msg.nmaprun.host != undefined ) {
					var hosts = msg.nmaprun.host;
					var hops = msg.nmaprun.host.trace.hop;
					if( hops.length ) meshRoute( hops );
				}
				*/
						
			}// nmapSocket.onmessage
		}
		
	}
}







</script>


</body>
</html>
