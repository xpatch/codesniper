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
<!--
<script src="js/renderers/WebGLDeferredRenderer.js"></script>
<script src="js/ShaderDeferred.js"></script>
-->


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



<script src="js/Detector.js"></script>
<script src="js/libs/stats.min.js"></script>


<script src="js/controls/OrbitControls.js"></script>
<!--
<script src="js/controls/TrackballControls.js"></script>
<script src="js/controls/FlyControls.js"></script>
-->
<script src="js/THREEx.KeyboardState.js"></script>
<script src="js/THREEx.FullScreen.js"></script>
<script src="js/THREEx.WindowResize.js"></script>

<script src="js/CSS3DRenderer.js"></script>








<script type="x-shader/x-vertex" id="vertexShader">
varying vec2 vUv;
varying vec3 vNormal;
uniform vec3 vlightx;

//uniform vec3 customColor;
 
void main() {
 
	vUv = uv;
	vNormal = normal;

	gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );
 
}       
</script>


<script type="x-shader/x-fragment" id="fragmentShader">
<?php echo file_get_contents('glsl/classicnoise3D.glsl'); ?>


varying vec2 vUv;
varying vec3 vNormal;
uniform vec3 vlightx;
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
        vec3 color = vec3( c , 0.0, 0.0 );
        //vec3 color = vec3( r , g, b );
        //gl_FragColor = vec4( color, 1.0 );
        gl_FragColor = vec4( color, c + 1.0 );

	//gl_FragColor = vec4( dProd , dProd, dProd, 1.  );


 
}
</script>





<script type="x-shader/x-vertex" id="vertexShaderFX">
<?php echo file_get_contents('classicnoise3D.glsl'); ?>

varying vec2 vUv;
varying float noise;
varying float ao;

uniform float time;
uniform float weight;
 
float turbulence( vec3 p ) {
    float w = 100.0;
    float t = -.5;
    for (float f = 1.0 ; f <= 10.0 ; f++ ){
        float power = pow( 2.0, f );
        t += abs( pnoise( vec3( power * p ), vec3( 10.0, 10.0, 10.0 ) ) / power );
    }
    return t;
}

void main() {
 
	vUv = uv;


	noise = 10.0 *  -.10 * turbulence( .5 * normal + time );
	//float b = 5.0 * pnoise( 0.05 * position + vec3( 1.0 * time ), vec3( 100.0 ) );
	float displacement = - weight * noise;
	displacement += 5.0 * pnoise( 0.05 * position + vec3( 2.0 * time ), vec3( 100.0 ) );

	ao = noise;
        vec3 newPosition = position + normal * vec3( displacement );
        gl_Position = projectionMatrix * modelViewMatrix * vec4( newPosition, 1.0 );
 
}
</script>






<script type="x-shader/x-fragment" id="fragmentShaderFX">
varying vec2 vUv;
varying float noise;
varying float ao;
uniform sampler2D tExplosion;
 
float random( vec3 scale, float seed ){ return fract( sin( dot( gl_FragCoord.xyz + seed, scale ) ) * 43758.5453 + seed ) ; }
 
void main() {
	vec3 color = texture2D( tExplosion, vec2( 0, 1.0 - 1.3 * ao + .01 * random(vec3(12.9898,78.233,151.7182),0.0) ) ).rgb;
	gl_FragColor = vec4( color.rgb, 1.0 );
}   
</script>



<script>

// standard global variables
//var container, scene, camera, renderer, controls, stats, composer, object;
var container, scene, camera, renderer, controls, stats, projector, composer, raycaster, loader;
var radial_offset_totals = new Array();

var keyboard = new THREEx.KeyboardState();
var clock = new THREE.Clock();
var rendererCSS;


var ootput, realminfo;

var mouse = new THREE.Vector2(), INTERSECTED;
var floorMaterial;

// custom global variables
var last_update, message;
var globals = new Object();
var app = new Object();

app.hosts = new Object();
app.materials = new Array();
app.flying = 0;
app.console_timer = null;
app.shadow = false;




globals.width = window.innerWidth || 2;
globals.height = window.innerHeight || 2;
globals.halfWidth = globals.width / 2;
globals.halfHeight = globals.height / 2;

globals.find_intersections = true;

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


		document.getElementById('cmdline').value = '';
		document.getElementById('cmdline').style.display = 'none';
		keyboard.pause();
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

	//console.log(outString);	

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

}

function onWindowResize() {

	camera.aspect = window.innerWidth / window.innerHeight;
	camera.updateProjectionMatrix();
	renderer.setSize( window.innerWidth, window.innerHeight );

}


function flyTo( selected ) {

	
	app.flying = 1;
	var tween_camera_focus = new TWEEN.Tween( { x: controls.center.x, y: controls.center.y, z: controls.center.z } )
	.to( { x: selected.x, y: selected.y, z: selected.z }, 1000 )
	.onUpdate( function () {
		controls.center.x = this.x;
		controls.center.y = this.y;
		controls.center.z = this.z;

	} )
	.onComplete( function() { app.flying = 0; } )
	.start();
					
	var tween_camera_position = new TWEEN.Tween( { x: camera.position.x, y: camera.position.y, z: camera.position.z } )
	.to( { x: selected.x, y: selected.y + 0.2, z: selected.z }, 2000 )
	.onUpdate( function () {

		var test = new THREE.Vector3( this.x, this.y, this.z );
		var differ = new THREE.Vector3();

		differ.x = Math.abs( Math.abs(selected.x) - Math.abs(this.x));
		differ.y = Math.abs( Math.abs(selected.y) - Math.abs(this.y));
		differ.z = Math.abs( Math.abs(selected.z) - Math.abs(this.z));
		
		if( differ.x > 1.1 ) camera.position.x = this.x; 
		//if( differ.y > 1.1 ) camera.position.y = this.y; 
		camera.position.y = this.y;
		if( differ.z > 1.1 ) camera.position.z = this.z; 
		

	} )
	.onComplete( function() { app.flying = 0; } )
	.start();
		


}






function onDocumentMouseDown( event ) {

	event.preventDefault();
	/*
	var vector = new THREE.Vector3( mouse.x, mouse.y, 0.5 );
	projector.unprojectVector( vector, camera );

	var raycaster = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );

	for( i in app.hosts ) {
		//var host = hosts[i].mesh;

		var intersects = raycaster.intersectObjects( app.hosts[i].mesh.children );
		if( intersects.length > 0 ) {
			console.log( app.hosts[i] );
			app.selected_host = app.hosts[i];
			SELECTED = intersects[ 0 ].object;
			if( SELECTED.matrix && SELECTED.matrix ) {

				var selpos = SELECTED.matrixWorld.getPosition();
				flyTo(selpos);

			}
		}
	}
	*/
}

function onDocumentMouseUp( event ) {

	event.preventDefault();

}



function distCircle( r, slices ) {

	var i;
	var o = new Array(); // output

	// radial offset
	var ro = (2*Math.PI)/slices;  

	for( i = 0; i < slices; i++ ) {
		o[i] = new Object();
		o[i].x = Math.cos(i*ro) * r;
		o[i].y = 0;
		o[i].z = Math.sin(i*ro) * r;
	}

	return( o );

}







// FUNCTIONS 		
function init() {

	//ootput = document.getElementById('message').innerHTML;
	//realminfo = document.getElementById('realminfo').innerHTML;

	ootput = document.getElementById('message');
	realminfo = document.getElementById('realminfo');

	scene = new THREE.Scene();

	camera = new THREE.PerspectiveCamera( 45, globals.width / globals.height, 0.1, 20000);
	//camera = new THREE.PerspectiveCamera( 45, globals.width / globals.height, 0.1, 600);

	scene.add(camera);
	camera.position.set(50,5,50);
	camera.lookAt(scene.position);	
	

	app.start = Date.now();

	/*
	app.attributes = {
		displacement: { type: 'v3', value: [] },
		customColor: {  type: 'c', value: [] }
	};

	app.uniforms = {
		amplitude: { type: "f", value: 5.0 },
		opacity:   { type: "f", value: 0.3 },
		color:     { type: "c", value: new THREE.Color( 0xff0000 ) }
	};

	var shaderMaterial = new THREE.ShaderMaterial({
		uniforms:       app.uniforms,
		attributes:     app.attributes,
		vertexShader:   document.getElementById( 'vertexshader' ).textContent,
		fragmentShader: document.getElementById( 'fragmentshader' ).textContent,
		blending:       THREE.AdditiveBlending,
		depthTest:      false,
		transparent:    true
	});

	shaderMaterial.linewidth = 1;
	*/







	//THREEx.DomEvent.camera( camera );


	/*
	loader = new THREE.JSONLoader( true );
	
	loader.load( 'droid/monitor.js', function ( geometry, materials ) {


		//geometry.computeNormals();
		//console.log(geometry);

		var new_meshness = new THREE.Mesh( geometry, materials[0] );


		new_meshness.position.x = 0;
		new_meshness.position.y = 0;
		new_meshness.position.z = 0;
		//new_meshness.normalize();

		scene.add(new_meshness);

	});
	*/
	



	//renderer = new THREE.WebGLRenderer( { antialias: false, brightness: 2, precision: 'lowp' } );
	renderer = new THREE.WebGLRenderer( { antialias: true, brightness: 0 } );
	renderer.setSize(globals.width, globals.height);
	//renderer.setClearColor( 0x464646, 1 );
	//renderer.autoClear = false;





	container = document.createElement( 'div' );
	document.body.appendChild( container );
	container.appendChild( renderer.domElement );
	// EVENTS
	THREEx.WindowResize(renderer, camera);
	//THREEx.FullScreen.bindKey({ charCode : 'f'.charCodeAt(0) });
	// CONTROLS
	//controls = new THREE.TrackballControls( camera );
	controls = new THREE.OrbitControls( camera );


	// STATS
	stats = new Stats();
	stats.domElement.style.position = 'absolute';
	stats.domElement.style.bottom = '0px';
	stats.domElement.style.zIndex = 100;



	var floorTexture = new THREE.ImageUtils.loadTexture( 'dpscene/checkerboard.jpg' );
	floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping; 
	floorTexture.anisotropy = 16;
	floorTexture.repeat.set( 80, 80 );
	
	app.materials['sphere'] = new THREE.MeshPhongMaterial({ 
		color: 0x0000ff,
		//ambient: 0xff0000,
		emissive: 0x5f0000,
		specular: 0xffffff,
		transparent: true,
		opacity: 0.9,
		metal: true
		
		
		//combine: THREE.AddOperation
	});

	app.materials['wireframe'] = new THREE.MeshBasicMaterial( { wireframe: true } );
	app.materials['checker'] = new THREE.MeshPhongMaterial({ map: floorTexture });
        app.materials['line'] =  new THREE.LineBasicMaterial( { color: 0x0000FF } );
	app.materials['isosphere'] = new THREE.MeshBasicMaterial({ 
		color: 0xb7ff00, 
		wireframe: true
	});

	app.materials['shadert'] = new THREE.ShaderMaterial({
		uniforms:	{
			vlightx: { type: "v3", value: new THREE.Vector3(0.5,2.2,1.0) },
			time: 	{ type: "f", value: 0 }
		},
		//attributes:	app.shadert_attribs,
		//blending:     THREE.MultiplyBlending,
		//depthTest:    true,
		transparent:  true,
		//wireframe: 	true,
		vertexShader:   document.getElementById( 'vertexShader' ).textContent,
		fragmentShader: document.getElementById( 'fragmentShader' ).textContent
	});


	app.materials['shaderX'] = new THREE.ShaderMaterial({
		uniforms: { 
			tExplosion: { // texture in slot 0, loaded with ImageUtils
				type: "t", 
				value: THREE.ImageUtils.loadTexture( 'explosioni.png' )
			},
			time: { // float initialized to 0
				type: "f", 
				value: 0.0 
			},
			weight: {
				type: "f",
				value: 10.0
			}
			
		},
		//wireframe: true,
		vertexShader: document.getElementById( 'vertexShaderFX' ).textContent,
		fragmentShader: document.getElementById( 'fragmentShaderFX' ).textContent
	});



	//console.log(app.materials.shadert.uniforms.vlightx.value);

	var floorGeometry = new THREE.PlaneGeometry(500, 500, 10, 10);
	var floor = new THREE.Mesh(floorGeometry, app.materials['checker']);
	//var floor = new THREE.Mesh(floorGeometry, app.materials['shadert']);

	floor.position.y = -4.2394;
	floor.rotation.x = -(Math.PI / 2);
	// Note the mesh is flagged to receive shadows
	floor.receiveShadow = app.shadow;
	// FLOOR
	//scene.add(floor);


	projector = new THREE.Projector();
	raycaster = new THREE.Raycaster();


	document.addEventListener( 'resize', onWindowResize, false );
	document.addEventListener( 'mousemove', onDocumentMouseMove, false );
	document.addEventListener( 'mousedown', onDocumentMouseDown, false );



	/*
        globals.composer = new THREE.EffectComposer( renderer );
        globals.composer.addPass( new THREE.RenderPass( scene, camera ) );


	var effectBloom = new THREE.BloomPass( 3.3 );
	effectBloom.renderToScreen = true;
	globals.composer.addPass( effectBloom );
	*/



	var renderModel = new THREE.RenderPass( scene, camera );
	var effectBloom = new THREE.BloomPass( 18.8, 25, 1.8, 512 );
	var effectCopy = new THREE.ShaderPass( THREE.CopyShader );

	//app.effectFXAA = new THREE.ShaderPass( THREE.FXAAShader );

	var width = window.innerWidth || 2;
	var height = window.innerHeight || 2;

	//app.effectFXAA.uniforms[ 'resolution' ].value.set( 1 / width, 1 / height );

	effectCopy.renderToScreen = true;

	globals.composer = new THREE.EffectComposer( renderer );

	globals.composer.addPass( renderModel );
	//globals.composer.addPass( app.effectFXAA );
	globals.composer.addPass( effectBloom );
	globals.composer.addPass( effectCopy );






	/*
	var effect = new THREE.ShaderPass( THREE.DotScreenShader );
	effect.uniforms[ 'scale' ].value = 4;
	effect.renderToScreen = true;
	globals.composer.addPass( effect );
	*/


	/*
	var effect = new THREE.ShaderPass( THREE.BloomPass );
	effect.uniforms[ 'strength' ].value = 1.3;
	effect.renderToScreen = true;
	globals.composer.addPass( effect );
	*/





	/*
        globals.composer = new THREE.EffectComposer( renderer );
        globals.composer.addPass( new THREE.RenderPass( scene, camera ) );


	var effect = new THREE.ShaderPass( THREE.DotScreenShader );
	effect.uniforms[ 'scale' ].value = 4;
	composer.addPass( effect );

	var effect = new THREE.ShaderPass( THREE.RGBShiftShader );
	effect.uniforms[ 'amount' ].value = 0.0015;
	effect.renderToScreen = true;
	composer.addPass( effect );
	*/



	

	// must enable shadows on the renderer 
	renderer.shadowMapEnabled = app.shadow;
	renderer.shadowMapSoft = false;



	// LIGHT

	var spotlight3 = new THREE.SpotLight(0xFFFFFFFF);
	spotlight3.position.set(0,80,0);
	spotlight3.shadowCameraVisible = false;
	spotlight3.shadowDarkness = 0.95;
	spotlight3.intensity = 0.9;
	spotlight3.exponent = 1.0;
	//spotlight3.angle = Math.PI/1;

	if( app.shadow ) {	
		spotlight3.castShadow = app.shadow;

		spotlight3.shadowMapWidth = 4096;
		spotlight3.shadowMapHeight = 4096;

		spotlight3.shadowCameraNear = 80;
		spotlight3.shadowCameraFar = 100;
		spotlight3.shadowCameraFov = 60;
	}





	var lightTarget = new THREE.Object3D();
	lightTarget.position.set(0,2,0);
	spotlight3.target = lightTarget;

	scene.add(lightTarget);
	scene.add(spotlight3);

        var line_geometry = new THREE.Geometry();


	/*
	var mesh = new THREE.Mesh( 
		new THREE.IcosahedronGeometry( 20, 5 ), 
		//app.materials['isosphere']
		app.materials['shaderX']
	);
	scene.add( mesh );
	*/

	var meshx = new THREE.Mesh( 
		new THREE.IcosahedronGeometry( 0.1, 3 ), 
		app.materials['shadert']
	);
	//meshx.position.set(0,0,0);
	scene.add( meshx );

	/*
	app.moon = new THREE.Mesh( 
		new THREE.IcosahedronGeometry( 2, 5 ), 
		app.materials.sphere
	);
	app.moon.position.set( 10.0, 10.0, 10.0 );
	scene.add(app.moon);
	*/


	for( var o1 = 0; o1 < 224; o1++ ) {

		var node = new THREE.Object3D();

		var per_ring = 16;
		var ro = ( 2 * Math.PI ) / per_ring;
		var r = 5 * parseInt((o1+per_ring)/per_ring);

		node.sphere = new THREE.Mesh(  new THREE.SphereGeometry( 0.2, 10, 10 ), app.materials['sphere'] );
		node.sphere.castShadow = app.shadow;
		node.sphere.position.set(0,0,0);
		node.add( node.sphere );


		var o = new Object();
		o.x = Math.cos( (o1%per_ring) * ro ) * r;
		o.y = 0;
		o.z = Math.sin( (o1%per_ring) * ro ) * r;
		//cLog("RO:"+ro+" R:"+r+" X:"+o.x+" Y:"+o.y+" Z:"+o.z+" o1%per_ring:"+(o1%per_ring));

		node.position.set( o.x, o.y, o.z );

		//if( (o1 % per_ring) != 1 && (o1 % per_ring) != per_ring ) 
		line_geometry.vertices.push( new THREE.Vector3( o.x, o.y, o.z ) );

		//if( (o1 % per_ring) == 0 ) scene.add( new THREE.Line( new THREE.CircleGeometryZ( r, per_ring ), app.materials.shadert ) );	


		scene.add( node );

	}

	//scene.add( new THREE.Line( line_geometry, line_material ) );
	//scene.add( new THREE.Line( line_geometry, app.materials['sphere'] ) );
	//scene.add( new THREE.Line( line_geometry, app.materials['shaderX'] ) );
	scene.add( new THREE.Line( line_geometry, app.materials['shadert'] ) );



	/*
	var web_object = new THREE.Line( line_geometry, shaderMaterial );
	var vertices = web_object.geometry.vertices;
	var displacement = app.attributes.displacement.value;
	var color = app.attributes.customColor.value;

	for( var v = 0; v < vertices.length; v ++ ) {

		displacement[ v ] = new THREE.Vector3();

		color[ v ] = new THREE.Color( 0xffffff );
		//color[ v ].setHSL( v / vertices.length, 0.5, 0.5 );
		color[ v ].setHSL( v / vertices.length, 1.0, 1.0 );
	}

	scene.add( web_object );
	*/


}








function animate() {

	TWEEN.update();	

	requestAnimationFrame( animate );
	update();
	render();		
	if( globals.composer != undefined ) {
		globals.composer.render();		
	}
}




function update() {

	var isXpressed = keyboard.pressed("x");
	var isRpressed = keyboard.pressed("r");
	var isCpressed = keyboard.pressed("c");
	var isYpressed = keyboard.pressed("y");
	var isESCpressed = keyboard.pressed("escape");

	if( isCpressed ) {
		ootput.innerHTML = "";
		realminfo.innerHTML = "";
	}


	if( isESCpressed ) {
		flyTo( scene.position );
	
	}

	

	if( controls ) {
		controls.update();
	}
	//stats.update();
}


function render() {
	//var cube = scene.getObjectByName("Cube");
	//cube.rotation.y = timer * 5;
	
	//var delta = (Date.now() - app.start) * 0.0009;

	var timer = Date.now() * 0.0001;
	if( last_update == null || last_update == 0 ) {
		last_update = timer;
	}


	//app.moon.position.set( Math.cos( delta ) * 20, 0, Math.sin( delta ) * 20);
	//app.materials.shadert.uniforms.vlightx.value.set( Math.cos( delta ) * 20, 6, Math.sin( delta ) * 20);

	//app.materials['shaderX'].uniforms[ 'time' ].value = .00025 * ( Date.now() - app.start );
	//app.materials['shadert'].uniforms[ 'time' ].value = .00025 * ( Date.now() - app.start );
	app.materials['shadert'].uniforms[ 'time' ].value = .00002 * ( Date.now() - app.start );

	//var delta = clock.getDelta();
	//var time = Date.now() * 0.0005;


	renderer.render( scene, camera );





}

init();
animate();



</script>


</body>
</html>
