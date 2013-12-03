
var PATCH = PATCH || { REVISION: '01' };

if( PATCH.images == undefined ) PATCH.images = new Array();
if( PATCH.materials == undefined ) PATCH.materials = new Array();


PATCH.img_path = 'images/textures/';

PATCH.images['checker'] = new THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'checkerboard.bmp', 2 );
PATCH.images['checker'].anisotropy = 16;
/*
PATCH.images['lava_diffuse'] = new THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'lava1/diffuse.bmp', 6 );
PATCH.images['lava_bump'] = new THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'lava1/bump.bmp', 6 );
PATCH.images['lava_normal'] = new THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'lava1/normal.bmp', 6 );
PATCH.images['lava_specular'] = new THREE.ImageUtils.loadTexture( PATCH.img_path+'lava1/specular.bmp', 6 );
PATCH.images['lava_ao'] = new THREE.ImageUtils.loadTexture( PATCH.img_path+'lava1/ao.bmp' );
PATCH.images['lava_ro'] = new THREE.ImageUtils.loadTexture( PATCH.img_path+'lava1/ro.bmp' );
*/

PATCH.images['lava_tile'] = new THREE.ImageUtils.loadTexture( PATCH.img_path+"lava/lavatile.jpg"  );
PATCH.images['cloud'] = new THREE.ImageUtils.loadTexture( PATCH.img_path+"lava/cloud.png"  );
PATCH.images['explosioni'] = new THREE.ImageUtils.loadTexture( PATCH.img_path+'explosioni.png' );




PATCH.ShaderChunk = {
	cnoise_3d: [
		"vec3 mod289(vec3 x)",
		"{",
		"  return x - floor(x * (1.0 / 289.0)) * 289.0;",
		"}",
		"vec4 mod289(vec4 x)",
		"{",
		"  return x - floor(x * (1.0 / 289.0)) * 289.0;",
		"}",
		"vec4 permute(vec4 x)",
		"{",
		"  return mod289(((x*34.0)+1.0)*x);",
		"}",
		"vec4 taylorInvSqrt(vec4 r)",
		"{",
		"  return 1.79284291400159 - 0.85373472095314 * r;",
		"}",
		"vec3 fade(vec3 t) {",
		"  return t*t*t*(t*(t*6.0-15.0)+10.0);",
		"}",
		"float cnoise(vec3 P)",
		"{",
		"  vec3 Pi0 = floor(P); // Integer part for indexing",
		"  vec3 Pi1 = Pi0 + vec3(1.0); // Integer part + 1",
		"  Pi0 = mod289(Pi0);",
		"  Pi1 = mod289(Pi1);",
		"  vec3 Pf0 = fract(P); // Fractional part for interpolation",
		"  vec3 Pf1 = Pf0 - vec3(1.0); // Fractional part - 1.0",
		"  vec4 ix = vec4(Pi0.x, Pi1.x, Pi0.x, Pi1.x);",
		"  vec4 iy = vec4(Pi0.yy, Pi1.yy);",
		"  vec4 iz0 = Pi0.zzzz;",
		"  vec4 iz1 = Pi1.zzzz;",
		"  vec4 ixy = permute(permute(ix) + iy);",
		"  vec4 ixy0 = permute(ixy + iz0);",
		"  vec4 ixy1 = permute(ixy + iz1);",
		"  vec4 gx0 = ixy0 * (1.0 / 7.0);",
		"  vec4 gy0 = fract(floor(gx0) * (1.0 / 7.0)) - 0.5;",
		"  gx0 = fract(gx0);",
		"  vec4 gz0 = vec4(0.5) - abs(gx0) - abs(gy0);",
		"  vec4 sz0 = step(gz0, vec4(0.0));",
		"  gx0 -= sz0 * (step(0.0, gx0) - 0.5);",
		"  gy0 -= sz0 * (step(0.0, gy0) - 0.5);",
		"  vec4 gx1 = ixy1 * (1.0 / 7.0);",
		"  vec4 gy1 = fract(floor(gx1) * (1.0 / 7.0)) - 0.5;",
		"  gx1 = fract(gx1);",
		"  vec4 gz1 = vec4(0.5) - abs(gx1) - abs(gy1);",
		"  vec4 sz1 = step(gz1, vec4(0.0));",
		"  gx1 -= sz1 * (step(0.0, gx1) - 0.5);",
		"  gy1 -= sz1 * (step(0.0, gy1) - 0.5);",
		"  vec3 g000 = vec3(gx0.x,gy0.x,gz0.x);",
		"  vec3 g100 = vec3(gx0.y,gy0.y,gz0.y);",
		"  vec3 g010 = vec3(gx0.z,gy0.z,gz0.z);",
		"  vec3 g110 = vec3(gx0.w,gy0.w,gz0.w);",
		"  vec3 g001 = vec3(gx1.x,gy1.x,gz1.x);",
		"  vec3 g101 = vec3(gx1.y,gy1.y,gz1.y);",
		"  vec3 g011 = vec3(gx1.z,gy1.z,gz1.z);",
		"  vec3 g111 = vec3(gx1.w,gy1.w,gz1.w);",
		"  vec4 norm0 = taylorInvSqrt(vec4(dot(g000, g000), dot(g010, g010), dot(g100, g100), dot(g110, g110)));",
		"  g000 *= norm0.x;",
		"  g010 *= norm0.y;",
		"  g100 *= norm0.z;",
		"  g110 *= norm0.w;",
		"  vec4 norm1 = taylorInvSqrt(vec4(dot(g001, g001), dot(g011, g011), dot(g101, g101), dot(g111, g111)));",
		"  g001 *= norm1.x;",
		"  g011 *= norm1.y;",
		"  g101 *= norm1.z;",
		"  g111 *= norm1.w;",
		"  float n000 = dot(g000, Pf0);",
		"  float n100 = dot(g100, vec3(Pf1.x, Pf0.yz));",
		"  float n010 = dot(g010, vec3(Pf0.x, Pf1.y, Pf0.z));",
		"  float n110 = dot(g110, vec3(Pf1.xy, Pf0.z));",
		"  float n001 = dot(g001, vec3(Pf0.xy, Pf1.z));",
		"  float n101 = dot(g101, vec3(Pf1.x, Pf0.y, Pf1.z));",
		"  float n011 = dot(g011, vec3(Pf0.x, Pf1.yz));",
		"  float n111 = dot(g111, Pf1);",
		"  vec3 fade_xyz = fade(Pf0);",
		"  vec4 n_z = mix(vec4(n000, n100, n010, n110), vec4(n001, n101, n011, n111), fade_xyz.z);",
		"  vec2 n_yz = mix(n_z.xy, n_z.zw, fade_xyz.y);",
		"  float n_xyz = mix(n_yz.x, n_yz.y, fade_xyz.x); ",
		"  return 2.2 * n_xyz;",
		"}",
		"float pnoise(vec3 P, vec3 rep)",
		"{",
		"  vec3 Pi0 = mod(floor(P), rep); // Integer part, modulo period",
		"  vec3 Pi1 = mod(Pi0 + vec3(1.0), rep); // Integer part + 1, mod period",
		"  Pi0 = mod289(Pi0);",
		"  Pi1 = mod289(Pi1);",
		"  vec3 Pf0 = fract(P); // Fractional part for interpolation",
		"  vec3 Pf1 = Pf0 - vec3(1.0); // Fractional part - 1.0",
		"  vec4 ix = vec4(Pi0.x, Pi1.x, Pi0.x, Pi1.x);",
		"  vec4 iy = vec4(Pi0.yy, Pi1.yy);",
		"  vec4 iz0 = Pi0.zzzz;",
		"  vec4 iz1 = Pi1.zzzz;",
		"  vec4 ixy = permute(permute(ix) + iy);",
		"  vec4 ixy0 = permute(ixy + iz0);",
		"  vec4 ixy1 = permute(ixy + iz1);",
		"  vec4 gx0 = ixy0 * (1.0 / 7.0);",
		"  vec4 gy0 = fract(floor(gx0) * (1.0 / 7.0)) - 0.5;",
		"  gx0 = fract(gx0);",
		"  vec4 gz0 = vec4(0.5) - abs(gx0) - abs(gy0);",
		"  vec4 sz0 = step(gz0, vec4(0.0));",
		"  gx0 -= sz0 * (step(0.0, gx0) - 0.5);",
		"  gy0 -= sz0 * (step(0.0, gy0) - 0.5);",
		"  vec4 gx1 = ixy1 * (1.0 / 7.0);",
		"  vec4 gy1 = fract(floor(gx1) * (1.0 / 7.0)) - 0.5;",
		"  gx1 = fract(gx1);",
		"  vec4 gz1 = vec4(0.5) - abs(gx1) - abs(gy1);",
		"  vec4 sz1 = step(gz1, vec4(0.0));",
		"  gx1 -= sz1 * (step(0.0, gx1) - 0.5);",
		"  gy1 -= sz1 * (step(0.0, gy1) - 0.5);",
		"  vec3 g000 = vec3(gx0.x,gy0.x,gz0.x);",
		"  vec3 g100 = vec3(gx0.y,gy0.y,gz0.y);",
		"  vec3 g010 = vec3(gx0.z,gy0.z,gz0.z);",
		"  vec3 g110 = vec3(gx0.w,gy0.w,gz0.w);",
		"  vec3 g001 = vec3(gx1.x,gy1.x,gz1.x);",
		"  vec3 g101 = vec3(gx1.y,gy1.y,gz1.y);",
		"  vec3 g011 = vec3(gx1.z,gy1.z,gz1.z);",
		"  vec3 g111 = vec3(gx1.w,gy1.w,gz1.w);",
		"  vec4 norm0 = taylorInvSqrt(vec4(dot(g000, g000), dot(g010, g010), dot(g100, g100), dot(g110, g110)));",
		"  g000 *= norm0.x;",
		"  g010 *= norm0.y;",
		"  g100 *= norm0.z;",
		"  g110 *= norm0.w;",
		"  vec4 norm1 = taylorInvSqrt(vec4(dot(g001, g001), dot(g011, g011), dot(g101, g101), dot(g111, g111)));",
		"  g001 *= norm1.x;",
		"  g011 *= norm1.y;",
		"  g101 *= norm1.z;",
		"  g111 *= norm1.w;",
		"  float n000 = dot(g000, Pf0);",
		"  float n100 = dot(g100, vec3(Pf1.x, Pf0.yz));",
		"  float n010 = dot(g010, vec3(Pf0.x, Pf1.y, Pf0.z));",
		"  float n110 = dot(g110, vec3(Pf1.xy, Pf0.z));",
		"  float n001 = dot(g001, vec3(Pf0.xy, Pf1.z));",
		"  float n101 = dot(g101, vec3(Pf1.x, Pf0.y, Pf1.z));",
		"  float n011 = dot(g011, vec3(Pf0.x, Pf1.yz));",
		"  float n111 = dot(g111, Pf1);",
		"  vec3 fade_xyz = fade(Pf0);",
		"  vec4 n_z = mix(vec4(n000, n100, n010, n110), vec4(n001, n101, n011, n111), fade_xyz.z);",
		"  vec2 n_yz = mix(n_z.xy, n_z.zw, fade_xyz.y);",
		"  float n_xyz = mix(n_yz.x, n_yz.y, fade_xyz.x); ",
		"  return 2.2 * n_xyz;",
		"}"



	].join("\n"),



	lava_pars_vertex: [
		"uniform vec2 uvScale;",
		"varying vec2 vUv;",
		"varying vec3 vNormal;"
	].join("\n"),

	lava_vertex: [
		"vUv = uvScale * uv;",
		"vNormal = normal;",
		"gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );"
	].join("\n"),
	lava_pars_fragment: [

		"uniform float time;",

		"uniform float fogDensity;",
		"uniform vec3 fogColor;",

		"uniform sampler2D texture1;",
		"uniform sampler2D texture2;",

		"varying vec2 vUv;"


	].join("\n"),
	lava_fragment: [
		"vec4 noise = texture2D( texture1, vUv );",
		"vec2 T1 = vUv + vec2( 1.5, -1.5 ) * time * 0.02;",
		"vec2 T2 = vUv + vec2( -0.5, 2.0 ) * time * 0.01;",

		"T1.x += noise.x * 2.0;",
		"T1.y += noise.y * 2.0;",
		"T2.x -= noise.y * 0.2;",
		"T2.y += noise.z * 0.2;",

		"float p = texture2D( texture1, T1 * 2.0 ).a;",

		"vec4 color = texture2D( texture2, T2 * 2.0 );",
		"vec4 temp = color * ( vec4( p, p, p, p ) * 2.0 ) + ( color * color - 0.1 );",

		"if( temp.r > 1.0 ){ temp.bg += clamp( temp.r - 2.0, 0.0, 100.0 ); }",
		"if( temp.g > 1.0 ){ temp.rb += temp.g - 1.0; }",
		"if( temp.b > 1.0 ){ temp.rg += temp.b - 1.0; }",

		"gl_FragColor = temp;"
	].join("\n"),

	glow_pars_vertex: [
		"uniform vec3 viewVector;",
		"uniform float c;",
		"uniform float p;",
		"varying float intensity;"
	].join("\n"),
	glow_vertex: [
		"vec3 vNormal = normalize( normalMatrix * normal );",
		"vec3 vNormel = normalize( normalMatrix * viewVector );",
		"intensity = pow( c - dot(vNormal, vNormel), p );",
		"gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );"
	].join("\n"),
	glow_pars_fragment: [
		"uniform vec3 glowColor;",
		"varying float intensity;"
	].join("\n"),
	glow_fragment: [
		"vec3 glow = glowColor * intensity;",
		"gl_FragColor = vec4( glow, 1.0 );"
	].join("\n"),

	matrix_pars_vertex: [
		"varying vec2 vUv;",
		"varying vec3 vNormal;"
	].join("\n"),
	matrix_vertex: [
		"vUv = uv;",
		"vNormal = normal;",
		"gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );"
	].join("\n"),
	matrix_pars_fragment: [
		"varying vec2 vUv;",
		"varying vec3 vNormal;",
		"uniform float time;",
		"uniform sampler2D tDiffuse;"
	].join("\n"),
	matrix_fragment: [
		"float c = cnoise( 28.234 * (vNormal + time)  );",
		"if( c <= 0.7 ) {",
			"vec3 color = vec3( 0 , 0, c );",
			"gl_FragColor = vec4( color, 1  );",
		"} else {",
			"vec3 color = vec3( 1 , 1, 1 );",
			"gl_FragColor = vec4( color, 1  );",
		"}"


	].join("\n"),
	explode_turbulence: [
		"float turbulence( vec3 p ) {",
		"    float w = 100.0;",
		"    float t = -.5;",
		"    for (float f = 1.0 ; f <= 10.0 ; f++ ){",
		"        float power = pow( 2.0, f );",
		"        t += abs( pnoise( vec3( power * p ), vec3( 10.0, 10.0, 10.0 ) ) / power );",
		"    }",
		"    return t;",
		"}"
	].join("\n"),
	explode_pars_vertex: [
		"varying vec2 vUv;",
		"varying float noise;",
		"varying float ao;",
		"uniform float time;",
		"uniform float weight;"
	].join("\n"),
	explode_vertex: [
		"        vUv = uv;",
		"        noise = 10.0 *  -.10 * turbulence( .5 * normal + time );",
		"        float displacement = - weight * noise;",
		"        displacement += 5.0 * pnoise( 0.05 * position + vec3( 2.0 * time ), vec3( 100.0 ) );",
		"        ao = noise;",
		"        vec3 newPosition = position + normal * vec3( displacement );",
		"        gl_Position = projectionMatrix * modelViewMatrix * vec4( newPosition, 1.0 );"

	
	].join("\n"),
	explode_pars_fragment: [
		"varying vec2 vUv;",
		"varying float noise;",
		"varying float ao;",
		"uniform sampler2D tExplosion;"
	].join("\n"),
	explode_random: [
		"float random( vec3 scale, float seed ){ return fract( sin( dot( gl_FragCoord.xyz + seed, scale ) ) * 43758.5453 + seed ) ; }"
	].join("\n"),
	explode_fragment: [
		"        vec3 color = texture2D( tExplosion, vec2( 0, 1.0 - 1.3 * ao + .01 * random(vec3(12.9898,78.233,151.7182),0.0) ) ).rgb;",
		"        gl_FragColor = vec4( color.rgb, 1.0 );"
	].join("\n")





};

PATCH.UniformsLib = {

	lava: {
		'fogDensity': 	{ type: "f", value: 0.45 },
		'fogColor': 	{ type: "v3", value: new THREE.Vector3( 0, 0, 0 ) },
		'time': 	{ type: "f", value: 1.0 },
		'uvScale': 	{ type: "v2", value: new THREE.Vector2( 1.0, 1.0 ) },
		'texture1': 	{ type: "t", value: PATCH.images['cloud'] },
		'texture2': 	{ type: "t", value: PATCH.images['lava_tile'] }
	},
	glow: {
		'c':   { type: "f", value: 1.0 },
		'p':   { type: "f", value: 1.4 },
		'glowColor': { type: "c", value: new THREE.Color(0xffffff) },
		'viewVector': { type: "v3", value: null }
	},
	matrix: {
		'time':   { type: "f", value: 1.0 }

	},
	explode: {
		'tExplosion': { type: "t", value: PATCH.images['explosioni'] },
		'time': { type: "f", value: 0.0 },
		'weight': { type: "f", value: 10.0 }
	}

};








PATCH.ShaderLib = {

	'lava': {
                uniforms: THREE.UniformsUtils.merge([
                        PATCH.UniformsLib[ "lava" ]
                ]),
		vertexShader: [
			PATCH.ShaderChunk["lava_pars_vertex"],
			"void main() {",
				PATCH.ShaderChunk["lava_vertex"],
			"}"
		].join("\n"),
		fragmentShader: [

			PATCH.ShaderChunk["lava_pars_fragment"],
			"void main() {",
				PATCH.ShaderChunk["lava_fragment"],
			"}"
			

		].join("\n")
		

	},
	'glow': {
                uniforms: THREE.UniformsUtils.merge([
                        PATCH.UniformsLib[ "glow" ]
                ]),
		vertexShader: [
			PATCH.ShaderChunk["glow_pars_vertex"],
			"void main() {",
				PATCH.ShaderChunk["glow_vertex"],
			"}"
		].join("\n"),
		fragmentShader: [

			PATCH.ShaderChunk["glow_pars_fragment"],
			"void main() {",
				PATCH.ShaderChunk["glow_fragment"],
			"}"
			

		].join("\n")
		

	},
	'matrix': {
                uniforms: THREE.UniformsUtils.merge([
                        PATCH.UniformsLib[ "matrix" ]
                ]),
		vertexShader: [
			PATCH.ShaderChunk["matrix_pars_vertex"],
			"void main() {",
				PATCH.ShaderChunk["matrix_vertex"],
			"}"
		].join("\n"),
		fragmentShader: [
			PATCH.ShaderChunk["cnoise_3d"],
			PATCH.ShaderChunk["matrix_pars_fragment"],
			"void main() {",
				PATCH.ShaderChunk["matrix_fragment"],
			"}"
		].join("\n")
	},
	'explode': {
                uniforms: THREE.UniformsUtils.merge([
                        PATCH.UniformsLib[ "explode" ]
                ]),
		vertexShader: [
			PATCH.ShaderChunk["cnoise_3d"],
			PATCH.ShaderChunk["explode_turbulence"],
			PATCH.ShaderChunk["explode_pars_vertex"],
			"void main() {",
				PATCH.ShaderChunk["explode_vertex"],
			"}"
		].join("\n"),
		fragmentShader: [
			PATCH.ShaderChunk["explode_pars_fragment"],
			PATCH.ShaderChunk["explode_random"],
			"void main() {",
				PATCH.ShaderChunk["explode_fragment"],
			"}"
		].join("\n")
	}






};




PATCH.materials['lava'] = new THREE.ShaderMaterial({
	uniforms: PATCH.UniformsLib['lava'],
	vertexShader: PATCH.ShaderLib['lava'].vertexShader,
	fragmentShader: PATCH.ShaderLib['lava'].fragmentShader
});

PATCH.materials['lava'].uniforms.texture1.value.wrapS = THREE.RepeatWrapping;
PATCH.materials['lava'].uniforms.texture1.value.wrapT = THREE.RepeatWrapping;
PATCH.materials['lava'].uniforms.texture2.value.wrapS = THREE.RepeatWrapping;
PATCH.materials['lava'].uniforms.texture2.value.wrapT = THREE.RepeatWrapping;



PATCH.materials['glow'] = new THREE.ShaderMaterial({
	uniforms: PATCH.UniformsLib['glow'],
	vertexShader: PATCH.ShaderLib['glow'].vertexShader,
	fragmentShader: PATCH.ShaderLib['glow'].fragmentShader,
	side: THREE.FrontSide,
	blending: THREE.AdditiveBlending,
	depthTest:    true,
	transparent: true
});


PATCH.materials['matrix'] = new THREE.ShaderMaterial({
	uniforms: PATCH.UniformsLib['matrix'],
	vertexShader: PATCH.ShaderLib['matrix'].vertexShader,
	fragmentShader: PATCH.ShaderLib['matrix'].fragmentShader,
	depthTest:    true,
	transparent:  true,
	wireframe:    true

});


PATCH.materials['explode'] = new THREE.ShaderMaterial({
	uniforms: PATCH.UniformsLib['explode'],
	vertexShader: PATCH.ShaderLib['explode'].vertexShader,
	fragmentShader: PATCH.ShaderLib['explode'].fragmentShader
});







/*

	

        PATCH.materials['test'] = new THREE.ShaderMaterial({
                uniforms:       {
                        //vlightx: { type: "v3", value: new THREE.Vector3(0.5,2.2,1.0) },
                        tDiffuse: { type: "t", value: PATCH.images['checker'] },
                        time:   { type: "f", value: 0 }
                },
                //attributes:   PATCH.shadert_attribs,
                //blending:     THREE.AdditiveBlending,
                //blending:     THREE.SubtractiveBlending,
                //blending:     THREE.MultiplyBlending,
                depthTest:    	true,
                transparent:  	true,
                //wireframe:      true,
		side: THREE.DoubleSide,
                vertexShader:   document.getElementById( 'vertexShaderTest' ).textContent,
                fragmentShader: document.getElementById( 'fragmentShaderTest' ).textContent
        });





        PATCH.materials['matrix'] = new THREE.ShaderMaterial({
                uniforms:       {
                        //vlightx: { type: "v3", value: new THREE.Vector3(0.5,2.2,1.0) },
                        time:   { type: "f", value: 0 }
                },
                //attributes:   PATCH.shadert_attribs,
                //blending:     THREE.MultiplyBlending,
                depthTest:    false,
                transparent:  true,
                wireframe:      true,
                vertexShader:   document.getElementById( 'vertexShaderMatrix' ).textContent,
                fragmentShader: document.getElementById( 'fragmentShaderMatrix' ).textContent
        });


        PATCH.materials['trixy'] = new THREE.ShaderMaterial({
                uniforms:       {
                        //vlightx: { type: "v3", value: new THREE.Vector3(0.5,2.2,1.0) },
                        time:   { type: "f", value: 0 }
                },
                //attributes:   PATCH.shadert_attribs,
                //blending:     THREE.MultiplyBlending,
                depthTest:    true,
                transparent:  true,
		wireframe: true,
                vertexShader:   document.getElementById( 'vertexShaderMatrix' ).textContent,
                fragmentShader: document.getElementById( 'fragmentShaderMatrix' ).textContent
        });

        PATCH.materials['shadertex'] = new THREE.ShaderMaterial({
                uniforms:       {
                        tDiffuse: { type: "t", value: PATCH.images['checker'] }
                },
                //attributes:   PATCH.shadert_attribs,
                //blending:     THREE.MultiplyBlending,
                //depthTest:    true,
                //transparent:  true,
                //wireframe:    true,
                vertexShader:   document.getElementById( 'vertexShader' ).textContent,
                fragmentShader: document.getElementById( 'fragmentShaderTexture' ).textContent
        });

	PATCH.materials['floor'] = new THREE.MeshPhongMaterial({ 
		map: PATCH.images['checker'],
		side: THREE.DoubleSide
	});

	PATCH.materials['floor2'] = new THREE.MeshPhongMaterial({ 
		map: PATCH.images['checker2'],
		specular: 0xffffff,
		//emissive: 0x404040,
		bumpMap: PATCH.images['checker2'],
		specularMap: PATCH.images['checker2'],
		//lightMap: PATCH.images['checker2'],
		//envMap: PATCH.images['checker2'],
		bumpScale: -1.5,
		metal: true,
		shininess: 10,
		//wireframe: true,
		side: THREE.DoubleSide 
	});

	PATCH.materials['lava'] = new THREE.MeshPhongMaterial({ 
		map: PATCH.images['lava_diffuse'],
		specular: 0xffffff,
		emissive: 0xf0f0f0,
		bumpMap: PATCH.images['lava_bump'],
		//specularMap: PATCH.images['lava_specular'],
		//normalMap: PATCH.images['lava_normal'],
		//lightMap: PATCH.images['lava_ao'],
		//envMap: PATCH.images['lava_ro'],
		//bumpScale: -9.5,
		//metal: true,
		shininess: 75,
		
		side: THREE.DoubleSide 
	});

	PATCH.materials['quadmat'] = new THREE.MeshPhongMaterial({
		color: 0x00ff00,
		emissive: 0xffffff,
		opacity: 0.2,
		transparent: true,
		wireframe: true,
		blending: THREE.SubtractiveBlending


	});



*/


