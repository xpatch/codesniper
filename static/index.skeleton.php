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
<script src="js/shaders/FXAAShader.js"></script>
-->



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
<script>

// standard global variables
//var container, scene, camera, renderer, controls, stats, composer, object;
var container, scene, camera, renderer, controls, stats, projector, composer, raycaster, loader;
var radial_offset_totals = new Array();

var lights, numLights;
var keyboard = new THREEx.KeyboardState();
var clock = new THREE.Clock();
var rendererCSS;


var ootput, realminfo;

var mouse = new THREE.Vector2(), INTERSECTED;
var camera_dest = new THREE.Vector3();
var floorMaterial;

// custom global variables
var last_update, message;
var globals = new Object();
var app = new Object();

app.hosts = new Object();
app.materials = new Array();
app.flying = 0;
app.console_timer = null;




globals.width = window.innerWidth || 2;
globals.height = window.innerHeight || 2;
globals.halfWidth = globals.width / 2;
globals.halfHeight = globals.height / 2;

globals.find_intersections = true;

globals.debug_registrations = false;


var offset = new THREE.Vector3(), INTERSECTED, SELECTED;




materials = [];
lights = [];

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





function initLights() {
	
	////////////
	// CUSTOM //
	////////////

	// must enable shadows on the renderer 
	renderer.shadowMapEnabled = true;

	
	// spotlight #3
	var spotlight3 = new THREE.SpotLight(0xFFFFFFFF);
	spotlight3.position.set(0,80,0);
	//spotlight3.shadowCameraVisible = true;
	spotlight3.shadowDarkness = 0.95;
	spotlight3.intensity = 1;
	//spotlight3.distance = 36.0;
	//spotlight3.angle = Math.PI/16;
	spotlight3.castShadow = true;
	scene.add(spotlight3);
	// change the direction this spotlight is facing
	var lightTarget = new THREE.Object3D();
	lightTarget.position.set(0,0,0);
	scene.add(lightTarget);
	spotlight3.target = lightTarget;






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
	camera.position.set(-5,5,-5);
	camera.lookAt(scene.position);	
	

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
	renderer = new THREE.WebGLRenderer( { antialias: true, brightness: 2 } );
	renderer.setSize(globals.width, globals.height);
	//renderer.setClearColor( 0x000000, 1 );
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

	/*
	controls = new THREE.TrackballControls( camera );

	controls.rotateSpeed = 1.0;
	controls.zoomSpeed = 1.2;
	controls.panSpeed = 0.8;
	controls.noZoom = false;
	controls.noPan = false;
	controls.staticMoving = true;
	controls.dynamicDampingFactor = 0.3;
	*/



	// STATS
	stats = new Stats();
	stats.domElement.style.position = 'absolute';
	stats.domElement.style.bottom = '0px';
	stats.domElement.style.zIndex = 100;


	materials['account'] = new THREE.MeshPhongMaterial({ 
		color: 0xffffff, 
		ambient: 0xff0000,
		emissive: 0x0000ff,
		opacity: 0.95, 
		transparent: true 
		//emissive: 0xc8c8c8 
		//emissive: 0xffffff
	});


	materials['account_active'] = new THREE.MeshPhongMaterial({ 
		color: 0x00d8ff, 
		ambient: 0x000000,
		emissive: 0xc8c8c8 
	});



	/*
	materials['device'] = new THREE.MeshPhongMaterial({ 
		color: 0xffffff, 
		ambient: 0xff0000,
		emissive: 0x0000ff,
		opacity: 0.95, 
		transparent: true, 
	});
	*/

	materials['device'] = new THREE.MeshBasicMaterial({ 
		color: 0x0000ff,
		emissive: 0x00007f
	});

	materials['device_active'] = new THREE.MeshBasicMaterial({ 
		color: 0xff00ff,
		emissive: 0x7f007f
	});

	materials['device_offline'] = new THREE.MeshBasicMaterial({ 
		color: 0x383838
	});

	materials['device_ring'] = new THREE.MeshBasicMaterial({ 
		color: 0x00d8ff, 
		ambient: 0x000000, 
		emissive: 0xc8c8c8
	});


	


		// floor: mesh to receive shadows
		var floorTexture = new THREE.ImageUtils.loadTexture( 'dpscene/checkerboard.jpg' );
		floorTexture.wrapS = floorTexture.wrapT = THREE.RepeatWrapping; 
		floorTexture.anisotropy = 16;
		floorTexture.repeat.set( 80, 80 );
		var floorMaterial = new THREE.MeshPhongMaterial( { map: floorTexture, side: THREE.DoubleSide } );

		var floorGeometry = new THREE.PlaneGeometry(1000, 1000, 10, 10);
		var floor = new THREE.Mesh(floorGeometry, floorMaterial);




		floor.position.y = -4.8927349827394;
		floor.rotation.x = -(Math.PI / 2);
		// Note the mesh is flagged to receive shadows
		//floor.receiveShadow = true;
		scene.add(floor);


	projector = new THREE.Projector();
	raycaster = new THREE.Raycaster();


	document.addEventListener( 'resize', onWindowResize, false );
	document.addEventListener( 'mousemove', onDocumentMouseMove, false );
	document.addEventListener( 'mousedown', onDocumentMouseDown, false );
	//renderer.domElement.addEventListener( 'mousemove', onDocumentMouseMove, false );
	//renderer.domElement.addEventListener( 'mousedown', onDocumentMouseDown, false );
	//renderer.domElement.addEventListener( 'mouseup', onDocumentMouseUp, false );


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

	/*
        var canvas1 = document.createElement('canvas');
        var context1 = canvas1.getContext('2d');
        context1.font = "Bold 38pt Arial";
        //context1.fillStyle = "rgba(255,255,255,0.95)";
        context1.fillStyle = "rgba(255,255,255,1)";
	//widthxheight
	context1.fillText('nmap 3d', 0, 50);
    
        // canvas contents will be used for a texture
        var texture1 = new THREE.Texture(canvas1) 
        texture1.needsUpdate = true;
      
	var material1 = new THREE.MeshBasicMaterial( {map: texture1, side:THREE.DoubleSide } );
	material1.transparent = true;

	var mesh1 = new THREE.Mesh( new THREE.PlaneGeometry(canvas1.width/8, canvas1.height/8), material1 );
        mesh1.position.set(0,-5,0);
        scene.add( mesh1 );
	*/

	
	initLights();
       


}








function animate() {

	TWEEN.update();	

	requestAnimationFrame( animate );
	update();
	render();		
	if( globals.composer != undefined ) {
		composer.render();		
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
	


	var timer = Date.now() * 0.0001;
	if( last_update == null || last_update == 0 ) {
		last_update = timer;
	}


	//var delta = clock.getDelta();
	//var time = Date.now() * 0.0005;


	renderer.render( scene, camera );





}

init();
animate();



</script>


</body>
</html>
