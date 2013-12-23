<!doctype html>
<html lang="en">
	<head>
		<title>Perlin noise | Vertex displacement + texture + radial blur + screen blending composite</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<style>
	*{ box-sizing: border-box; margin: 0; padding: 0 }
	body {
		color: #ffffff;
		font-family: tahoma;
		font-size:13px;
		background-color: #222;
		margin: 0px;
		overflow: hidden;
	}
	p{ position: absolute; left: 10px; top: 10px; opacity: .5; line-height: 1.4em }
	p:hover{ opacity: 1 }
	a{ color: white; text-shadow: 0 1px 0 rgba( 0,0,0,.5 ) }
</style>
<?php
	$VERSION = 59;




?>
</head>
	<body>

		<div id="container"></div>

<script src="js/Three.js"></script>
<script src="js/Detector.js"></script>

<script type="x-shader/x-vertex" id="vertexShader">
		
	varying vec2 vUv;

	void main() {

		vUv = uv;
		gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );

	}
	
</script>

<script type="x-shader/x-vertex" id="noiseVertexShader">
<?php echo file_get_contents("glsl/classicnoise3D.glsl"); ?>	

varying vec2 vUv;
varying vec3 vNormal;
varying vec3 vReflect;
varying float ao;
uniform float time;
uniform float weight;

void main() {

	vUv = uv;
	float f = 10.0 * pnoise( normal + time, vec3( 10.0 ) );
	vNormal = normal;
	vec4 pos = vec4( position + f * normal, 1.0 );
	gl_Position = projectionMatrix * modelViewMatrix * pos;

}

</script>
	
<script type="x-shader/x-vertex" id="fs_ZoomBlur">

varying vec2 vUv;
uniform sampler2D tDiffuse;
uniform vec2 resolution;
uniform float strength;

float random(vec3 scale,float seed){return fract(sin(dot(gl_FragCoord.xyz+seed,scale))*43758.5453+seed);}

void main() {

	vec2 center = .5 * resolution;
	
	vec4 color=vec4(0.0);
	float total=0.0;
	vec2 toCenter=center-vUv*resolution;
	float offset=random(vec3(12.9898,78.233,151.7182),0.0);
	for(float t=0.0;t<=40.0;t++){
		float percent=(t+offset)/40.0;
		float weight=4.0*(percent-percent*percent);
		vec4 sample=texture2D(tDiffuse,vUv+toCenter*percent*strength/resolution);
		sample.rgb*=sample.a;
		color+=sample*weight;
		total+=weight;
	}
	
	gl_FragColor=color/total;
	gl_FragColor.rgb/=gl_FragColor.a+0.00001;
	
}

</script>

<script type="x-shader/x-vertex" id="fragmentShader">

<?php echo file_get_contents("glsl/classicnoise3D.glsl"); ?>	

varying vec2 vUv;
varying vec3 vNormal;
varying vec3 vReflect;
varying float ao;
uniform sampler2D tShine;
uniform float time;

float PI = 3.14159265358979323846264;

void main() {
	
	float r = ( pnoise( .75 * ( vNormal + time ), vec3( 10.0 ) ) );
	float g = ( pnoise( .8 * ( vNormal + time ), vec3( 10.0 ) ) );
	float b = ( pnoise( .9 * ( vNormal + time ), vec3( 10.0 ) ) );
	
	float n = pnoise( 1.5 * ( vNormal + time ), vec3( 10.0 ) );
	n = pow( .001, n );

	//float n = 10.0 * pnoise( 5.0 * ( vNormal + time ), vec3( 10.0 ) ) * pnoise( .5 * ( vNormal + time ), vec3( 10.0 ) );

	//n += .5 * pnoise( 4.0 * vNormal, vec3( 10.0 ) );
	vec3 color = vec3( r + n, g + n, b + n );
	gl_FragColor = vec4( color, 1.0 );

}

</script>
	
<script type="x-shader/x-vertex" id="fs_Composite">

varying vec2 vUv;
uniform sampler2D tBase;
uniform sampler2D tGlow;

void main() {

	
	//Screen: X = 1- ((255-U)*(255-L))/255

	vec4 color = 1.0 - ( ( 1.0 - texture2D( tGlow, vec2( vUv.x, 1.0 - vUv.y ) ) ) * ( 1.0 - texture2D( tBase, vUv ) ) );

	//vec4 color = mix( texture2D( tBase, vUv ), texture2D( tGlow, vec2( vUv.x, 1.0 - vUv.y ) ), .5 );
	//vec4 color = texture2D( tBase, vUv ) + texture2D( tGlow, vUv ) * texture2D( tGlow, vUv );
	//vec4 color = texture2D( tGlow, vUv );
	
	gl_FragColor = vec4( color.rgb, 1.0 );
	//vec3 colorx = vec3( 1.0, 1.0, 1.0 );
	//gl_FragColor = vec4( colorx.rgb, 1.0 );

}

</script>

	
<script>

var projector, container, renderer, scene, camera, mesh, quad, fov = 45;
var start = Date.now();
var zoomBlurShader, compositeShader;
var baseTexture, glowTexture, material;
var orthoCamera, orthoScene;


window.addEventListener( 'load', init );

function init() {

	container = document.getElementById( 'container' );
	

	//console.debug("Width: "+window.innerWidth+"Height: "+window.innerHeight);

	scene = new THREE.Scene();

	camera = new THREE.PerspectiveCamera( fov, window.innerWidth / window.innerHeight, 1, 10000 );
	camera.position.z = 100;
	camera.target = new THREE.Vector3( 0, 0, 0 );

	scene.add( camera );
	
	material = new THREE.ShaderMaterial( {

		uniforms: { 
			time: { type: "f", value: 0 },
			weight: { type: "f", value: 0 }
		},
		vertexShader: document.getElementById( 'noiseVertexShader' ).textContent,
		fragmentShader: document.getElementById( 'fragmentShader' ).textContent
		
	} );
	
	mesh = new THREE.Mesh( new THREE.IcosahedronGeometry( 20, 5 ), material );
	scene.add( mesh );
	
	renderer = new THREE.WebGLRenderer();
	renderer.setSize( window.innerWidth, window.innerHeight );
	renderer.autoClear = false;

	container.appendChild( renderer.domElement );

	container.addEventListener( 'mousedown', onMouseDown, false );
	container.addEventListener( 'mousemove', onMouseMove, false );
	container.addEventListener( 'mouseup', onMouseUp, false );
	container.addEventListener( 'mousewheel', onMouseWheel, false );
	container.addEventListener( 'DOMMouseScroll', onMouseWheel, false);
	window.addEventListener( 'resize', onWindowResize, false );
	
	orthoScene = new THREE.Scene();
	orthoCamera = new THREE.OrthographicCamera( window.innerWidth / - 2, window.innerWidth / 2, window.innerHeight / 2, window.innerHeight / - 2, -10000, 10000 );
	orthoScene.add( orthoCamera );
	
	baseTexture = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { 
		minFilter: THREE.LinearFilter, 
		magFilter: THREE.LinearFilter, 
		format: THREE.RGBFormat 
	} );
	
	glowTexture = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { 
		minFilter: THREE.LinearFilter, 
		magFilter: THREE.LinearFilter, 
		format: THREE.RGBFormat 
	} );
	
	zoomBlurShader = new THREE.ShaderMaterial( {

		uniforms: { 
			tDiffuse: { type: "t", value: glowTexture },
			resolution: { type: "v2", value: new THREE.Vector2( window.innerWidth, window.innerHeight ) },
			strength: { type: "f", value: .75 }
		},
		vertexShader: document.getElementById( 'vertexShader' ).textContent,
		fragmentShader: document.getElementById( 'fs_ZoomBlur' ).textContent,
		
		depthWrite: false,
		
	} );
	
	compositeShader = new THREE.ShaderMaterial( {

		uniforms: { 
			tBase: { type: "t", value: baseTexture },
			tGlow: { type: "t", value: glowTexture }
		},
		vertexShader: document.getElementById( 'vertexShader' ).textContent,
		fragmentShader: document.getElementById( 'fs_Composite' ).textContent,
		depthWrite: false
		
	} );
	
	//quad = new THREE.Mesh( new THREE.PlaneGeometry( 1, 1 ), zoomBlurShader );
	//quad = new THREE.Mesh( new THREE.PlaneGeometry( 1, window.innerHeight, 1, 1 ), zoomBlurShader );
	quad = new THREE.Mesh( new THREE.PlaneGeometry( window.innerWidth, window.innerHeight, 1, 1 ), zoomBlurShader );
	quad.position.set(0, 0, -100);
	orthoScene.add( quad );

	projector = new THREE.Projector();
	onWindowResize();


	//console.debug("REVISION: "+ THREE.REVISION );

	
	render();
	
}

var onMouseDownMouseX = 0, onMouseDownMouseY = 0,
lon = 0, onMouseDownLon = 0,
lat = 0, onMouseDownLat = 0,
phi = 0, theta = 0;
lat = 15, isUserInteracting = false;

function onMouseWheel( event ) {

	// WebKit

	if ( event.wheelDeltaY ) {

		fov -= event.wheelDeltaY * 0.01;

	// Opera / Explorer 9

	} else if ( event.wheelDelta ) {

		fov -= event.wheelDelta * 0.05;

	// Firefox

	} else if ( event.detail ) {

		fov += event.detail * 1.0;

	}

	camera.projectionMatrix.makePerspective( fov, window.innerWidth / window.innerHeight, 1, 1100 );
	
}

function onWindowResize() {




	renderer.setSize( window.innerWidth, window.innerHeight );


        //camera.aspect = window.innerWidth / window.innerHeight;
        //camera.updateProjectionMatrix();



	camera.projectionMatrix.makePerspective( fov, window.innerWidth / window.innerHeight, 1, 1100 );
	zoomBlurShader.uniforms[ 'resolution' ].value = new THREE.Vector2( window.innerWidth, window.innerHeight );
	
	orthoCamera.projectionMatrix.makeOrthographic( window.innerWidth / - 2, window.innerWidth / 2, window.innerHeight / 2, window.innerHeight / - 2, -10000, 10000 );
	
	baseTexture = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { 
		minFilter: THREE.LinearFilter, 
		magFilter: THREE.LinearFilter, 
		format: THREE.RGBFormat 
	} );
	
	glowTexture = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { 
		minFilter: THREE.LinearFilter, 
		magFilter: THREE.LinearFilter, 
		format: THREE.RGBFormat 
	} );
	


	//quad = new THREE.Mesh( new THREE.PlaneGeometry( 1, window.innerHeight, 1, 1 ), zoomBlurShader );
	//quad.position.set(0, 0, -100);
	//orthoScene.add( quad );
	//quad.geometry = new THREE.PlaneGeometry( window.innerWidth, window.innerHeight, 1, 1 );
	/*
	console.debug( quad.geometry );
	console.debug( quad.geometry.vertices );
	quad.geometry.width = innerWidth;
	quad.geometry.height = innerHeight;
	quad.geometry.verticesNeedUpdate = true;
	quad.geometry.computeBoundingBox();
	quad.geometry.computeFaceNormals();
	quad.geometry.computeVertexNormals();
	*/

	//quad.setGeometry( new THREE.PlaneGeometry( window.innerWidth, window.innerHeight, 1, 1 ) );



	//quad.scale.x = window.innerWidth;
	//quad.scale.z = window.innerWidth / window.innerHeight;
	//quad.scale.y = window.innerHeight;
	//quad.scale.z = window.innerHeight;

	
}

function onMouseDown( event ) {

	event.preventDefault();

	isUserInteracting = true;

	onPointerDownPointerX = event.clientX;
	onPointerDownPointerY = event.clientY;

	onPointerDownLon = lon;
	onPointerDownLat = lat;
	
	return;
	var vector = new THREE.Vector3( mouse.x, mouse.y, 1 );
	projector.unprojectVector( vector, camera );

	var ray = new THREE.Ray( camera.position, vector.subSelf( camera.position ).normalize() );

	var intersects = ray.intersectObjects( scene.children );

	if ( intersects.length > 0 ) {

			console.log( intersects[ 0 ] );

	}

}

var mouse = { x: 0, y: 0 }
var projector;

function onMouseMove( event ) {

	if ( isUserInteracting ) {
	
		lon = ( event.clientX - onPointerDownPointerX ) * 0.1 + onPointerDownLon;
		lat = - ( event.clientY - onPointerDownPointerY ) * 0.1 + onPointerDownLat;
		
	}
	
	mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
	mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
	//zoomBlurShader.uniforms[ 'strength' ].value = .75;//e.pageX / window.innerWidth;
	
}

function onMouseUp( event ) {
	
	isUserInteracting = false;
	
}

var start = Date.now();

function render() {

	material.uniforms[ 'time' ].value = .00025 * ( Date.now() - start );
	material.uniforms[ 'weight' ].value = 10.0 * ( .5 + .5 * Math.sin( .00025 * ( Date.now() - start ) ) );
	//material.uniforms[ 'weight' ].value = 10.0;

	lat = Math.max( - 85, Math.min( 85, lat ) );
	phi = ( 90 - lat ) * Math.PI / 180;
	theta = lon * Math.PI / 180;

	camera.position.x = 100 * Math.sin( phi ) * Math.cos( theta );
	camera.position.y = 100 * Math.cos( phi );
	camera.position.z = 100 * Math.sin( phi ) * Math.sin( theta );

	camera.lookAt( scene.position );

	renderer.render( scene, camera, baseTexture, true );
	quad.material = zoomBlurShader;
	quad.material.uniforms[ 'tDiffuse' ].value = baseTexture;

	renderer.render( orthoScene, orthoCamera, glowTexture, false );
	
	quad.material = compositeShader;
	quad.material.uniforms[ 'tBase' ].value = baseTexture;
	quad.material.uniforms[ 'tGlow' ].value = glowTexture;

	renderer.render( orthoScene, orthoCamera );

	//renderer.render( scene, camera );
	
	requestAnimationFrame( render );
	
		
}

</script>

<script type="text/javascript">/* CloudFlare analytics upgrade */
</script>

	</body>
</html>
