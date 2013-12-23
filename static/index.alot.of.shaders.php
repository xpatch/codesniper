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
<!--
<script src="js/renderers/WebGLDeferredRenderer.js"></script>
<script src="js/ShaderDeferred.js"></script>
-->



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



<script src="js/Detector.js"></script>


<script src="js/controls/HybridControls.js"></script>
<!--
<script src="js/libs/stats.min.js"></script>
<script src="js/controls/OrbitControls.js"></script>
<script src="js/controls/TrackballControls.js"></script>
<script src="js/controls/FlyControls.js"></script>
-->
<script src="js/THREEx.KeyboardState.js"></script>
<script src="js/THREEx.FullScreen.js"></script>

<script src="js/CSS3DRenderer.js"></script>

<script src="js/PATCH.js"></script>






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
 
void main() {
 

	gl_Position = vec4(position.x,position.y,0.0,1.0);
 
}       
</script>


<script type="x-shader/x-fragment" id="fragmentShaderSkeleton">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click






</script>




<script type="x-shader/x-fragment" id="fragmentShaderSineWaveOSC">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


float hash( float n )
{
    return fract(sin(n)*43745658.5453123);
}

float noise(vec2 pos)
{
	return fract( sin( dot(pos*0.001 ,vec2(24.12357, 36.789) ) ) * 12345.123);	
}

float noise(float r)
{
	return fract( sin( dot(vec2(r,-r)*0.001 ,vec2(24.12357, 36.789) ) ) * 12345.123);	
}


float wave(float amplitude, float offset, float frequency, float phase, float t)
{
	return offset+amplitude*sin(t*frequency+phase);
}

float wave(float amplitude, float offset, float frequency, float t)
{
	return offset+amplitude*sin(t*frequency);
}

float wave2(float min, float max, float frequency, float phase, float t)
{
	float amplitude = max-min;
	return min+0.5*amplitude+amplitude*sin(t*frequency+phase);
}

float wave2(float min, float max, float frequency, float t)
{
	float amplitude = max-min;
	return min+0.5*amplitude+amplitude*sin(t*frequency);
}

void main(void)
{
	float colorSin = 0.0;
	float colorLine = 0.0;
	const float nSin = 10.0;
	const float nLine = 30.0;

	// Sin waves
	for(float i=0.0 ; i<nSin ; i++)
	{
		float amplitude = 100.0*noise(i*0.2454*iMouse.x)*sin(iGlobalTime+noise(i)*100.0);
		float offset = iMouse.y;
		float frequency = 0.1*noise(i*10.2454);
		float phase = 0.05*iGlobalTime*iMouse.x;
		float line = wave(amplitude,offset,frequency,phase,gl_FragCoord.x);
		colorSin += 1.0/abs(line-gl_FragCoord.y);
	}

	// Grid	
	for(float i=0.0 ; i<nLine ; i++)
	{
		float lx = (i/nLine)*(iResolution.x+10.0);
		float ly = (i/nLine)*(iResolution.y+10.0);
		colorLine += 0.07/abs(gl_FragCoord.x-lx);
		colorLine += 0.07/abs(gl_FragCoord.y-ly);
	}
	vec3 c = colorSin*vec3(0.2654, 0.4578, 0.654);
	c += colorLine*vec3(0.254, 0.6578, 0.554);
	gl_FragColor = vec4(c,1.0);
}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderRainbowFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

vec3 rainbow(float h) {
	h = mod(mod(h, 1.0) + 1.0, 1.0);
	float h6 = h * 6.0;
	float r = clamp(h6 - 4.0, 0.0, 1.0) +
		clamp(2.0 - h6, 0.0, 1.0);
	float g = h6 < 2.0
		? clamp(h6, 0.0, 1.0)
		: clamp(4.0 - h6, 0.0, 1.0);
	float b = h6 < 4.0
		? clamp(h6 - 2.0, 0.0, 1.0)
		: clamp(6.0 - h6, 0.0, 1.0);
	return vec3(r, g, b);
}

vec3 plasma()
{
	const float speed = 12.0;
	
	const float scale = 2.5;
	
	const float startA = 563.0 / 512.0;
	const float startB = 233.0 / 512.0;
	const float startC = 4325.0 / 512.0;
	const float startD = 312556.0 / 512.0;
	
	const float advanceA = 6.34 / 512.0 * 18.2 * speed;
	const float advanceB = 4.98 / 512.0 * 18.2 * speed;
	const float advanceC = 4.46 / 512.0 * 18.2 * speed;
	const float advanceD = 5.72 / 512.0 * 18.2 * speed;
	
	vec2 uv = gl_FragCoord.xy * scale / iResolution.xy;
	
	float a = startA + iGlobalTime * advanceA;
	float b = startB + iGlobalTime * advanceB;
	float c = startC + iGlobalTime * advanceC;
	float d = startD + iGlobalTime * advanceD;
	
	float n = sin(a + 3.0 * uv.x) +
		sin(b - 4.0 * uv.x) +
		sin(c + 2.0 * uv.y) +
		sin(d + 5.0 * uv.y);
	
	n = mod(((4.0 + n) / 4.0), 1.0);
	
	vec2 tuv = gl_FragCoord.xy / iResolution.xy;
	n += texture2D(iChannel0, tuv).r * 0.2 +
		texture2D(iChannel0, tuv).g * 0.4 +
		texture2D(iChannel0, tuv).b * 0.2;
	
	return rainbow(n);
}

void main(void)
{
	vec4 green = vec4(0.173, 0.5, 0.106, 1.0);
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	vec4 britney = texture2D(iChannel0, uv);
	float greenness = 1.0 - (length(britney - green) / length(vec4(1.0, 1.0, 1.0, 1.0)));
	float britneyAlpha = 1.0 - clamp((greenness - 0.7) / 0.2, 0.0, 1.0);
	gl_FragColor = vec4(britneyAlpha * plasma(), 1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderDotMatrixFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// Size of the quad in pixels
const float size = 7.0;

// Radius of the circle
const float radius = size * 0.5 * 0.75;

void main(void)
{	
	// Current quad in pixels
	vec2 quadPos = floor(gl_FragCoord.xy / size) * size;
	// Normalized quad position
	vec2 quad = quadPos/iResolution.xy;
	// Center of the quad
	vec2 quadCenter = (quadPos + size/2.0);
	// Distance to quad center	
	float dist = length(quadCenter - gl_FragCoord.xy);
	
	vec4 texel = texture2D(iChannel0, quad);
	if (dist > radius)
	{
		gl_FragColor = vec4(0.25);
	}
	else
	{
		gl_FragColor = texel;
	}
}


</script>


<script type="x-shader/x-fragment" id="fragmentShaderLavaLampBlobs">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// Ben Weston - 2013
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

const float tau = 6.28318530717958647692;

// Gamma correction
#define GAMMA (2.2)

vec3 ToLinear( in vec3 col )
{
	// simulate a monitor, converting colour values into light values
	return pow( col, vec3(GAMMA) );
}

vec3 ToGamma( in vec3 col )
{
	// convert back into colour values, so the correct light will come out of the monitor
	return pow( col, vec3(1.0/GAMMA) );
}


vec2 Noise( in vec3 x )
{
    vec3 p = floor(x);
    vec3 f = fract(x);
	f = f*f*(3.0-2.0*f);
//	vec3 f2 = f*f; f = f*f2*(10.0-15.0*f+6.0*f2);

	vec2 uv = (p.xy+vec2(37.0,17.0)*p.z) + f.xy;

#if (0)
	vec4 rg = texture2D( iChannel0, (uv+0.5)/256.0, -100.0 );
#else
	// on some hardware interpolation lacks precision
	vec4 rg = mix( mix(
				texture2D( iChannel0, (floor(uv)+0.5)/256.0, -100.0 ),
				texture2D( iChannel0, (floor(uv)+vec2(1,0)+0.5)/256.0, -100.0 ),
				fract(uv.x) ),
				  mix(
				texture2D( iChannel0, (floor(uv)+vec2(0,1)+0.5)/256.0, -100.0 ),
				texture2D( iChannel0, (floor(uv)+1.5)/256.0, -100.0 ),
				fract(uv.x) ),
				fract(uv.y) );
#endif			  

	return mix( rg.yw, rg.xz, f.z );
}


void main(void)
{
	vec2 uv = (gl_FragCoord.xy-.5*iResolution.xy) / iResolution.x;
	
	vec2 blob = Noise( vec3(uv.x,uv.y*sqrt(3.0)*.5,uv.y*.5)*4.0 + iGlobalTime*vec3(0,-.1,.1) );
	
	const vec3 ink1 = vec3(.1,.9,.8);
	const vec3 ink2 = vec3(.9,.1,.6);
	
	vec3 col1 = pow(ink1,vec3(4.0*sqrt(max(0.0,(blob.x-.6)*2.0))));
	vec3 col2 = pow(ink2,vec3(4.0*sqrt(max(0.0,(blob.y-.6)*2.0))));
	
	gl_FragColor = vec4(ToGamma(col1*col2),1);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderNaturalVariation">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// BEGIN CODE PASTED FROM: https://github.com/ashima/webgl-noise/blob/master/src/noise2D.glsl
// -------------

//
// Description : Array and textureless GLSL 2D simplex noise function.
//      Author : Ian McEwan, Ashima Arts.
//  Maintainer : ijm
//     Lastmod : 20110822 (ijm)
//     License : Copyright (C) 2011 Ashima Arts. All rights reserved.
//               Distributed under the MIT License. See LICENSE file.
//               https://github.com/ashima/webgl-noise
// 

vec3 mod289(vec3 x) {
  return x - floor(x * (1.0 / 289.0)) * 289.0;
}

vec2 mod289(vec2 x) {
  return x - floor(x * (1.0 / 289.0)) * 289.0;
}

vec3 permute(vec3 x) {
  return mod289(((x*34.0)+1.0)*x);
}

float snoise(vec2 v)
  {
  const vec4 C = vec4(0.211324865405187,  // (3.0-sqrt(3.0))/6.0
                      0.366025403784439,  // 0.5*(sqrt(3.0)-1.0)
                     -0.577350269189626,  // -1.0 + 2.0 * C.x
                      0.024390243902439); // 1.0 / 41.0
// First corner
  vec2 i  = floor(v + dot(v, C.yy) );
  vec2 x0 = v -   i + dot(i, C.xx);

// Other corners
  vec2 i1;
  //i1.x = step( x0.y, x0.x ); // x0.x > x0.y ? 1.0 : 0.0
  //i1.y = 1.0 - i1.x;
  i1 = (x0.x > x0.y) ? vec2(1.0, 0.0) : vec2(0.0, 1.0);
  // x0 = x0 - 0.0 + 0.0 * C.xx ;
  // x1 = x0 - i1 + 1.0 * C.xx ;
  // x2 = x0 - 1.0 + 2.0 * C.xx ;
  vec4 x12 = x0.xyxy + C.xxzz;
  x12.xy -= i1;

// Permutations
  i = mod289(i); // Avoid truncation effects in permutation
  vec3 p = permute( permute( i.y + vec3(0.0, i1.y, 1.0 ))
		+ i.x + vec3(0.0, i1.x, 1.0 ));

  vec3 m = max(0.5 - vec3(dot(x0,x0), dot(x12.xy,x12.xy), dot(x12.zw,x12.zw)), 0.0);
  m = m*m ;
  m = m*m ;

// Gradients: 41 points uniformly over a line, mapped onto a diamond.
// The ring size 17*17 = 289 is close to a multiple of 41 (41*7 = 287)

  vec3 x = 2.0 * fract(p * C.www) - 1.0;
  vec3 h = abs(x) - 0.5;
  vec3 ox = floor(x + 0.5);
  vec3 a0 = x - ox;

// Normalise gradients implicitly by scaling m
// Approximation of: m *= inversesqrt( a0*a0 + h*h );
  m *= 1.79284291400159 - 0.85373472095314 * ( a0*a0 + h*h );

// Compute final noise value at P
  vec3 g;
  g.x  = a0.x  * x0.x  + h.x  * x0.y;
  g.yz = a0.yz * x12.xz + h.yz * x12.yw;
  return 130.0 * dot(m, g);
}

// -------------
// END CODE PASTED FROM: https://github.com/ashima/webgl-noise/blob/master/src/noise2D.glsl


// Natural Variation Test - 2013
// Daniel "Asteropaeus" Dresser


// 1D noise using ashima's simplex noise
// Calculates derivatives using brute force forward differencing
// Return value is ( noise, first derivative, second derivative )
vec3 snoise_1D_with_deriv(float t)
{
	float delta = 0.01;
	float sample = snoise( vec2( t, 0.2 ) );
	float sampleStep = snoise( vec2( t + delta, 0.2 ) );
	float sampleStep2 = snoise( vec2( t + delta * 2.0, 0.2 ) );
	return vec3( sample, (sampleStep - sample) / delta, -(sampleStep * 2.0 - (sample + sampleStep2)) / ( delta * delta) );
}



void main(void)
{
	// A pile of parameters, all of these could also be randomly driven to add changes
	// in overall texture
	float noiseFreq1 = 1.0;
	float noiseFreq2 = 2.5234;
	float noiseFreq3 = 5.37;
	float noiseFreq4 = 9.38;
	
	float noiseMult1 = 1.0;
	float noiseMult2 = 0.2;
	float noiseMult3 = 0.05;
	float noiseMult4 = 0.05;
	float noiseClamp4 = 1.5;
	
	// Uncomment to try driving various things with the mouse
	/*
	noiseMult1 = 0.0 + 0.002 * iMouse.x;
	//noiseMult2 = 0.0 + 0.001 * iMouse.x;
	//noiseMult3 = 0.0 + 0.0001 * iMouse.x;
	//noiseMult4 = 0.0 + 0.0001 * iMouse.x;
	//noiseClamp4 = 0.0 + 0.01 * iMouse.x;
	*/
	
	
	
	
	vec2 uv = gl_FragCoord.yx / iResolution.yx;
	
	
	float time = iGlobalTime * 0.5 + uv.y * 5.0;

	
	
	vec3 noise1 = snoise_1D_with_deriv(time * noiseFreq1);
	noise1.y *= noiseFreq1;
	
	
	vec3 noise2 = snoise_1D_with_deriv(time * noiseFreq2);
	noise2.y *= noiseFreq2;
	
	
	vec3 noise3 = snoise_1D_with_deriv(time * noiseFreq3);
	noise3.y *= noiseFreq3;
	
	
	vec3 noise4 = snoise_1D_with_deriv(time * noiseFreq4);
	noise4.y *= noiseFreq4;
	
	// Set the weight on the second octave to the derivative of the first octave
	vec2 weight2 = noise1.yz * noiseMult2;
	//weight2.y = 0.0;
	
	// Calculate the combination of the first and second octaves, including their derivatives,
	vec2 combined2 = noiseMult1 * noise1.xy + vec2( weight2.x * noise2.x, weight2.x * noise2.y + weight2.y * noise2.x );
	
	// Set the weight on the third octave to the derivative of the first and second octaves combined
	// Note that the second component, representing the first derivative, is left 0 here
	// To compute it, we would need the third derivative of the noise - might increase quality if we did
	vec2 weight3 = vec2( combined2.y * noiseMult3, 0.0);
	
	vec2 combined3 = combined2 + vec2( noise3.x * weight3.x, noise3.y * weight3.x);
	
	// Set the weight on the fourth octave to the derivative of the previous octaves
	vec2 weight4 = vec2( max( 0.0, abs(combined3.y) - noiseClamp4) * noiseMult4, 0.0);
	
	vec2 combined4 = combined3 + vec2( noise4.x * weight4.x, noise4.y * weight4.x);
	
	float x0 = 0.5 + (combined4.x) * 0.2;
	
	gl_FragColor = vec4(
		vec3(1.0 - (abs(uv.x - x0) / (0.003 + abs(dFdx( x0 ) ) * 1.0))),
		1.0);

}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderOldTV2">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

float rand(vec2 co){ return fract(sin(dot(co.xy ,vec2(12.9898,78.233))) * 43758.5453); }

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	float screenRatio = iResolution.x / iResolution.y;
	
	vec3 texture = texture2D(iChannel0, uv).rgb;
	
	float barHeight = 6.;
	float barSpeed = 5.6;
	float barOverflow = 1.2;
	float blurBar = clamp(sin(uv.y * barHeight + iGlobalTime * barSpeed) + 1.25, 0., 1.);
	float bar = clamp(floor(sin(uv.y * barHeight + iGlobalTime * barSpeed) + 1.95), 0., barOverflow);
	
	float noiseIntensity = .75;
	float pixelDensity = 250.;
	vec3 color = vec3(clamp(rand(
		vec2(floor(uv.x * pixelDensity * screenRatio), floor(uv.y * pixelDensity)) *
		iGlobalTime / 1000.
	) + 1. - noiseIntensity, 0., 1.));
	
	color = mix(color - noiseIntensity * vec3(.25), color, blurBar);
	color = mix(color - noiseIntensity * vec3(.08), color, bar);
	color = mix(vec3(0.), texture, color);
	color.b += .042;
	
	color *= vec3(1.0 - pow(distance(uv, vec2(0.5, 0.5)), 2.1) * 2.8);
	
	gl_FragColor = vec4(color, 1.);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderWeirdNoiseMap">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

/** Uses fbm / noise aparatus from iq's clouds on shadertoy, **/
/** some digits were changed to protect the innocent **/

mat3 m = mat3( 0.0,  0.8,  0.60,
              -0.80,  0.36, -0.48,
              -0.60, -0.48,  0.64 );


float cubicPulse( float c, float w, float x )
{
    x = abs(x - c);
    if(x > w) { return 0.0; }
    x /= w;
    return 1.0 - x*x*(3.0-2.0*x);
}

float hash( float n )
{
    return fract(sin(n)*43758.5453);
}

float noise( in vec3 x )
{
    vec3 p = floor(x);
    vec3 f = fract(x);

    f = f*f*(3.0-2.0*f);
    float n = p.x + p.y*57.0 + 113.0*p.z;

    float res = mix(mix(mix( hash(n+  0.0), hash(n+  1.0),f.x),
                        mix( hash(n+ 57.0), hash(n+ 58.0),f.x),f.y),
                    mix(mix( hash(n+113.0), hash(n+114.0),f.x),
                        mix( hash(n+170.0), hash(n+171.0),f.x),f.y),f.z);
    return 1.0 - sqrt(res);
}

float fbm( vec3 p )
{
    float f;    
    f  = 0.6000*noise( p ); p = m*p*2.02;
    f += 0.200*noise( p ); p = m*p*2.0130;
    f += 0.06250*noise( p ); p = m*p*2.0370;
    f += 0.0275*noise( p ); p = m*p*2.02;
    f += 0.00513*noise(p * 2.2);
    return f;
}

float iat(in vec2 q) {
  return fbm(vec3(q + 0.3 * vec2(iGlobalTime, iGlobalTime), 0.626));
}

void main(void) {
  vec2 q = gl_FragCoord.xy / iResolution.x;

  vec2 n = q + vec2(0.0, 0.001);
  vec2 e = q + vec2(0.001, 0.0);
  vec2 s = q + vec2(0.0, -0.001);
  vec2 w = q + vec2(-0.001, 0.0);

  float ifac = 15.0;
  float i  = iat(q * 20.0  );
  float ni = iat(n * (20.0 - ifac + ifac  * i));
  float ei = iat(e * 20.0);
  float si = iat(s * 20.0);
  float wi = iat(w * 20.0);
  
  vec3 no = (normalize(vec3( (ni - si), (ei - wi), sqrt((ei - wi)*(ei - wi) + (ni - si)*(ni - si)))));
  float dif = 1.5 * dot( no, normalize(vec3(-0.13, 0.4, 0.167)));
  vec3 col = vec3(1.8 * cubicPulse(0.6, 0.35, i), 1.1 * cubicPulse(0.45,0.35,i), 0.3 * cubicPulse(0.2,0.3,i)) / 1.0;
  col *= dif;
  gl_FragColor = vec4(col, 1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderHeartz">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

vec4 getHeart(vec2 coord) {
	float ang = atan(coord.y, coord.x);
	float dist = sqrt(coord.x*coord.x + coord.y*coord.y);
	
	float r = (sin(ang)*sqrt(abs(cos(ang))))/(sin(ang) + 7.0/5.0) - 2.0 * sin(ang) + 2.0;

	float heart = 0.0;
	r *= 0.1;
	if (dist < r) {
		heart = 1.0 - dist / r;
		heart = pow(heart,0.7);
	}
	return vec4(heart, ang, dist, r);
}
void main(void)
{
	float t = iGlobalTime;
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	vec4 color = vec4(1.0);	
	
	vec2 coord = uv - 0.5;
	coord.x *= 1.4;
	coord.y -= 0.15;
	coord /= 1.4;
	
	vec4 h = getHeart(coord);
	float heart = h.x;
	vec4 h2 = getHeart(coord / ((sin(t*2.))*0.2 + 1.0));
	
	float d = h.z;
	vec2 s;
	s.x = t*0.5 + d;
	s.y = atan(coord.y, coord.x)/3.14;
	vec4 baseColor = texture2D(iChannel0, s);
	color *= (0.5-h.z)*(heart + sin(t*2.0)*0.1 + 0.1);
	color.r *= 1.0/baseColor.r * h2.x;
	color.r += 0.2*h2.x;
	//color.g = color.r/2.;
	color.g = 0.0;
	color.b *= color.r *pow(200.,0.5);
	color.a = 1.0;
	//color.r = 1.0;
	//color.b *= wave0;
	//color.g *= wave1;
	
	gl_FragColor = vec4((color).xyz, 1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderSineColorCurve">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

#ifdef GL_ES  
precision highp float;  
#endif  



void main(void)
{
	vec2 uv = (gl_FragCoord.xy / iResolution.xy);
	
	vec4 soundWave =  texture2D(iChannel0, uv * 0.5);
	
	float timeScroll = iGlobalTime* 1.0;
	float sinusCurve = sin((uv.x*2.0+timeScroll)/0.5)*0.3*soundWave.x;
	
	uv = (uv*2.-1.00) + vec2(0.0, sinusCurve);
	
	float line = abs(0.1 /uv.y);
	
	vec3 color = vec3(sin(iGlobalTime)*line,cos(iGlobalTime)*line,sin(iGlobalTime)*cos(line));
	
	gl_FragColor = vec4(color, 0.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderBasicEdgeBWFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

float gray(vec4 color) {
	return (color.r + color.g + color.b) / 3.0;
}
	
void main(void) {

	float pixelwide = 1.0 / iResolution.x;
	float pixelhigh = 1.0 / iResolution.y;


	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	vec4 c = texture2D(iChannel0, uv);
	float c_value = gray(c);
	
	vec4 l = texture2D(iChannel0, uv + vec2(-pixelwide, 0.0));
	vec4 u = texture2D(iChannel0, uv + vec2(0.0, pixelhigh));
	vec4 r = texture2D(iChannel0, uv + vec2( pixelwide, 0.0));
	vec4 b = texture2D(iChannel0, uv + vec2(0.0, -pixelhigh));
	
	float difference = 0.0;
	
	difference = max(difference, abs(c_value - gray(l)));
	difference = max(difference, abs(c_value - gray(u)));
	difference = max(difference, abs(c_value - gray(r)));
	difference = max(difference, abs(c_value - gray(b)));
	
	difference *= 20.0;
	
	gl_FragColor = vec4(difference, difference, difference, 1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderCollapseTheory">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// Collapse Theory - Based on previous code, I'll clean it up and comment later

//parameters
const int iterations=18;
const float scale=1.3;
vec2 fold=vec2(.5+sin(iGlobalTime*.2),0.5);
const vec2 translate=vec2(4.,3.);
const vec2 offset=vec2(0.,0.4);
const float zoom=.12;
const float brightness=1.7;
const float contrast=4.;
const float saturation=.55;
const float texturescale=.005;
const float colspeed=.1;
const float antialias=5.; //not exactly AA, just reused tweaked code :)

const float rotspeed=.05;
const float reactionamount=-.3;
const float timeshift=.005;


vec2 rotate(vec2 p, float angle) {
return vec2(p.x*cos(angle)-p.y*sin(angle),
		   p.y*cos(angle)+p.x*sin(angle));
}

void main(void)
{
	vec3 aacolor=vec3(0.);
	vec2 uv=gl_FragCoord.xy / iResolution.xy-.5;
	vec2 pos=uv;
	float aspect=iResolution.y/iResolution.x;
	pos.y*=aspect;
	pos+=offset;
	pos/=zoom; 
	vec2 pixsize=max(1./zoom,100.-iGlobalTime*50.)/iResolution.xy;
	pixsize.y*=aspect;
	float sound=texture2D(iChannel1,vec2(0.7)).x;
	float gt=iGlobalTime*rotspeed+sound*10.*reactionamount;
	for (float aa=0.; aa<25.; aa++) {
		float t=gt+aa*timeshift;
		if (aa+1.>antialias*antialias) break;
		vec2 aacoord=floor(vec2(aa/antialias,mod(aa,antialias)));
		vec2 p=pos+aacoord*pixsize/antialias;
		p-=fold;
		float expsmooth=0.;
		float average=0.;
		float l=length(p);
		vec2 coord=vec2(0.);
		for (int i=0; i<iterations; i++) {
			p=abs(p+fold)-fold;
			p=p*scale-translate;
			if (length(p)>20.) break;
			p=rotate(p,t);
			coord+=p;
			
		}
		average/=float(iterations);
		coord+=iGlobalTime*colspeed;
		vec3 color=texture2D(iChannel0,coord*texturescale).xyz;
		aacolor+=color;
	}
	vec3 col=aacolor/(antialias*antialias);
	col=pow(col,vec3(contrast))*brightness*(1.+sound*1.5);
	col=min(vec3(1.),mix(vec3(length(col)),col,saturation));
	col*=1.-length(uv*uv)*2.;
	gl_FragColor = vec4(col,1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderBlueOrangeFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

void main(void)
{
    vec2 uv = gl_FragCoord.xy / iResolution.xy;
	
	vec3 tex = texture2D( iChannel0, uv ).rgb;
	float shade = dot(tex, vec3(0.333333));

	vec3 col = mix(vec3(0.1, 0.36, 0.8) * (1.0-2.0*abs(shade-0.5)), vec3(1.06, 0.8, 0.55), 1.0-shade);
	
    gl_FragColor = vec4(col,1.0);
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderHorizontalGradient">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// noise & fbm by iq

float hash( float n )
{
    return fract( sin(n)* 43758.5453123 );
}

float noise1( float x )
{
    float p = floor(x);
    float f = fract(x);

    f = f*f*(3.0-2.0*f);

    return mix( hash(p+0.0), hash(p+1.0), f );
}

float fbm( float p )
{
    float f = 0.0;

    f += 0.5000*noise1( p ); p = p*2.02;
    f += 0.2500*noise1( p ); p = p*2.03;
    f += 0.1250*noise1( p ); p = p*2.01;
    f += 0.0625*noise1( p );

    return f/0.9375;
}

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	
	float c = dot( vec3( fbm( uv.y * 5.134 + iGlobalTime * 2.013 ),
			             fbm( uv.y * 15.002 + iGlobalTime * 3.591 ),
						 fbm( uv.y * 25.922 + iGlobalTime * 4.277 ) ),
				   vec3( .85, .35, .17 ) );

	gl_FragColor = vec4( c, c, c, 1.);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderSimpleCaustic">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

void main(void)
{
// Texture coordinate
vec2 uv = gl_FragCoord.xy / iResolution.xy;

// Lower frequency noise
float val1 = texture2D(iChannel0, (uv+vec2(iGlobalTime / 100.0, 0.0)) * .3).r;
float val2 = texture2D(iChannel0, (uv+vec2(0.0, iGlobalTime / 100.0)) * .3).r;

// Higher frequency noise
float val3 = texture2D(iChannel0, (uv+vec2(iGlobalTime / 100.0, 0.0)) ).r;
float val4 = texture2D(iChannel0, (uv+vec2(0.0, iGlobalTime / 100.0)) ).r;

float val = (val1 * val2) * (.5 + val3 * val4);
gl_FragColor = vec4(val, val, val, 1.0);
}
</script>

<script type="x-shader/x-fragment" id="fragmentShaderShockwave">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

#define _PI 3.1415926535897932384626433832795

vec2 shockcenter1 = vec2(iResolution.x/4.0,iResolution.y/4.0*3.0);

vec2 shockcenter2 = vec2(iResolution.x/4.0*3.0,iResolution.y/4.0);

vec2 getPixelShift(vec2 center,vec2 pixelpos,float startradius,float size,float shockfactor)
{
	float m_distance = distance(center,pixelpos);
	if( m_distance > startradius && m_distance < startradius+size )
	{
		float sin_dist = sin((m_distance -startradius)/size* _PI )*shockfactor;
		return ( pixelpos - normalize(pixelpos-center)*sin_dist )/ iResolution.xy;
	}
	else 
		return gl_FragCoord.xy / iResolution.xy;
}


void main(void)
{
	float startradius = mod(iGlobalTime , 1.0) *600.0;
	float size = mod(iGlobalTime , 1.0) *200.0;
	float shockfactor = 50.0-mod(iGlobalTime , 1.0)*50.0;
	
	vec2 total_shift = getPixelShift(shockcenter1,gl_FragCoord.xy,startradius,size,20.0) + getPixelShift(shockcenter2,gl_FragCoord.xy,startradius,size,20.0);
	gl_FragColor = texture2D(iChannel0,total_shift);
	
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderRelativeLuminanceFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

#ifdef GL_ES
precision highp float;
#endif

// Luminosity function
const vec3 F = vec3(0.2126, 0.7152, 0.0722);

void main(void)
{
	vec3 c = texture2D(iChannel0, gl_FragCoord.xy / iResolution.xy).xyw;
	gl_FragColor = vec4(vec3(dot(c, F)), 1.0);
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderMappingFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


void main(void)
{
	
	vec2 pos = gl_FragCoord.xy;
	vec2 uv2 = vec2( gl_FragCoord.xy / iResolution.xy );
	vec4 sound = texture2D( iChannel1, uv2 );
	pos.x = pos.x + 150.0 * sound.r;
	pos.y = pos.y + 150.0 * sound.b;
	vec2 uv = pos / iResolution.xy;
	
	
	
	
	vec4 col = texture2D( iChannel0, uv );
	
	
	col.a += 1.0 - sin( col.x - col.y + iGlobalTime * 0.1 );
	
	
	gl_FragColor =  col * sound.r;
}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderNeeto">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

/* 
 * I used http://www.iquilezles.org/www/articles/distfunctions/distfunctions.htm for finding geometry functions.
 * I also used https://www.shadertoy.com/view/4ssGzS for inspiration.
 * Made by Emil Sandstø
 */

#define MAX_RAYMARCH_ITER 8

#define PI 3.14159265359
#define MAX_SPHERE_FLAKE_ITER 1

#define SPHEREFLAKE 1.0

const float precis = 0.01;

//Find the shortest distance from a point to a point in the sphere.
float sdSphere(vec3 p, float s)
{
	return length(p) - s;
}

vec3 rotateX(in vec3 p, float a) {
	float c = cos(a); float s = sin(a);
	return vec3(p.x, c * p.y - s * p.z, s * p.y + c * p.z);
}

vec3 rotateY(vec3 p, float a) {
	float c = cos(a); float s = sin(a);
	return vec3(c * p.x + s * p.z, p.y, -s * p.x + c * p.z);
}

vec3 rotateZ(vec3 p, float a) {
	float c = cos(a); float s = sin(a);
	return vec3(c * p.x - s * p.y, s * p.x + c * p.y, p.z);
}

// Setup a rotation matrix from an arbitrary axis.
// Axis must be a unit vector.
mat3 setupRotate(vec3 axis, float theta)
{
	float s = sin(theta);
	float c = cos(theta);

	float a = 1.0 - c;
	float ax = a * axis.x;
	float ay = a * axis.y;
	float az = a * axis.z;

	return mat3(ax*axis.x + c, ax*axis.y + axis.z*s, ax*axis.z - axis.y*s,
				ay*axis.x - axis.z*s, ay*axis.y + c, ay*axis.z + axis.x*s,
				az*axis.x + axis.y*s, az*axis.y - axis.x*s, az*axis.z + c);
}

vec3 rotateCamera(vec3 ray_start, vec3 ray_dir, vec3 cameraTarget) 
{
	ray_dir.x = ray_dir.x;
	vec3 target = normalize(cameraTarget - ray_start);
	float angY = atan(target.z, target.x);
	ray_dir = rotateY(ray_dir, PI/2.0 - angY);
	float angX = atan(target.y, target.z);
	ray_dir = rotateX(ray_dir, -angX);
	return ray_dir;
}

vec2 mapSphereFlake(vec3 p, out vec3 finalP)
{
	mat3 rotMat = setupRotate(vec3(0.0, 1.0, 0.0), iGlobalTime * 0.5);
	p = rotMat * p;
	
	float currentRadius = 45.0;
	vec2 result = vec2(SPHEREFLAKE, sdSphere(p, currentRadius));
	finalP = p;
	
	float finalRadius = currentRadius;
	for(int i = 0;i < MAX_SPHERE_FLAKE_ITER;i++)
	{
		currentRadius /= 3.0;
		
		//It was faster to unroll the loop on my AMD Radeon HD 7970.
		//But I still gets around 20 FPS.
		vec3 pos;
		pos = vec3(finalRadius, 0.0, 0.0);
		pos += p;
			
		result.y = min(result.y, sdSphere(pos + vec3(currentRadius, 0.0, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(-currentRadius, 0.0, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, currentRadius, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, -currentRadius, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, currentRadius), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, -currentRadius), currentRadius));

		pos = vec3(-finalRadius, 0.0, 0.0);
		pos += p;
			
		result.y = min(result.y, sdSphere(pos + vec3(currentRadius, 0.0, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(-currentRadius, 0.0, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, currentRadius, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, -currentRadius, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, currentRadius), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, -currentRadius), currentRadius));

		pos = vec3(0.0, finalRadius, 0.0);
		pos += p;
			
		result.y = min(result.y, sdSphere(pos + vec3(currentRadius, 0.0, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(-currentRadius, 0.0, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, currentRadius, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, -currentRadius, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, currentRadius), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, -currentRadius), currentRadius));

		pos = vec3(0.0, -finalRadius, 0.0);
		pos += p;
			
		result.y = min(result.y, sdSphere(pos + vec3(currentRadius, 0.0, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(-currentRadius, 0.0, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, currentRadius, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, -currentRadius, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, currentRadius), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, -currentRadius), currentRadius));

		pos = vec3(0.0, 0.0, finalRadius);
		pos += p;
			
		result.y = min(result.y, sdSphere(pos + vec3(currentRadius, 0.0, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(-currentRadius, 0.0, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, currentRadius, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, -currentRadius, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, currentRadius), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, -currentRadius), currentRadius));

		pos = vec3(0.0, 0.0, -finalRadius);
		pos += p;
			
		result.y = min(result.y, sdSphere(pos + vec3(currentRadius, 0.0, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(-currentRadius, 0.0, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, currentRadius, 0.0), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, -currentRadius, 0.0), currentRadius));

		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, currentRadius), currentRadius));
		result.y = min(result.y, sdSphere(pos + vec3(0.0, 0.0, -currentRadius), currentRadius));
		
		finalRadius += currentRadius * 2.0;
	}

	result.y += sin(2.0 * p.x) * sin(2.0 * p.y) * sin(2.0 * p.z);
	
	return result;
}

// Find the intersection points between the rays and objects in our scene, so that we can shade them.
// The x coordinate of the returned vector corresponds to the object type.
vec2 mapScene(vec3 p, out vec3 finalP)
{
	return mapSphereFlake(p, finalP);
}

// Returns the type of object hit.
float rayMarch(vec3 rayStart, vec3 rayDir, out float dist, out vec3 currentRayPos, out vec3 finalRayPos, out int iterations)
{
	dist = 0.0;
	vec2 mapDist;

	for(int i = 0;i < MAX_RAYMARCH_ITER;i++)
	{
		currentRayPos = rayStart + rayDir * dist;
		mapDist = mapScene(currentRayPos, finalRayPos);
		if(mapDist.y < precis)
		{
			iterations = i;
			return mapDist.x;
		}
		dist += mapDist.y;
	}

	return -1.;
}

vec3 moveCamera(vec3 ray_start) 
{
	ray_start += vec3(0.0, 0.0, -400.);
	return ray_start;
}

vec4 render(vec3 screen)
{	
	vec4 outColor = vec4(0.0, 0.0, 0.0, 1.0);
	vec4 diffColor = vec4(1.0, 1.0, 1.0, 1.0);
	vec3 rayOrigin = vec3(0.0, 0.0, -2.0);
	vec3 rayStart = moveCamera(rayOrigin);

	vec3 cameraTarget = vec3(0.0, 0.0, -1.0); 
	vec3 rayDir = rotateCamera(rayOrigin, normalize(screen - rayOrigin), cameraTarget);
	
	float dist;
	vec3 rayPos;
	vec3 finalRayPos;
	int iterations;
	float objectID = rayMarch(rayStart, rayDir, dist, rayPos, finalRayPos, iterations);

	if(objectID > 0.0)
	{
		outColor = vec4(0.0, float(iterations) / 32.0, abs(rayPos.x) / 80.0 + abs(rayPos.y) / 120.0 - 0.4, 1.0);
	}
	
	return outColor;
}

void main(void)
{
	vec2 uv = vec2((gl_FragCoord.x - iResolution.x *.5) / iResolution.y, (gl_FragCoord.y - iResolution.y *.5) / iResolution.y);
	gl_FragColor = render(vec3(uv, 0.0));
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderDfDxDfDyFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

void main(void)
{
	vec3 vid = texture2D(iChannel0, gl_FragCoord.xy / iResolution.xy).rgb;
	float v = vid.r+vid.g+vid.b;
	float w = sin(iGlobalTime*4.0)*13.0;
	
	vec2 n = vec2(dFdx(v) * w, dFdy(v) * w);
	float t = sqrt(dot(n,n));
	
	gl_FragColor = vec4(vid*.4+(vid * vid*vec3(n.x, n.y, n.x*n.y))*t,1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderNightVision2Filter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

#ifdef GL_ES
precision highp float;
#endif

float hash(in float n) { return fract(sin(n)*43758.5453123); }

void main(void)
{
	vec2 p = gl_FragCoord.xy / iResolution.xy;
	
	vec2 u = p * 2. - 1.;
	vec2 n = u * vec2(iResolution.x / iResolution.y, 1.0);
	
	if (abs(u.y) > .8 || mod(floor(gl_FragCoord.y),3.0) > 0.0) { 
		gl_FragColor = vec4(vec3(0.),1.);
		return;
	}
	
	vec3 c = texture2D(iChannel0, p).xyz;
	
	// flicker, grain, vignette, fade in
	c += sin(hash(iGlobalTime)) * 0.01;
	c += hash((hash(n.x) + n.y) * iGlobalTime) * 0.4;
	c *= 1.9 * smoothstep(length(n * 0.18), 0.8, 0.4);
	c *= smoothstep(0.001, 3.5, iGlobalTime);
	
	c = dot(c, vec3(0.2126, 0.7152, 0.0722)) 
	  * vec3(0.2, 1.5 - hash(iGlobalTime) * 0.1,0.4);
	
	gl_FragColor = vec4(c,1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderMotionDisplaceFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform sampler2D iChannel1;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


const int nSamples = 64;


vec2 rotate(vec2 v,float t)
{
	float ct = cos(t);
	float st = sin(t);
	return vec2(ct*v.x-st*v.y,st*v.x+ct*v.y);
}
		
vec2 transform(float time, vec2 offset)
{
	vec2 mid = vec2(0.5, 0.5);
	return rotate(vec2(cos(time*1.07)*0.2, sin(time)*0.2) + offset - mid, sin(time/10.0)*5.00)*(cos(time*0.87)/2.0+1.0) + mid;
}

const float TIMESHIFT = 1.0;
	
const float TIME0 = 0.0/60.0;
const float TIME1 = 3.0/60.0;
const float TIME2 = 6.0/60.0;
const float TIME3 = 9.0/60.0;
const float TIME4 = 12.0/60.0;

const float WEIGHT01 = 2.0;
const float WEIGHT12 = 3.0;
const float WEIGHT23 = 2.0;
const float WEIGHT34 = 1.0;

const vec3 LUMINANCE = vec3(0.213, 0.715, 0.072);

void main(void)
{
	vec2 offset = gl_FragCoord.xy / iResolution.xy;

	vec3 timeTex = texture2D(iChannel1,offset).xyz;
	float timeOffset = iGlobalTime+dot(LUMINANCE,timeTex)*TIMESHIFT;

	offset.y -= 0.5;
	offset.y *= iResolution.y / iResolution.x;
	offset.y += 0.5;
	
	// time offsets 
	vec2 uv0 = transform(timeOffset-TIME0, offset);
	vec2 uv1 = transform(timeOffset-TIME1, offset);
	vec2 uv2 = transform(timeOffset-TIME2, offset);
	vec2 uv3 = transform(timeOffset-TIME3, offset);
	vec2 uv4 = transform(timeOffset-TIME4, offset);
	vec2	delta01 = uv1-uv0;
	vec2	delta12 = uv2-uv1;
	vec2	delta23 = uv3-uv2;
	vec2	delta34 = uv4-uv3;

	delta01 /= float(nSamples/4);
	delta12 /= float(nSamples/4);
	delta23 /= float(nSamples/4);
	delta34 /= float(nSamples/4);
	
	vec3 col01 = texture2D(iChannel0,uv0).xyz;
	for(int i=1; i<nSamples/4; i++)
	{
		uv0 += delta01;
		col01 += texture2D(iChannel0,uv0).xyz;
	}

	vec3 col12 = texture2D(iChannel0,uv1).xyz;
	for(int i=1; i<nSamples/4; i++)
	{
		uv1 += delta12;
		col12 += texture2D(iChannel0,uv1).xyz;
	}

	vec3 col23 = texture2D(iChannel0,uv2).xyz;
	for(int i=1; i<nSamples/4; i++)
	{
		uv2 += delta23;
		col23 += texture2D(iChannel0,uv2).xyz;
	}
	
	vec3 col34 = texture2D(iChannel0,uv3).xyz;
	for(int i=1; i<nSamples/4; i++)
	{
		uv3 += delta34;
		col34 += texture2D(iChannel0,uv3).xyz;
	}

	vec3 col = col01*WEIGHT01 + col12*WEIGHT12 + col23*WEIGHT23 + col34*WEIGHT34;
	col /= (WEIGHT01+WEIGHT12+WEIGHT23+WEIGHT34)*float(nSamples/4);
	
	gl_FragColor = vec4(mix(col,timeTex,dot(LUMINANCE,col)),1.0);
}





</script>

<script type="x-shader/x-fragment" id="fragmentShaderMatrixFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

//CBS
//Matrix Britney

void main(void) {
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	vec4 vcolor= texture2D(iChannel0,uv);
	float color = -mod(gl_FragCoord.y +iGlobalTime*0.5 , cos(gl_FragCoord.x)+0.005)-.5*.5;
	gl_FragColor = vec4( 0., color, 0. ,1)*vec4(vcolor.x,vcolor.x,vcolor.y,1);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderSobelFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// Basic sobel filter implementation
// Jeroen Baert - jeroen.baert@cs.kuleuven.be
// 
// www.forceflow.be


// Use these parameters to fiddle with settings
float step = 1.0;

float intensity(in vec4 color){
	return sqrt((color.x*color.x)+(color.y*color.y)+(color.z*color.z));
}

vec3 sobel(float stepx, float stepy, vec2 center){
	// get samples around pixel
    float tleft = intensity(texture2D(iChannel0,center + vec2(-stepx,stepy)));
    float left = intensity(texture2D(iChannel0,center + vec2(-stepx,0)));
    float bleft = intensity(texture2D(iChannel0,center + vec2(-stepx,-stepy)));
    float top = intensity(texture2D(iChannel0,center + vec2(0,stepy)));
    float bottom = intensity(texture2D(iChannel0,center + vec2(0,-stepy)));
    float tright = intensity(texture2D(iChannel0,center + vec2(stepx,stepy)));
    float right = intensity(texture2D(iChannel0,center + vec2(stepx,0)));
    float bright = intensity(texture2D(iChannel0,center + vec2(stepx,-stepy)));
 
	// Sobel masks (see http://en.wikipedia.org/wiki/Sobel_operator)
	//        1 0 -1     -1 -2 -1
	//    X = 2 0 -2  Y = 0  0  0
	//        1 0 -1      1  2  1
	
	// You could also use Scharr operator:
	//        3 0 -3        3 10   3
	//    X = 10 0 -10  Y = 0  0   0
	//        3 0 -3        -3 -10 -3
 
    float x = tleft + 2.0*left + bleft - tright - 2.0*right - bright;
    float y = -tleft - 2.0*top - tright + bleft + 2.0 * bottom + bright;
    float color = sqrt((x*x) + (y*y));
    return vec3(color,color,color);
 }

void main(void){
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	vec4 color = texture2D(iChannel0, uv.xy);
	gl_FragColor.xyz = sobel(step/iResolution[0], step/iResolution[1], uv);
}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderGoldenEdgeFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


void main(void)
{
    vec2 uv = gl_FragCoord.xy / iResolution.xy;
	
	/*
	float spinT = iGlobalTime*0.5;
	vec2 cutDir = vec2(cos(spinT), sin(spinT));
	if( dot(cutDir, uv-vec2(0.5,0.5)) < 0.0 )
	{
		gl_FragColor = vec4( texture2D( iChannel0, uv ).rgb, 1.0 );
		return;
	}
	*/

	vec2 step = 1.0 / iResolution.xy;
	
	vec3 texA = texture2D( iChannel0, uv + vec2(-step.x, -step.y) * 1.5 ).rgb;
	vec3 texB = texture2D( iChannel0, uv + vec2( step.x, -step.y) * 1.5 ).rgb;
	vec3 texC = texture2D( iChannel0, uv + vec2(-step.x,  step.y) * 1.5 ).rgb;
	vec3 texD = texture2D( iChannel0, uv + vec2( step.x,  step.y) * 1.5 ).rgb;
	
	float shadeA = dot(texA, vec3(0.333333));
	float shadeB = dot(texB, vec3(0.333333));
	float shadeC = dot(texC, vec3(0.333333));
	float shadeD = dot(texD, vec3(0.333333));

	float shade = 15.0 * pow(max(abs(shadeA - shadeD), abs(shadeB - shadeC)), 0.5);
	
	vec3 col = mix(vec3(0.1, 0.18, 0.3), vec3(0.4, 0.3, 0.2), shade);
	
    gl_FragColor = vec4(col,1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderDirtyCRTFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

float scanline(vec2 uv) {
	return sin(iResolution.y * uv.y * 0.7 - iGlobalTime * 10.0);
}

float slowscan(vec2 uv) {
	return sin(iResolution.y * uv.y * 0.02 + iGlobalTime * 6.0);
}

vec2 colorShift(vec2 uv) {
	return vec2(
		uv.x,
		uv.y + sin(iGlobalTime)*0.02
	);
}

float noise(vec2 uv) {
	return clamp(texture2D(iChannel1, uv.xy + iGlobalTime*6.0).r +
		texture2D(iChannel1, uv.xy - iGlobalTime*4.0).g, 0.96, 1.0);
}

// from https://www.shadertoy.com/view/4sf3Dr
// Thanks, Jasper
vec2 crt(vec2 coord, float bend)
{
	// put in symmetrical coords
	coord = (coord - 0.5) * 2.0;

	coord *= 0.5;	
	
	// deform coords
	coord.x *= 1.0 + pow((abs(coord.y) / bend), 2.0);
	coord.y *= 1.0 + pow((abs(coord.x) / bend), 2.0);

	// transform back to 0.0 - 1.0 space
	coord  = (coord / 1.0) + 0.5;

	return coord;
}

vec2 colorshift(vec2 uv, float amount, float rand) {
	
	return vec2(
		uv.x,
		uv.y + amount * rand // * sin(uv.y * iResolution.y * 0.12 + iGlobalTime)
	);
}

vec2 scandistort(vec2 uv) {
	float scan1 = clamp(cos(uv.y * 2.0 + iGlobalTime), 0.0, 1.0);
	float scan2 = clamp(cos(uv.y * 2.0 + iGlobalTime + 4.0) * 10.0, 0.0, 1.0) ;
	float amount = scan1 * scan2 * uv.x; 
	
	uv.x -= 0.05 * mix(texture2D(iChannel1, vec2(uv.x, amount)).r * amount, amount, 0.9);

	return uv;
	 
}

float vignette(vec2 uv) {
	uv = (uv - 0.5) * 0.98;
	return clamp(pow(cos(uv.x * 3.1415), 1.2) * pow(cos(uv.y * 3.1415), 1.2) * 50.0, 0.0, 1.0);
}

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	vec2 sd_uv = scandistort(uv);
	vec2 crt_uv = crt(sd_uv, 2.0);
	
	vec4 color;
	
	//float rand_r = sin(iGlobalTime * 3.0 + sin(iGlobalTime)) * sin(iGlobalTime * 0.2);
	//float rand_g = clamp(sin(iGlobalTime * 1.52 * uv.y + sin(iGlobalTime)) * sin(iGlobalTime* 1.2), 0.0, 1.0);
	vec4 rand = texture2D(iChannel1, vec2(iGlobalTime * 0.01, iGlobalTime * 0.02));
	
	color.r = texture2D(iChannel0, crt(colorshift(sd_uv, 0.025, rand.r), 2.0)).r;
	color.g = texture2D(iChannel0, crt(colorshift(sd_uv, 0.01, rand.g), 2.0)).g;
	color.b = texture2D(iChannel0, crt(colorshift(sd_uv, 0.024, rand.b), 2.0)).b;	
		
	vec4 scanline_color = vec4(scanline(crt_uv));
	vec4 slowscan_color = vec4(slowscan(crt_uv));
	
	gl_FragColor = mix(color, mix(scanline_color, slowscan_color, 0.5), 0.05) *
		vignette(uv) *
		noise(uv);

	//gl_FragColor = vec4(vignette(uv));
	//vec2 scan_dist = scandistort(uv);
	//gl_FragColor = vec4(scan_dist.x, scan_dist.y,0.0, 1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderHalfToneFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


float PI = 3.1415926535897932384626433832795;
float PI180 = float(PI / 180.0);

float sind(float a)
{
	return sin(a * PI180);
}

float cosd(float a)
{
	return cos(a * PI180);
}

float added(vec2 sh, float sa, float ca, vec2 c, float d)
{
	return 0.5 + 0.25 * cos((sh.x * sa + sh.y * ca + c.x) * d) + 0.25 * cos((sh.x * ca - sh.y * sa + c.y) * d);
}

void main(void)
{
	// Halftone dot matrix shader
	// @author Tomek Augustyn 2010
	
	// Ported from my old PixelBender experiment
	// https://github.com/og2t/HiSlope/blob/master/src/hislope/pbk/fx/halftone/Halftone.pbk
	
	// Hold and drag horizontally to adjust the threshold

	float threshold = clamp(float(iMouse.x / iResolution.x) + 0.6, 0.0, 1.0);

	float ratio = iResolution.y / iResolution.x;
	float coordX = gl_FragCoord.x / iResolution.x;
	float coordY = gl_FragCoord.y / iResolution.x;
	vec2 dstCoord = vec2(coordX, coordY);
	vec2 srcCoord = vec2(coordX, coordY / ratio);
	vec2 rotationCenter = vec2(0.5, 0.5);
	vec2 shift = dstCoord - rotationCenter;
	
	float dotSize = 3.0;
	float angle = 45.0;
	
	float rasterPattern = added(shift, sind(angle), cosd(angle), rotationCenter, PI / dotSize * 680.0);
	vec4 srcPixel = texture2D(iChannel0, srcCoord);
        
	float avg = 0.2125 * srcPixel.r + 0.7154 * srcPixel.g + 0.0721 * srcPixel.b;
    float gray = (rasterPattern * threshold + avg - threshold) / (1.0 - threshold);

	// uncomment to see how the raster pattern looks 
    // gray = rasterPattern;
    	
	gl_FragColor = vec4(gray, gray, gray, 1.0);
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderConvolveFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

#define PI 3.141592
#define PI2 6.283184

#define CV 0.1
#define ST 0.05

vec4 colorat(vec2 uv) {
	return texture2D(iChannel0, vec2(uv.x, uv.y));
}
vec4 convolve(vec2 uv) {
	vec4 col = vec4(0.0);
	for(float r0 = 0.0; r0 < 1.0; r0 += ST) {
		float r = r0 * CV;
		for(float a0 = 0.0; a0 < 1.0; a0 += ST) {
			float a = a0 * PI2;
			col += colorat(uv + vec2(cos(a), sin(a)) * r);
		}
	}
	col *= ST * ST;
	return col;
}

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	gl_FragColor = convolve(uv);
}





</script>

<script type="x-shader/x-fragment" id="fragmentShaderAsciiFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// Bitmap to ASCII (not really) fragment shader by movAX13h, September 2013
// If you change the input channel texture, disable this:
#define HAS_GREENSCREEN

float character(float n, vec2 p) // some compilers have the word "char" reserved
{
	p = floor(p*vec2(4.0, -4.0) + 2.5);
	if (clamp(p.x, 0.0, 4.0) == p.x && clamp(p.y, 0.0, 4.0) == p.y)
	{
		float k = p.x + 5.0*p.y;
		if (int(mod(n/(exp2(k)), 2.0)) == 1) return 1.0;
	}	
	return 0.0;
}

void main()
{
	vec2 uv = gl_FragCoord.xy;
	vec3 col = texture2D(iChannel0, floor(uv/8.0)*8.0/iResolution.xy).rgb;	
	
	#ifdef HAS_GREENSCREEN
	float gray = (col.r + col.b)/2.0; // skip green component
	#else
	float gray = (col.r + col.g + col.b)/3.0;
	#endif
	
	float n =  65536.0;             // .
	if (gray > 0.2) n = 65600.0;    // :
	if (gray > 0.3) n = 332772.0;   // *
	if (gray > 0.4) n = 15255086.0; // o 
	if (gray > 0.5) n = 23385164.0; // &
	if (gray > 0.6) n = 15252014.0; // 8
	if (gray > 0.7) n = 13199452.0; // @
	if (gray > 0.8) n = 11512810.0; // #
	
	vec2 p = mod(uv/4.0, 2.0) - vec2(1.0);
	if (iMouse.z > 0.5)	col = gray*vec3(character(n, p));
	else col = col*character(n, p);
	
	gl_FragColor = vec4(col, 1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderHoloGramFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// @eddbiddulph

#define ITERS 64

vec3 rotateX(float a, vec3 v)
{
	return vec3(v.x, cos(a) * v.y + sin(a) * v.z, cos(a) * v.z - sin(a) * v.y);
}


vec3 rotateY(float a, vec3 v)
{
	return vec3(cos(a) * v.x + sin(a) * v.z, v.y, cos(a) * v.z - sin(a) * v.x);
	
}

// Returns the entry and exit points along the given ray with
// a cube of edge length 2 centered at the origin.
vec2 cubeInterval(vec3 ro, vec3 rd)
{
	vec3 slabs0 = (vec3(+1.0) - ro) / rd;
	vec3 slabs1 = (vec3(-1.0) - ro) / rd;
	
	vec3 mins = min(slabs0, slabs1);
	vec3 maxs = max(slabs0, slabs1);
	
	return vec2(max(max(mins.x, mins.y), mins.z),				
				min(min(maxs.x, maxs.y), maxs.z));
	
}

vec2 hologramInterval(vec3 ro, vec3 rd)
{
	vec3 scale = vec3(1.0, 1.0, 0.1);   
	return cubeInterval(ro / scale, rd / scale);
}

float hologramBrightness(vec2 p)
{
	return dot(texture2D(iChannel0, p).rgb, vec3(1.0 / 3.0));
}

float flicker(float x)
{
	x = fract(x);
	return smoothstep(0.0, 0.1, x) - smoothstep(0.1, 0.2, x);
}

float flickers()
{
	return 1.0 + flicker(iGlobalTime) + flicker(iGlobalTime * 1.2);
}

vec3 hologramImage(vec2 p)
{
	vec2 tc = (p * -1.0 + vec2(1.0)) * 0.5;

	float d = 1e-3;
	
	float b0 = hologramBrightness(tc);
	float b1 = (hologramBrightness(tc + vec2(d, 0.0)) - b0) / d;
	float b2 = (hologramBrightness(tc + vec2(0.0, d)) - b0) / d;
	
	float f = flickers();
	float sharp = pow(length(vec2(b1, b2)) * 0.1, 5.0) * 0.02;
	
	return (vec3(sharp + b0) * 3.0) * vec3(0.5, 0.7, 1.0) *
				mix(0.5, 0.9, pow(0.5 + 0.5 * cos(p.y * 80.0 + iGlobalTime * 70.0), 4.0)) * f *
		(2.0 - tc.y * 2.0 + (1.0 - smoothstep(0.0, 0.1, tc.y)) * 10.0);
}

vec2 rotate(float a, vec2 v)
{
	return vec2(cos(a) * v.x + sin(a) * v.y,
				cos(a) * v.y - sin(a) * v.x);
}

vec3 floorTex(vec3 ro, vec3 rd)
{
	float t = (1.0 - ro.y) / rd.y;
	float hit = step(t, 0.0);
	vec2 tc = ro.xz + rd.xz * t;
	vec3 glow = vec3(0.6, 0.8, 1.0) * 1.0 / length(tc * vec2(0.3, 1.0)) * 0.2 * mix(1.0, flickers(), 0.25);
	
	float wires = 1.0;
	
	for(int i = 0; i < 7; i += 1)
	{
		vec2 tc2 = rotate(float(i) * 2.2, tc);
		float w = abs(cos(tc2.x + float(i) * 1.5) * 0.3 * min(1.0, tc2.x * 0.5) - tc2.y);
		wires = min(wires, smoothstep(0.02, 0.03, w));
	}
	
	float elec = 0.1;
	
	for(int i = 0; i < 7; i += 1)
	{
		elec += flicker(iGlobalTime * 2.5 + float(i) * 1.2 +
							   		length(tc) * (5.0 + float(i) * 0.2));
	
	}
	

	return mix(vec3(0.0), mix(vec3(0.0), glow * 0.2, wires) +
			   		(1.0 - wires) * vec3(vec3(1.4, 1.5, 2.0) * sqrt(elec) * 0.3 / length(tc)), hit);
}

void main(void)
{
	vec2 uv = (gl_FragCoord.xy / iResolution.xy - vec2(0.5)) * 2.0;
	
	uv.x *= iResolution.x / iResolution.y;
	
	vec3 ct = vec3(0.0, 0.0, 0.0);
	vec3 cp = rotateY(iGlobalTime * 0.5 * 0.5, vec3(0.0, -0.5 + sin(iGlobalTime * 0.7 * 0.5) * 0.7, 1.9));
	vec3 cw = normalize(ct - cp);
	vec3 cu = normalize(cross(cw, vec3(0.0, 1.0, 0.0)));
	vec3 cv = normalize(cross(cu, cw));
	
	mat3 rm = mat3(cu, cv, cw);

	vec3 ro = cp, rd = rm * vec3(uv, -2.0);
	
	vec2 io = hologramInterval(ro, rd);
	
	float cov = step(io.x, io.y);
	float len = abs(io.x - io.y);
	
	vec3 accum = vec3(0.0);	

	vec3 fl = floorTex(ro, rd);
	
	io.x = min(0.0, io.x);

	ro += rd * io.x;
	rd *= (io.y - io.x) / float(ITERS);
	
	for(int i = 0; i < ITERS; i += 1)
	{
		vec3 rp = ro + rd * float(i);
		accum += hologramImage(rp.xy);
	}
	
	gl_FragColor.rgb = fl + accum * cov * (len / float(ITERS)) * 0.4;
	gl_FragColor.a = 1.0;
}





</script>

<script type="x-shader/x-fragment" id="fragmentShaderEdgeFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


#ifdef GL_ES
precision highp float;
#endif

vec3 sample(const int x, const int y)
{
	vec2 uv = (gl_FragCoord.xy + vec2(x, y)) / iResolution.xy;
	return texture2D(iChannel0, uv).xyz;
}

float luminance(vec3 c)
{
	return dot(c, vec3(0.2126, 0.7152, 0.0722));
}

vec3 edge(void)
{
	vec3 hc =sample(-1,-1) *  1.0 + sample( 0,-1) *  2.0
		 	+sample( 1,-1) *  1.0 + sample(-1, 1) * -1.0
		 	+sample( 0, 1) * -2.0 + sample( 1, 1) * -1.0;
		
	vec3 vc =sample(-1,-1) *  1.0 + sample(-1, 0) *  2.0
		 	+sample(-1, 1) *  1.0 + sample( 1,-1) * -1.0
		 	+sample( 1, 0) * -2.0 + sample( 1, 1) * -1.0;
	
	return sample(0, 0) * pow(luminance(vc*vc + hc*hc), 0.6);
}

void main(void)
{
	gl_FragColor = vec4(edge(), 1.0);
}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderC64RayTrace">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// Simple raytracer in C64 graphics style
//
// Version 1.0 (2013-04-01)
// Simon Stelling-de San Antonio

float camtime = 1.23*iGlobalTime;

void main(void)
{
  vec2 p = gl_FragCoord.xy / iResolution.xy;
  p.y = 1.0 - p.y;
  p *= 200.0;
  p.x *= (iResolution.x / iResolution.y);
  p.x /= 2.0;
  p = floor(p);
  p.x *= 2.0;

  vec2 an = vec2( sin(iGlobalTime), cos(iGlobalTime) )*2700.0;

  // OK, starting here the code looks kind of funny
  // because it's a very straight port from a C128 BASIC 7.0 program. :)
  float c = 2500.0;
  float k = c/2.0;
  float e = 0.0;
  float f = -3000.0;
  float g = 0.0;
  float h = p.x-160.0;
  float j = 112.0-p.y;
  float s = sqrt(h*h+67600.0+j*j);
  h /= s;
  float i = 260.0/s;
  j /= s;
  float pp = i*3000.0+j*150.0;
  float d = pp*pp-8120000.0;
  if (d >= 0.0) {
    float l = pp-sqrt(d);
    if (l > 0.0) {
      e = l*h;
      f = f+l*i;
      g = l*j;
      float n = g-150.0;
      s = e*e+f*f+n*n;
      s = 2.0*(e*h+f*i+n*j)/s;
      h -= s*e;
      i -= s*f;
      j -= s*n;
    }
  }
  float b = 2.0;
  float q = 107.0-190.0*j;
  if (d >= 0.0) {
    q -= 40.0;
  }
  if (j < 0.0) {
    b = 1.0;
    float l = (g+2000.0)/j;
    float t = e-l*h+c/4.0+an.x;
    float u = f-l*i+an.y;
    t = floor((t-c*floor(t/c))/k);
    u = floor((u-c*floor(u/c))/k);
    q = 40.0 + 40.0*j;
    if (t == u) {
      q += 180.0*j - 88.0;
    }
  }
  float r = 88.0 - 19.0*(mod(p.y,4.0)+mod(p.x,4.0));
  float z = 3.0;
  if (q > -r) {
    if (q > r) {
      z -= 3.0;
    } else {
      z -= b;
    }
  }
  if ((j < 0.0) && (z == 3.0)) {
    z = 4.0;
  }

  float cc;
  if        (z ==  0.0) { cc =  3.0;
  } else if (z ==  1.0) { cc = 14.0;
  } else if (z ==  2.0) { cc = 10.0;
  } else if (z ==  3.0) { cc =  6.0;
  } else                { cc =  9.0;
  }
  vec3 col;
  if        (cc ==  0.0) { col = vec3(0.0);
  } else if (cc ==  1.0) { col = vec3(1.0);
  } else if (cc ==  2.0) { col = vec3(137.0,  64.0,  54.0)/256.0;
  } else if (cc ==  3.0) { col = vec3(122.0, 191.0, 199.0)/256.0;
  } else if (cc ==  4.0) { col = vec3(138.0,  70.0, 174.0)/256.0;
  } else if (cc ==  5.0) { col = vec3(104.0, 169.0,  65.0)/256.0;
  } else if (cc ==  6.0) { col = vec3( 62.0,  49.0, 162.0)/256.0;
  } else if (cc ==  7.0) { col = vec3(208.0, 220.0, 113.0)/256.0;
  } else if (cc ==  8.0) { col = vec3(144.0,  95.0,  37.0)/256.0;
  } else if (cc ==  9.0) { col = vec3( 92.0,  71.0,   0.0)/256.0;
  } else if (cc == 10.0) { col = vec3(187.0, 119.0, 109.0)/256.0;
  } else if (cc == 11.0) { col = vec3( 85.0,  85.0,  85.0)/256.0;
  } else if (cc == 12.0) { col = vec3(128.0, 128.0, 128.0)/256.0;
  } else if (cc == 13.0) { col = vec3(172.0, 234.0, 136.0)/256.0;
  } else if (cc == 14.0) { col = vec3(124.0, 112.0, 218.0)/256.0;
  } else                 { col = vec3(171.0, 171.0, 171.0)/256.0;
  }
  gl_FragColor = vec4(col,1.0);
}





</script>

<script type="x-shader/x-fragment" id="fragmentShaderOutOfYourMind">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// srtuss, 2013
// playing around with distorted stuff
// may contain voronoi noise :)
// the motion blur makes it a bit slow on full screen, but i think its important for the effect

// name and initial inspiration taken from here:
// http://www.youtube.com/watch?v=LZAgpRx4HjU


// comment this for the old monochrome version
#define COLORS


float hash(float x)
{
    return fract(sin(x) * 4358.5453123) * 2.0 - 1.0;
}
vec2 hash2(in vec2 p)
{
	return fract(vec2(sin(p.x * 591.32 + p.y * 154.077), cos(p.x * 391.32 + p.y * 49.077)));
}
float noise(float x)
{
	float fl = floor(x);
	return mix(hash(fl), hash(fl + 1.0), smoothstep(0.0, 1.0, fract(x)));
}
float fbm(float x)
{
	return noise(x) * 0.5 + noise(x * 2.1) * 0.25 + noise(x * 4.2) * 0.125;
}

vec2 rotate(vec2 p, float a)
{
	return vec2(p.x * cos(a) - p.y * sin(a), p.x * sin(a) + p.y * cos(a));
}

float mechstep(float x, float f, float r)
{
	float fr = fract(x);
	float fl = floor(x);
	return fl + pow(fr, 0.5) + sin(fr * f) * exp(-fr * 3.5) * r;
}

// will this still be executed per pixel? could someone tell me?
float time = iGlobalTime * 1.6;
float ns = smoothstep(0.4, 1.0, noise(time));
float ns2 = smoothstep(0.4, 1.0, noise(333.33 - time));

float voronoi(in vec2 x)
{
	vec2 p = floor(x);
	vec2 f = fract(x);
	vec2 res = vec2(8.0);
	for(int j = -1; j <= 1; j ++)
	{
		for(int i = -1; i <= 1; i ++)
		{
			vec2 b = vec2(i, j);
			vec2 r = vec2(b) - f + hash2(p + b);
			float d = max(abs(r.x), abs(r.y));
			if(d < res.x)
			{
				res.y = res.x;
				res.x = d;
			}
			else if(d < res.y)
				res.y = d;
		}
	}
	return res.y - res.x;
}

float ring(vec2 p, float r, float a)
{
	float v, w, c;
	float l = length(p);
	w = max(l - r - 0.05, -(l - r + 0.05));
	v = w;
	w = rotate(p, a + 1.0).x;
	c = w;
	w = -rotate(p, a).x;
	c = max(c, w);
	v = max(v, -c);
	return v;
}

float dis(vec2 uv)
{
	float v, w;
	float t = time * 2.5;
	v = length(uv) - 0.15;
	
	w = ring(uv, 0.3, t);
	v = min(v, w);
	w = ring(uv, 0.5, t * 2.0);
	v = min(v, w);
	w = ring(uv, 0.7, t * -1.7);
	v = min(v, w);
	w = ring(uv, 0.9, t * 1.1);
	v = min(v, w);
	
	return v;
}

// this is the insane part :)
vec3 scene(vec2 uv)
{
	vec3 col = vec3(0.0);
	
	float l = length(uv);
	float t = mod(time, 10.0);
	float v;
	float mech = mechstep(time * 2.0, 5.0, 2.0) * 0.5;
	
	if(t < 8.0)
	{
		float vo = 1.0 - smoothstep(0.0, 0.5, voronoi(uv * 1.5));
		float a = atan(uv.y, uv.x);
		a += mech * 0.5;
		float l2 = l + sin(a * 4.0) * t;
		v = smoothstep(-0.05, 0.05, sin(l2 * 5.0));
		col = vec3(vo * 4.0 * (exp(-3.0 * fract(t * 0.5))) + v);
	}
	else
	{
		v = smoothstep(-0.2, 0.2, sin(l * 8.0 - 2.0 * mech));
		col = vec3(v);
	}
	
	float d = dis(uv);
	col = mix(col, vec3(0.0), 1.0 - smoothstep(0.0, 0.1, d));
	col = mix(col, vec3(1.0), 1.0 - smoothstep(0.0, 0.008, d));
	
	return col;
}

vec4 fbm_and_deriv_2(float x)
{
	float h = 0.001;
	float y = 111.11 - x;
	return vec4(fbm(x), fbm(y), (fbm(x + h) - fbm(x - h)) / h, (fbm(y + h) - fbm(y - h)) / h);
}

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	vec2 p = uv;
	
	// distortion
	p.x += hash(hash(uv.y + hash(time * 2.0))) * ns;
	p.y = fract(p.y - ns * 10.0);
	
	p = p * 2.0 - 1.0;
	p.x *= iResolution.x / iResolution.y;
	
	// nervous camera
	vec4 cam = fbm_and_deriv_2(time * 2.0);
	p.x += cam.x * 0.6;
	p.y += cam.y * 0.6;
	p *= 1.0 + fbm(time * 0.1) * 0.5;
	
	// motion blur?
	vec3 col = vec3(0.0);
	vec2 blur = vec2(cam.z, -cam.w) * 3.0 / iResolution.y;
	
	col += 0.014732 * scene(p + -4.0 * blur); 
	col += 0.049457 * scene(p + -3.0 * blur);
	col += 0.117466 * scene(p + -2.0 * blur);
	col += 0.197389 * scene(p + -1.0 * blur);
	col += 0.234672 * scene(p +  0.0 * blur);
	col += 0.197389 * scene(p +  1.0 * blur);
	col += 0.117466 * scene(p +  2.0 * blur);
	col += 0.049457 * scene(p +  3.0 * blur);
	col += 0.014732 * scene(p +  4.0 * blur);
	
	
#ifdef COLORS
	col = pow(col, vec3(1.0, 0.5, 1.5)) * 1.5;
#endif
	
	gl_FragColor = vec4(col, 1.0);
}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderBloomFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


vec3 sample(vec2 tc);
vec3 blur(vec2 tc, float offs);
vec3 highlights(vec3 pixel, float thres);

void main(void)
{
	vec2 tc = gl_FragCoord.xy / iResolution.xy;
	vec3 color = blur(tc, 2.0);
	color += blur(tc, 3.0);
	color += blur(tc, 5.0);
	color += blur(tc, 7.0);
	color /= 4.0;
	
	color += sample(tc);
	
	float div_pos = iMouse.x / iResolution.x;
	if(iMouse.x < 2.0) {
		div_pos = 0.5;
	}
	float divider = smoothstep(div_pos - 0.01, div_pos + 0.01, tc.x);
	gl_FragColor.xyz = mix(sample(tc), color, divider) * (divider * divider + (1.0 - divider) * (1.0 - divider));
	gl_FragColor.w = 1.0;
}

vec3 sample(vec2 tc)
{
	return pow(texture2D(iChannel0, tc).xyz, vec3(2.2, 2.2, 2.2));
}

vec3 hsample(vec2 tc)
{
	return highlights(sample(tc), 0.6);
}

vec3 blur(vec2 tc, float offs)
{
	vec4 xoffs = offs * vec4(-2.0, -1.0, 1.0, 2.0) / iResolution.x;
	vec4 yoffs = offs * vec4(-2.0, -1.0, 1.0, 2.0) / iResolution.y;
	
	vec3 color = vec3(0.0, 0.0, 0.0);
	color += hsample(tc + vec2(xoffs.x, yoffs.x)) * 0.00366;
	color += hsample(tc + vec2(xoffs.y, yoffs.x)) * 0.01465;
	color += hsample(tc + vec2(    0.0, yoffs.x)) * 0.02564;
	color += hsample(tc + vec2(xoffs.z, yoffs.x)) * 0.01465;
	color += hsample(tc + vec2(xoffs.w, yoffs.x)) * 0.00366;
	
	color += hsample(tc + vec2(xoffs.x, yoffs.y)) * 0.01465;
	color += hsample(tc + vec2(xoffs.y, yoffs.y)) * 0.05861;
	color += hsample(tc + vec2(    0.0, yoffs.y)) * 0.09524;
	color += hsample(tc + vec2(xoffs.z, yoffs.y)) * 0.05861;
	color += hsample(tc + vec2(xoffs.w, yoffs.y)) * 0.01465;
	
	color += hsample(tc + vec2(xoffs.x, 0.0)) * 0.02564;
	color += hsample(tc + vec2(xoffs.y, 0.0)) * 0.09524;
	color += hsample(tc + vec2(    0.0, 0.0)) * 0.15018;
	color += hsample(tc + vec2(xoffs.z, 0.0)) * 0.09524;
	color += hsample(tc + vec2(xoffs.w, 0.0)) * 0.02564;
	
	color += hsample(tc + vec2(xoffs.x, yoffs.z)) * 0.01465;
	color += hsample(tc + vec2(xoffs.y, yoffs.z)) * 0.05861;
	color += hsample(tc + vec2(    0.0, yoffs.z)) * 0.09524;
	color += hsample(tc + vec2(xoffs.z, yoffs.z)) * 0.05861;
	color += hsample(tc + vec2(xoffs.w, yoffs.z)) * 0.01465;
	
	color += hsample(tc + vec2(xoffs.x, yoffs.w)) * 0.00366;
	color += hsample(tc + vec2(xoffs.y, yoffs.w)) * 0.01465;
	color += hsample(tc + vec2(    0.0, yoffs.w)) * 0.02564;
	color += hsample(tc + vec2(xoffs.z, yoffs.w)) * 0.01465;
	color += hsample(tc + vec2(xoffs.w, yoffs.w)) * 0.00366;

	return color;
}

vec3 highlights(vec3 pixel, float thres)
{
	float val = (pixel.x + pixel.y + pixel.z) / 3.0;
	return pixel * smoothstep(thres - 0.1, thres + 0.1, val);
}



</script>






<script type="x-shader/x-fragment" id="fragmentShaderLEDNumbers">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


float xp = iResolution.x / 60.0;
float yp = iResolution.y / 30.0;

const vec4 l1 = vec4(0.1, 1.1, .9, 1.1);   // top horizontal
const vec4 l2 = vec4(0.0, 1.0, 0.0, 0.6);  // top left vertical
const vec4 l3 = vec4(1.0, 1.0, 1.0, 0.6);  // top right vertical
const vec4 l4 = vec4(0.1, 0.5, .9, 0.5);   // middle horizontal
const vec4 l5 = vec4(0.0, 0.4, 0.0, 0.0);  // lower left vertical
const vec4 l6 = vec4(1.0, 0.4, 1.0, 0.0);  // lower right vertical
const vec4 l7 = vec4(0.1, -0.1, .9, -0.1); // lower horizontal

float  notbetween(float x, float less, float more) {
    return 1.0 -  step(x, more) * step(less, x);
}


// distance between point p and line (l.x,l.y to l.z, l.w)
float ldist(in vec4 l,in vec2 p) { 
  vec2 lo = (l.zw - l.xy);
  float l2 = dot(lo, lo);
  float t = dot(p - l.xy, lo)/l2;
  
  if (l2 < 0.0 || t < 0.0001) {
    return length(p - l.xy);
  }
  if ( t > 1.0 ) {
    return length(p - l.zw);
  }
  return length(p - (l.xy + t * lo)); 
}

// use distance to l to return a brightness value 
float dist(in vec4 l,in vec2 p,in vec2 o,in vec2 s,in float w) {
    l = l * s.xyxy * 0.423;
    l += o.xyxy + vec4(0.28, 0.46, 0.28, 0.46) * s.x;
    return w * length(s)/(ldist(l, p)/w); // 14.9250;
}

// brightness of p for digit x, offset o, scale s, intensity w
float number(in vec2 p,in float x,in vec2 o,in vec2 s,in float w) {
    float not1or7, not4;
    return 
        notbetween(x, 0.5, 1.5) // not 1
          * notbetween(x, 3.5, 4.5) // and not 4
          * dist(l1, p, o, s, w)
      + notbetween(x, 0.5, 3.5) // not 1,2,3
          * notbetween(x, 6.5, 7.5) // and not 7
          * dist(l2, p, o, s, w)
      + notbetween(x, 4.5, 6.5) // not 4 or 5
          * dist(l3, p, o, s, w)
      + (not1or7 = (notbetween(x, 0.5, 1.5) * notbetween(x, 6.5, 7.5))) // not 1 or 7
          * step(0.5, x) // not  0
          * dist(l4, p, o, s, w)
      + mod(x + 1.0, 2.0) // not even
          * (not4 =  notbetween(x, 3.5, 4.5)) // not 4
          * dist(l5, p, o, s, w)
      + notbetween(x, 1.5, 2.5) // not 2
          * dist(l6, p, o, s, w)
      + not1or7 * not4 * dist(l7, p, o, s, w) // not 1, 7 or 4.
      - (0.2 + not1or7*0.23) * (0.2 + not1or7*0.23);
}

vec3 brighten(vec3 c) {
    return c / max(max(c.x, c.y), c.z);
}

void main() {
    vec2 s = vec2(1.0/(iResolution.x/xp), 1.0/(iResolution.y/yp));
    vec2 p = gl_FragCoord.xy/iResolution.xy;

    float t2 = fract(iGlobalTime /45.0) * 2.0 * 3.14159;
    vec2 cp = vec2(0.5, 0.5);
    float st2 = sin(t2);
    float ct2 = cos(t2);
    p += vec2(st2 * s.x/s.y, ct2) * (cp.x - p.x) * .4;
    p += (cp - p) * (st2 - 0.1);
    p.x -= st2/3.0;
    vec2 c = floor(p/s) * s;
    float cc = step(0.5, c.x);
    float t = floor(mod(fract(iGlobalTime/100.0) * (10.0 + cc * 90.0), 10.0));
      
    float n = number(
      c, t,
      vec2(0.018 + cc * .5, -0.14),
      vec2(.5, 1.85),
      0.165
    );

    float d = floor(mod(n,10.0));
    float b = number(p, d, c, s, 0.15);
    
    float sd = 1.0 - 1.0 / (1.0 + (d + 0.001)/9.0);
    vec3 col = brighten(vec3(b,b,b)) * 
      vec3(sin(sd * 3.14159),
          cos((d + 1.7) /sd) / 1.5 + 0.12,
      ((d * d + 19.0)/100.0) * sqrt(sd)
    );
    col *=  (1.0 - (1.0/(1.0 + b)));
    gl_FragColor = vec4(col, 1.0);
}



</script>




<script type="x-shader/x-fragment" id="fragmentShaderBlueICE">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform sampler2D iChannel1;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// sphere tracing transparent stuff
// @simesgreen

const int maxSteps = 64;
const float hitThreshold = 0.01;
const float minStep = 0.01;
const float PI = 3.14159;

#define TEST_OBJECT 0

const vec3 translucentColor = vec3(0.8, 0.2, 0.1)*3.0;
//const vec3 translucentColor = vec3(0.2, 0.05, 0.5)*2.0;

float difference(float a, float b)
{
    return max(a, -b);
}

float noise( in vec3 x )
{
    vec3 p = floor(x);
    vec3 f = fract(x);
	f = f*f*(3.0-2.0*f);
	
	vec2 uv = (p.xy+vec2(37.0,17.0)*p.z) + f.xy;
	vec2 rg = texture2D( iChannel0, (uv+ 0.5)/256.0, -100.0 ).yx;
	return mix( rg.x, rg.y, f.z )*2.0-1.0;
}

const mat3 m = mat3( 0.00,  0.80,  0.60,
                    -0.80,  0.36, -0.48,
                    -0.60, -0.48,  0.64 );

float fbm( vec3 p )
{
    float f;
    f  = 0.5000*noise( p ); p *= m*2.02; //p = p*2.02;
    f += 0.2500*noise( p ); p *= m*2.03; //p = p*2.03;
    f += 0.1250*noise( p ); p *= m*2.01; //p = p*2.01;
    f += 0.0625*noise( p ); 	
    return f;
}


// transforms
vec3 rotateX(vec3 p, float a)
{
    float sa = sin(a);
    float ca = cos(a);
    return vec3(p.x, ca*p.y - sa*p.z, sa*p.y + ca*p.z);
}

vec3 rotateY(vec3 p, float a)
{
    float sa = sin(a);
    float ca = cos(a);
    return vec3(ca*p.x + sa*p.z, p.y, -sa*p.x + ca*p.z);
}

float sphere(vec3 p, float r)
{
    return length(p) - r;
}

float box( vec3 p, vec3 b )
{
  vec3 d = abs(p) - b;
  return min(max(d.x,max(d.y,d.z)),0.0) + length(max(d,0.0));
}

// distance to scene
float scene(vec3 p)
{          
    float d;

	
#if TEST_OBJECT
	//d = p.y;
	d = sphere(p, 1.0);
	//d = box(p, vec3(1.0));
	d = difference(box(p, vec3(1.1)), d);
	d = min(d, sphere(p, 0.5));
	
	vec3 np = p;
	//vec3 np = p + vec3(0.0, -iGlobalTime*0.2, 0.0);
	d += fbm(np)*0.2;
#else
	vec3 np = p + vec3(0.0, 0.0, -iGlobalTime);
	d = fbm(np)*0.8 + 0.2;
#endif
	
	return d;
}

// calculate scene normal
vec3 sceneNormal(in vec3 pos )
{
    float eps = 0.05;
    vec3 n;
    float d = scene(pos);
    n.x = scene( vec3(pos.x+eps, pos.y, pos.z) ) - d;
    n.y = scene( vec3(pos.x, pos.y+eps, pos.z) ) - d;
    n.z = scene( vec3(pos.x, pos.y, pos.z+eps) ) - d;
    return normalize(n);
}


// trace ray using regular sphere tracing
// returns position of closest surface
vec3 trace(vec3 ro, vec3 rd, out bool hit)
{
    hit = false;
    vec3 pos = ro;
    for(int i=0; i<maxSteps; i++)
    {
		float d = scene(pos);
		if (abs(d) < hitThreshold) {
			hit = true;
		}
		pos += d*rd;
    }
    return pos;
}

// trace all the way through the scene,
// keeping track of distance traveled inside volume
vec3 traceInside(vec3 ro, vec3 rd, out bool hit, out float insideDist)
{
    hit = false;
	insideDist = 0.0;	
    vec3 pos = ro;
	vec3 hitPos = pos;
    for(int i=0; i<maxSteps; i++)
    {
		float d = scene(pos);
		d = max(abs(d), minStep) * sign(d); // enforce minimum step size
		
		if (d < hitThreshold && !hit) {
			// save first hit
			hitPos = pos;
			hit = true;
		}
		
		if (d < 0.0) {
			// sum up distance inside
			insideDist += -d;
		}
		pos += abs(d)*rd;
    }
    return hitPos;
}

vec3 background(vec3 rd)
{
     return vec3(1.0);
}

void main(void)
{
    vec2 pixel = (gl_FragCoord.xy / iResolution.xy)*2.0-1.0;

    // compute ray origin and direction
    float asp = iResolution.x / iResolution.y;
    vec3 rd = normalize(vec3(asp*pixel.x, pixel.y, -1.5));
    vec3 ro = vec3(0.0, 0.0, 2.5);

     vec2 mouse = iMouse.xy / iResolution.xy;
     float roty = -iGlobalTime*0.2;
     float rotx = 0.0;
     if (iMouse.z > 0.0) {
          rotx = (mouse.y-0.5)*PI;
          roty = -(mouse.x-0.5)*PI*2.0;
     }
     
    rd = rotateX(rd, rotx);
    ro = rotateX(ro, rotx);
          
    rd = rotateY(rd, roty);
    ro = rotateY(ro, roty);
          
    // trace ray
    bool hit;
	float dist;
	//vec3 hitPos = trace(ro, rd, hit);
	vec3 hitPos = traceInside(ro, rd, hit, dist);

    vec3 rgb = vec3(0.0);
    if(hit) {
		vec3 n = sceneNormal(hitPos);
		//rgb = n*0.5+0.5;
		//rgb = vec3(dist*0.2);
		
		// exponential fall-off:
		rgb = exp(-dist*dist*translucentColor);
		
		// cubemap reflection
		vec3 i = normalize(hitPos - ro);
		vec3 r = reflect(i, n);
		float fresnel = 0.1 + 0.9*pow(1.0 - clamp(dot(-i, n), 0.0, 1.0), 2.0);
		rgb += textureCube(iChannel1, r).rgb * fresnel;
		//rgb += vec3(fresnel);

     } else {
        rgb = background(rd);
     }
     
    gl_FragColor=vec4(rgb, 1.0);
}




</script>



<script type="x-shader/x-fragment" id="fragmentShaderMagnifyFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click



#define pi 3.141592653589793238462643383279

float atan2(float y, float x){
	if(x>0.) return atan(y/x);
	if(y>=0. && x<0.) return atan(y/x) + pi; 
	if(y<0. && x<0.) return atan(y/x) - pi; 
	if(y>0. && x==0.) return pi/2.;
	if(y<0. && x==0.) return -pi/2.;
	if(y==0. && x==0.) return pi/2.; // undefined usually
	return pi/2.;
}

vec2 uv_polar(vec2 uv, vec2 center){
	vec2 c = uv - center;
	float rad = length(c);
	float ang = atan2(c.x,c.y);
	return vec2(ang, rad);
}

vec2 uv_lens_half_sphere(vec2 uv, vec2 position, float radius, float refractivity){
	vec2 polar = uv_polar(uv, position);
	float cone = clamp(1.-polar.y/radius, 0., 1.);
	float halfsphere = sqrt(1.-pow(cone-1.,2.));
	float w = atan2(1.-cone, halfsphere);
	float refrac_w = w-asin(sin(w)/refractivity);
	float refrac_d = 1.-cone - sin(refrac_w)*halfsphere/cos(refrac_w);
	vec2 refrac_uv = position + vec2(sin(polar.x),cos(polar.x))*refrac_d*radius;
	return mix(uv, refrac_uv, float(length(uv-position)<radius));
}

void main(void)
{
	// domain map
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	
	// aspect-ratio correction
	vec2 aspect = vec2(1.,iResolution.y/iResolution.x);
	vec2 uv_correct = 0.5 + (uv -0.5)* aspect;
	vec2 mouse_correct = 0.5 + ( iMouse.xy / iResolution.xy - 0.5) * aspect;

	vec2 pos = vec2(0.5);
	//pos = mouse_correct;
	
	vec2 uv_lense_distorted = uv_lens_half_sphere(uv_correct, pos, 0.166, 1.575);
	
	uv_lense_distorted = 0.5 + (uv_lense_distorted - 0.5) / aspect;
	
	gl_FragColor = texture2D(iChannel0, uv_lense_distorted);

}


</script>






<script type="x-shader/x-fragment" id="fragmentShaderGaussianBlurFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


#ifdef GL_ES
precision mediump float;
#endif

float normpdf(in float x, in float sigma)
{
	return 0.39894*exp(-0.5*x*x/(sigma*sigma))/sigma;
}


void main(void)
{
	vec3 c = texture2D(iChannel0, gl_FragCoord.xy / iResolution.xy).rgb;
	if (gl_FragCoord.x < iMouse.x)
	{
		gl_FragColor = vec4(c, 1.0);	
	} else {
		
		//declare stuff
		const int mSize = 11;
		const int kSize = (mSize-1)/2;
		float kernel[mSize];
		vec3 final_colour = vec3(0.0);
		
		//create the 1-D kernel
		float sigma = 7.0;
		float Z = 0.0;
		for (int j = 0; j <= kSize; ++j)
		{
			kernel[kSize+j] = kernel[kSize-j] = normpdf(float(j), sigma);
		}
		
		//get the normalization factor (as the gaussian has been clamped)
		for (int j = 0; j < mSize; ++j)
		{
			Z += kernel[j];
		}
		
		//read out the texels
		for (int i=-kSize; i <= kSize; ++i)
		{
			for (int j=-kSize; j <= kSize; ++j)
			{
				final_colour += kernel[kSize+j]*kernel[kSize+i]*texture2D(iChannel0, (gl_FragCoord.xy+vec2(float(i),float(j))) / iResolution.xy).rgb;
	
			}
		}
		
		
		gl_FragColor = vec4(final_colour/(Z*Z), 1.0);
	}
}








</script>







<script type="x-shader/x-fragment" id="fragmentShaderWickedTunnel">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

float time=iGlobalTime;

vec3 palette(float i)
{
	if(i<4.0)
	{
		if(i<2.0)
		{
			if(i<1.0) return vec3(0.0,0.0,0.0);
			else return vec3(1.0,3.0,31.0);
		}
		else
		{
			if(i<3.0) return vec3(1.0,3.0,53.0);
			else return vec3(28.0,2.0,78.0);
		}
	}
	else if(i<8.0)
	{
		if(i<6.0)
		{
			if(i<5.0) return vec3(80.0,2.0,110.0);
			else return vec3(143.0,3.0,133.0);
		}
		else
		{
			if(i<7.0) return vec3(181.0,3.0,103.0);
			else return vec3(229.0,3.0,46.0);
		}
	}
	else
	{
		if(i<10.0)
		{
			if(i<9.0) return vec3(252.0,73.0,31.0);
			else return vec3(253.0,173.0,81.0);
		}
		else if(i<12.0)
		{
			if(i<11.0) return vec3(254.0,244.0,139.0);
			else return vec3(239.0,254.0,203.0);
		}
		else
		{
			return vec3(242.0,255.0,236.0);
		}
	}
}


vec4 colour(float c)
{
	c*=12.0;
	vec3 col1=palette(c)/256.0;
	vec3 col2=palette(c+1.0)/256.0;
	return vec4(mix(col1,col2,c-floor(c)),1.0);
}

float periodic(float x,float period,float dutycycle)
{
	x/=period;
	x=abs(x-floor(x)-0.5)-dutycycle*0.5;
	return x*period;
}

float pcount(float x,float period)
{
	return floor(x/period);
}

float distfunc(vec3 pos)
{
	vec3 gridpos=pos-floor(pos)-0.5;
	float r=length(pos.xy);
	float a=atan(pos.y,pos.x);
	a+=time*0.3*sin(pcount(r,3.0)+1.0)*sin(pcount(pos.z,1.0)*13.73);
	return min(max(max(
	periodic(r,3.0,0.2),
	periodic(pos.z,1.0,0.7+0.3*cos(time/3.0))),
	periodic(a*r,3.141592*2.0/6.0*r,0.7+0.3*cos(time/3.0))),
	0.25);
	//return max(length(gridpos)-0.5,
	//	  abs(r-floor(r)-0.5)-0.1);
}

void main()
{
	vec2 coords=(2.0*gl_FragCoord.xy-iResolution.xy)/max(iResolution.x,iResolution.y);

	vec3 ray_dir=normalize(vec3(coords,1.0+0.0*sqrt(coords.x*coords.x+coords.y*coords.y)));
	vec3 ray_pos=vec3(0.0,-1.0,time*1.0);

	float a=cos(time)*0.0*0.4;
	ray_dir=ray_dir*mat3(
		cos(a),0.0,sin(a),
		0.0,1.0,0.0,
		-sin(a),0.0,cos(a)
	);

	float i=192.0;
	for(int j=0;j<192;j++)
	{
		float dist=distfunc(ray_pos);
		ray_pos+=dist*ray_dir;

		if(abs(dist)<0.001) { i=float(j); break; }
	}

	float c=i/192.0;
	gl_FragColor=colour(c);
}


</script>








<script type="x-shader/x-fragment" id="fragmentShaderSpaceRings">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

/*by mu6k, Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

 Rotating rings in space. Use mouse to rotate the camera.

 The distance function creates rings by subtracting a smaller radius cylinder with
 a larger radius cylinder. The result is then intersected with a plane.
 This is inside a for loop so that you get more rings. The space is rotated at
 every iteration.

 Sometimes the rings line up and form a plane. This happens when the rotation for
 each axis is 2*k*pi where k is an integer. This will cause 0 rotation on every iteration.

 For the flare, a ray is traced from the center of the camera to determine how much the
 light source is occluded. This is used to scale and amplify the flare.

 Most of the code was taken from my older shader. https://www.shadertoy.com/view/Mss3WN

 21/06/2013:
 - published

 muuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuusk!*/

#define occlusion_enabled
#define occlusion_quality 12
//#define occlusion_preview

#define noise_use_smoothstep

#define light_color vec3(1.0,1.1,1.8)

#define background_color_0 vec3(.2,.4,.6)
#define background_color_1 vec3(.32,.2,.1)*4.0

#define object_color vec3(0.5,0.5,0.5)
#define object_count 10
#define object_speed_modifier 1.0

#define render_steps 50

//use sphere instead of cylinder, only 1 sqrt is needed per distance function
#define optimisation_0

//remove ambient light, it's barely visible anyways...
//#define optimisation_1

//only 2 axis rotation instead of 3
//#define optimisation_2

float hash(float x)
{
	return fract(sin(x*.0127863)*17143.321); //decent hash for noise generation
}

float hash(vec2 x)
{
	return fract(cos(dot(x.xy,vec2(2.31,53.21))*124.123)*412.0); 
}

float hashmix(float x0, float x1, float interp)
{
	x0 = hash(x0);
	x1 = hash(x1);
	#ifdef noise_use_smoothstep
	interp = smoothstep(0.0,1.0,interp);
	#endif
	return mix(x0,x1,interp);
}

float hashmix(vec2 p0, vec2 p1, vec2 interp)
{
	float v0 = hashmix(p0[0]+p0[1]*128.0,p1[0]+p0[1]*128.0,interp[0]);
	float v1 = hashmix(p0[0]+p1[1]*128.0,p1[0]+p1[1]*128.0,interp[0]);
	#ifdef noise_use_smoothstep
	interp = smoothstep(vec2(0.0),vec2(1.0),interp);
	#endif
	return mix(v0,v1,interp[1]);
}

float hashmix(vec3 p0, vec3 p1, vec3 interp)
{
	float v0 = hashmix(p0.xy+vec2(p0.z*143.0,0.0),p1.xy+vec2(p0.z*143.0,0.0),interp.xy);
	float v1 = hashmix(p0.xy+vec2(p1.z*143.0,0.0),p1.xy+vec2(p1.z*143.0,0.0),interp.xy);
	#ifdef noise_use_smoothstep
	interp = smoothstep(vec3(0.0),vec3(1.0),interp);
	#endif
	return mix(v0,v1,interp[2]);
}

float noise(vec3 p) // 3D noise
{
	vec3 pm = mod(p,1.0);
	vec3 pd = p-pm;
	return hashmix(pd,(pd+vec3(1.0,1.0,1.0)), pm);
}

vec3 cc(vec3 color, float factor,float factor2) // color modifier
{
	float w = color.x+color.y+color.z;
	return mix(color,vec3(w)*factor,w*factor2);
}


vec3 rotate_z(vec3 v, float angle)
{
	float ca = cos(angle); float sa = sin(angle);
	return v*mat3(
		+ca, -sa, +.0,
		+sa, +ca, +.0,
		+.0, +.0,+1.0);
}

vec3 rotate_y(vec3 v, float angle)
{
	float ca = cos(angle); float sa = sin(angle);
	return v*mat3(
		+ca, +.0, -sa,
		+.0,+1.0, +.0,
		+sa, +.0, +ca);
}

vec3 rotate_x(vec3 v, float angle)
{
	float ca = cos(angle); float sa = sin(angle);
	return v*mat3(
		+1.0, +.0, +.0,
		+.0, +ca, -sa,
		+.0, +sa, +ca);
}

float dist(vec3 p)//distance function
{
	float d=1024.0;
	float t = iGlobalTime*object_speed_modifier+5.0;
	
	#ifdef optimisation_0
		float s = length(p);
	#endif
	
	for (int i=0; i<object_count; i++)
	{
		#ifndef optimisation_2
		p = rotate_z(p,t*.05);
		#endif
		p = rotate_y(p,t*.1);
		p = rotate_x(p,t*.075);
		
		float fi = float(i);
		
		#ifdef optimisation_0
			float c1 = s-(fi+1.0); //use sphere radius
			float c2 = s-(fi+1.6);
		#else
			float c1 = length(p.xz)-(fi+1.0); //2 cylinders
			float c2 = length(p.xz)-(fi+1.6);
		#endif
		
		float plane = length(abs(p.y))-0.2;
		//intersect(plane(subtract(cylinder2,cylinder1)))
		float shape = max(plane,max(c2,-c1)); 
		d = min(d,shape);
	}

	return d;
}

//!!modified
float occlusion(vec3 p, vec3 d, float e, float spd)//returns how much a point is visible from a given direction
{
	float occ = 1.0;
	p=p+d;
	for (int i=0; i<occlusion_quality; i++)
	{
		float lp = length(p);
		if(lp<1.0) //lightsource
		{
			break;
		}
		float dd = dist(p);
		p+=d*dd*spd;
		occ = min(occ,dd*e);
	}
	return max(.0,occ);
}

vec3 normal(vec3 p,float e) //returns the normal, uses the distance function
{
	float d=dist(p);
	return normalize(vec3(dist(p+vec3(e,0,0))-d,dist(p+vec3(0,e,0))-d,dist(p+vec3(0,0,e))-d));
}

vec3 light; //global variable that holds light direction

vec3 background(vec3 p,vec3 d)//render background
{
	float i = d.y*.5+.5;
	
	float dust = noise(d*3.0); 
	float stars = noise(d*100.0);
	stars = pow(stars,80.0);
	stars*=2.0;
	
	float w = dust*.5+.5;
	vec3 color = mix(background_color_0,background_color_1,i);
	
	color*=w;
	color += vec3(stars);

	return color*.6;
}

vec3 object_material(vec3 p, vec3 d) //computes the material for the object
{
	vec3 color = object_color;
	vec3 n = normal(p,0.12);
	vec3 r = reflect(d,n);	
	
	float reflectance = dot(d,r)*.5+.5;reflectance=pow(reflectance,2.0);
	float diffuse = dot(light,n)*.5+.5; diffuse = max(.0,diffuse);
	
	
	float post_light_occlusion = occlusion(p-light*.5,light,2.0,.3);
	float post_light = pow(dot(r,normalize(-p))*.50+.5,40.0)*post_light_occlusion;
	
	#ifdef occlusion_enabled
		#ifndef optimisation_1
		float oa = occlusion(p,n,0.4,1.0)*.5+.5;
		#else
		float oa=.0;
		#endif
		float od = post_light_occlusion*.5+.5;
		float os = occlusion(p,r,2.0,1.0)*.95+.05;
	#else
		float oa=1.0;
		float od=1.0;
		float os=1.0;
	#endif
	
	#ifndef occlusion_preview
		color = 
		color*oa*.1 + //ambient
		color*diffuse*od*.7 + //diffuse
		light_color*post_light+background(p,r)*os*reflectance*.5; //reflection
	#else
		color=vec3(oa*od*os);
	#endif
	
	//return vec3(post_light_occlusion);
	
	return color;
}

#define offset1 4.9
#define offset2 3.6

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy - 0.5;
	uv.x *= iResolution.x/iResolution.y; //fix aspect ratio
	vec3 mouse = vec3(iMouse.xy/iResolution.xy - 0.5,iMouse.z-.5);
	
	float t = iGlobalTime*.5*object_speed_modifier + 2.0;
	
	//setup the camera
	vec3 p = vec3(.0,0.0,-4.9);
	p = rotate_x(p,mouse.y*9.0+offset1);
	p = rotate_y(p,mouse.x*9.0+offset2);
	vec3 d = vec3(uv,1.0);
	d.z -= length(d)*.7; //lens distort
	d = normalize(d);
	d = rotate_x(d,mouse.y*9.0+offset1);
	d = rotate_y(d,mouse.x*9.0+offset2);
	
	
	vec3 sp = p;
	
	
	//and action!
	float dd;
	vec3 color;
	for (int i=0; i<render_steps; i++) //raymarch
	{
		dd = dist(p);
		p+=d*dd*.7;
		if (dd<.001 || dd>10.0) break;
	}
	
	//setup light source for shading
	light = normalize(-p);
	
	if (dd<0.1) //close enough
		color = object_material(p,d);
	else
		color = background(sp,d);
	
	//prepare ray to check lightsource occlusion
	vec3 md = vec3(vec2(.0,.0),1.0);
	md.z -= length(md)*.7; //lens distort
	md = normalize(md);
	md = rotate_x(md,mouse.y*9.0+offset1);
	md = rotate_y(md,mouse.x*9.0+offset2);
	
	float post_light_occlusion = occlusion(sp-md,md,4.0,1.0);
	
	float post_light = pow(dot(d,normalize(-sp))*.50+.5,256.0/(post_light_occlusion*1.0));
	float post_light_scifi = pow((dot(d,normalize(-sp))*.2+1.0/(1.0+abs(uv.y)))*.6,4.0/(post_light_occlusion*1.0));
	
	color+=light_color*(post_light+post_light_scifi);
	
	//post procesing
	color *=.85;
	color = mix(color,color*color,0.3);
	color -= hash(color.xy+uv.xy)*.015;
	color -= length(uv)*.1;
	color =cc(color,.5,.6);
	gl_FragColor = vec4(color,1.0);
}

</script>






















<script type="x-shader/x-fragment" id="fragmentShaderRipples">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


vec2 center = vec2(0.5,0.5);
float speed = 0.035;
float invAr = iResolution.y / iResolution.x;

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
		
	vec3 col = vec4(uv,0.5+0.5*sin(iGlobalTime),1.0).xyz;
   
     vec3 texcol;
			
	float x = (center.x-uv.x);
	float y = (center.y-uv.y) *invAr;
		
	//float r = -sqrt(x*x + y*y); //uncoment this line to symmetric ripples
	float r = -(x*x + y*y);
	float z = 1.0 + 0.5*sin((r+iGlobalTime*speed)/0.013);
	
	texcol.x = z;
	texcol.y = z;
	texcol.z = z;
	
	gl_FragColor = vec4(col*texcol,1.0);
	//gl_FragColor = vec4(texcol,1.0);
}

</script>







<script type="x-shader/x-fragment" id="fragmentShaderCycloneSphere">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// Built from the basics of'Clouds' Created by inigo quilez - iq/2013
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

// Edited by NeoNusso into "Cyclonic Sphere"

#define time (iGlobalTime + 23.0)
const vec3 backc_top=vec3(0.1,0.2,0.2);
const vec3 backc_bot=vec3(0.0,0.0,0.0);
const vec3 mainc=vec3(0.2,0.0,0.2);
const float timeScale = 0.2;
const float  PI = 3.14159265;
/*math**********************************************/
float hash( float n )
{
    return fract(sin(n)*43758.5453);
}
float noise( in vec3 x )
{
    vec3 p = floor(x);
    vec3 f = fract(x);
	

    f = f*f*(3.0-2.0*f);

    float n = p.x + p.y*57.0 + 113.0*p.z;

    float res = mix(mix(mix( hash(n+  0.0), hash(n+  1.0),f.x),
                        mix( hash(n+ 57.0), hash(n+ 58.0),f.x),f.y),
                    mix(mix( hash(n+113.0), hash(n+114.0),f.x),
                        mix( hash(n+170.0), hash(n+171.0),f.x),f.y),f.z);
    return res;
}
float fbm( vec3 p )
{
	const mat3 m = mat3( 0.00,  0.90,  0.60,
              -0.90,  0.36, -0.48,
              -0.60, -0.48,  0.34 );
    float f;
    f  = 1.300*noise( p ); p = m*p*2.02;
    f += 0.7500*noise( p ); p = m*p*2.03;
    f += 0.3000*noise( p ); p = m*p*2.01;
    f += 0.0800*noise( p ); p = m*p*2.01;
    return f;
}
/*shape**********************************************/
// from http://www.iquilezles.org/www/articles/distfunctions/distfunctions.htm
float lengthSphere(vec3 v,float r)
{
	return length(v) - r;
}
vec3 opTwistY( vec3 p, float rad_twist)
{
    float c = cos(rad_twist*p.y);
    float s = sin(rad_twist*p.y);
    mat2  m = mat2(c,-s,s,c);
	vec2  xz = m*p.xz;
    return  vec3(xz.x, p.y,xz.y );
}
//*Raymarching Functions***************************************************************/
//====================
// distanceFunction
//====================
float distanceFunction(vec3 p)
{
	return lengthSphere(p,3.6 ) ;
}
//Normal
vec3 getNormal(vec3 p, float t)
{
	float e = 0.001*t;
    vec3  eps = vec3(e,0.0,0.0);
    return -normalize( vec3(
    	distanceFunction(p+eps.xyy) - distanceFunction(p-eps.xyy),
		distanceFunction(p+eps.yxy) - distanceFunction(p-eps.yxy),
		distanceFunction(p+eps.yyx) - distanceFunction(p-eps.yyx)
		));
}
//====================
// 3dmap
//====================
vec4 map3d( in vec3 p )
{
	float d = 0.2 - abs(p.y)*pow(length(p.xz),pow(abs(cos(time*timeScale)),0.5))*0.2;

	float f= fbm(p - vec3(.5,0.8,0.0)*iGlobalTime*4.0);
	d += 4.0 * f;
	d = clamp( d, 0.0, 1.0 );
	
	return vec4( mix( vec3(0.4,0.1,0.1), 
				  vec3(1.0,1.0,1.0),
				  d * 0.9), d);
}
//*Shading Functions*************************************************/
vec3 phong(
  in vec3 pt,
  in vec3 prp,
  in vec3 normal,
  in vec3 light,
  in vec3 color,
  in float spec,
  in vec3 ambLight)
{
	vec3 lightv=normalize(light-pt);
	float diffuse=dot(normal,lightv);
	vec3 refl=-reflect(lightv,normal);
	vec3 viewv=normalize(prp-pt);
	float rim = max(0.0, 1.0-dot(viewv,normal));
	float specular=pow(max(dot(refl,viewv),0.0),spec);
	return (max(diffuse*0.5,0.0))*color+ambLight+specular;
}
//*Render Functions*************************************************/
float raymarching(
  in vec3 camPos,
  in vec3 rayDir,
  in int maxite,
  in float precis,
  in float startf,
  in float maxd,
  out int objfound)
{ 
	const vec3 e=vec3(0.1,0,0.0);
	float s=startf;
	vec3 c,p,n;
	float f=startf;
	objfound=1;
	for(int i=0;i<256;i++){
	if (abs(s)<precis||f>maxd||i>maxite) break;
		f+=s;
		p=camPos+rayDir*f;
		s=distanceFunction(p);
	}
	if (f>maxd) objfound=-1;
	return f;
}
//RenderOpaque
vec4 render(
	in vec3 camPos,
	in vec3 rayDir,
	in int maxite,
	in float precis,
	in float startf,
	in float maxd,
	in vec3 background,
	in vec3 light,
	in float spec,
	in vec3 ambLight)
{ 

	int objfound=-1;
	float f=raymarching(camPos,rayDir,maxite,precis,startf,maxd,objfound);
	if (objfound>0){
		vec3 p=camPos+rayDir*f;
		vec3 n = getNormal(p, f);
		return 
		vec4(
			phong(p,camPos,n,light,mainc,spec,ambLight),
			f);
	}
	f=maxd;
	return vec4(background,f);
}

//RenderVolume
vec4 renderRaymarchAccumulate( in vec3 camPos, in vec3 rayDir , vec4 base, float dstep)
{
	vec4 sum = vec4(0, 0, 0, 0);
	float f = 0.0;
	vec3 p = vec3(0.0, 0.0, 0.0);
	for(int i=0; i<120; i++)
	{
		if (f > base.w || sum.a > 0.8 ) continue;
		p = camPos + f*rayDir;
		vec4 col = map3d( opTwistY( p,0.5*cos(time*timeScale))  );
		col.a *= dstep;
		col.rgb *= col.a;
		sum = sum + col*(1.0 - sum.a);	
    	f += max(0.1,dstep*f);
	}
	sum.xyz /= (0.003+sum.w);

	return clamp( sum, 0.0, 1.0 );
}
//*Camera Functions*************************************************/
vec3 camera(
  in vec3 camPos,
  in vec3 camAt,
  in vec3 camUp,
  in float focus)
{
	vec2 vPos=-1.0+2.0*gl_FragCoord.xy/iResolution.xy;
	vec3 camDir=normalize(camAt-camPos);
	vec3 u=normalize(cross(camUp,camDir));
	vec3 v=cross(camDir,u);
	vec3 scrCoord=camPos+camDir*focus+vPos.x*u*iResolution.x/iResolution.y+vPos.y*v;
	return normalize(scrCoord-camPos);
}
vec3 prp_mouse(){
	 float mx=iMouse.x/iResolution.x*PI*2.0;
	 float my=-((iMouse.y+1.0)/iResolution.y*0.07 - 0.035)*PI;
	 return vec3(cos(my)*cos(mx),sin(my),cos(my)*sin(mx))*12.0; //Trackball style camera pos
}
//*Main***************************************************************/
void main(void)
{
	const vec3 camUp  =vec3(0,1,0);
	const vec3 camAt  =vec3(0.0,0.0,0.0);
	const float focus=1.5;
	vec3 camPos = camAt+prp_mouse()*2.0;
	vec3 rayDir= camera(camPos,camAt,camUp,focus);
	vec3 light= camPos+vec3(0.0,15.0,0.0);

	const float maxe=0.01;
	const float startf=0.1;
	const float spec=8.0;
	const vec3 ambi=vec3(0.0,0.2,0.2);
	
	float latitude = 0.5+0.5+rayDir.y;
	vec3 back =mix(backc_bot,backc_top,latitude*latitude);

	vec4 c1=render(camPos,rayDir,16,maxe,startf,40.0,back,light,spec,ambi);
	vec4 res = renderRaymarchAccumulate( camPos, rayDir, c1,0.03 );
	
	vec3 col = mix( c1.xyz, res.xyz, res.w*1.2);
	gl_FragColor=vec4(col.xyz,1.0);
}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderNightVisionFilter">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

//utility
float remap(float value, float inputMin, float inputMax, float outputMin, float outputMax)
{
    return (value - inputMin) * ((outputMax - outputMin) / (inputMax - inputMin)) + outputMin;
}
float rand(vec2 n, float time)
{
  return 0.5 + 0.5 * 
     fract(sin(dot(n.xy, vec2(12.9898, 78.233)))* 43758.5453 + time);
}

struct Circle
{
	vec2 center;
	float radius;
};
	
vec4 circle_mask_color(Circle circle, vec2 position)
{
	float d = distance(circle.center, position);
	if(d > circle.radius)
	{
		return vec4(0.0, 0.0, 0.0, 1.0);
	}
	
	float distanceFromCircle = circle.radius - d;
	float intencity = smoothstep(
								    0.0, 1.0, 
								    clamp(
									    remap(distanceFromCircle, 0.0, 0.1, 0.0, 1.0),
									    0.0,
									    1.0
								    )
								);
	return vec4(intencity, intencity, intencity, 1.0);
}

vec4 mask_blend(vec4 a, vec4 b)
{
	vec4 one = vec4(1.0, 1.0, 1.0, 1.0);
	return one - (one - a) * (one - b);
}

float f1(float x)
{
	return -4.0 * pow(x - 0.5, 2.0) + 1.0;
}
	
void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	
	float wide = iResolution.x / iResolution.y;
	float high = 1.0;
	
	vec2 position = vec2(uv.x * wide, uv.y);
	
	Circle circle_a = Circle(vec2(0.5, 0.5), 0.5);
	Circle circle_b = Circle(vec2(wide - 0.5, 0.5), 0.5);
	vec4 mask_a = circle_mask_color(circle_a, position);
	vec4 mask_b = circle_mask_color(circle_b, position);
	vec4 mask = mask_blend(mask_a, mask_b);
	
	float greenness = 0.4;
	vec4 coloring = vec4(1.0 - greenness, 1.0, 1.0 - greenness, 1.0);
	
	float noise = rand(uv * vec2(0.1, 1.0), iGlobalTime * 5.0);
	float noiseColor = 1.0 - (1.0 - noise) * 0.3;
	vec4 noising = vec4(noiseColor, noiseColor, noiseColor, 1.0);
	
	float warpLine = fract(-iGlobalTime * 0.5);
	
	/** debug
	if(abs(uv.y - warpLine) < 0.003)
	{
		gl_FragColor = vec4(1.0, 1.0, 1.0, 1.0);
		return;
	}
    */
	
	float warpLen = 0.1;
	float warpArg01 = remap(clamp((position.y - warpLine) - warpLen * 0.5, 0.0, warpLen), 0.0, warpLen, 0.0, 1.0);
	float offset = sin(warpArg01 * 10.0)  * f1(warpArg01);
	
	
	vec4 lineNoise = vec4(1.0, 1.0, 1.0, 1.0);
	if(abs(uv.y - fract(-iGlobalTime * 19.0)) < 0.0005)
	{
		lineNoise = vec4(0.5, 0.5, 0.5, 1.0);
	}
	
	vec4 base = texture2D(iChannel0, uv + vec2(offset * 0.02, 0.0));
	gl_FragColor = base * mask * coloring * noising * lineNoise;

}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderDigiClock">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

const float KEY_LEFT  = 37.5/256.0;
const float KEY_UP    = 38.5/256.0;
const float KEY_RIGHT = 39.5/256.0;
const float KEY_DOWN  = 40.5/256.0;

bool showMatrix = false;
bool showOff = false;

float segment(vec2 uv, bool On)
{
	if (!On && !showOff)
		return 0.0;
	
	float seg = (1.0-smoothstep(0.08,0.09+float(On)*0.02,abs(uv.x)))*
			    (1.0-smoothstep(0.46,0.47+float(On)*0.02,abs(uv.y)+abs(uv.x)));
	
	//Fiddle with lights and matrix
	//uv.x += sin(iGlobalTime*60.0*6.26)/34.0;
	//uv.y += cos(iGlobalTime*60.0*6.26)/34.0;
	
	//led like brightness
	if (On)
		seg *= (1.0-length(uv*vec2(3.8,0.9)));//power distortion-sin(iGlobalTime*25.0*6.26)*0.02);
	else
		seg *= -(0.05+length(uv*vec2(0.2,0.1)));
	
	return seg;
}

float sevenSegment(vec2 uv,int num)
{
	float seg= 0.0;
    seg += segment(uv.yx+vec2(-1.0, 0.0),num!=-1 && num!=1 && num!=4                    );
	seg += segment(uv.xy+vec2(-0.5,-0.5),num!=-1 && num!=1 && num!=2 && num!=3 && num!=7);
	seg += segment(uv.xy+vec2( 0.5,-0.5),num!=-1 && num!=5 && num!=6                    );
   	seg += segment(uv.yx+vec2( 0.0, 0.0),num!=-1 && num!=0 && num!=1 && num!=7          );
	seg += segment(uv.xy+vec2(-0.5, 0.5),num==0 || num==2 || num==6 || num==8           );
	seg += segment(uv.xy+vec2( 0.5, 0.5),num!=-1 && num!=2                              );
    seg += segment(uv.yx+vec2( 1.0, 0.0),num!=-1 && num!=1 && num!=4 && num!=7          );
	
	return seg;
}

float showNum(vec2 uv,int nr, bool zeroTrim)
{
	//Speed optimization, leave if pixel is not in segment
	if (abs(uv.x)>1.5 || abs(uv.y)>1.2)
		return 0.0;
	
	float seg= 0.0;
	if (uv.x>0.0)
	{
		nr /= 10;
		if (nr==0 && zeroTrim)
			nr = -1;
		seg += sevenSegment(uv+vec2(-0.75,0.0),nr);
	}
	else
		seg += sevenSegment(uv+vec2( 0.75,0.0),int(mod(float(nr),10.0)));
	
	return seg;
}

float dots(vec2 uv)
{
	float seg = 0.0;
	uv.y -= 0.5;
	seg += (1.0-smoothstep(0.11,0.13,length(uv))) * (1.0-length(uv)*2.0);
	uv.y += 1.0;
	seg += (1.0-smoothstep(0.11,0.13,length(uv))) * (1.0-length(uv)*2.0);
	return seg;
}

void main(void)
{
	bool ampm = texture2D(iChannel0,vec2(KEY_UP,0.75)).r >0.5;
	bool isGreen = texture2D(iChannel0,vec2(KEY_DOWN,0.75)).r >0.5;
	showMatrix = texture2D(iChannel0,vec2(KEY_LEFT,0.75)).r >0.5;
	showOff = texture2D(iChannel0,vec2(KEY_RIGHT,0.75)).r >0.5;
	
	vec2 uv = (gl_FragCoord.xy-0.5*iResolution.xy) /
 		       min(iResolution.x,iResolution.y);
	
	float timeOffset = 0.0;
	if (iResolution.x>iResolution.y)
	{
		uv *= 6.0;
	}
	else
	{
		uv *= 12.0;
		// Many clocks with different time + zoom in on the right one
		//uv *= 70.0+sin(iGlobalTime*0.0628)*58.0;
		//
		//uv += vec2(5.5,2.5);
		//vec2 offset = vec2(floor(uv.x/11.0),
		//				   floor(uv.y/5.0 ));
		//if (length(offset)>0.0)
		//	timeOffset = (offset.y*163.13+offset.x*13.23)+mod(iGlobalTime,1.0);
		//else
		//	timeOffset = 0.0;
		//						
		//uv.x = mod(uv.x,11.0)-5.5;
		//uv.y = mod(uv.y, 5.0)-2.5;
	}
	
	uv.x *= -1.0;
	uv.x += uv.y/12.0;
	//wobble
	//uv.x += sin(uv.y*3.0+iGlobalTime*14.0)/25.0;
	//uv.y += cos(uv.x*3.0+iGlobalTime*14.0)/25.0;
    uv.x += 3.5;
	float seg = 0.0;

	float timeSecs = iDate.w+timeOffset;
	
	seg += showNum(uv,int(mod(timeSecs,60.0)),false);
	
	timeSecs = floor(timeSecs/60.0);
	
    uv.x -= 1.75;

	seg += dots(uv);
	
    uv.x -= 1.75;
	
	seg += showNum(uv,int(mod(timeSecs,60.0)),false);
	
	timeSecs = floor(timeSecs/60.0);
	if (ampm)
	{
		if (timeSecs>12.0)
		  timeSecs = mod(timeSecs,12.0);
	}
	
    uv.x -= 1.75;
	
	seg += dots(uv);
	
    uv.x -= 1.75;
	seg += showNum(uv,int(mod(timeSecs,60.0)),true);
	
	// matrix over segment
	if (showMatrix)
	{
		seg *= 0.8+0.2*smoothstep(0.02,0.04,mod(uv.y+uv.x,0.06025));
		//seg *= 0.8+0.2*smoothstep(0.02,0.04,mod(uv.y-uv.x,0.06025));
	}
	
	if (seg<0.0)
	{
		seg = -seg;;
		gl_FragColor = vec4(seg,seg,seg,1.0);
	}
	else
		if (showMatrix)
			if (isGreen)
				gl_FragColor = vec4(0.0,seg,seg*0.5,1.0);
			else
				gl_FragColor = vec4(0.0,seg*0.8,seg,1.0);
		else
			if (isGreen)
				gl_FragColor = vec4(0.0,seg,0.0,1.0);
			else
				gl_FragColor = vec4(seg,0.0,0.0,1.0);
	
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderRaysOfLight">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

//by mu6k
//License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
//
//muuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuusk!

float hash(vec2 x)
{
	return fract(cos(dot(x.xy,vec2(2.31,53.21))*124.123)*412.0);
}

float hash(float x)
{
	return fract(sin(cos(x)*124.123)*421.321);
}


float geom(vec2 p)
{
	float q = 0.0;
	for (float i = 0.0; i<10.0; i+=1.0)
	{
		q+=0.008+i*0.001;
		
		vec2 op = p;
		
		p.x+=p.y*sin(iGlobalTime*0.21)*0.1+sin(iGlobalTime*0.05)*1.2;
		p.y-=p.x*cos(iGlobalTime*0.31)*0.1+cos(iGlobalTime*0.05)*1.2;
		
		
		//p=mix(p,op,sin(iGlobalTime*0.11)*0.5+0.9);
		
		vec2 w = mod(p,4.0);
		if (texture2D(iChannel0,w*0.25).x<0.3-cos(iGlobalTime*0.61)*0.2)
		{
			break;
		}
		
		p*=1.2;
	}
	return q;
}


void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	
	uv-=vec2(0.5);
	
	uv.x*=iResolution.x/iResolution.y;
	
	float q = 0.0;
	vec2 p = uv;
	
	
	float b = 1.0+length(p);
	b+=texture2D(iChannel0,uv*1.4).x*0.1;
	b+=sin(iGlobalTime)*0.01;
	p*=(b);
	
	p.x+=sin(iGlobalTime*0.2)*2.0;
	p.y+=cos(iGlobalTime*0.2)*2.0;
	
	
	q= geom(p*0.1+uv*1.0);
	
	float gg =0.0;

	for (float g=0.0; g<20.0; g+=1.0)
	{
		float xg = g/20.0;
		xg = pow(xg,0.5);
		float lg = (g-1.0)/20.0;
		lg = pow(lg,0.5);
		gg+=geom(p*0.1+uv*(xg+hash(uv+p)*(xg-lg)));
	}
	
	q=mix(gg*.125,q,0.25);
	
	vec4 col = vec4(q*4.0,q*3.0,q,1.0);
	
	//col.xyz=uv.xyy;
	
	col/=(b-0.61);
	float h = hash(uv+col.xy);
	col -= vec4(h,h,h,0.0)*0.025;
	
	float w = col.x+col.y+col.z;
	gl_FragColor = mix(col,vec4(w,w,w,1.0)*0.5,w);
}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderRGBScreenFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

int CELL_SIZE = 6;
float CELL_SIZE_FLOAT = float(CELL_SIZE);
int RED_COLUMNS = int(CELL_SIZE_FLOAT/3.);
int GREEN_COLUMNS = CELL_SIZE-RED_COLUMNS;

void main(void)
{

	vec2 p = floor(gl_FragCoord.xy / CELL_SIZE_FLOAT)*CELL_SIZE_FLOAT;
	int offsetx = int(mod(gl_FragCoord.x,CELL_SIZE_FLOAT));
	int offsety = int(mod(gl_FragCoord.y,CELL_SIZE_FLOAT));

	vec4 sum = texture2D(iChannel0, p / iResolution.xy);
	
	gl_FragColor = vec4(0.,0.,0.,1.);
	if (offsety < CELL_SIZE-1) {		
		if (offsetx < RED_COLUMNS) gl_FragColor.r = sum.r;
		else if (offsetx < GREEN_COLUMNS) gl_FragColor.g = sum.g;
		else gl_FragColor.b = sum.b;
	}
	
}



</script>


<script type="x-shader/x-fragment" id="fragmentShaderGridGlow">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)



//globals
const vec3 background  = vec3(0.1, 0.1, 0.7);
const vec3 light_1     = vec3(4.0, 8.0,  3.0);
const vec3 light_2     = vec3(-4.0, 8.0, -7.0);
const vec2 eps         = vec2(0.001, 0.0);
const int maxSteps     = 64;

float time = iGlobalTime;

vec3 shade(vec3 color, vec3 point, vec3 normal, vec3 rd)
{
	
	vec3 dtl       = normalize(light_1 - point);
	float diffuse  = dot(dtl, normal); //diffuse
	float specular = 0.75 * pow(max(dot(reflect(dtl, normal), rd), 0.0), 64.0); //specular
	vec3 c = (diffuse + specular) * color * 0.85;
	
	dtl      =  normalize(light_2 - point);
	diffuse  = dot(dtl, normal); //more diffuse
	specular = 0.9 * pow(max(dot(reflect(dtl, normal), rd), 0.0), 128.0); //more specular
	return clamp( c + (diffuse + specular) * 0.25 * color, 0.0, 1.0);
}

// estimates the distance from Point p to implicit given geometry
float distanceEstimator(vec3 p)
{
	float t = mod(time, 70.0);
	vec3 holeP = p - vec3(0.5, 0.5, -3.0);
	p = p - vec3(t, t * 0.5, t * 0.3);
	
	float rpm = 1.0;
	vec3 repeater = mod(p, vec3(rpm * 1.6, rpm, rpm)) - 0.5 * vec3(rpm * 1.6, rpm, rpm);
	//vec3 repeater = fract(p) - vec3(0.5);
	float sphere = length(repeater) - 0.06 * rpm;
	
	float cylinder = length(repeater.xz) - 0.015 * rpm;
	cylinder =  min(cylinder, length(repeater.zy) - 0.015 * rpm);
	cylinder =  min(cylinder, length(repeater.xy) - 0.015 * rpm);
	
	float grid = min(cylinder, sphere);
	
	// just a big sphere, everything outside the sphere is not shown
	float eater  = length(holeP) - 3.3;
	return max(grid, eater);
	
}

void main() {
	
	float ratio  = iResolution.x / iResolution.y;
	vec2 fragment = gl_FragCoord.xy / iResolution.xy;
	
	vec2 uv = -1.0 + 2.0 * fragment;
	uv.x *= ratio;
	
	//camera setup taken from iq's raymarching box: https://www.shadertoy.com/view/Xds3zN
	vec3 ta = vec3( 0.0, 0.0, -3.5 );
	vec3 ro = vec3( -0.5+3.2*cos(0.1*time + 6.0), 3.0, 0.5 + 3.2*sin(0.1*time + 6.0) );
	vec3 cw = normalize( ta-ro );
	vec3 cp = vec3( 0.0, 1.0, 0.0 );
	vec3 cu = normalize( cross(cw,cp) );
	vec3 cv = normalize( cross(cu,cw) );
	vec3 rd = normalize( uv.x*cu + uv.y*cv + 2.5*cw );
	
	vec3 col             = background;
	float t              = 0.0;
	vec3 p               = vec3(0.0);
	
	// march
	float steps  = 0.0;
	float addAll = 0.0;
	for ( int i = 0; i < maxSteps; i++) {
		p = ro + t * rd;
		float distanceEstimation = distanceEstimator(p);
		if (distanceEstimation > 0.005) {
			t += distanceEstimation;
			addAll += smoothstep(0.0, 1.0, distanceEstimation);
			steps += 1.0;
		} else {
			break;
		}
	}
	
	//float c = float(i) / float(maxSteps);
	//c = pow(c, 0.25);
	//col  = vec4(c, c, c, 1.0);
	
	vec3 c = vec3(0.35, 0.05, 0.0);//(cos(p * 0.5) + 1.0) / 2.0;
	vec3 normal = normalize(vec3(distanceEstimator(p + eps.xyy) - distanceEstimator(p - eps.xyy),
								 distanceEstimator(p + eps.yxy) - distanceEstimator(p - eps.yxy),
								 distanceEstimator(p + eps.yyx) - distanceEstimator(p - eps.yyx)));
	
	col = shade(c, p, normal, rd);
	col = mix(col, background, steps / float(maxSteps));
	col = pow(col, vec3(0.8));
	
	float glow = smoothstep(steps, 0.0, addAll) * 1.4;
	col = vec3(glow) * col;
	gl_FragColor = vec4(col, 1.0); 
	
}





</script>

<script type="x-shader/x-fragment" id="fragmentShaderRainyNight">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)

float rand(vec2 p){
	p+=.2127+p.x+.3713*p.y;
	vec2 r=4.789*sin(789.123*(p));
	return fract(r.x*r.y);
}

float sn(vec2 p){
	vec2 i=floor(p-.5);
	vec2 f=fract(p-.5);
	f = f*f*f*(f*(f*6.0-15.0)+10.0);
	float rt=mix(rand(i),rand(i+vec2(1.,0.)),f.x);
	float rb=mix(rand(i+vec2(0.,1.)),rand(i+vec2(1.,1.)),f.x);
	return mix(rt,rb,f.y);
}

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.y;

	uv+=iMouse.xy/ iResolution.xy;
	
	vec2 p=uv.xy*vec2(3.,4.3);
	float f =
	.5*sn(p)
	+.25*sn(2.*p)
	+.125*sn(4.*p)
	+.0625*sn(8.*p)
	+.03125*sn(16.*p)+
	.015*sn(32.*p)
	;
	
	float newT = iGlobalTime*0.4 + sn(vec2(iGlobalTime*1.))*0.1;
	p.x-=iGlobalTime*0.2;
	
	p.y*=1.3;
	float f2=
	.5*sn(p)
	+.25*sn(2.04*p+newT*1.1)
	-.125*sn(4.03*p-iGlobalTime*0.3)
	+.0625*sn(8.02*p-iGlobalTime*0.4)
	+.03125*sn(16.01*p+iGlobalTime*0.5)+
	.018*sn(24.02*p);
	
	float f3=
	.5*sn(p)
	+.25*sn(2.04*p+newT*1.1)
	-.125*sn(4.03*p-iGlobalTime*0.3)
	+.0625*sn(8.02*p-iGlobalTime*0.5)
	+.03125*sn(16.01*p+iGlobalTime*0.6)+
	.019*sn(18.02*p);
	
	float f4 = f2*smoothstep(0.0,1.,uv.y);
	
	vec3 clouds = mix(vec3(-0.4,-0.4,-0.15),vec3(1.4,1.4,1.3),f4*f);
	float lightning = sn((f3)+vec2(pow(sn(vec2(iGlobalTime*4.5)),6.)));

	lightning *= smoothstep(0.0,1.,uv.y+0.5);

	lightning = smoothstep(0.76,1.,lightning);
	lightning=lightning*2.;
	
	vec2 moonp = vec2(0.5,0.8);
	float moon = smoothstep(0.95,0.956,1.-length(uv-moonp));
	vec2 moonp2 = moonp + vec2(0.015, 0);
	moon -= smoothstep(0.93,0.956,1.-length(uv-moonp2));
	moon = clamp(moon, 0., 1.);
	moon += 0.3*smoothstep(0.80,0.956,1.-length(uv-moonp));

	clouds+= pow(1.-length(uv-moonp),1.7)*0.3;

	clouds*=0.8;
	clouds += lightning + moon +0.2;

	float ground = smoothstep(0.07,0.075,f*(p.y-0.98)+0.01);
	
	vec2 newUV = uv;
	newUV.x-=iGlobalTime*0.3;
	newUV.y+=iGlobalTime*3.;
	float strength = sin(iGlobalTime*0.5+sn(newUV))*0.1+0.15;
	
	float rain = sn( vec2(newUV.x*20.1, newUV.y*40.1+newUV.x*400.1-20.*strength ));
	float rain2 = sn( vec2(newUV.x*45.+iGlobalTime*0.5, newUV.y*30.1+newUV.x*200.1 ));	
	rain = strength-rain;
	rain+=smoothstep(0.2,0.5,f4+lightning+0.1)*rain;
	rain += pow(length(uv-moonp),1.)*0.1;
	rain+=rain2*(sin(strength)-0.4)*2.;
	rain = clamp(rain, 0.,0.5)*0.5;
	
	float tree = 0.;
	vec2 treeUV = uv;

	{
		float atree = abs(atan(treeUV.x*59.-85.5,3.-treeUV.y*25.+5.));
		atree +=rand(treeUV.xy*vec2(0.001,1.))*atree;
		tree += clamp(atree, 0.,1.)*0.33;
	}
	{
		float atree = abs(atan(treeUV.x*65.-65.5,3.-treeUV.y*19.+4.));
		atree +=rand(treeUV.xy*vec2(0.001,1.))*atree;
		tree += clamp(atree, 0.,1.)*0.33;
	}
	{
		float atree = abs(atan(treeUV.x*85.-91.5,3.-treeUV.y*21.+4.));
		atree +=rand(treeUV.xy*vec2(0.001,1.))*atree;
		tree += clamp(atree, 0.,1.)*0.34;
	}
	tree = smoothstep(0.6,1.,tree);
	
	
	vec3 painting = tree*ground*(clouds + rain)+clamp(rain*(strength-0.1),0.,1.);
	
	float r=1.-length(max(abs(gl_FragCoord.xy / iResolution.xy*2.-1.)-.5,0.)); 
	painting*=r;
	
	gl_FragColor = vec4(painting, 1.);
}






</script>


<script type="x-shader/x-fragment" id="fragmentShaderEyeBall">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// Created by beautypi - beautypi/2012
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

// modify by dark poulpo to make a real eye



mat2 m = mat2( 0.80,  0.60, -0.60,  0.80 );
const float Tau = 6.2831853;
float hash( float n )
{
    return fract(sin(n)*43758.5453);
}

float snoise(vec3 uv, float res)
{
	const vec3 s = vec3(1e0, 1e2, 1e4);
	
	uv *= res;
	
	vec3 uv0 = floor(mod(uv, res))*s;
	vec3 uv1 = floor(mod(uv+vec3(1.), res))*s;
	
	vec3 f = fract(uv);
	f = f*f*(3.0-2.0*f);

	vec4 v = vec4(uv0.x+uv0.y+uv0.z, uv1.x+uv0.y+uv0.z,
		      uv0.x+uv1.y+uv0.z, uv1.x+uv1.y+uv0.z);

	vec4 r = fract(sin(v*1e-3)*1e5);
	float r0 = mix(mix(r.x, r.y, f.x), mix(r.z, r.w, f.x), f.y);
	
	r = fract(sin((v + uv1.z - uv0.z)*1e-3)*1e5);
	float r1 = mix(mix(r.x, r.y, f.x), mix(r.z, r.w, f.x), f.y);
	
	return mix(r0, r1, f.z)*2.-1.;
}

float noise( in vec2 x )
{
    vec2 p = floor(x);
    vec2 f = fract(x);

    f = f*f*(3.0-2.0*f);

    float n = p.x + p.y*57.0;

    float res = mix(mix( hash(n+  0.0), hash(n+  1.0),f.x),
                    mix( hash(n+ 57.0), hash(n+ 58.0),f.x),f.y);
    return res;
}

float fbm( vec2 p )
{
    float f = 0.0;

    f += 0.50000*noise( p ); p = m*p*2.02;
    f += 0.25000*noise( p ); p = m*p*2.03;
    f += 0.12500*noise( p ); p = m*p*2.01;
    f += 0.06250*noise( p ); p = m*p*2.04;
    f += 0.03125*noise( p );

    return f/0.984375;
}



float length2( vec2 p )
{
    float ax = abs(p.x);
    float ay = abs(p.y);

    return pow( pow(ax,4.0) + pow(ay,4.0), 1.0/4.0 );
}


float shape2( vec2 p, float r )
{
    float a = atan(p.x,p.y);
    float len = 1.-length(p);
	
	
	
	float ba = sin(a*10.0)*r;
	float bb = sin(a*5.0)*r;
	float sa = sqrt(len+ba + len-bb ) + len;
	
    return max(0.0,sa);
}


void saturation(inout vec3 color,float sat)
{
  float P = sqrt(color.r * color.r * .299 +
				 color.g * color.g * 0.587 +
				 color.b * color.b * 0.114 );
  color = P + (color - P) * sat;
}

void main(void)
{
	vec2 q = gl_FragCoord.xy / iResolution.xy;
    vec2 p = -1.0 + 2.0 * q;
	
	//p *= 1.5; // coeff to scale
	
    p.x *= iResolution.x/iResolution.y;

    float d = length( p );
    float aa = atan( p.y, p.x );

    float dd = 0.2*sin(4.0);
    float ss = 1.0 + clamp(1.0-d,0.0,1.0)*dd;

    float r = d * ss;

	float intensite = 0.5+sin(iGlobalTime)*0.55;  // 0.0<-> 1.0  intensite = 0.51 by default
	
	
	float neurologique = 0.00; // 0.0 = pas de detresse, -0.35 <-> 0.5

	intensite = clamp(intensite, 0.0,1.0);

	neurologique = clamp(neurologique, -0.35,0.5);


	float size = 0.61 + (1.1-0.61) * intensite ; 

	size += 2.4 * neurologique;
	
	
	//float size = 0.35 + (1.6-0.35) * intensite; //1.6 0.35

	size = clamp(size,0.35,1.6);
	
	// you can invert the color rgb to obtain any colors vec3()
    vec3 col = vec3(76.0/255.0,110.0/255.0,147.0/255.0  );

    float a = aa + 0.05*fbm( 20.0*p );
	float f = 0.0;
    
	
	
	// halo blanc
	if(d>=0.15 ) {
		float sa = shape2(p*2.75, 0.19);
		vec3 clr = 1. - vec3(sa*1.0, sa*1.0, sa*0.86); // // you can invert the value in vec3() 
		col = mix(col,2.* vec3( clr),r); 
	}
	
	// you can invert the color rgb to obtain any colors mix()
	f = smoothstep( 0.30, 1.0, fbm( vec2(8.0*a,18.0*r) ) );
    col = mix( col, vec3(173.0/255.0,179.0/255.0,205.0/255.0), f );
	f = smoothstep( 0.30, 1.0, fbm( vec2(8.0*a,6.0*r) ) );
    col = mix( col, 0.5 * vec3(79.0/255.0,93.0/255.0,122.0/255.0), f );
	
	if (d > 0.39)
	{
		
		// you can invert the color rgb to obtain any colors mix()
		f = smoothstep( 0.30, 1.0, fbm( vec2(67.0*a,16.0*r) ) );
    	col = mix( col, 0.85 * vec3(79.0/255.0,93.0/255.0,122.0/255.0), f );
		
		// you can invert the color rgb to obtain any colors mix()
		f = smoothstep( 0.30, 1.0, fbm( vec2(45.0*a,8.0*r) ) );
		col = mix( col, 1.11*vec3(138.0/255.0,179.0/255.0,223.0/255.0), f );
		
		
	}
	
	
	
	
	
	
	// effet marron dont modify
	if (d < 0.35)
	{
    	f = smoothstep( 0.532, 1.01,fbm( vec2(10.0*a,1.10*r) ) );
    	col= mix( col, 2.5 * vec3(91.0/255.0,45.0/255.0,20.0/255.0), f );
	}
	

	
	// effet blanc dont modify
	if (d > 0.39)
	{
    	f = smoothstep( 0.532, 1.01,fbm( vec2(4.0*a,0.84*r) ) );
    	col= mix( col, 1.1*vec3(215.0/255.0,233.0/255.0,255.0/255.0), f );		
	}
	

	
	
	
	//bordure iris
    //col *= 1.0-0.715*smoothstep( 0.55,0.8,r ); // * vec3(05.0/255.0,00.0/255.0,15.0/255.0);
	


    col *= 1.15;

	
	// trait marron dont modify
    f = 1.0-smoothstep( 0.2, 0.25, r *size);
    col = mix( col, vec3(0.2,0.1,0.05), f );
	
	
	
	//saturation(col,1.51);
	
	// specular
   // f = 1.0-smoothstep( 0.0, 0.6, length2( mat2(0.9,0.95,-0.9,0.95)*(p-vec2(0.5,0.5) )*vec2(1.0,2.0)) );
   // col += vec3(1.0,0.9,0.9)*f*0.985;

	
	//bordure iris dont modify
   	f = smoothstep( 0.57, 0.8,r);
   	col= mix( col, 1.42* vec3(35.0/255.0,36.0/255.0,54.0/255.0), f );
	// pupille dont modify
	f = 1.0-smoothstep( 0.19, 0.22, r * size );
    col = mix( col, vec3(0.0), f );
	
	// blanc des yeux dont modify
    f = smoothstep( 0.79, 0.82, r );
    col = mix( col, vec3(1.0), f );

	
	// ombrage du blanc dont modify
    //col *= 0.5 + 0.5*pow(16.0*q.x*q.y*(1.0-q.x)*(1.0-q.y),0.1);
 
	gl_FragColor = vec4(col,1.0);
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderMonitorMessage">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// Source edited by David Hoskins - 2013.

// I took and completed this http://glsl.heroku.com/e#9743.20 - just for fun! 8|
// Locations in 3x7 font grid, inspired by http://www.claudiocc.com/the-1k-notebook-part-i/
// Had to edit it to remove line doubling.
// ABC  a:GIOMJL b:AMOIG c:IGMO d:COMGI e:OMGILJ f:CBN g:OMGIUS h:AMGIO i:EEHN j:GHTS k:AMIKO l:BN m:MGHNHIO n:MGIO
// DEF  o:GIOMG p:SGIOM q:UIGMO r:MGI s:IGJLOM t:BNO u:GMOI v:GJNLI w:GMNHNOI x:GOKMI y:GMOIUS z:GIMO
// GHI
// JKL 
// MNO
// PQR
// STU

#define font_size 20. 
#define font_spacing .05
#define STROKEWIDTH 0.05
#define PI 3.14159265359

#define A_ vec2(0.,0.)
#define B_ vec2(1.,0.)
#define C_ vec2(2.,0.)

#define D_ vec2(0.,1.)
#define E_ vec2(1.,1.)
#define F_ vec2(2.,1.)

#define G_ vec2(0.,2.)
#define H_ vec2(1.,2.)
#define I_ vec2(2.,2.)

#define J_ vec2(0.,3.)
#define K_ vec2(1.,3.)
#define L_ vec2(2.,3.)

#define M_ vec2(0.,4.)
#define N_ vec2(1.,4.)
#define O_ vec2(2.,4.)

#define P_ vec2(0.,5.)
#define Q_ vec2(1.,5.)
#define R_ vec2(1.,5.)

#define S_ vec2(0.,6.)
#define T_ vec2(1.,6.)
#define U_ vec2(2.0,6.)

#define A(p) t(G_,I_,p) + t(I_,O_,p) + t(O_,M_, p) + t(M_,J_,p) + t(J_,L_,p)
#define B(p) t(A_,M_,p) + t(M_,O_,p) + t(O_,I_, p) + t(I_,G_,p)
#define C(p) t(I_,G_,p) + t(G_,M_,p) + t(M_,O_,p) 
#define D(p) t(C_,O_,p) + t(O_,M_,p) + t(M_,G_,p) + t(G_,I_,p)
#define E(p) t(O_,M_,p) + t(M_,G_,p) + t(G_,I_,p) + t(I_,L_,p) + t(L_,J_,p)
#define F(p) t(C_,B_,p) + t(B_,N_,p) + t(G_,I_,p)
#define G(p) t(O_,M_,p) + t(M_,G_,p) + t(G_,I_,p) + t(I_,U_,p) + t(U_,S_,p)
#define H(p) t(A_,M_,p) + t(G_,I_,p) + t(I_,O_,p) 
#define I(p) t(E_,E_,p) + t(H_,N_,p) 
#define J(p) t(E_,E_,p) + t(H_,T_,p) + t(T_,S_,p)
#define K(p) t(A_,M_,p) + t(M_,I_,p) + t(K_,O_,p)
#define L(p) t(B_,N_,p)
#define M(p) t(M_,G_,p) + t(G_,I_,p) + t(H_,N_,p) + t(I_,O_,p)
#define N(p) t(M_,G_,p) + t(G_,I_,p) + t(I_,O_,p)
#define O(p) t(G_,I_,p) + t(I_,O_,p) + t(O_,M_, p) + t(M_,G_,p)
#define P(p) t(S_,G_,p) + t(G_,I_,p) + t(I_,O_,p) + t(O_,M_, p)
#define Q(p) t(U_,I_,p) + t(I_,G_,p) + t(G_,M_,p) + t(M_,O_, p)
#define R(p) t(M_,G_,p) + t(G_,I_,p)
#define S(p) t(I_,G_,p) + t(G_,J_,p) + t(J_,L_,p) + t(L_,O_,p) + t(O_,M_,p)
#define T(p) t(B_,N_,p) + t(N_,O_,p) + t(G_,I_,p)
#define U(p) t(G_,M_,p) + t(M_,O_,p) + t(O_,I_,p)
#define V(p) t(G_,J_,p) + t(J_,N_,p) + t(N_,L_,p) + t(L_,I_,p)
#define W(p) t(G_,M_,p) + t(M_,O_,p) + t(N_,H_,p) + t(O_,I_,p)
#define X(p) t(G_,O_,p) + t(I_,M_,p)
#define Y(p) t(G_,M_,p) + t(M_,O_,p) + t(I_,U_,p) + t(U_,S_,p)
#define Z(p) t(G_,I_,p) + t(I_,M_,p) + t(M_,O_,p)
#define STOP(p) t(N_,N_,p)
	
vec2 caret_origin = vec2(3.0, .7);
vec2 caret;
float time = mod(iGlobalTime, 11.0);

//-----------------------------------------------------------------------------------
float minimum_distance(vec2 v, vec2 w, vec2 p)
{	// Return minimum distance between line segment vw and point p
  	float l2 = (v.x - w.x)*(v.x - w.x) + (v.y - w.y)*(v.y - w.y); //length_squared(v, w);  // i.e. |w-v|^2 -  avoid a sqrt
  	if (l2 == 0.0) {
		return distance(p, v);   // v == w case
	}
	
	// Consider the line extending the segment, parameterized as v + t (w - v).
  	// We find projection of point p onto the line.  It falls where t = [(p-v) . (w-v)] / |w-v|^2
  	float t = dot(p - v, w - v) / l2;
  	if(t < 0.0) {
		// Beyond the 'v' end of the segment
		return distance(p, v);
	} else if (t > 1.0) {
		return distance(p, w);  // Beyond the 'w' end of the segment
	}
  	vec2 projection = v + t * (w - v);  // Projection falls on the segment
	return distance(p, projection);
}

//-----------------------------------------------------------------------------------
float textColor(vec2 from, vec2 to, vec2 p)
{
	p *= font_size;
	float inkNess = 0., nearLine, corner;
	nearLine = minimum_distance(from,to,p); // basic distance from segment, thanks http://glsl.heroku.com/e#6140.0
	inkNess += smoothstep(0., 1., 1.- 14.*(nearLine - STROKEWIDTH)); // ugly still
	inkNess += smoothstep(0., 2.5, 1.- (nearLine  + 5. * STROKEWIDTH)); // glow
	return inkNess;
}

//-----------------------------------------------------------------------------------
vec2 grid(vec2 letterspace) 
{
	return ( vec2( (letterspace.x / 2.) * .65 , 1.0-((letterspace.y / 2.) * .95) ));
}

//-----------------------------------------------------------------------------------
float count = 0.0;
float t(vec2 from, vec2 to, vec2 p) 
{
	count++;
	if (count > time*20.0) return 0.0;
	return textColor(grid(from), grid(to), p);
}

//-----------------------------------------------------------------------------------
vec2 r()
{
	vec2 pos = gl_FragCoord.xy/iResolution.xy;
	pos.y -= caret.y;
	pos.x -= font_spacing*caret.x;
	return pos;
}

//-----------------------------------------------------------------------------------
void add()
{
	caret.x += 1.0;
}

//-----------------------------------------------------------------------------------
void space()
{
	caret.x += 1.5;
}

//-----------------------------------------------------------------------------------
void newline()
{
	caret.x = caret_origin.x;
	caret.y -= .18;
}

//-----------------------------------------------------------------------------------
void main(void)
{
	float d = 0.;
	vec3 col = vec3(0.1, .07+0.07*(.5+sin(gl_FragCoord.y*3.14159*1.1+time*2.0)) + sin(gl_FragCoord.y*.01+time+2.5)*0.05, 0.1);
	
	caret = caret_origin;

	// the quick brown fox jumps over the lazy dog...
	d += T(r()); add(); d += H(r()); add(); d += E(r()); space();
	d += Q(r()); add(); d += U(r()); add(); d += I(r()); add(); d += C(r()); add(); d += K(r()); space();
	d += B(r()); add(); d += R(r()); add(); d += O(r()); add(); d += W(r()); add(); d += N(r()); space();
	newline();
	d += F(r()); add(); d += O(r()); add(); d += X(r()); space();
	d += J(r()); add(); d += U(r()); add(); d += M(r()); add(); d += P(r()); add(); d += S(r()); space();
	d += O(r()); add(); d += V(r()); add(); d += E(r()); add(); d += R(r()); space();
	newline();
	d += T(r()); add(); d += H(r()); add(); d += E(r()); space();
	d += L(r()); add(); d += A(r()); add(); d += Z(r()); add(); d += Y(r()); space();
	d += D(r()); add(); d += O(r()); add(); d += G(r()); add(); d += STOP(r()); add(); d += STOP(r()); add(); d += STOP(r());
	d = clamp(d* (.75+sin(gl_FragCoord.x*PI*.5-time*4.3)*.5), 0.0, 1.0);
      
	col += vec3(d*.5, d, d*.85);
	vec2 xy = gl_FragCoord.xy / iResolution.xy;
	col *= vec3(.4, .4, .3) + 0.5*pow(100.0*xy.x*xy.y*(1.0-xy.x)*(1.0-xy.y), .4 );	
	gl_FragColor = vec4( col, 1.0 );

}






</script>

<script type="x-shader/x-fragment" id="fragmentShaderMetaBalloons">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

#define globes 250.
#define globesize .13
#define dist 1.2
#define persp .8

mat3 rotmat(vec3 v, float angle)
{
	angle=radians(angle);
	float c = cos(angle);
	float s = sin(angle);
	
	return mat3(c + (1.0 - c) * v.x * v.x, (1.0 - c) * v.x * v.y - s * v.z, (1.0 - c) * v.x * v.z + s * v.y,
		(1.0 - c) * v.x * v.y + s * v.z, c + (1.0 - c) * v.y * v.y, (1.0 - c) * v.y * v.z - s * v.x,
		(1.0 - c) * v.x * v.z - s * v.y, (1.0 - c) * v.y * v.z + s * v.x, c + (1.0 - c) * v.z * v.z
		);
}


void main(void)
{
	vec2 uv = (gl_FragCoord.xy / iResolution.xy-.5)*2.;
	uv.y*=iResolution.y/iResolution.x;
	float s=.1,maxc=0.;
	vec3 rotv=vec3(0.,0.,1.);
	float h;
	vec3 col=vec3(0.);
	vec3 c=vec3(0.);
	float t=mod(iGlobalTime,15.)*3.;
	float mt=iGlobalTime*.4;
	float et=pow(t*10.,.5);
	mat3 camrot=rotmat(normalize(vec3(0.,1.,0.5)),t*30.);
	for (float i=0.; i<globes; i++) {
			float imt=i+mt;
			vec2 pick=vec2(floor(imt/256.),mod(imt,256.))/256.;
			vec3 p=normalize(texture2D(iChannel0,pick).xyz-.5)*
				(.1+texture2D(iChannel0,pick+vec2(.5,0.)).x*.4); 
			p*=length(p)+et*.1;	
			vec3 col=normalize(abs(p));
			p*=camrot; 
			p.xy*=persp/max(0.001,p.z+dist);
			float siz=globesize*persp/max(0.001,p.z+dist)*clamp(t*.5,0.1,1.);
			c=max(c,col*(pow(max(0.,siz-length(uv+p.xy))/siz,.2))*max(0.15,-p.z));
	}
	c*=3.;
	gl_FragColor = vec4(1.-c,1.);
}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderCloudVolume">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


/*by mu6k, Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

 This started off as test of some noise functions. 
 Well the only proper way to test it is with volumetric rendering. 
 This is not physically accurate, it just looks nice. 
 Use the mouse to rotate and to modify the density.

 02/05/2013:
 - published

 03/05/2013:
 - modified the init of ray variables (more compatible)
 - moved illumination to a separate function
 - added parameters 

 muuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuusk!*/

#define quality 20 // number of steps 20+ is decent for current setup
#define illum_quality 10 // nr of steps for illumination
//#define noise_use_smoothstep //different interpolation for noise functions

//mouse.x rotates the cloud
//mouse.y changes the density of the gas
//note: performance = density * 1.0/quality * 1.0/illum_quality
//note: if you only see a white blob, reduce the quality... there are supposed to be shadows

float hash(float x)
{
	return fract(sin(x*.0127863)*17143.321); //decent hash for noise generation
}

float hash(vec2 x)
{
	return fract(cos(dot(x.xy,vec2(2.31,53.21))*124.123)*412.0); 
}

float hashmix(float x0, float x1, float interp)
{
	x0 = hash(x0);
	x1 = hash(x1);
	#ifdef noise_use_smoothstep
	interp = smoothstep(0.0,1.0,interp);
	#endif
	return mix(x0,x1,interp);
}

float hashmix(vec2 p0, vec2 p1, vec2 interp)
{
	float v0 = hashmix(p0[0]+p0[1]*128.0,p1[0]+p0[1]*128.0,interp[0]);
	float v1 = hashmix(p0[0]+p1[1]*128.0,p1[0]+p1[1]*128.0,interp[0]);
	#ifdef noise_use_smoothstep
	interp = smoothstep(vec2(0.0),vec2(1.0),interp);
	#endif
	return mix(v0,v1,interp[1]);
}

float hashmix(vec3 p0, vec3 p1, vec3 interp)
{
	float v0 = hashmix(p0.xy+vec2(p0.z*143.0,0.0),p1.xy+vec2(p0.z*143.0,0.0),interp.xy);
	float v1 = hashmix(p0.xy+vec2(p1.z*143.0,0.0),p1.xy+vec2(p1.z*143.0,0.0),interp.xy);
	#ifdef noise_use_smoothstep
	interp = smoothstep(vec3(0.0),vec3(1.0),interp);
	#endif
	return mix(v0,v1,interp[2]);
}

float hashmix(vec4 p0, vec4 p1, vec4 interp)
{
	float v0 = hashmix(p0.xyz+vec3(p0.w*17.0,0.0,0.0),p1.xyz+vec3(p0.w*17.0,0.0,0.0),interp.xyz);
	float v1 = hashmix(p0.xyz+vec3(p1.w*17.0,0.0,0.0),p1.xyz+vec3(p1.w*17.0,0.0,0.0),interp.xyz);
	#ifdef noise_use_smoothstep
	interp = smoothstep(vec4(0.0),vec4(1.0),interp);
	#endif
	return mix(v0,v1,interp[3]);
}

float noise(float p) // 1D noise
{
	float pm = mod(p,1.0);
	float pd = p-pm;
	return hashmix(pd,pd+1.0,pm);
}

float noise(vec2 p) // 2D noise
{
	vec2 pm = mod(p,1.0);
	vec2 pd = p-pm;
	return hashmix(pd,(pd+vec2(1.0,1.0)), pm);
}

float noise(vec3 p) // 3D noise
{
	vec3 pm = mod(p,1.0);
	vec3 pd = p-pm;
	return hashmix(pd,(pd+vec3(1.0,1.0,1.0)), pm);
}

float noise(vec4 p) // 4D noise
{
	vec4 pm = mod(p,1.0);
	vec4 pd = p-pm;
	return hashmix(pd,(pd+vec4(1.0,1.0,1.0,1.0)), pm);
}

vec3 cc(vec3 color, float factor,float factor2) // color modifier
{
	float w = color.x+color.y+color.z;
	return mix(color,vec3(w)*factor,w*factor2);
}

vec3 ldir = normalize(vec3(-1.0,-1.0,-1.0)); //light direction

float density(vec3 p) //density function for the cloud
{
	vec4 xp = vec4(p*0.4,iGlobalTime*0.1+noise(p));
	float nv=pow(pow(noise(xp),2.0)*2.1,	2.5)*(10.0-length(p.xyz));
	nv = max(0.0,nv); //negative density is illegal.
	nv = min(1.0,nv); //high density causes artifacts
	return nv;
}

float illumination(vec3 p,float density_coef)
{
	vec3 l = ldir;
	float il = 1.0;
	float ill = 1.0;
		
	for(int i=0; i<int(illum_quality); i++) //illumination
	{
		il-=density(p-l*hash(p.xy+vec2(il,p.z))*0.5)*density_coef;
		p-=l;
		if (il <= 0.0)
		{
			il=0.0;
			break; //light can't reach this point in the cloud
		}
		if (il == ill)
		{
			break; //we already know the amount of light that reaches this point
			//(well not exactly but it increases performance A LOT)
		}
		ill = il;
	}
	
	return il;
}

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy - 0.5;
	uv.x = uv.x*iResolution.x/iResolution.y;
	vec2 m = iMouse.xy / iResolution.xy - 0.5;
	
	
	float rot = m.x*3.14159*2.0;
	
	vec3 d = vec3(sin(rot),.0,cos(rot)); //ray direction
	vec3 p = -20.0*d; //ray position
	
	vec3 t = cross(d,vec3(0.0,1.0,0.0)); 
	d.x = d.x+uv.x*t.x; //perspective projection
	d.y = uv.y;
	d.z = d.z +uv.x*t.z;
	
	d=normalize(d);
	
	p+=d*10.0; //move the ray forward by 10.0 units 
	//because cloud is a inside a 10.0 radius sphere
	//and initial ray position is 20.0 units away
	
	float illum_acc = 0.0;
	float dense_acc = 0.0;
	float density_coef = m.y*.35+0.23;
	float quality_coef = 20.0/float(quality);
	
	for (int i=0; i<quality; i++) //max 20 step raycast
	{
		float ld0=length(p);
		
		p+=d*quality_coef;
		float ld1=length(p);
		
		if(ld1>ld0&&ld1>10.0) 
		{
			break; //break condition: ray is moving away from the sphere
			//and is not inside the sphere
		}
		
		float nv = density(p+d*hash(uv+vec2(iGlobalTime,dense_acc))*0.25)*density_coef*quality_coef;
		//evaluate the density function
		
		vec3 sp = p;
		dense_acc+=nv;
		
		if (dense_acc>1.0)
		{
			dense_acc=1.0; //break condition: following steps do not contribute 
			break; //to the color because it's occluded by the gas
		}
		
		float il = illumination(p,density_coef);
		
		illum_acc+=max(0.0,nv*il*(1.0-dense_acc)); 
		//nv - alpha of current point
		//il - illumination of current point
		//1.0-dense_acc - how much is visible of this point
	}

	vec3 illum_color = vec3(1.1,0.85,0.3)*illum_acc*1.55;
	
	float sun = dot(d,-ldir); sun=.5*sun+.5; sun = pow(sun,100.0);
	vec3 sky_color = vec3(0.3,0.5,0.8);
	
	vec3 dense_color = sky_color*0.51; //color of the dark part of the cloud
	
	sky_color=sky_color*(1.0-uv.y*0.2)+vec3(sun);

	vec3 color = mix(sky_color,dense_color+illum_color,smoothstep(0.0,1.0,dense_acc)); color-=length(uv)*0.2;
	color+=hash(color.xy+uv)*0.01; //kill all color banding
	color =cc(color,0.5,0.4); 
	
	gl_FragColor = vec4(color,1.0);
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderBadTVFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


uniform float time;
uniform vec2 resolution;

float random(in float a, in float b) { return fract((cos(dot(vec2(a,b) ,vec2(12.9898,78.233))) * 43758.5453)); }

void main( void ) {
	vec2 resolution = iResolution.xy;
	float time = iGlobalTime;

	vec2 pos = ( gl_FragCoord.xy / resolution.xy );
	//pos += .01 * vec2(1. * sin(time), 1. * cos(time));
	//pos *= 3.;
	
	vec3 oricol = texture2D(iChannel0, vec2(pos.x,pos.y)).xyz;
	vec3 col;

	col.r = texture2D(iChannel0, vec2(pos.x+0.015*sin(0.02*time),pos.y)).x;
	col.g = texture2D(iChannel0, vec2(pos.x+0.000				,pos.y)).y;
	col.b = texture2D(iChannel0, vec2(pos.x-0.015*sin(0.02*time),pos.y)).z;	
	
	float c = 1.;
	//c += sin(pos.x * 20.01);
	
	c += 2. * sin(time * 4. + pos.y * 1000.);
	c += 1. * sin(time * 1. + pos.y * 800.);
	c += 20. * sin(time * 10. + pos.y * 9000.);
	
	c += 1. * cos(time * 1. + pos.x * 1.);
	
	//vignetting
	c *= sin(pos.x*3.15);
	c *= sin(pos.y*3.);
	c *= .9;
	
	pos += time;
	
	float r = random(pos.x, 	pos.y);
	float g = random(pos.x * 9., 	pos.y * 9.);
	float b = random(pos.x * 3., 	pos.y * 3.);
	
	gl_FragColor = vec4(col.x * r*c*.35, col.y * b*c*.95, col.z * g*c*.35, 1);
//	gl_FragColor = vec4(oricol.y, oricol.y, oricol.z, 1);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderOldVideoFilter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


#define BLACK_AND_WHITE
#define LINES_AND_FLICKER
#define BLOTCHES
#define GRAIN

#define FREQUENCY 15.0

vec2 uv;

float rand(vec2 co){
    return fract(sin(dot(co.xy ,vec2(12.9898,78.233))) * 43758.5453);
}

float rand(float c){
	return rand(vec2(c,1.0));
}

float randomLine(float seed)
{
	float b = 0.01 * rand(seed);
	float a = rand(seed+1.0);
	float c = rand(seed+2.0) - 0.5;
	float mu = rand(seed+3.0);
	
	float l = 1.0;
	
	if ( mu > 0.2)
		l = pow(  abs(a * uv.x + b * uv.y + c ), 1.0/8.0 );
	else
		l = 2.0 - pow( abs(a * uv.x + b * uv.y + c), 1.0/8.0 );				
	
	return mix(0.5, 1.0, l);
}

// Generate some blotches.
float randomBlotch(float seed)
{
	float x = rand(seed);
	float y = rand(seed+1.0);
	float s = 0.01 * rand(seed+2.0);
	
	vec2 p = vec2(x,y) - uv;
	p.x *= iResolution.x / iResolution.y;
	float a = atan(p.y,p.x);
	float v = 1.0;
	float ss = s*s * (sin(6.2831*a*x)*0.1 + 1.0);
	
	if ( dot(p,p) < ss ) v = 0.2;
	else
		v = pow(dot(p,p) - ss, 1.0/16.0);
	
	return mix(0.3 + 0.2 * (1.0 - (s / 0.02)), 1.0, v);
}


void main(void)
{
	uv = gl_FragCoord.xy / iResolution.xy;
	
	if ( iMouse.z < 0.9 )
	{		
		// Set frequency of global effect to 20 variations per second
		float t = float(int(iGlobalTime * FREQUENCY));
		
		// Get some image movement
		vec2 suv = uv + 0.002 * vec2( rand(t), rand(t + 23.0));
		
		// Get the image
		vec3 image = texture2D( iChannel0, vec2(suv.x, suv.y) ).xyz;
		
		#ifdef BLACK_AND_WHITE
		// Pass it to B/W
		float luma = dot( vec3(0.2126, 0.7152, 0.0722), image );
		vec3 oldImage = luma * vec3(0.7, 0.7, 0.7);
		#else
		vec3 oldImage = image;
		#endif
		
		// Create a time-varyting vignetting effect
		float vI = 16.0 * (uv.x * (1.0-uv.x) * uv.y * (1.0-uv.y));
		vI *= mix( 0.7, 1.0, rand(t + 0.5));
		
		// Add additive flicker
		vI += 1.0 + 0.4 * rand(t+8.);
		
		// Add a fixed vignetting (independent of the flicker)
		vI *= pow(16.0 * uv.x * (1.0-uv.x) * uv.y * (1.0-uv.y), 0.4);
		
		// Add some random lines (and some multiplicative flicker. Oh well.)
		#ifdef LINES_AND_FLICKER
		int l = int(8.0 * rand(t+7.0));
		
		if ( 0 < l ) vI *= randomLine( t+6.0+17.* float(0));
		if ( 1 < l ) vI *= randomLine( t+6.0+17.* float(1));
		if ( 2 < l ) vI *= randomLine( t+6.0+17.* float(2));		
		if ( 3 < l ) vI *= randomLine( t+6.0+17.* float(3));
		if ( 4 < l ) vI *= randomLine( t+6.0+17.* float(4));
		if ( 5 < l ) vI *= randomLine( t+6.0+17.* float(5));
		if ( 6 < l ) vI *= randomLine( t+6.0+17.* float(6));
		if ( 7 < l ) vI *= randomLine( t+6.0+17.* float(7));
		
		#endif
		
		// Add some random blotches.
		#ifdef BLOTCHES
		int s = int( max(8.0 * rand(t+18.0) -2.0, 0.0 ));

		if ( 0 < s ) vI *= randomBlotch( t+6.0+19.* float(0));
		if ( 1 < s ) vI *= randomBlotch( t+6.0+19.* float(1));
		if ( 2 < s ) vI *= randomBlotch( t+6.0+19.* float(2));
		if ( 3 < s ) vI *= randomBlotch( t+6.0+19.* float(3));
		if ( 4 < s ) vI *= randomBlotch( t+6.0+19.* float(4));
		if ( 5 < s ) vI *= randomBlotch( t+6.0+19.* float(5));
	
		#endif
	
		// Show the image modulated by the defects
        gl_FragColor.xyz = oldImage * vI;
		
		// Add some grain (thanks, Jose!)
		#ifdef GRAIN
        gl_FragColor.xyz *= (1.0+(rand(uv+t*.01)-.2)*.15);		
        #endif		
		
	}
	else
	{
		gl_FragColor = texture2D( iChannel0, uv );
	}

}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderGlassCubes">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform samplerCube iChannel0;		 //Cube Env Map
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

#define FIXED_STEP 0.01

#define CUBEMAP iChannel0
#define TIME iGlobalTime
#define TRACK iChannel3

mat3 rotate3DX(float a) { return mat3(1.,0.,0.,0.,cos(a),-sin(a),0,sin(a),cos(a));}
mat3 rotate3DY(float a) { return mat3(cos(a),0.,sin(a),0.,1.,0.,-sin(a),0.,cos(a));}
mat3 rotate3DZ(float a) { return mat3(cos(a),-sin(a),0.,sin(a),cos(a),0.,0.,0.,1.);}
mat3 rotate3D(float x,float y,float z) { return rotate3DX(x)*rotate3DY(y)*rotate3DZ(z); }


float box(vec3 o, vec3 d, float r) {
	return length(max(abs(o)-d,0.0))-r;	
}

float f(vec3 o) {
	float a = texture2D(TRACK,vec2(0.,1.)).x*0.1-0.05;

	float f;
	o.z -= 7.;

	mat3 r = rotate3D(TIME/3., TIME/2., TIME);
	
	vec3 br = o, bg = o, bb = o;
	br.y += 1.+a*2.5;
	br.x += 3.;
	br*=r;
	f = box(br,vec3(1.),0.1);

	bg.z += 1.;
	bg.y += a*2.5;
	bg*=r;
	f = min(f,box(bg,vec3(1.),0.1));

	bb.y += 1.+a*2.5;
	bb.x -= 3.;
	bb*=r;
	f = min(f,box(bb,vec3(1.),0.1));
	
	return f;
}

struct collision {
	bool collided;
	vec3 o,n;
};
	
struct ray {
	vec3 o,d;
};
	
collision trace(ray r, float s) {
	collision c;
	c.collided = false;

	float t = 0.;
	for (int i=0; i < 40; i++) {
		float ds = s*f(r.o+r.d*t);
		if (ds <= 0.) {
			float a=t-FIXED_STEP,b=t;
			for(int i=0; i<8;i++) {
				t=(a+b)/2.;
				if(f(r.o+r.d*t)<=0.) b=t;
				else a=t;
			}
			vec3 x = vec3(.005,0.,0.),y = x.yxy, z = x.yyx;
			c.o = r.o+r.d*t;
			c.n = normalize(vec3(f(c.o+x)-f(c.o-x),f(c.o+y)-f(c.o-y),f(c.o+z)-f(c.o-z)));;
			c.collided = true;
			break;
		}
		t += ds+FIXED_STEP;
	}
	
	return c;
}

void main(void) {
	vec2 p = (2.0*gl_FragCoord.xy-iResolution.xy)/iResolution.y;
	vec3 col = vec3(((1.+texture2D(TRACK,vec2(0.,.5)).x)*0.075)/length(p));
	col += vec3(((1.+texture2D(TRACK,vec2(0.,.5)).x)*0.075)/length(p-vec2(0.85,-0.3)));
	col += vec3(((1.+texture2D(TRACK,vec2(0.,.5)).x)*0.075)/length(p-vec2(-0.85,-0.3)));
	ray r = ray(vec3(0.),normalize(vec3(p,2.)));

	float t = mod(TIME,10.);
	float transition = smoothstep(2.,4.,t)-smoothstep(6.,8.,t);
	
	collision c;
	c = trace(r,1.);

	if (c.collided) {
		vec3 n = refract(r.d,c.n,0.5);
		ray r1 = ray(c.o+n*FIXED_STEP,n);
		collision c1 = trace(r1,-1.);
		col = mix(col,vec3(1.),distance(c1.o,c.o)/3.);

		vec3 reflection = textureCube(CUBEMAP,reflect(r.d,c.n)).xyz;
		n = reflect(r.d,c.n);
		r1 = ray(c.o+n*FIXED_STEP,n);
		c1 = trace(r1,1.);
		if (c1.collided) reflection = mix(reflection,textureCube(CUBEMAP,reflect(r1.d,c1.n)).xyz,0.5);
		
		col = mix(col,reflection,transition*0.5+0.5);
	}

	col *= vec3(mix(1.75,1.,transition));
	
	gl_FragColor = vec4(col,1.0);
}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderGrid">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// This helper function returns 1.0 if the current pixel is on a grid line, 0.0 otherwise
float IsGridLine()
{
	// Define the size we want each grid square in pixels
	vec2 vPixelsPerGridSquare = vec2(16.0, 16.0);
	
	// gl_FragCoord is an input to the shader, it defines the pixel co-ordinate of the current pixel
	vec2 vScreenPixelCoordinate = gl_FragCoord.xy;
	
	// Get a value in the range 0->1 based on where we are in each grid square
	// fract() returns the fractional part of the value and throws away the whole number part
	// This helpfully wraps numbers around in the 0->1 range
	vec2 vGridSquareCoords = fract(vScreenPixelCoordinate / vPixelsPerGridSquare);
	
	// Convert the 0->1 co-ordinates of where we are within the grid square
	// back into pixel co-ordinates within the grid square 
	vec2 vGridSquarePixelCoords = vGridSquareCoords * vPixelsPerGridSquare;

	// step() returns 0.0 if the second parmeter is less than the first, 1.0 otherwise
	// so we get 1.0 if we are on a grid line, 0.0 otherwise
	vec2 vIsGridLine = step(vGridSquarePixelCoords, vec2(1.0));
	
	// Combine the x and y gridlines by taking the maximum of the two values
	float fIsGridLine = max(vIsGridLine.x, vIsGridLine.y);

	// return the result
	return fIsGridLine;
}

// This helper function returns 1.0 if we are near the mouse pointer, 0.0 otherwise
float IsWithinCircle(vec2 vPos)
{
	// gl_FragCoord is an input to the shader, it defines the pixel co-ordinate of the current pixel
	vec2 vScreenPixelCoordinate = gl_FragCoord.xy;

	// We calculate how far in pixels we are from the mouse pointer
	float fPixelsToPosition = length(vScreenPixelCoordinate - vPos);
	
	// return 1.0 if the distance to the mouse pointer is less than 8.0 pixels, 0.0 otherwise
	return step(fPixelsToPosition, 8.0);
}

// main is the entry point to the shader. 
// Our shader code starts here.
// This code is run for each pixel to determine its colour
void main(void)
{
	// We are goung to put our final colour here
	// initially we set all the elements to 0 
	vec3 vResult = vec3(0.0);

	// We set the blue component of the result based on the IsGridLine() function
	vResult.b = IsGridLine();

	// 1.0 if we are near the mouse co-ordinates, 0.0 otherwise
	float fIsMousePointerPixelA = IsWithinCircle(iMouse.xy);

	// If the mouse button is pressed
	if(iMouse.z >= 0.0)
	{
		// we set the green component of the result
		vResult.g = fIsMousePointerPixelA;
	}
	else
	{
		// we set the red component of the result
		vResult.r = fIsMousePointerPixelA;
	}

	float fIsMousePointerPixelB = IsWithinCircle(iMouse.zw);
	vResult.b = max(vResult.b, fIsMousePointerPixelB);


	// The output to the shader is gl_FragColor. 
	// This is the colour we write to the screen for this pixel
	gl_FragColor = vec4(vResult, 1.0);
}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderCrtOSC">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// inspired by CRT oscilloscopes... facebook.com/steveoscpu


float Logo(vec2 p) {
	float y = floor((p.y)*16.)+3.;
	if(y < 0. || y > 4.) return 0.;
	float x = floor((1.-p.x)*16.)-8.;
	if(x < 0. || x > 14.) return 0.;
	float v=31698.0;if(y>0.5)v=19026.0;if(y>1.5)v=17362.0;if(y>2.5)v=18962.0;if(y>3.5)v=31262.0;
	return floor(mod(v/pow(2.,x), 2.0));
}

float hash( float n ) { return fract(sin(n)*43758.5453); }

float noise( in vec2 x )
{
	vec2 p = floor(x);
	vec2 f = fract(x);
    	f = f*f*(3.0-2.0*f);
    	float n = p.x + p.y*57.0;
    	return mix(mix(hash(n+0.0), hash(n+1.0),f.x), mix(hash(n+57.0), hash(n+58.0),f.x),f.y);
}

vec3 cloud(vec2 p) {
	p.x *= 1.14;
	p.x -= iGlobalTime*.1;
	p.y *= 3.14;
	vec3 f = vec3(0.0);
    	f += 0.5000*noise(p*10.0)*vec3(0.9, 0.2,0.7);
    	f += 0.2500*noise(p*20.0)*vec3(0.9, 1.6, 0.5);
    	f += 0.1250*noise(p*40.0)*vec3(0.9, 0.7, 0.3);
    	f += 0.0625*noise(p*80.0)*vec3(0.9, 1.2, 0.9);
	return f*f*2.;
}

const float SPEED	= 0.001;
const float SCALE	= 80.0;
const float DENSITY	= 0.8;
const float BRIGHTNESS	= 10.0;
       vec2 ORIGIN	= iResolution.xy*.5;
float rand(vec2 co){ return fract(sin(dot(co.xy ,vec2(12.9898,78.233))) * 43758.5453); }

vec3 layer(float i, vec2 pos, float dist, vec2 coord) {
	float t = i*10.0 + iGlobalTime*i*i;
	float r = coord.x - (t*SPEED);
	float c = fract(coord.y + i*.543 + iGlobalTime*i*.01);
	vec2  p = vec2(r, c*.5)*SCALE*(4.0/(i*i));
	vec2 uv = fract(p)*2.0-1.0;
	float a = coord.y*(3.1415926*2.0) - (3.1415926*.5);
	uv = vec2(uv.x*cos(a) - uv.y*sin(a), uv.y*cos(a) + uv.x*sin(a));
	float m = clamp((rand(floor(p))-DENSITY/i)*BRIGHTNESS, 0.0, 1.0);
	return  clamp(vec3(Logo(uv*.5))*m*dist, 0.0, 1.0);
}

float segment(vec2 P, vec2 P0, vec2 P1)
{
	vec2 v = P1 - P0;
	vec2 w = P - P0;
	float b = dot(w,v) / dot(v,v);
	v *= clamp(b, 0.0, 1.0);
	return length(w-v);
}

float StockValue(float x, float s) {
	return fract(sin(x)*10000.0)*.25*s-x*.5;
}

vec3 Chart( vec2 p ) {

	float d = 1e20;
	float s = 20.;
	float t = iGlobalTime*s*.08;

	p = p*s + vec2(t+s*.25,-t*.5);

	float x = floor(p.x);

	vec2 p0 = vec2(x-.5, StockValue(x+0., s));
	vec2 p1 = vec2(x+.5, StockValue(x+1., s));
	d = min(d, segment(p+vec2(0,0), p0, p1));

	p0 = vec2(x+1.5, StockValue(x+2., s));
	d = min(d, segment(p+vec2(0,0), p1, p0));

	p = abs(mod(p, vec2(1.,1.))-vec2(.5,.5))-.01;
	float b =1.0-clamp(min(p.x, p.y)*iResolution.x/s, 0.0, 1.0);

	float a1=clamp(1.0-d,0.0,1.0);
	a1*=a1;
	return vec3(a1*a1,a1*a1*a1,a1+b*0.2);
}

void main( void ) {
	vec2   pos = gl_FragCoord.xy - ORIGIN ;
	float dist = length(pos) / iResolution.y;
	vec2 coord = vec2(pow(dist, 0.1), atan(abs(pos.x), pos.y) / (3.1415926*2.0));
	vec3 color = cloud(coord)*3.0*dist;
	color.b=cloud(coord*0.998).x*(3.0*dist);
	coord = vec2(pow(dist, 0.1), atan(pos.x, pos.y) / (3.1415926*2.0));
	color += layer(2.0, pos, dist, coord)*0.3;
	color += layer(3.0, pos, dist, coord)*0.2;
	color += layer(4.0, pos, dist, coord)*0.1;
	pos.y=-pos.y;
        vec3 c=((clamp(3.0*abs(fract(iGlobalTime*0.1+vec3(0,2./3.0,1./3.0))*2.-1.)-1.,0.,1.)-1.)+1.);
        c*=(0.2-dist*0.1)*Logo(pos/iResolution.xy);
	gl_FragColor = vec4( (1.0+(2.0-dist*2.0))*0.4 *Chart(pos/iResolution.x)+c+color*.4 , 1.0);
}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderGlassTunnel">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)


float tunnel(vec3 p)
{
	return cos(p.x)+cos(p.y*1.5)+cos(p.z)+cos(p.y*20.)*.05;
}

float ribbon(vec3 p)
{
	return length(max(abs(p-vec3(cos(p.z*1.5)*.3,-.5+cos(p.z)*.2,.0))-vec3(.125,.02,iGlobalTime+3.),vec3(.0)));
}

float scene(vec3 p)
{
	return min(tunnel(p),ribbon(p));
}

vec3 getNormal(vec3 p)
{
	vec3 eps=vec3(.1,0,0);
	return normalize(vec3(scene(p+eps.xyy),scene(p+eps.yxy),scene(p+eps.yyx)));
}

void main(void)
{
	vec2 v = -1.0 + 2.0 * gl_FragCoord.xy / iResolution.xy;
	v.x *= iResolution.x/iResolution.y;
 
	vec4 color = vec4(0.0);
	vec3 org   = vec3(sin(iGlobalTime)*.5,cos(iGlobalTime*.5)*.25+.25,iGlobalTime);
	vec3 dir   = normalize(vec3(v.x*1.6,v.y,1.0));
	vec3 p     = org,pp;
	float d    = .0;

	//First raymarching
	for(int i=0;i<64;i++)
	{
	  	d = scene(p);
		p += d*dir;
	}
	pp = p;
	float f=length(p-org)*0.02;

	//Second raymarching (reflection)
	dir=reflect(dir,getNormal(p));
	p+=dir;
	for(int i=0;i<32;i++)
	{
		d = scene(p);
	 	p += d*dir;
	}
	color = max(dot(getNormal(p),vec3(.1,.1,.0)), .0) + vec4(.3,cos(iGlobalTime*.5)*.5+.5,sin(iGlobalTime*.5)*.5+.5,1.)*min(length(p-org)*.04, 1.);

	//Ribbon Color
	if(tunnel(pp)>ribbon(pp))
		color = mix(color, vec4(cos(iGlobalTime*.3)*.5+.5,cos(iGlobalTime*.2)*.5+.5,sin(iGlobalTime*.3)*.5+.5,1.),.3);

	//Final Color
	vec4 fcolor = ((color+vec4(f))+(1.-min(pp.y+1.9,1.))*vec4(1.,.8,.7,1.))*min(iGlobalTime*.5,1.);
	gl_FragColor = vec4(fcolor.xyz,1.0);
}





</script>

<script type="x-shader/x-fragment" id="fragmentShaderNumbers">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)

// Number Printing - @P_Malin
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

//#define BITMAP_VERSION

const float kCharBlank = 12.0;
const float kCharMinus = 11.0;
const float kCharDecimalPoint = 10.0;

#ifndef BITMAP_VERSION

float InRect(const in vec2 vUV, const in vec4 vRect)
{
	vec2 vTestMin = step(vRect.xy, vUV.xy);
	vec2 vTestMax = step(vUV.xy, vRect.zw);	
	vec2 vTest = vTestMin * vTestMax;
	return vTest.x * vTest.y;
}

float SampleDigit(const in float fDigit, const in vec2 vUV)
{
	const float x0 = 0.0 / 4.0;
	const float x1 = 1.0 / 4.0;
	const float x2 = 2.0 / 4.0;
	const float x3 = 3.0 / 4.0;
	const float x4 = 4.0 / 4.0;
	
	const float y0 = 0.0 / 5.0;
	const float y1 = 1.0 / 5.0;
	const float y2 = 2.0 / 5.0;
	const float y3 = 3.0 / 5.0;
	const float y4 = 4.0 / 5.0;
	const float y5 = 5.0 / 5.0;

	// In this version each digit is made of up to 3 rectangles which we XOR together to get the result
	
	vec4 vRect0 = vec4(0.0);
	vec4 vRect1 = vec4(0.0);
	vec4 vRect2 = vec4(0.0);
		
	if(fDigit < 0.5) // 0
	{
		vRect0 = vec4(x0, y0, x3, y5); vRect1 = vec4(x1, y1, x2, y4);
	}
	else if(fDigit < 1.5) // 1
	{
		vRect0 = vec4(x1, y0, x2, y5); vRect1 = vec4(x0, y0, x0, y0);
	}
	else if(fDigit < 2.5) // 2
	{
		vRect0 = vec4(x0, y0, x3, y5); vRect1 = vec4(x0, y3, x2, y4); vRect2 = vec4(x1, y1, x3, y2);
	}
	else if(fDigit < 3.5) // 3
	{
		vRect0 = vec4(x0, y0, x3, y5); vRect1 = vec4(x0, y3, x2, y4); vRect2 = vec4(x0, y1, x2, y2);
	}
	else if(fDigit < 4.5) // 4
	{
		vRect0 = vec4(x0, y1, x2, y5); vRect1 = vec4(x1, y2, x2, y5); vRect2 = vec4(x2, y0, x3, y3);
	}
	else if(fDigit < 5.5) // 5
	{
		vRect0 = vec4(x0, y0, x3, y5); vRect1 = vec4(x1, y3, x3, y4); vRect2 = vec4(x0, y1, x2, y2);
	}
	else if(fDigit < 6.5) // 6
	{
		vRect0 = vec4(x0, y0, x3, y5); vRect1 = vec4(x1, y3, x3, y4); vRect2 = vec4(x1, y1, x2, y2);
	}
	else if(fDigit < 7.5) // 7
	{
		vRect0 = vec4(x0, y0, x3, y5); vRect1 = vec4(x0, y0, x2, y4);
	}
	else if(fDigit < 8.5) // 8
	{
		vRect0 = vec4(x0, y0, x3, y5); vRect1 = vec4(x1, y1, x2, y2); vRect2 = vec4(x1, y3, x2, y4);
	}
	else if(fDigit < 9.5) // 9
	{
		vRect0 = vec4(x0, y0, x3, y5); vRect1 = vec4(x1, y3, x2, y4); vRect2 = vec4(x0, y1, x2, y2);
	}
	else if(fDigit < 10.5) // '.'
	{
		vRect0 = vec4(x1, y0, x2, y1);
	}
	else if(fDigit < 11.5) // '-'
	{
		vRect0 = vec4(x0, y2, x3, y3);
	}	
	
	float fResult = InRect(vUV, vRect0) + InRect(vUV, vRect1) + InRect(vUV, vRect2);
	
	return mod(fResult, 2.0);
}

#else

float SampleDigit(const in float fDigit, const in vec2 vUV)
{		
	if(vUV.x < 0.0) return 0.0;
	if(vUV.y < 0.0) return 0.0;
	if(vUV.x >= 1.0) return 0.0;
	if(vUV.y >= 1.0) return 0.0;
	
	// In this version, each digit is made up of a 4x5 array of bits
	
	float fDigitBinary = 0.0;
	
	if(fDigit < 0.5) // 0
	{
		fDigitBinary = 7.0 + 5.0 * 16.0 + 5.0 * 256.0 + 5.0 * 4096.0 + 7.0 * 65536.0;
	}
	else if(fDigit < 1.5) // 1
	{
		fDigitBinary = 2.0 + 2.0 * 16.0 + 2.0 * 256.0 + 2.0 * 4096.0 + 2.0 * 65536.0;
	}
	else if(fDigit < 2.5) // 2
	{
		fDigitBinary = 7.0 + 1.0 * 16.0 + 7.0 * 256.0 + 4.0 * 4096.0 + 7.0 * 65536.0;
	}
	else if(fDigit < 3.5) // 3
	{
		fDigitBinary = 7.0 + 4.0 * 16.0 + 7.0 * 256.0 + 4.0 * 4096.0 + 7.0 * 65536.0;
	}
	else if(fDigit < 4.5) // 4
	{
		fDigitBinary = 4.0 + 7.0 * 16.0 + 5.0 * 256.0 + 1.0 * 4096.0 + 1.0 * 65536.0;
	}
	else if(fDigit < 5.5) // 5
	{
		fDigitBinary = 7.0 + 4.0 * 16.0 + 7.0 * 256.0 + 1.0 * 4096.0 + 7.0 * 65536.0;
	}
	else if(fDigit < 6.5) // 6
	{
		fDigitBinary = 7.0 + 5.0 * 16.0 + 7.0 * 256.0 + 1.0 * 4096.0 + 7.0 * 65536.0;
	}
	else if(fDigit < 7.5) // 7
	{
		fDigitBinary = 4.0 + 4.0 * 16.0 + 4.0 * 256.0 + 4.0 * 4096.0 + 7.0 * 65536.0;
	}
	else if(fDigit < 8.5) // 8
	{
		fDigitBinary = 7.0 + 5.0 * 16.0 + 7.0 * 256.0 + 5.0 * 4096.0 + 7.0 * 65536.0;
	}
	else if(fDigit < 9.5) // 9
	{
		fDigitBinary = 7.0 + 4.0 * 16.0 + 7.0 * 256.0 + 5.0 * 4096.0 + 7.0 * 65536.0;
	}
	else if(fDigit < 10.5) // '.'
	{
		fDigitBinary = 2.0 + 0.0 * 16.0 + 0.0 * 256.0 + 0.0 * 4096.0 + 0.0 * 65536.0;
	}
	else if(fDigit < 11.5) // '-'
	{
		fDigitBinary = 0.0 + 0.0 * 16.0 + 7.0 * 256.0 + 0.0 * 4096.0 + 0.0 * 65536.0;
	}
	
	vec2 vPixel = floor(vUV * vec2(4.0, 5.0));
	float fIndex = vPixel.x + (vPixel.y * 4.0);
	
	return mod(floor(fDigitBinary / pow(2.0, fIndex)), 2.0);
}

#endif

float PrintValue(const in vec2 vStringCharCoords, const in float fValue, const in float fMaxDigits, const in float fDecimalPlaces)
{
	float fAbsValue = abs(fValue);
	
	float fStringCharIndex = floor(vStringCharCoords.x);
	
	float fLog10Value = log2(fAbsValue) / log2(10.0);
	float fBiggestDigitIndex = max(floor(fLog10Value), 0.0);
	
	// This is the character we are going to display for this pixel
	float fDigitCharacter = kCharBlank;
	
	float fDigitIndex = fMaxDigits - fStringCharIndex;
	if(fDigitIndex > (-fDecimalPlaces - 1.5))
	{
		if(fDigitIndex > fBiggestDigitIndex)
		{
			if(fValue < 0.0)
			{
				if(fDigitIndex < (fBiggestDigitIndex+1.5))
				{
					fDigitCharacter = kCharMinus;
				}
			}
		}
		else
		{		
			if(fDigitIndex == -1.0)
			{
				if(fDecimalPlaces > 0.0)
				{
					fDigitCharacter = kCharDecimalPoint;
				}
			}
			else
			{
				if(fDigitIndex < 0.0)
				{
					// move along one to account for .
					fDigitIndex += 1.0;
				}

				float fDigitValue = (fAbsValue / (pow(10.0, fDigitIndex)));

				// This is inaccurate - I think because I treat each digit independently
				// The value 2.0 gets printed as 2.09 :/
				//fDigitCharacter = mod(floor(fDigitValue), 10.0);
				fDigitCharacter = mod(floor(0.0001+fDigitValue), 10.0); // fix from iq
			}		
		}
	}

	vec2 vCharPos = vec2(fract(vStringCharCoords.x), vStringCharCoords.y);

	return SampleDigit(fDigitCharacter, vCharPos);	
}

float PrintValue(const in vec2 vPixelCoords, const in vec2 vFontSize, const in float fValue, const in float fMaxDigits, const in float fDecimalPlaces)
{
	return PrintValue((gl_FragCoord.xy - vPixelCoords) / vFontSize, fValue, fMaxDigits, fDecimalPlaces);
}

float GetCurve(float x)
{
	return sin( x * 3.14159 * 4.0 );
}

float GetCurveDeriv(float x) 
{ 
	return 3.14159 * 4.0 * cos( x * 3.14159 * 4.0 ); 
}

void main(void)
{
	vec3 vColour = vec3(0.0);

	// Multiples of 4x5 work best
	vec2 vFontSize = vec2(8.0, 15.0);

	// Draw Horizontal Line
	if(abs(gl_FragCoord.y - iResolution.y * 0.5) < 1.0)
	{
		vColour = vec3(0.25);
	}
	
	// Draw Sin Wave
	// See the comment from iq or this page
	// http://www.iquilezles.org/www/articles/distance/distance.htm
	float fCurveX = gl_FragCoord.x / iResolution.x;
	float fSinY = (GetCurve(fCurveX) * 0.25 + 0.5) * iResolution.y;
	float fSinYdX = (GetCurveDeriv(fCurveX) * 0.25) * iResolution.y / iResolution.x;
	float fDistanceToCurve = abs(fSinY - gl_FragCoord.y) / sqrt(1.0+fSinYdX*fSinYdX);
	float fSetPixel = fDistanceToCurve - 1.0; // Add more thickness
	vColour = mix(vec3(1.0, 0.0, 0.0), vColour, clamp(fSetPixel, 0.0, 1.0));	

	// Draw Sin Value	
	float fValue4 = GetCurve(iMouse.x / iResolution.x);
	float fPixelYCoord = (fValue4 * 0.25 + 0.5) * iResolution.y;
	
	// Plot Point on Sin Wave
	float fDistToPointA = length( vec2(iMouse.x, fPixelYCoord) - gl_FragCoord.xy) - 4.0;
	vColour = mix(vColour, vec3(0.0, 0.0, 1.0), (1.0 - clamp(fDistToPointA, 0.0, 1.0)));
	
	// Plot Mouse Pos
	float fDistToPointB = length( vec2(iMouse.x, iMouse.y) - gl_FragCoord.xy) - 4.0;
	vColour = mix(vColour, vec3(0.0, 1.0, 0.0), (1.0 - clamp(fDistToPointB, 0.0, 1.0)));
	
	// Print Sin Value
	vec2 vPixelCoord4 = vec2(iMouse.x, fPixelYCoord) + vec2(4.0, 4.0);
	float fDigits = 1.0;
	float fDecimalPlaces = 2.0;
	float fIsDigit4 = PrintValue(vPixelCoord4, vFontSize, fValue4, fDigits, fDecimalPlaces);
	vColour = mix( vColour, vec3(0.0, 0.0, 1.0), fIsDigit4);
	
	// Print Shader Time
	vec2 vPixelCoord1 = vec2(96.0, 5.0);
	float fValue1 = iGlobalTime;
	fDigits = 6.0;
	float fIsDigit1 = PrintValue(vPixelCoord1, vFontSize, fValue1, fDigits, fDecimalPlaces);
	vColour = mix( vColour, vec3(0.0, 1.0, 1.0), fIsDigit1);

	// Print Date
	vColour = mix( vColour, vec3(1.0, 1.0, 0.0), PrintValue(vec2(0.0, 5.0), vFontSize, iDate.x, 4.0, 0.0));
	vColour = mix( vColour, vec3(1.0, 1.0, 0.0), PrintValue(vec2(0.0 + 48.0, 5.0), vFontSize, iDate.y + 1.0, 2.0, 0.0));
	vColour = mix( vColour, vec3(1.0, 1.0, 0.0), PrintValue(vec2(0.0 + 72.0, 5.0), vFontSize, iDate.z, 2.0, 0.0));

	// Draw Time
	vColour = mix( vColour, vec3(1.0, 0.0, 1.0), PrintValue(vec2(184.0, 5.0), vFontSize, mod(iDate.w / (60.0 * 60.0), 12.0), 2.0, 0.0));
	vColour = mix( vColour, vec3(1.0, 0.0, 1.0), PrintValue(vec2(184.0 + 24.0, 5.0), vFontSize, mod(iDate.w / 60.0, 60.0), 2.0, 0.0));
	vColour = mix( vColour, vec3(1.0, 0.0, 1.0), PrintValue(vec2(184.0 + 48.0, 5.0), vFontSize, mod(iDate.w, 60.0), 2.0, 0.0));
	
	if(iMouse.x > 0.0)
	{
		// Print Mouse X
		vec2 vPixelCoord2 = iMouse.xy + vec2(-52.0, 6.0);
		float fValue2 = iMouse.x / iResolution.x;
		fDigits = 1.0;
		fDecimalPlaces = 3.0;
		float fIsDigit2 = PrintValue(vPixelCoord2, vFontSize, fValue2, fDigits, fDecimalPlaces);
		vColour = mix( vColour, vec3(0.0, 1.0, 0.0), fIsDigit2);
		
		// Print Mouse Y
		vec2 vPixelCoord3 = iMouse.xy + vec2(0.0, 6.0);
		float fValue3 = iMouse.y / iResolution.y;
		fDigits = 1.0;
		float fIsDigit3 = PrintValue(vPixelCoord3, vFontSize, fValue3, fDigits, fDecimalPlaces);
		vColour = mix( vColour, vec3(0.0, 1.0, 0.0), fIsDigit3);
	}
	
	gl_FragColor = vec4(vColour,1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderSubSurfScatter">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;		 // uncertain
uniform sampler2D iChannel1;		 // cubemap envmap
uniform sampler2D iChannel2;		 // keyboard 
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// Ben Weston - 20/08/2013
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

// constants
const float tau = 6.28318530717958647692;
float Noise( in vec3 x );
bool ReadKey( int key, bool toggle );

bool toggleR = false;
bool toggleS = false;


// ---USER TWEAKABLE THINGS!---

const float epsilon = .003;
const float normalPrecision = .1;
const float shadowOffset = .1;
const int traceDepth = 500; // takes time
const float drawDistance = 100.0;

const vec3 CamPos = vec3(0,40.0,-40.0);
const vec3 CamLook = vec3(0,0,0);

const vec3 lightDir = vec3(.7,1,-.1);
const vec3 fillLightDir = vec3(0,0,-1);
const vec3 lightColour = vec3(1.1,1.05,1);
const vec3 fillLightColour = vec3(.38,.4,.42);
	
// This should return continuous positive values when outside and negative values inside,
// which roughly indicate the distance of the nearest surface.
float Isosurface( vec3 ipos )
{
	// animate the object rotating
	float ang = iGlobalTime*tau/25.0;
	float ang2 = iGlobalTime*tau/125.0;
	float s = sin(ang), c = cos(ang);
	float s2 = sin(ang2), c2 = cos(ang2);
	vec3 pos;
	pos.y = c*ipos.y-s*ipos.z;
	pos.z = c*ipos.z+s*ipos.y;
	pos.x = ipos.x*c2+pos.z*s2;
	pos.z = pos.z*c2-ipos.x*s2;


	// smooth csg
	float smoothing = .9-.65*cos(iGlobalTime*.05);

	return
		log(
			// intersection
			1.0/(
				// union
				1.0/(
					// intersection
					exp((length(pos.xz)-10.0)/smoothing) +
					exp((-(length(pos.xz)-7.0))/smoothing) +
					exp((-(length(vec2(8.0,0)+pos.zy)-5.0))/smoothing) +
					exp((pos.y-10.0)/smoothing) +
					exp((-pos.y-10.0)/smoothing)
					)
				+ exp(-(length(pos+15.0*vec3(sin(iGlobalTime*.07),sin(iGlobalTime*.13),sin(iGlobalTime*.1)))-5.0))
				)
			// trim it with a plane
			//+ exp((dot(pos,normalize(vec3(-1,-1,1)))-10.0-10.0*sin(iGlobalTime*.17))/smoothing)
		)*smoothing
		;//+ Noise(pos*16.0)*.08/16.0; // add some subtle texture
}


// alpha controls reflection
vec4 Shading( vec3 pos, vec3 norm, vec3 visibility, vec3 rd )
{
	vec3 albedo = vec3(1);//mix( vec3(1,.8,.7), vec3(.5,.2,.1), Noise(pos*vec3(1,10,1)) );

	vec3 l = lightColour*mix(visibility,vec3(1)*max(0.0,dot(norm,normalize(lightDir))),.0);
	vec3 fl = fillLightColour*(dot(norm,normalize(fillLightDir))*.5+.5);
	
	vec3 view = normalize(-rd);
	vec3 h = normalize(view+lightDir);
	float specular = pow(max(0.0,dot(h,norm)),2000.0);
	
	float fresnel = pow( 1.0 - dot( view, norm ), 5.0 );
	fresnel = mix( .01, 1.0, min(1.0,fresnel) );
	
	if ( toggleR )
		fresnel = 0.0;
	
	return vec4( albedo*(l+fl)*(1.0-fresnel) + visibility*specular*32.0*lightColour, fresnel );
}

const vec3 FogColour = vec3(.1,.2,.5);

vec3 SkyColour( vec3 rd )
{
	// hide cracks in cube map
	rd -= sign(abs(rd.xyz)-abs(rd.yzx))*.01;

	//return mix( vec3(.2,.6,1), FogColour, abs(rd.y) );
	vec3 ldr = textureCube( iChannel1, rd ).rgb;
	
	// fake hdr
	vec3 hdr = 1.0/(1.2-ldr) - 1.0/1.2;
	
	return hdr;
}

// ---END OF USER TWEAKABLE THINGS!---


// key is javascript keycode: http://www.webonweboff.com/tips/js/event_key_codes.aspx
bool ReadKey( int key, bool toggle )
{
	float keyVal = texture2D( iChannel2, vec2( (float(key)+.5)/256.0, toggle?.75:.25 ) ).x;
	return (keyVal>.5)?true:false;
}


// backend code, hopefully needn't be edited:

float Noise( in vec3 x )
{
    vec3 p = floor(x.xzy);
    vec3 f = fract(x.xzy);
//	f = f*f*(3.0-2.0*f);
	vec3 f2 = f*f; f = f*f2*(10.0-15.0*f+6.0*f2);
	
//cracks cause a an artefact in normal, of course
	
	// there's an artefact because the y channel almost, but not exactly, matches the r channel shifted (37,17)
	// this artefact doesn't seem to show up in chrome, so I suspect firefox uses different texture compression.
	vec2 uv = (p.xy+vec2(37.0,17.0)*p.z) + f.xy;
	vec2 rg = texture2D( iChannel0, (uv+0.5)/256.0, -100.0 ).ba;
	return mix( rg.y, rg.x, f.z )-.5;
}

float Trace( vec3 ro, vec3 rd )
{
	float t = 0.0;
	float dist = 1.0;
	for ( int i=0; i < traceDepth; i++ )
	{
		if ( abs(dist) < epsilon || t > drawDistance || t < 0.0 )
			continue;
		dist = Isosurface( ro+rd*t );
		t = t+dist;
	}
	
	// reduce edge sparkles, caused by reflections on failed positions
	if ( dist > epsilon )
		return drawDistance+1.0;
	
	return t;//vec4(ro+rd*t,dist);
}

vec3 SubsurfaceTrace( vec3 ro, vec3 rd )
{
	vec3 density = pow(vec3(.7,.5,.4),vec3(.4));
	const float confidence = .01;
	vec3 visibility = vec3(1.0);
	
	float lastVal = Isosurface(ro);
	float soft = 0.0;
	for ( int i=1; i < 50; i++ )
	{
		if ( visibility.x < confidence )
			continue;
		
		float val = Isosurface(ro);

		vec3 softened = pow(density,vec3(smoothstep(soft,-soft,val)));
//tweak this to create soft shadows, by expanding with each step (linearly)
		
		if ( (val-soft)*lastVal < 0.0 )
		{
			// approximate position of the surface
			float transition = -min(val-soft,lastVal)/abs(val-soft-lastVal);
			visibility *= pow(softened,vec3(transition));
		}
		else if ( val-soft < 0.0 )
		{
			visibility *= softened;
		}

		soft += .1;
		lastVal = val+soft;
		ro += rd*.4;
	}
	
	return visibility;
}

// get normal
vec3 GetNormal( vec3 pos )
{
	const vec2 delta = vec2(normalPrecision, 0);
	
	vec3 n;

// it's important this is centred on the pos, it fixes a lot of errors
	n.x = Isosurface( pos + delta.xyy ) - Isosurface( pos - delta.xyy );
	n.y = Isosurface( pos + delta.yxy ) - Isosurface( pos - delta.yxy );
	n.z = Isosurface( pos + delta.yyx ) - Isosurface( pos - delta.yyx );
	return normalize(n);
}				

// camera function by TekF
// compute ray from camera parameters
vec3 GetRay( vec3 dir, float zoom, vec2 uv )
{
	uv = uv - .5;
	uv.x *= iResolution.x/iResolution.y;
	
	dir = zoom*normalize(dir);
	vec3 right = normalize(cross(vec3(0,1,0),dir));
	vec3 up = normalize(cross(dir,right));
	
	return dir + right*uv.x + up*uv.y;
}


void Humbug( inout vec4 result, inout vec3 ro, inout vec3 rd )
{
	if ( result.a < .01 )
		return; // continue; // break;
	
	float t = Trace(ro,rd);
	
	vec4 sample = vec4( SkyColour( rd ), 0 );
	
	vec3 norm;
	if ( t < drawDistance )
	{
		ro = ro+t*rd;
		
		norm = GetNormal(ro);
		
		// shadow test
		/*float shadow = 1.0;
		if ( Trace( ro+lightDir*shadowOffset, lightDir ) < drawDistance )
			shadow = 0.0;*/
		
		vec3 subsurface;
		if ( toggleS )
			subsurface = vec3(dot(norm,lightDir));
		else
			subsurface = SubsurfaceTrace( ro+rd*1.0, lightDir );
		
		
		sample = Shading( ro, norm, subsurface, rd );
	}
	
	result.rgb += sample.rgb*result.a;
	result.a *= sample.a;
	result.a = clamp(result.a,0.0,1.0); // without this, chrome shows black!

	//		// fog
	//		result = mix ( vec4(FogColour, 0), result, exp(-t*t*.0002) );
	
	rd = reflect(rd,norm);
	
	ro += rd*shadowOffset;
}


void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;

	vec3 camPos = CamPos;
	vec3 camLook = CamLook;

	vec2 camRot = vec2(iGlobalTime*.1,0)+.5*tau*(iMouse.xy-iResolution.xy*.5)/iResolution.x;
	camPos.yz = cos(camRot.y)*camPos.yz + sin(camRot.y)*camPos.zy*vec2(1,-1);
	camPos.xz = cos(camRot.x)*camPos.xz + sin(camRot.x)*camPos.zx*vec2(1,-1);
	
	if ( Isosurface(camPos) <= 0.0 )
	{
		// camera inside ground
		gl_FragColor = vec4(0,0,0,0);
		return;
	}

	vec3 ro = camPos;
	vec3 rd;
	rd = GetRay( camLook-camPos, 2.0, uv );
	rd = normalize(rd);
	
	vec4 result = vec4(0,0,0,1);
	
	toggleR = ReadKey( 82, true );
	toggleS = ReadKey( 83, true );

	Humbug( result, ro, rd );
	if ( !toggleR )
	{
		Humbug( result, ro, rd );
		Humbug( result, ro, rd );
	}
	
	gl_FragColor = result;
}



</script>


<script type="x-shader/x-fragment" id="fragmentShaderSimpleBubble">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)


// Created by inigo quilez - iq/2013
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

void main(void)
{
	vec2 uv = -1.0 + 2.0*gl_FragCoord.xy / iResolution.xy;
	uv.x *=  iResolution.x / iResolution.y;

    // background	 
	vec3 color = vec3(0.8 + 0.2*uv.y);

    // bubbles	
	for( int i=0; i<40; i++ )
	{
        // bubble seeds
		float pha =      sin(float(i)*546.13+1.0)*0.5 + 0.5;
		float siz = pow( sin(float(i)*651.74+5.0)*0.5 + 0.5, 4.0 );
		float pox =      sin(float(i)*321.55+4.1) * iResolution.x / iResolution.y;

        // buble size, position and color
		float rad = 0.1 + 0.5*siz;
		vec2  pos = vec2( pox, -1.0-rad + (2.0+2.0*rad)*mod(pha+0.1*iGlobalTime*(0.2+0.8*siz),1.0));
		float dis = length( uv - pos );
		vec3  col = mix( vec3(0.94,0.3,0.0), vec3(0.1,0.4,0.8), 0.5+0.5*sin(float(i)*1.2+1.9));
		      col+= 8.0*smoothstep( rad*0.95, rad, dis );
		
        // render
		float f = length(uv-pos)/rad;
		f = sqrt(clamp(1.0-f*f,0.0,1.0));
		color -= col.zyx *(1.0-smoothstep( rad*0.95, rad, dis )) * f;
	}

    // vigneting	
	color *= sqrt(1.5-0.5*length(uv));

	gl_FragColor = vec4(color,1.0);
}



</script>


<script type="x-shader/x-fragment" id="fragmentShaderLazerBubble">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)

//"Lasers & Bubbles" by Kali

//comment next line to disable DOF
#define DOF 


//Rotation function by Syntopia
mat3 rotmat(vec3 v, float angle)
{
	float c = cos(angle);
	float s = sin(angle);
	
	return mat3(c + (1.0 - c) * v.x * v.x, (1.0 - c) * v.x * v.y - s * v.z, (1.0 - c) * v.x * v.z + s * v.y,
		(1.0 - c) * v.x * v.y + s * v.z, c + (1.0 - c) * v.y * v.y, (1.0 - c) * v.y * v.z - s * v.x,
		(1.0 - c) * v.x * v.z - s * v.y, (1.0 - c) * v.y * v.z + s * v.x, c + (1.0 - c) * v.z * v.z
		);
}

//Distance Field
vec4 de(vec3 pos) {
	vec3 A=vec3(4.);
	vec3 p = abs(A-mod(pos,2.0*A)); //tiling fold by Syntopia
	float sph=length(p)-.6;
	float cyl=length(p.xy)-.012;
	cyl=min(cyl,length(p.xz))-.012;
	cyl=min(cyl,length(p.yz))-.012;
	p=p*rotmat(normalize(vec3(0,0,1.)),radians(45.));
	if (max(abs(pos.x),abs(pos.y))>A.x) {
	cyl=min(cyl,length(p.xy))-.012;
	cyl=min(cyl,length(p.xz))-.012;
	cyl=min(cyl,length(p.yz))-.012;
	}
   float d=min(cyl,sph);
	vec3 col=vec3(0.);
	if (sph<cyl && d<.1) col=vec3(.9,.85,.7); else col=vec3(1.2,0.2,0.1);
	return vec4(col,d);	
	
}


void main(void)
{
	float time = iGlobalTime; //just because it's more handy :)

	// mouse functions
	vec2 mouse=iMouse.xy/iResolution.xy;
	float viewangle=-45.+iMouse.x/iResolution.x*90.; 
	float focus=iMouse.y/iResolution.y*.4;
	if (mouse.x+mouse.y<.01) { //default settings
		focus=.13;	
		viewangle=0.;		
	}
	
	//camera
	mat3 rotview=rotmat(vec3(0.,1.,0.),radians(viewangle));
	vec2 coord = gl_FragCoord.xy / iResolution.xy *2.2 - vec2(1.);
	coord.y *= iResolution.y / iResolution.x;
	float fov=min((time*.2+.2),0.9); //animate fov at start
	vec3 from = vec3(0.,sin(time*.5)*2.,time*5.);
	
	vec3 p;
	float totdist=-1.5;
	float intens=1.;
	float maxdist=90.;
	vec3 col=vec3(0.);
	vec3 dir;
	for (int r=0; r<150; r++) {
		dir=normalize(vec3(coord.xy*fov,1.))*rotview 
			*rotmat(normalize(vec3(0.05,0.05,1.)),time*.3+totdist*.015); //rotate ray
		vec4 d=de(p); //get de and color
		float distfactor=totdist/maxdist;
		float fade=exp(-.06*distfactor*distfactor); //distance fade
		float dof=min(.15,1.-exp(-2.*pow(abs(distfactor-focus),2.))); //focus
		float dd=abs(d.w); 
		#ifdef DOF
			totdist+=max(0.007+dof,dd); //bigger steps = out of focus
		#else
			totdist+=max(0.007,dd);
		#endif
		if (totdist>maxdist) break; 
		p=from+totdist*dir;
		intens*=fade; //lower bright with distance
		col+=d.xyz*intens; //accumulate color
	}
	
	col=col/maxdist; //average colors (kind of)
	col*=pow(length(col),1.3)*.5; //contrast & brightness
	
	//light
	col+=vec3(1.1,.95,.85)*pow(max(0.,dot(dir,vec3(0.,0.,1.))),12.)*.8; 
	col+=vec3(.2,.17,.12)*pow(max(0.,dot(dir,vec3(0.,0.,1.))),200.);
	
	col*=min(1.,time); //fade in

	gl_FragColor = vec4(col,1.0);	
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderWater">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;		//app.renderDest
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// Simple Water shader. (c) Victor Korsun, bitekas@gmail.com; 2012.
//
// Attribution-ShareAlike CC License.

#ifdef GL_ES
precision highp float;
#endif

const float PI = 3.1415926535897932;

// play with these parameters to custimize the effect
// ===================================================

//speed
const float speed = 0.2;
const float speed_x = 0.3;
const float speed_y = 0.3;

// refraction
const float emboss = 0.50;
const float intensity = 2.4;
const int steps = 8;
const float frequency = 6.0;
const int angle = 7; // better when a prime

// reflection
const float delta = 60.;
const float intence = 700.;

const float reflectionCutOff = 0.012;
const float reflectionIntence = 200000.;

// ===================================================

float time = iGlobalTime*1.3;

  float col(vec2 coord)
  {
    float delta_theta = 2.0 * PI / float(angle);
    float col = 0.0;
    float theta = 0.0;
    for (int i = 0; i < steps; i++)
    {
      vec2 adjc = coord;
      theta = delta_theta*float(i);
      adjc.x += cos(theta)*time*speed + time * speed_x;
      adjc.y -= sin(theta)*time*speed - time * speed_y;
      col = col + cos( (adjc.x*cos(theta) - adjc.y*sin(theta))*frequency)*intensity;
    }

    return cos(col);
  }

//---------- main

void main(void)
{
vec2 p = (gl_FragCoord.xy) / iResolution.xy, c1 = p, c2 = p;
float cc1 = col(c1);

c2.x += iResolution.x/delta;
float dx = emboss*(cc1-col(c2))/delta;

c2.x = p.x;
c2.y += iResolution.y/delta;
float dy = emboss*(cc1-col(c2))/delta;

c1.x += dx*2.;
c1.y = -(c1.y+dy*2.);

float alpha = 1.+dot(dx,dy)*intence;
	
float ddx = dx - reflectionCutOff;
float ddy = dy - reflectionCutOff;
if (ddx > 0. && ddy > 0.)
	alpha = pow(alpha, ddx*ddy*reflectionIntence);
	
vec4 col = texture2D(iChannel0,c1)*(alpha);
gl_FragColor = col;
}




</script>


<script type="x-shader/x-fragment" id="fragmentShaderSymbio">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


#define ZNEAR        1.9
#define ZFAR         2000.0
#define STEP_MAX     6
#define STEP_EPS	 1.0
#define NORMAL_EPS   1.0

#define SX	245.0
#define YX	168.0
#define MX	105.0
#define BX	-25.0
#define IX	-135.0
#define OX	-215.0


float time = 0.5*iGlobalTime;


float ring(in vec3 p, in vec2 r)
{
	return abs(length(p.xy)-r.x)-r.y;
}

float box(in vec3 p, in vec3 r)
{
	vec3 d = abs(p)-r;
	return max(d.x,d.y);
}

float sub(in float d1, in float d2)
{
	return max(d1,-d2);
}

mat3 rotz(in float a)
{
	float ca = cos(a);
	float sa = sin(a);
	return mat3(
		ca,sa,0.0,
		-sa,ca,0.0,
		0.0,0.0,1.0
	);
}

mat3 rotx(in float a)
{
	float ca = cos(a);
	float sa = sin(a);
	return mat3(
		1.0,0.0,0.0,
		0.0,ca,-sa,
		0.0,sa,ca
	);
}

mat3 roty(in float a)
{
	float ca = cos(a);
	float sa = sin(a);
	return mat3(
		ca,0.0,sa,
		0.0,1.0,0.0,
		-sa,0.0,ca
	);
}

float func(in vec3 p)
{
	float ax = 0.3*sin(time);
	float ay = time;//0.3*sin(5.0*time);
	if (iMouse.z > 0.5)
	{
		ay = 3.14*(0.5-iMouse.x/iResolution.x);
		ax = 3.14*(-0.5+iMouse.y/iResolution.y);
	}
	mat3 m = rotx(ax)*roty(ay);
	p = m*(p-vec3(0.0,0.0,350.0))*vec3(1.0,1.3,1.0);
	float d = ZFAR;
	float t;
	vec3 c;
	
	// Traditional warping.
	p.xy += (5.0-5.0*cos(1.0*time))
		*sin(0.04*p.yx+4.0*time);
	
	// Interesting trick. Flip X when Z > 0...?
	if (p.z > 0.0)
	{
		p.z = -p.z;
		p.x = -p.x;
	}
	
	// s
	c = p+vec3(SX,0.0,0.0);
	
	c = rotz(0.45)*c;
	t = ring(c+vec3(0.0,-22.0,0.0),vec2(22.0,10.0));
	t = sub(t,-c.x+1.0);
	t = sub(t,-p.x-SX+17.0);
	d = min(d,t);

	t = ring(c+vec3(0.0,22.0,0.0),vec2(22.0,10.0));
	t = sub(t,(c.x+1.0));
	t = sub(t, p.x+SX+17.5);
	d = min(d,t);

	
	// y
	c = p+vec3(YX,20.0,0.0);
	
	c = c*rotz(-0.35);
	t = box(c,vec3(10.0,100.0,10.0));
	d = min(d,t);

	c = c*rotz(2.0*0.35);
	c += vec3(8.0,-45.0,0.0);
	t = box(c,vec3(10.0,50.0,10.0));
	d = min(d,t);
	
	// this clips s & y
	d = sub(d,-p.y+54.0);
	d = sub(d,p.y+100.0);


	// m
	float mbd;
	c = p+vec3(MX,-10.0,0.0);
	mbd = box(c,vec3(10.0,54.0+10.0,10.0));
	
	c += vec3(-44.0,26.0,0.0);
	t = box(c,vec3(10.0,54.0-16.0,10.0));
	mbd = min(mbd,t);

	c += vec3(-44.0,0.0,0.0);
	t = box(c,vec3(10.0,54.0-16.0,10.0));
	mbd = min(mbd,t);

	c += vec3(22.0,-35.0,0.0);
	t = ring(c,vec2(22.0,10.0));
	c += vec3(44.0,0.0,0.0);
	t = min(t,ring(c,vec2(22.0,10.0)));
	t = sub(t,c.y);
	mbd = min(mbd,t);


	// b
	c = p+vec3(BX,-45.0,0.0);
	t = box(c, vec3(10.0,80.0,10.0));
	mbd = min(mbd,t);

	c += vec3(-30.0,45.0,0.0);
	t = ring(c, vec2(44.0,10.0));
	t = sub(t,c.x+40.0);
	mbd = min(mbd,t);

	// clip m & b
	float g = -0.34;
	float x = cos(g);
	float y = sin(g);
	mbd = sub(mbd,88.0+dot(p,-vec3(y,x,0.0)));
	d = min(d,mbd);


	// i
	c = p+vec3(IX,-10.0,0.0);
	t = box(c,vec3(10.0,64.0,10.0));
	t = sub(t,5.0+dot(p,-vec3(y,x,0.0)));
	d = min(d,t);

	c += vec3(0.0,-77.0,0.0);
	t = ring(c,vec2(5.0,10.0));
	d = min(d,t);
	

	// o
	c = p+vec3(OX,0.0,0.0);
	t = ring(c,vec2(44.0,10.0));
	d = min(d,t);
	
	// limit z
	d = max(d,abs(p.z)-20.0);

	return d;
}

// Normal calculation modified from one by PauloFalcao:
// https://www.shadertoy.com/view/MsX3zr
vec3 normal(in vec3 p)
{
	const float eps = NORMAL_EPS;
	float v1 = func(p+vec3( NORMAL_EPS,-NORMAL_EPS,-NORMAL_EPS));
	float v2 = func(p+vec3(-NORMAL_EPS,-NORMAL_EPS, NORMAL_EPS));
	float v3 = func(p+vec3(-NORMAL_EPS, NORMAL_EPS,-NORMAL_EPS));
	float v4 = func(p+vec3( NORMAL_EPS, NORMAL_EPS, NORMAL_EPS));
	return normalize(v4+vec3(v1-v3-v2,v3-v1-v2,v2-v3-v1));
}

vec4 loop(in vec3 p, in vec3 dir, out int steps)
{
	float totald = 0.0;
	steps = 0;
	for (int i=0; i < STEP_MAX; i++)
	{
		float stepd = func(p);
		if (stepd < STEP_EPS)
		{
			break;
		}
		p += stepd*dir;
		totald += stepd;
		steps++;
	}
	return vec4(p,totald);
}

vec4 trace(out int steps)
{
	float s = min(iResolution.x,iResolution.y);
	vec3 p = vec3((2.0*gl_FragCoord.xy-iResolution.xy)/s,ZNEAR);
	vec3 dir = normalize(p);
	vec4 pd = loop(p,dir,steps);
	return pd;
}

vec4 shade(in vec4 pd, in int steps)
{
	vec3 n = normal(pd.xyz);
	vec3 ldir = normalize(vec3(sin(time),1.0,cos(time)));
	//vec3 ldir = normalize(vec3(1.0,1.0,-1.0));
	float ndotl = max(dot(n,ldir),0.0);
	float diff = 0.6*ndotl;
	float amb = 0.6*(ZFAR-pd.w)/(ZFAR-ZNEAR);
	float what = dot(n,reflect(n,ldir));
	float tot = diff+amb+what;
	vec4 col = mix(
		vec4(1.0),
		vec4(1.0,0.55,0.0,1.0),
		float(steps-1)/float(STEP_MAX-1)
	);
	return tot*col;
}

void main(void)
{
	int steps;
	vec4 pd = trace(steps);
	vec4 c = shade(pd,steps);
	gl_FragColor = vec4(c.rgb,1.0);
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderRadialBlur">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;		 // tex07
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// Created by inigo quilez - iq/2013
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

vec3 deform( in vec2 p )
{
    vec2 uv;

    vec2 q = vec2( sin(1.1*iGlobalTime+p.x),sin(1.2*iGlobalTime+p.y) );

    float a = atan(q.y,q.x);
    float r = sqrt(dot(q,q));

    uv.x = sin(0.0+1.0*iGlobalTime)+p.x*sqrt(r*r+1.0);
    uv.y = sin(0.6+1.1*iGlobalTime)+p.y*sqrt(r*r+1.0);

    return texture2D( iChannel0, uv*.3).yxx;
}

void main(void)
{
    vec2 p = -1.0 + 2.0 * gl_FragCoord.xy / iResolution.xy;
    vec2 s = p;

    vec3 total = vec3(0.0);
    vec2 d = (vec2(0.0,0.0)-p)/40.0;
    float w = 1.0;
    for( int i=0; i<40; i++ )
    {
        vec3 res = deform(s);
        res = smoothstep(0.0,1.0,res);
        total += w*res;
        w *= .99;
        s += d;
    }
    total /= 40.0;
    float r = 3.0;

	gl_FragColor = vec4( total*r,1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderWarpSpeed">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// 'Warp Speed' by David Hoskins 2013.
// Adapted it from here:-   https://www.shadertoy.com/view/MssGD8
// I tried to find gaps and variation in the star cloud for a feeling of structure.
float time = (iGlobalTime+29.) * 60.0;
void main(void)
{
	float s = 0.0, v = 0.0;
	vec2 uv = (gl_FragCoord.xy / iResolution.xy) * 2.0 - 1.0;
	float t = time*0.005;
	uv.x = (uv.x * iResolution.x / iResolution.y) + sin(t)*.5;
	float si = sin(t+2.17); // ...Squiffy rotation matrix!
	float co = cos(t);
	uv *= mat2(co, si, -si, co);
	vec3 col = vec3(0.0);
	for (int r = 0; r < 100; r++) 
	{
		vec3 p= vec3(0.25, 0.25+sin(time*0.001)*0.4, floor(time) * 0.0008) + s * vec3(uv, 0.143);
		p.z = mod(p.z,2.0);
		for (int i=0; i < 10; i++) p = abs(p*2.04) / dot(p, p) - 0.75;
		v += length(p*p)*smoothstep(0.0, 0.5, 0.9 - s) * .002;
		// Get a purple and cyan effect by biasing the RGB in different ways...
		col +=  vec3(v * 0.8, 1.1 - s * 0.5, .7 + v * 0.5) * v * 0.013;
		s += .01;
	}
	gl_FragColor = vec4(col, 1.0);
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderPhoneHome">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// "phoning home" fragment shader by movAX13h

// A fragment shader heavily inspired by T-Shirt artwork (I dont know the artist):
// http://empoz.com/shopping/images/medium/mpd/GP019-BLK-Funny-ET-Telephone-tee-shirt_MED.jpg

// This was my first raymarching shader.

// Using some of iqs distance functions.
// Fragments of code borrowed from all over ShaderToy.

// There is no real lighting in this scene, transparency and illumination is
// based on the distance of the ray inside the main box and is not accurate because
// the value is incremented inside the marcher which does not march the same number
// of steps for all pixels. This effect fits the flat style of E.T and the telephone, so I kept it.
// Anyways, by uncommenting the following line, everything "light" is off.
//#define ILLUMINATION_OFF

// Uncomment the following define to enable Dave Hoskins' "Warp speed" shader 
// in the background (https://www.shadertoy.com/view/Msl3WH)
// Daves shader is based on Kalis "Cosmos" shader (https://www.shadertoy.com/view/MssGD8)
// I liked it so much, I had to see how it combines :)
#define WARP_SHADER_ON


float udBox( vec3 p, vec3 b ) 
{	
	return length(max(abs(p)-b,0.0)); 
}

float sdBox( vec3 p, vec3 b ) 
{	
	vec3 d = abs(p) - b;
	return min(max(d.x,max(d.y,d.z)),0.0) + length(max(d,0.0));
}

float udRoundBox( vec3 p, vec3 b, float r )
{
  return length(max(abs(p)-b,0.0))-r;
}

float sdSegment(vec3 p, vec3 a, vec3 b, float r )
{
	vec3 pa = p - a;
	vec3 ba = b - a;
	float h = clamp( dot(pa,ba)/dot(ba,ba), 0.0, 1.0 );
	return length(pa - ba*h) - r;
}

float time;

vec4 scene(vec3 p, inout float t, inout vec3 tcol)
{
	float d, d1, d2, d3, d4, d5, f, v;
	
	#ifdef ILLUMINATION_OFF
	vec3 col = vec3(0.1, 0.7, 1.0);
	#else
	vec3 col = vec3(0.06, 0.06, 0.16);
	#endif
	
	// cell
	d1 = sdBox(p, vec3(0.6, 1.2, 0.5));
	v = sdBox(p-vec3(0.0, 0.01, 0.0), vec3(0.58, 1.1, 0.48)); // along y
	d3 = sdBox(p-vec3(0.0, 0.05, 0.0), vec3(0.58, 0.97, 0.7)); // along z
	d4 = sdBox(p-vec3(0.0, 0.05, 0.0), vec3(0.7, 0.97, 0.48)); // along x
	d = max(-d4, max(-d3, max(-v, d1)));
	
	// sash bars	
	d = min(d, udBox(p-vec3(0.0, -0.45, 0.48), vec3(0.58, 0.01, 0.01)));
	d = min(d, udBox(p-vec3(0.0, 0.05, 0.48), vec3(0.58, 0.01, 0.01)));
	d = min(d, udBox(p-vec3(0.0, 0.55, 0.48), vec3(0.58, 0.01, 0.01)));
	
	d = min(d, udBox(p-vec3(0.0, -0.45, -0.48), vec3(0.58, 0.01, 0.01)));
	d = min(d, udBox(p-vec3(0.0, 0.05, -0.48), vec3(0.58, 0.01, 0.01)));
	d = min(d, udBox(p-vec3(0.0, 0.55, -0.48), vec3(0.58, 0.01, 0.01)));
	
	d = min(d, udBox(p-vec3(0.58, 0.05, 0.0), vec3(0.01, 0.01, 0.48)));
	d = min(d, udBox(p-vec3(0.58, 0.02, 0.0), vec3(0.01, 1.0, 0.01)));

	// inner life
	if (v < 0.0) 
	{
		// phone & handset
		//d1 = 100.0;
		//d2 = 100.0;
		d1 = udRoundBox(p-vec3(-0.493, 0.1, 0.22), vec3(0.05, 0.3, 0.16), 0.02);
		d2 = udRoundBox(p-vec3(-0.475, 0.2, 0.22), vec3(0.07, 0.26, 0.16), 0.02);
		d3 = sdSegment(p, vec3(0.03 , -0.1 , 0.2), vec3(-0.1 , 0.02 , 0.16), 0.03);
		d4 = udRoundBox(p-vec3(0.03 , -0.14 , 0.2), vec3(0.01, 0.01, 0.01), 0.04);
		d5 = udRoundBox(p-vec3(-0.12 , 0.0 , 0.16), vec3(0.01, 0.01, 0.01), 0.04);
		d = min(d, min(min(min(min(d5,d4),d3),d2),d1));
		
		// cable
		if (abs(p.x+0.16) < 0.22) 
		{
			d = min(d, sdSegment(p, vec3(p.x     , -0.23 + sin( p.x     *12.0)*0.2, 0.2), 
						 		    vec3(p.x-0.1 , -0.23 + sin((p.x-0.1)*12.0)*0.2, 0.2), 0.01));
		}
		
		// E.T.
		
		// head	
		d1 = sdSegment(p, vec3(0.11  , 0.42 , 0.12), vec3(0.11  , 0.43 , -0.12), 0.1); // eyes
		d2 = sdSegment(p, vec3(0.05  , 0.34 , 0.0), vec3(0.38 , 0.3 ,  0.0), 0.1); // mouth area
		d3 = sdSegment(p, vec3(0.17 , 0.44 , 0.0),  vec3(0.38 , 0.3 ,  0.0), 0.13); // skull
		d4 = sdSegment(p, vec3(0.35  , 0.31 , 0.0),  vec3(0.38 , -0.2  ,  0.0), 0.06); // neck
		d = min(d, min(min(min(d4,d3),d2),d1));	
		
		// pointing arm/hand
		d1 = sdSegment(p, vec3( 0.2 , -0.18 , -0.18),  vec3(-0.08  , -0.04 , 0.0), 0.05);
		d2 = sdSegment(p, vec3(-0.1 , -0.04  ,  0.0), vec3(-0.13 , 0.29 , 0.11), 0.03);
		d = min(d, min(d2,d1));
		
		// fingers
		d1 = sdSegment(p, vec3(-0.13 , 0.32 , 0.11), vec3(-0.4  , 0.5+p.x*0.3 , 0.14), 0.012); // pointing
		d2 = sdSegment(p, vec3(-0.12 , 0.31 , 0.12), vec3(-0.24 , 0.33  , 0.1), 0.014); // angled
		d3 = sdSegment(p, vec3(-0.25 , 0.33  , 0.1), vec3(-0.26 , 0.28  , 0.1), 0.012);
		d4 = sdSegment(p, vec3(-0.13 , 0.31 , 0.13), vec3(-0.25 , 0.3 , 0.15), 0.014); // thumb
		d = min(d, min(min(min(d4,d3),d2),d1));	
		
		// other arm
		d1 = sdSegment(p, vec3(0.2, -0.14, 0.18), vec3(0.21, -0.3, 0.2), 0.05);
		d2 = sdSegment(p, vec3(0.21, -0.3, 0.2), vec3(0.03, -0.1, 0.2), 0.04);
		d = min(d, min(d2, d1));
		
		// body & legs
		d1 = sdSegment(p, vec3(0.3, -0.22, 0.0), vec3(0.26, -0.76, 0.1), 0.23);
		d2 = sdSegment(p, vec3(0.3, -0.22, 0.0), vec3(0.26, -0.76, -0.1), 0.23);
		d3 = sdSegment(p, vec3(0.3, -0.22, 0.0), vec3(0.18, -0.72, 0.0), 0.23);
		d4 = sdSegment(p, vec3(0.27, -0.72, 0.16), vec3(0.28, -1.0, 0.14), 0.1);
		d5 = sdSegment(p, vec3(0.28, -0.72, -0.16), vec3(0.28, -1.0, -0.14), 0.1);
		d = min(d, min(min(min(min(d5,d4),d3),d2),d1));
	
		// finger tip light
		float blink = mod(floor(time*10.0), 2.0);
		f = length(vec3(-0.4, 0.38, 0.14)-p);
		tcol += blink*0.04*smoothstep(0.2, 0.0, f)*vec3(0.2, 0.08, 0.0);
		tcol = mix(tcol, vec3(0.2, 0.08, 0.0), blink*smoothstep(0.04, 0.0, f));
		t += blink*0.1*smoothstep(0.2, 0.0, f);
		
		// glass
		t = max(0.2, t + 0.04 + 0.02*sin(p.y*5.0+time));
		tcol += smoothstep(0.1, 1.2, p.y*0.3)*(1.0-tcol);
		
		// flies
		f = length(0.3*vec3(sin(time*0.2+66.0), 3.2+sin(time*0.7)*0.5, cos(time*0.6))-p);
		d = min(d, f - 0.01);
		tcol += step(f, 0.01)*0.01;
		
		f = length(0.4*vec3(sin(-time*0.4), 3.3+sin(-t*0.5)*cos(t+100.0), sin(time*0.34+32.0))-p);
		d = min(d, f - 0.006);
		tcol += step(f, 0.01)*0.01;
		
		f = length(0.36*vec3(sin(time*0.6), 3.4+sin(time*0.5)*sin(-time*0.2), sin(-time*0.3))-p);
		d = min(d, f - 0.006);
		tcol += step(f, 0.01)*0.01;

		// swirl
		/*
		d1 = 0.1*sin((p.y+time)*8.0);
		d2 = 0.1*cos((p.y+time)*8.0);
		d3 = sdSegment(p, vec3(d1 , mod(time*6.0, 8.0) - 4.0, d2),  
						  vec3(d1 , mod(time*6.0, 8.0) - 2.0, d2), 0.47);
		
		tcol = mix(tcol, vec3(1.0, 1.0, 1.0), 1.0-smoothstep(-0.5,0.0, d3));
		if (d3 < 0.0) t += 0.1;
		*/
	}	
	
	return vec4(col, d);
}

vec3 Dave_Hoskins_Warp_Shader()
{
	float s = 0.0, v = 0.0;
	vec2 uv = (gl_FragCoord.xy / iResolution.xy) * 2.0 - 1.0;
	float t = time*0.005;
	uv.x = (uv.x * iResolution.x / iResolution.y) + sin(t)*.5;
	float si = sin(t+2.17); // ...Squiffy rotation matrix!
	float co = cos(t);
	uv *= mat2(co, si, -si, co);
	vec3 col = vec3(0.0);
	for (int r = 0; r < 100; r++) 
	{
		vec3 p= vec3(0.3, 0.2, floor(time) * 0.0008) + s * vec3(uv, 0.143);
		p.z = mod(p.z,2.0);
		for (int i=0; i < 10; i++) p = abs(p*2.04) / dot(p, p) - 0.75;
		v += length(p*p)*smoothstep(0.0, 0.5, 0.9 - s) * .002;
		col +=  vec3(v * 0.8, 1.1 - s * 0.5, .7 + v * 0.5) * v * 0.013;
		s += .01;
	}	
	return col;
}

void main( void ) 
{
	#ifdef WARP_SHADER_ON
	time = (iGlobalTime+2.4) * 60.0;
	vec3 col = Dave_Hoskins_Warp_Shader();
	#endif
	
	time = iGlobalTime + 7.3;
    vec2 pos = (gl_FragCoord.xy*2.0 - iResolution.xy) / iResolution.y;
	
    float focus = 3.0;
    float far = 9.0;
	
	float atime = time*0.4;
	vec3 cp = vec3(2.0+sin(atime)*3.0, 0.6+sin(atime)*0.6, 5.0+cos(atime)); // anim perspective
  	//vec3 cp = vec3(sin(iGlobalTime)*6.0, .0, cos(iGlobalTime)*6.0);
  	//vec3 cp = vec3(sin(iGlobalTime)*4.0, sin(iGlobalTime*2.0)*0.7, cos(iGlobalTime)*7.0); 
	
	if (iMouse.z > 0.0)
	{
		float d = (iResolution.y-iMouse.y)*0.01+3.0;
		cp = vec3(sin(iMouse.x*0.01)*d, .0, cos(iMouse.x*0.01)*d);
	}
	
    vec3 ct = vec3(0.0, 0.0, 0.0);
   	vec3 cd = normalize(ct-cp);
    vec3 cu  = vec3(sin(time), 1.0, cos(time));
    vec3 cs = cross(cd, cu);
    vec3 dir = normalize(cs*pos.x + cu*pos.y + cd*focus);
	
    vec3 ray = cp;
	float dist = 0.0;
    vec4 s;
	
	float t = 0.06;
	vec3 tcol = vec3(0.0, 0.5, 0.7);
	
    for(int i=0; i < 40; i++) 
	{
        s = scene(ray, t, tcol);
		
        dist += s.w;
        ray += dir * s.w;
		
        if(s.w < 0.01) break;
		
        if(dist > far) 
		{ 
			dist = far; 
			break; 
		}
    }
	
	#ifdef ILLUMINATION_OFF
	t = 0.0;
	#endif
	
    float b = 1.0 - dist/far;
	vec3 c = mix(vec3(b * s.rgb), tcol, t);
	
	#ifdef WARP_SHADER_ON
	col = mix(c, col, smoothstep(0.5, 0.99, min(0.7-b, 1.0-t))); // mix shaders
    gl_FragColor = vec4(col, 1.0);
	#else
	gl_FragColor = vec4(c, 1.0);
	#endif
}





</script>

<script type="x-shader/x-fragment" id="fragmentShaderMicrobe">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform sampler2D iChannel1;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

//#define DOF_EFFECT
//uncomment to enable DOF (actually works faster!)

mat3 rot(vec3 v, float angle)
{
	float c = cos(angle);
	float s = sin(angle);
	
	return mat3(c + (1.0 - c) * v.x * v.x, (1.0 - c) * v.x * v.y - s * v.z, (1.0 - c) * v.x * v.z + s * v.y,
		(1.0 - c) * v.x * v.y + s * v.z, c + (1.0 - c) * v.y * v.y, (1.0 - c) * v.y * v.z - s * v.x,
		(1.0 - c) * v.x * v.z - s * v.y, (1.0 - c) * v.y * v.z + s * v.x, c + (1.0 - c) * v.z * v.z
		);
}

vec2 f=vec2(0.5,2.);

float surfkifs(vec3 p,float sca) {
	float time = iGlobalTime*1.2;
	vec2 c=vec2(1.,1.);
	const int iter=24;
	float sc=1.16+sca*.025;
	vec3 j=vec3(-1,-1,-1.5);
	//vec3 rotv=normalize(vec3(0.2,-0.2,-1)+.2*vec3(sin(time),-sin(time),cos(time)));
	vec3 rotv=normalize(vec3(-0.08+sin(time)*.02,-0.2,-.5));
	float rota=radians(50.);
	mat3 rotm=rot(normalize(rotv),rota);
	p.z=abs(p.z)-4.;
	for (int i=0; i<iter; i++) {
		p.xy=abs(p.xy+f.xy)-f.xy;
		p*=rotm;
		p*=sc;
		p+=j;
		
	}
	return length(p)*pow(sc,float(-iter));
}

float nucleo(vec3 p, float s) {
	float d=1000.;
	for (float n=0.; n<10.; n++) {
		float t=mod((iGlobalTime+n)*2.,4000.);
		vec4 r=texture2D(iChannel1,vec2(floor(t/64.),mod(t,64.))/64.);
		d=min(d,length(p+(r.xyz-vec3(.5))*s*.7)-s*(.2+r.w*.3));
	}
	return d;
}


float sampleMusic()
{
	return (
		texture2D( iChannel0, vec2( 0.01, 0.15 ) ).x + 
		texture2D( iChannel0, vec2( 0.07, 0.15 ) ).x + 
		texture2D( iChannel0, vec2( 0.15, 0.15 ) ).x + 
		texture2D( iChannel0, vec2( 0.30, 0.15 ) ).x);
}

void main(void)
{
	float sca=.5+sampleMusic();
	float time = iGlobalTime*.4;
	vec2 coord = gl_FragCoord.xy / iResolution.xy *2. - vec2(1.);
	coord.y *= iResolution.y / iResolution.x;
	float dist=29.+sin(time*2.)*5.;
	vec3 target = vec3(-f,0);
	vec3 from = target+dist*normalize(vec3(sin(time),cos(time),.5+sin(time)));
	vec3 up=vec3(1,sin(time)*.5,1);
    vec3 edir = normalize(target - from);
    vec3 udir = normalize(up-dot(edir,up)*edir);
    vec3 rdir = normalize(cross(edir,udir));
	float fov=0.6+sca*.04;
	vec3 dir=normalize((coord.x*rdir+coord.y*udir)*fov+edir);
	vec3 p=from;
	float steps;
	float totdist;
	float intens=1.;
	float maxdist=dist+15.;
	vec3 col=vec3(0.);
	for (int r=0; r<110; r++) {
		float d1=surfkifs(p,sca);
		float d2=nucleo(p+vec3(f,0),max(5.,sca*3.));
		float d=min(d1,d2);
		#ifdef DOF_EFFECT
			totdist+=max(max(0.5-time*0.5,0.02*pow(totdist*.06,3.)),abs(d));
		#else
			totdist+=max(max(0.5-time*0.5,0.03),abs(d));
		#endif
		if (totdist>maxdist) break;
		p=from+totdist*dir;
		steps++;
		intens=max(0.,maxdist-totdist+3.)/maxdist;
		col+=(d==d1?vec3(.3,1,.2)*pow(intens,2.5):vec3(.7,1,.1)*(.05+sca*.2)*intens);
	}
	col=col*0.035+vec3(.5)*(max(0.,length(coord)-.6));
	gl_FragColor = vec4(col,1.0);	
	
}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderIO">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


// I/O fragment shader by movAX13h, August 2013

#define SHOW_BLOCKS

float rand(float x)
{
    return fract(sin(x) * 4358.5453123);
}

float rand(vec2 co)
{
    return fract(sin(dot(co.xy ,vec2(12.9898,78.233))) * 43758.5357);
}

float box(vec2 p, vec2 b, float r)
{
  return length(max(abs(p)-b,0.0))-r;
}

float sampleMusic()
{
	return 0.5 * (
		//texture2D( iChannel0, vec2( 0.01, 0.25 ) ).x + 
		//texture2D( iChannel0, vec2( 0.07, 0.25 ) ).x + 
		texture2D( iChannel0, vec2( 0.15, 0.25 ) ).x + 
		texture2D( iChannel0, vec2( 0.30, 0.25 ) ).x);
}

void main(void)
{
	const float speed = 0.7;
	const float ySpread = 1.6;
	const int numBlocks = 70;

	float pulse = sampleMusic();
	
	vec2 uv = gl_FragCoord.xy / iResolution.xy - 0.5;
	float aspect = iResolution.x / iResolution.y;
	vec3 baseColor = uv.x > 0.0 ? vec3(0.0,0.3, 0.6) : vec3(0.6, 0.0, 0.3);
	
	vec3 color = pulse*baseColor*0.5*(0.9-cos(uv.x*8.0));
	uv.x *= aspect;
	
	for (int i = 0; i < numBlocks; i++)
	{
		float z = 1.0-0.7*rand(float(i)*1.4333); // 0=far, 1=near
		float tickTime = iGlobalTime*z*speed + float(i)*1.23753;
		float tick = floor(tickTime);
		
		vec2 pos = vec2(0.6*aspect*(rand(tick)-0.5), sign(uv.x)*ySpread*(0.5-fract(tickTime)));
		pos.x += 0.24*sign(pos.x); // move aside
		if (abs(pos.x) < 0.1) pos.x++; // stupid fix; sign sometimes returns 0
		
		vec2 size = 1.8*z*vec2(0.04, 0.04 + 0.1*rand(tick+0.2));
		float b = box(uv-pos, size, 0.01);
		float dust = z*smoothstep(0.22, 0.0, b)*pulse*0.5;
		#ifdef SHOW_BLOCKS
		float block = 0.2*z*smoothstep(0.002, 0.0, b);
		float shine = 0.6*z*pulse*smoothstep(-0.002, b, 0.007);
		color += dust*baseColor + block*z + shine;
		#else
		color += dust*baseColor;
		#endif
	}
	
	color -= rand(uv)*0.04;
	gl_FragColor = vec4(color, 1.0);
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderAngelic">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;		//tex11
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// by srtuss, 2013
// did some research on kali's "comsos" and came up with this.
// as always, not optimized, just pretty :)
//
// name & inspiration was taken from here:
// http://www.youtube.com/watch?v=BzQmeeXcDwQ

vec2 rotate(vec2 p, float a)
{
	return vec2(p.x * cos(a) - p.y * sin(a), p.x * sin(a) + p.y * cos(a));
}

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	uv = uv * 2.0 - 1.0;
	uv.x *= iResolution.x / iResolution.y;
	
	float v = 0.0;
	
	vec3 ray = vec3(sin(iGlobalTime * 0.1) * 0.2, cos(iGlobalTime * 0.13) * 0.2, 1.5);
	vec3 dir = normalize(vec3(uv, 1.0));
	
	ray.z += iGlobalTime * 0.1 - 20.0;
	dir.xz = rotate(dir.xz, sin(iGlobalTime * 0.1) * 2.0);
	dir.xy = rotate(dir.xy, iGlobalTime * 0.2);
	
	// very little steps for the sake of a good framerate
	#define STEPS 60
	
	float inc = 0.35 / float(STEPS);
	
	vec3 acc = vec3(0.0);

	for(int i = 0; i < STEPS; i ++)
	{
		vec3 p = ray * 0.1;
		
		// do you like cubes?
		//p = floor(ray * 20.0) / 20.0;
		
		// fractal from "cosmos"
		for(int i = 0; i < 14; i ++)
		{
			p = abs(p) / dot(p, p) * 2.0 - 1.0;
		}
		float it = 0.001 * length(p * p);
		v += it;
		
		// cheap coloring
		acc += sqrt(it) * texture2D(iChannel0, ray.xy * 0.1 + ray.z * 0.1).xyz;
		
		ray += dir * inc;
	}
	
	// old blueish colorset
	/*vec3 ex = 4.0 * vec3(0.9, 0.3, 0.1);
	gl_FragColor = vec4(pow(vec3(v), ex), 1.0);*/
	
	float br = pow(v * 4.0, 3.0) * 0.1;
	vec3 col = pow(acc * 0.5, vec3(1.2)) + br;
	gl_FragColor = vec4(col, 1.0);
}






</script>


<script type="x-shader/x-fragment" id="fragmentShaderSparks">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


/// The amount of 'sparks' to use (spark count between about 73-206 is known to crash Win7/Chrome)
#define SPARKS 40    // Low-end
//#define SPARKS 100   // Low-mid
//#define SPARKS 210   // Mid-high (recommended)
//#define SPARKS 500   // High
//#define SPARKS 1000  // Really High
//#define SPARKS 2000  // Insane

/// Switch between defines to choose different sets of settings
#define ORIGINAL_SPARKS
//#define WATER_SPOUT
//#define FIRE_STREAM
//#define STAR_BOMB
//#define WATER_LINE

#define BRIGHTNESS 1.0   /// 0.0 == auto-brightness

#ifdef ORIGINAL_SPARKS
	#define SPEED_FACTOR 1.5
	#define LENGTH_FACTOR 0.6
	#define GROUP_FACTOR 1.0
	#define SPREAD_FACTOR 0.3
	#define MIN_ANGLE 0.1
	#define RAND_FACTOR 1.0
#endif

#ifdef WATER_SPOUT
	#define SPEED_FACTOR 1.5
	#define LENGTH_FACTOR 1.5
	#define GROUP_FACTOR 0.5
	#define SPREAD_FACTOR 0.1
	#define MIN_ANGLE 0.1
	#define RAND_FACTOR 1.0
	#define BLUE
#endif

#ifdef FIRE_STREAM
	#define SPEED_FACTOR 1.5
	#define LENGTH_FACTOR 1.5
	#define GROUP_FACTOR 1.0
	#define SPREAD_FACTOR 0.1
	#define MIN_ANGLE 0.1
	#define RAND_FACTOR 0.0
#endif

#ifdef STAR_BOMB
	#define SPEED_FACTOR 0.5
	#define LENGTH_FACTOR 0.2
	#define GROUP_FACTOR 1.0
	#define SPREAD_FACTOR 0.2
	#define MIN_ANGLE 0.3
	#define RAND_FACTOR 0.0
	#define DOT_SPREAD
#endif

#ifdef WATER_LINE
	#define SPEED_FACTOR 1.5
	#define LENGTH_FACTOR 1.5
	#define GROUP_FACTOR 0.7
	#define SPREAD_FACTOR 0.1
	#define MIN_ANGLE 0.1
	#define RAND_FACTOR 1.0
	#define LINEAR_SPREAD
	#define BLUE
#endif

const float brightness = (float(BRIGHTNESS) == 0.0) ? 200.0 / (float(SPARKS) + 40.0) : float(BRIGHTNESS);

vec3 sampleAngle(float u1) {
	float r = sqrt(u1);
	return vec3(-r * -0.809017, -sqrt(1.0 - u1), r * 0.587785);
}

float rand(vec2 co) {
    return fract(sin(dot(co.xy, vec2(12.9898,78.233))) * 43758.5453);
}

float spread(vec2 co) {
#ifdef LINEAR_SPREAD
	return fract(co.x * 0.618033988749895);
#else
	#ifdef DOT_SPREAD
		return fract(co.x * 1.0);
	#else
    	return fract(sin(dot(co.xy, vec2(12.9898,78.233))) * 43758.5453);
	#endif
#endif
}

float planeIntersection(vec3 rpos, vec3 rdir, vec3 n) {
	return -dot(n, rpos) / dot(rdir, n);
}

float cylinder(vec3 pos, vec3 dir, float len) {
	float x = dot(pos, dir);
	return max(max(length(pos - dir * x) - 0.2, x), -x-len);
}

vec4 color(float age) {
	float f = 1.0 - age * 0.05;
	#ifdef BLUE
	return vec4(0.2*f*f, 0.5*f*f+0.05, 0.5*f+0.4, min(f*2.0, 1.0));
	#else
	return vec4(0.5*f+0.4, 0.5*f*f+0.05, 0.2*f*f, min(f*2.0, 1.0));
	#endif
}

vec3 trace(vec3 rpos, vec3 rdir) {
	float sparkT = planeIntersection(rpos, rdir, vec3(0.587785, 0.0, -0.809017));
	float floorT = -rpos.y / rdir.y;
	
	vec4 col = vec4(0.0, 0.0, 0.0, rdir.y < 0.0 ? 1.0 : 0.0);
	vec3 sparkCol = vec3(0.0, 0.0, 0.0);
	
	vec3 floorPos = rpos + rdir * floorT;
	vec3 sparkPos = rpos + rdir * sparkT;
	
	float time = iGlobalTime * SPEED_FACTOR;
	for (int i = 0; i < SPARKS; i++)
	{
		// Calculate spark position and velocity
		float a = spread(vec2(i, 1.0))*SPREAD_FACTOR+MIN_ANGLE;
		float b = spread(vec2(i, 3.0))*RAND_FACTOR;
		float startTime = spread(vec2(i, 5.0)) * GROUP_FACTOR;
		vec3 dir = sampleAngle(a) * 10.0;
		
		vec3 start = dir * (1.35 + b * 0.3);
		vec3 force = -start * 0.02 + vec3(0.0, 1.2, 0.0);
		float c = fract(time + startTime) * 20.0;
		vec3 offset = start * c + force * c * c * 0.5;
		
		vec3 v = start + force * c;
		float vel = length(v) * LENGTH_FACTOR;
		vec3 vdir = normalize(-v);
		vec4 sc = color(c);
				
		// Shade floor
		if (rdir.y < 0.0) {
			vec3 spos = floorPos + offset;
			float h = cylinder(spos, vdir, vel);
						
			float invRad = 10.0;
			float dist = h * 0.05;
			float atten = 1.0 / (1.0 + 2.0 * invRad * dist + invRad * invRad * dist * dist);
			if (floorT <= sparkT && sparkT > 0.0) {
				dist += 0.8;
				atten += 1.0 / (1.0 + 100.0*dist*dist*dist);
			}
			col += vec4(sc.xyz * sc.w * atten, 0.0) * brightness;
		}
	
		// Shade sparks
		if (floorT > sparkT && sparkT > 0.0 || floorT < 0.0) {
			vec3 spos = sparkPos + offset;			
			float h = cylinder(spos, vdir, vel);
				
			if (h < 0.0) {
				sparkCol += vec3(sc.xyz * sc.w);
			} else {
				float dist = h * 0.05 + 0.8;
				float atten = 1.0 / (1.0 + 100.0 * dist * dist * dist);
				sparkCol += sc.xyz * sc.w * (atten + clamp(1.0 - h * sparkT * 0.05, 0.0, 1.0));
			}
		}
	}
	
	// Shade sky
	float fade = sqrt(length((gl_FragCoord.xy / iResolution.xy) - vec2(0.7, 0.5)));
	vec3 sky = vec3(0.01, 0.01, 0.05) * (1.0 - fade);
	vec3 final = mix(sky, col.xyz, col.w) + sparkCol * brightness;
	return final + vec3(rand(vec2(gl_FragCoord.x * gl_FragCoord.y, iGlobalTime))) * 0.002;
}

// Ray-generation
vec3 camera(vec2 px) {
	vec2 rd = (px / iResolution.yy - vec2(iResolution.x/iResolution.y*0.5-0.5, 0.0)) * 2.0 - 1.0;
	vec3 rdir = normalize(vec3(rd.x*0.5, rd.y*0.5, 1.0));
	return trace(vec3(-40.0, 20.0, -150), rdir);
}

void main(void) {
	gl_FragColor = vec4(pow(camera(gl_FragCoord.xy), vec3(0.4545)), 1.0);
}

</script>


<script type="x-shader/x-fragment" id="fragmentShaderParticlePlanet">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;		 // tex16
uniform sampler2D iChannel1;		 // tex06
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

// rendering params
const float sphsize=.7; // planet size
const float dist=.27; // distance for glow and distortion
const float perturb=.3; // distortion amount of the flow around the planet
const float displacement=.015; // hot air effect
const float windspeed=.4; // speed of wind flow
const float steps=110.; // number of steps for the volumetric rendering
const float stepsize=.025; 
const float brightness=.43;
const vec3 planetcolor=vec3(0.55,0.4,0.3);
const float fade=.005; //fade by distance
const float glow=3.5; // glow amount, mainly on hit side


// fractal params
const int iterations=13; 
const float fractparam=.7;
const vec3 offset=vec3(1.5,2.,-1.5);


float wind(vec3 p) {
	float d=max(0.,dist-max(0.,length(p)-sphsize)/sphsize)/dist; // for distortion and glow area
	float x=max(0.2,p.x*2.); // to increase glow on left side
	p.y*=1.+max(0.,-p.x-sphsize*.25)*1.5; // left side distortion (cheesy)
	p-=d*normalize(p)*perturb; // spheric distortion of flow
	p+=vec3(iGlobalTime*windspeed,0.,0.); // flow movement
	p=abs(fract((p+offset)*.1)-.5); // tile folding 
	for (int i=0; i<iterations; i++) {  
		p=abs(p)/dot(p,p)-fractparam; // the magic formula for the hot flow
	}
	return length(p)*(1.+d*glow*x)+d*glow*x; // return the result with glow applied
}

void main(void)
{
	// get ray dir	
	vec2 uv = gl_FragCoord.xy / iResolution.xy-.5;
	vec3 dir=vec3(uv,1.);
	dir.x*=iResolution.x/iResolution.y;
	vec3 from=vec3(0.,0.,-2.+texture2D(iChannel0,uv*.5+iGlobalTime).x*stepsize); //from+dither

	// volumetric rendering
	float v=0., l=-0.0001, t=iGlobalTime*windspeed*.2;
	for (float r=10.;r<steps;r++) {
		vec3 p=from+r*dir*stepsize;
		float tx=texture2D(iChannel0,uv*.2+vec2(t,0.)).x*displacement; // hot air effect
		if (length(p)-sphsize-tx>0.)
		// outside planet, accumulate values as ray goes, applying distance fading
			v+=min(50.,wind(p))*max(0.,1.-r*fade); 
		else if (l<0.) 
		//inside planet, get planet shading if not already 
		//loop continues because of previous problems with breaks and not always optimizes much
			l=pow(max(.53,dot(normalize(p),normalize(vec3(-1.,.5,-0.3)))),4.)
			*(.5+texture2D(iChannel1,uv*vec2(2.,1.)*(1.+p.z*.5)+vec2(tx+t*.5,0.)).x*2.);
		}
	v/=steps; v*=brightness; // average values and apply bright factor
	vec3 col=vec3(v*1.25,v*v,v*v*v)+l*planetcolor; // set color
	col*=1.-length(pow(abs(uv),vec2(5.)))*14.; // vignette (kind of)
	gl_FragColor = vec4(col,1.0);
}





</script>

<script type="x-shader/x-fragment" id="fragmentShaderOceanic">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)

// Clouds: slice based volumetric height-clouds with god-rays, density, sun-radiance/shadow
// and 
// Water: simple reflecting sky/sun and cloud shaded height-modulated waves
//
// Created by Frank Hugenroth 03/2013
//
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.
//
// noise and raymarching based on concepts and code from shaders by inigo quilez
//

// some variables to change :)

//#define RENDER_GODRAYS    1    // set this to 1 to enable god-rays
#define RENDER_GODRAYS    0    // disable god-rays

#define RENDER_CLOUDS  1
#define RENDER_WATER   1

float waterlevel = 70.0;        // height of the water
float wavegain   = 1.0;       // change to adjust the general water wave level
float large_waveheight = 1.0; // change to adjust the "heavy" waves (set to 0.0 to have a very still ocean :)
float small_waveheight = 1.0; // change to adjust the small waves

vec3 fogcolor    = vec3( 0.5, 0.7, 1.1 );              
vec3 skybottom   = vec3( 0.6, 0.8, 1.2 );
vec3 skytop      = vec3(0.05, 0.2, 0.5);
vec3 reflskycolor= vec3(0.025, 0.10, 0.20);
vec3 watercolor  = vec3(0.2, 0.25, 0.3);

vec3 light       = normalize( vec3(  0.1, 0.25,  0.9 ) );









// random/hash function              
float hash( float n )
{
  return fract(cos(n)*41415.92653);
}

// 2d noise function
float noise( in vec2 x )
{
  vec2 p  = floor(x);
  vec2 f  = smoothstep(0.0, 1.0, fract(x));
  float n = p.x + p.y*57.0;

  return mix(mix( hash(n+  0.0), hash(n+  1.0),f.x),
    mix( hash(n+ 57.0), hash(n+ 58.0),f.x),f.y);
}

// 3d noise function
float noise( in vec3 x )
{
  vec3 p  = floor(x);
  vec3 f  = smoothstep(0.0, 1.0, fract(x));
  float n = p.x + p.y*57.0 + 113.0*p.z;

  return mix(mix(mix( hash(n+  0.0), hash(n+  1.0),f.x),
    mix( hash(n+ 57.0), hash(n+ 58.0),f.x),f.y),
    mix(mix( hash(n+113.0), hash(n+114.0),f.x),
    mix( hash(n+170.0), hash(n+171.0),f.x),f.y),f.z);
}


mat3 m = mat3( 0.00,  1.60,  1.20, -1.60,  0.72, -0.96, -1.20, -0.96,  1.28 );

// Fractional Brownian motion
float fbm( vec3 p )
{
  float f = 0.5000*noise( p ); p = m*p*1.1;
  f += 0.2500*noise( p ); p = m*p*1.2;
  f += 0.1666*noise( p ); p = m*p;
  f += 0.0834*noise( p );
  return f;
}

mat2 m2 = mat2(1.6,-1.2,1.2,1.6);

// Fractional Brownian motion
float fbm( vec2 p )
{
  float f = 0.5000*noise( p ); p = m2*p;
  f += 0.2500*noise( p ); p = m2*p;
  f += 0.1666*noise( p ); p = m2*p;
  f += 0.0834*noise( p );
  return f;
}


// this calculates the water as a height of a given position
float water( vec2 p )
{
  float height = waterlevel;

  vec2 shift1 = 0.001*vec2( iGlobalTime*160.0*2.0, iGlobalTime*120.0*2.0 );
  vec2 shift2 = 0.001*vec2( iGlobalTime*190.0*2.0, -iGlobalTime*130.0*2.0 );

  // coarse crossing 'ocean' waves...
  float wave = 0.0;
  wave += sin(p.x*0.021  + shift2.x)*4.5;
  wave += sin(p.x*0.0172+p.y*0.010 + shift2.x*1.121)*4.0;
  wave -= sin(p.x*0.00104+p.y*0.005 + shift2.x*0.121)*4.0;
  // ...added by some smaller faster waves...
  wave += sin(p.x*0.02221+p.y*0.01233+shift2.x*3.437)*5.0;
  wave += sin(p.x*0.03112+p.y*0.01122+shift2.x*4.269)*2.5 ;
  wave *= large_waveheight;
  // ...added by some distored random waves (which makes the water looks like water :)
  wave += fbm(p*0.01+shift1)*small_waveheight*8.0;
  wave += fbm(p*0.022+shift2)*small_waveheight*6.0;
  
  height += wave;
  return height;
}


// cloud intersection raycasting
float trace_fog(in vec3 rStart, in vec3 rDirection )
{
#if RENDER_CLOUDS
  // makes the clouds moving...
  vec2 shift = vec2( iGlobalTime*80.0, iGlobalTime*60.0 );
  float sum = 0.0;
  // use only 12 cloud-layers ;)
  // this improves performance but results in "god-rays shining through clouds" effect (sometimes)...
  for (int q=1000; q<1012; q++)
  {
    float c = (float(q-1000)*50.0+350.0-rStart.y) / rDirection.y;// cloud distance
    vec3 cpos = rStart + c*rDirection + vec3(831.0, 321.0+float(q-1000)*.75-shift.x*0.2, 1330.0+shift.y*3.0); // cloud position
    float alpha = smoothstep(0.5, 1.0, fbm( cpos*0.0015 )); // cloud density
    if (alpha > 0.8)
		break;
	sum += (1.0-sum)*alpha; // alpha saturation
  }
  
  return clamp( 1.0-sum, 0.0, 1.0 );
#else
  return 1.0;
#endif
}

// fog and water intersection function.
// 1st: collects fog intensity while traveling
// 2nd: check if hits the water surface and returns the distance
bool trace(in vec3 rStart, in vec3 rDirection, in float sundot, out float fog, out float dist)
{
  float h = 20.0;
  float t = 0.0;
  float st = 1.0;
  float alpha = 0.1;
  float asum = 0.0;
  vec3 p = rStart;
	
  for( int j=1000; j<1120; j++ )
  {
    // some speed-up if all is far away...
    if( t>500.0 ) 
      st = 2.0;
    else if( t>800.0 ) 
      st = 5.0;
    else if( t>1000.0 ) 
      st = 12.0;

    p = rStart + t*rDirection; // calc current ray position

#if RENDER_GODRAYS
    if (p.y > 50.0 && sundot > 0.001 && t>300.0 && t < 2400.0)
    {
      alpha = sundot * clamp((p.y-waterlevel)/waterlevel, 0.0, 1.0) * 20.0 * st * 0.0012*smoothstep(0.90, 1.0, trace_fog(p,light));
      asum  += (1.0-asum)*alpha;
      if (asum > 0.9)
        break;
    }
#endif

    h = p.y - water(p.xz);

    if( h<0.1 ) // hit the water?
    {
      dist = t; 
      fog = asum;
      return true;
    }

    if( p.y>450.0 ) // lost in space? quit...
      break;
    
    // speed up ray if possible...    
    if(rDirection.y > 0.0) // look up (sky!) -> make large steps
      t += 30.0 * st;
    else if (p.y < waterlevel+20.0)
      t += max(1.0,2.0*h)*st;
    else
      t += max(1.0,1.0*h)*st;
  }

  dist = t; 
  fog = asum;
  if (h<10.0)
   return true;
  return false;
}


vec3 camera( float time )
{
  return vec3( 500.0 * sin(1.5+1.57*time), 0.0, 1200.0*time );
}


void main(void)
{
  vec2 xy = -1.0 + 2.0*gl_FragCoord.xy / iResolution.xy;
  vec2 s = xy*vec2(1.75,1.0);

  // get camera position and view direction
  float time = (iGlobalTime+13.5)*.05;
  vec3 campos = camera( time );
  vec3 camtar = camera( time + 0.4 );
  campos.y = max(waterlevel+30.0, waterlevel+90.0 + 60.0*sin(time*2.0));
  camtar.y = campos.y*0.9;

  float roll = 0.14*sin(time*1.2);
  vec3 cw = normalize(camtar-campos);
  vec3 cp = vec3(sin(roll), cos(roll),0.0);
  vec3 cu = normalize(cross(cw,cp));
  vec3 cv = normalize(cross(cu,cw));
  vec3 rd = normalize( s.x*cu + s.y*cv + 1.6*cw );

  float sundot = clamp(dot(rd,light),0.0,1.0);

  vec3 col;
  float fog=0.0, dist=0.0;

  if (!trace(campos,rd,sundot, fog, dist))
  {
    // render sky
    float t = pow(1.0-0.7*rd.y, 15.0);
    col = 0.8*(skybottom*t + skytop*(1.0-t));
    // sun
    col += 0.47*vec3(1.6,1.4,1.0)*pow( sundot, 350.0 );
    // sun haze
    col += 0.4*vec3(0.8,0.9,1.0)*pow( sundot, 2.0 );

#if RENDER_CLOUDS
    // CLOUDS
    vec2 shift = vec2( iGlobalTime*80.0, iGlobalTime*60.0 );
    vec4 sum = vec4(0,0,0,0); 
    for (int q=1000; q<1120; q++) // 120 layers
    {
      float c = (float(q-1000)*10.0+350.0-campos.y) / rd.y; // cloud height
      vec3 cpos = campos + c*rd + vec3(831.0, 321.0+float(q-1000)*.15-shift.x*0.2, 1330.0+shift.y*3.0); // cloud position
      float alpha = smoothstep(0.5, 1.0, fbm( cpos*0.0015 ))*.9; // fractal cloud density
      vec3 localcolor = mix(vec3( 1.1, 1.05, 1.0 ), 0.7*vec3( 0.4,0.4,0.3 ), alpha); // density color white->gray
      alpha = (1.0-sum.w)*alpha; // alpha/density saturation (the more a cloud layer's density, the more the higher layers will be hidden)
      sum += vec4(localcolor*alpha, alpha); // sum up weightened color
      
      if (sum.w>0.98)
        break;
    }
    float alpha = smoothstep(0.7, 1.0, sum.w);
    sum.rgb /= sum.w+0.0001;

    // This is an important stuff to darken dense-cloud parts when in front (or near)
    // of the sun (simulates cloud-self shadow)
    sum.rgb -= 0.6*vec3(0.8, 0.75, 0.7)*pow(sundot,13.0)*alpha;
    // This brightens up the low-density parts (edges) of the clouds (simulates light scattering in fog)
    sum.rgb += 0.2*vec3(1.3, 1.2, 1.0)* pow(sundot,5.0)*(1.0-alpha);

    col = mix( col, sum.rgb , sum.w*(1.0-t) );
#endif

    // add god-rays
    col += vec3(0.5, 0.4, 0.3)*fog;
  }
  else
  {
#if RENDER_WATER        
    //  render water
    
    vec3 wpos = campos + dist*rd; // calculate position where ray meets water

    // calculate water-mirror
    vec2 xdiff = vec2(1.0, 0.0)*wavegain;
    vec2 ydiff = vec2(0.0, 1.0)*wavegain;
    // get the reflected ray direction
    rd = reflect(rd, vec3(water(wpos.xz-xdiff) - water(wpos.xz+xdiff), 1.0, water(wpos.xz-ydiff) - water(wpos.xz+ydiff)));
    float sh = smoothstep(0.2, 1.0, trace_fog(wpos+20.0*rd,rd))*.7+.3;
    // water reflects more the lower the reflecting angle is...
    float refl = 1.0-clamp(dot(rd,vec3(0.0, 1.0, 0.0)),0.0,1.0);
    float wsky   = refl*sh;     // reflecting (sky-color) amount
    float wwater = (1.0-refl)*sh; // water-color amount

    float sundot = clamp(dot(rd,light),0.0,1.0);

    // watercolor

    col = wsky*reflskycolor; // reflecting sky-color 
    col += wwater*watercolor;

    // Sun
    float wsunrefl = wsky*(0.25*pow( sundot, 10.0 )+0.25*pow( sundot, 1.5)+0.25*pow( sundot, 200.0));
    col += vec3(1.5,1.3,1.0)*wsunrefl; // sun reflection

#endif

    // global depth-fog
    float fo = 1.0-exp(-pow(0.0003*dist, 1.5));
    vec3 fco = fogcolor + 0.6*vec3(0.6,0.5,0.4)*pow( sundot, 4.0 );
    col = mix( col, fco, fo );

    // add god-rays
    col += vec3(0.5, 0.4, 0.3)*fog; 
  }

  gl_FragColor=vec4(col,1.0);
}





</script>

<script type="x-shader/x-fragment" id="fragmentShaderFire">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)


// by @301z

float rand(vec2 n) { 
	return fract(sin(dot(n, vec2(12.9898, 4.1414))) * 43758.5453);
}

float noise(vec2 n) {
	const vec2 d = vec2(0.0, 1.0);
	vec2 b = floor(n), f = smoothstep(vec2(0.0), vec2(1.0), fract(n));
	return mix(mix(rand(b), rand(b + d.yx), f.x), mix(rand(b + d.xy), rand(b + d.yy), f.x), f.y);
}

float fbm(vec2 n) {
	float total = 0.0, amplitude = 1.0;
	for (int i = 0; i < 7; i++) {
		total += noise(n) * amplitude;
		n += n;
		amplitude *= 0.5;
	}
	return total;
}

void main() {
	const vec3 c1 = vec3(0.1, 0.0, 0.0);
	const vec3 c2 = vec3(0.7, 0.0, 0.0);
	const vec3 c3 = vec3(0.2, 0.0, 0.0);
	const vec3 c4 = vec3(1.0, 0.9, 0.0);
	const vec3 c5 = vec3(0.1);
	const vec3 c6 = vec3(0.9);
	vec2 p = gl_FragCoord.xy * 8.0 / iResolution.xx;
	float q = fbm(p - iGlobalTime * 0.1);
	vec2 r = vec2(fbm(p + q + iGlobalTime * 0.7 - p.x - p.y), fbm(p + q - iGlobalTime * 0.4));
	vec3 c = mix(c1, c2, fbm(p + r)) + mix(c3, c4, r.x) - mix(c5, c6, r.y);
	gl_FragColor = vec4(c * cos(1.57 * gl_FragCoord.y / iResolution.y), 1.0);
}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderRelentless">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)

// srtuss, 2013

// collecting some design ideas for a new game project.
// no raymarching is used.

// if i could add a custom soundtrack, it'd use this one (essential for desired sensation)
// http://www.youtube.com/watch?v=1uFAu65tZpo


//#define GREEN_VERSION

// ** improved camera shaking
// ** cleaned up code
// ** added stuff to the gates



float time = iGlobalTime;

vec2 rotate(vec2 p, float a)
{
	return vec2(p.x * cos(a) - p.y * sin(a), p.x * sin(a) + p.y * cos(a));
}
float box(vec2 p, vec2 b, float r)
{
	return length(max(abs(p) - b, 0.0)) - r;
}

// iq's ray-plane-intersection code
vec3 intersect(in vec3 o, in vec3 d, vec3 c, vec3 u, vec3 v)
{
	vec3 q = o - c;
	return vec3(
		dot(cross(u, v), q),
		dot(cross(q, u), d),
		dot(cross(v, q), d)) / dot(cross(v, u), d);
}

// some noise functions for fast developing
float rand11(float p)
{
    return fract(sin(p * 591.32) * 43758.5357);
}
float rand12(vec2 p)
{
    return fract(sin(dot(p.xy, vec2(12.9898, 78.233))) * 43758.5357);
}
vec2 rand21(float p)
{
	return fract(vec2(sin(p * 591.32), cos(p * 391.32)));
}
vec2 rand22(in vec2 p)
{
	return fract(vec2(sin(p.x * 591.32 + p.y * 154.077), cos(p.x * 391.32 + p.y * 49.077)));
}

float noise11(float p)
{
	float fl = floor(p);
	return mix(rand11(fl), rand11(fl + 1.0), fract(p));//smoothstep(0.0, 1.0, fract(p)));
}
float fbm11(float p)
{
	return noise11(p) * 0.5 + noise11(p * 2.0) * 0.25 + noise11(p * 5.0) * 0.125;
}
vec3 noise31(float p)
{
	return vec3(noise11(p), noise11(p + 18.952), noise11(p - 11.372)) * 2.0 - 1.0;
}

// something that looks a bit like godrays coming from the surface
float sky(vec3 p)
{
	float a = atan(p.x, p.z);
	float t = time * 0.1;
	float v = rand11(floor(a * 4.0 + t)) * 0.5 + rand11(floor(a * 8.0 - t)) * 0.25 + rand11(floor(a * 16.0 + t)) * 0.125;
	return v;
}

vec3 voronoi(in vec2 x)
{
	vec2 n = floor(x); // grid cell id
	vec2 f = fract(x); // grid internal position
	vec2 mg; // shortest distance...
	vec2 mr; // ..and second shortest distance
	float md = 8.0, md2 = 8.0;
	for(int j = -1; j <= 1; j ++)
	{
		for(int i = -1; i <= 1; i ++)
		{
			vec2 g = vec2(float(i), float(j)); // cell id
			vec2 o = rand22(n + g); // offset to edge point
			vec2 r = g + o - f;
			
			float d = max(abs(r.x), abs(r.y)); // distance to the edge
			
			if(d < md)
				{md2 = md; md = d; mr = r; mg = g;}
			else if(d < md2)
				{md2 = d;}
		}
	}
	return vec3(n + mg, md2 - md);
}

#define A2V(a) vec2(sin((a) * 6.28318531 / 100.0), cos((a) * 6.28318531 / 100.0))

float circles(vec2 p)
{
	float v, w, l, c;
	vec2 pp;
	l = length(p);
	
	
	pp = rotate(p, time * 3.0);
	c = max(dot(pp, normalize(vec2(-0.2, 0.5))), -dot(pp, normalize(vec2(0.2, 0.5))));
	c = min(c, max(dot(pp, normalize(vec2(0.5, -0.5))), -dot(pp, normalize(vec2(0.2, -0.5)))));
	c = min(c, max(dot(pp, normalize(vec2(0.3, 0.5))), -dot(pp, normalize(vec2(0.2, 0.5)))));
	
	// innerest stuff
	v = abs(l - 0.5) - 0.03;
	v = max(v, -c);
	v = min(v, abs(l - 0.54) - 0.02);
	v = min(v, abs(l - 0.64) - 0.05);
	
	pp = rotate(p, time * -1.333);
	c = max(dot(pp, A2V(-5.0)), -dot(pp, A2V(5.0)));
	c = min(c, max(dot(pp, A2V(25.0 - 5.0)), -dot(pp, A2V(25.0 + 5.0))));
	c = min(c, max(dot(pp, A2V(50.0 - 5.0)), -dot(pp, A2V(50.0 + 5.0))));
	c = min(c, max(dot(pp, A2V(75.0 - 5.0)), -dot(pp, A2V(75.0 + 5.0))));
	
	w = abs(l - 0.83) - 0.09;
	v = min(v, max(w, c));
	
	return v;
}

float shade1(float d)
{
	float v = 1.0 - smoothstep(0.0, mix(0.012, 0.2, 0.0), d);
	float g = exp(d * -20.0);
	return v + g * 0.5;
}

void main(void)
{
	vec2 uv = gl_FragCoord.xy / iResolution.xy;
	uv = uv * 2.0 - 1.0;
	uv.x *= iResolution.x / iResolution.y;
	
	
	// using an iq styled camera this time :)
	// ray origin
	vec3 ro = 0.7 * vec3(cos(0.2 * time), 0.0, sin(0.2 * time));
	ro.y = cos(0.6 * time) * 0.3 + 0.65;
	// camera look at
	vec3 ta = vec3(0.0, 0.2, 0.0);
	
	// camera shake intensity
	float shake = clamp(3.0 * (1.0 - length(ro.yz)), 0.3, 1.0);
	float st = mod(time, 10.0) * 143.0;
	
	// build camera matrix
	vec3 ww = normalize(ta - ro + noise31(st) * shake * 0.01);
	vec3 uu = normalize(cross(ww, normalize(vec3(0.0, 1.0, 0.2 * sin(time)))));
	vec3 vv = normalize(cross(uu, ww));
	// obtain ray direction
	vec3 rd = normalize(uv.x * uu + uv.y * vv + 1.0 * ww);
	
	// shaking and movement
	ro += noise31(-st) * shake * 0.015;
	ro.x += time * 2.0;
	
	float inten = 0.0;
	
	// background
	float sd = dot(rd, vec3(0.0, 1.0, 0.0));
	inten = pow(1.0 - abs(sd), 20.0) + pow(sky(rd), 5.0) * step(0.0, rd.y) * 0.2;
	
	vec3 its;
	float v, g;
	
	// voronoi floor layers
	for(int i = 0; i < 4; i ++)
	{
		float layer = float(i);
		its = intersect(ro, rd, vec3(0.0, -5.0 - layer * 5.0, 0.0), vec3(1.0, 0.0, 0.0), vec3(0.0, 0.0, 1.0));
		if(its.x > 0.0)
		{
			vec3 vo = voronoi((its.yz) * 0.05 + 8.0 * rand21(float(i)));
			v = exp(-100.0 * (vo.z - 0.02));
			
			float fx = 0.0;
			
			// add some special fx to lowest layer
			if(i == 3)
			{
				float crd = 0.0;//fract(time * 0.2) * 50.0 - 25.0;
				float fxi = cos(vo.x * 0.2 + time * 1.5);//abs(crd - vo.x);
				fx = clamp(smoothstep(0.9, 1.0, fxi), 0.0, 0.9) * 1.0 * rand12(vo.xy);
				fx *= exp(-3.0 * vo.z) * 2.0;
			}
			inten += v * 0.1 + fx;
		}
	}
	
	// draw the gates, 4 should be enough
	float gatex = floor(ro.x / 8.0 + 0.5) * 8.0 + 4.0;
	float go = -16.0;
	for(int i = 0; i < 4; i ++)
	{
		its = intersect(ro, rd, vec3(gatex + go, 0.0, 0.0), vec3(0.0, 1.0, 0.0), vec3(0.0, 0.0, 1.0));
		if(dot(its.yz, its.yz) < 2.0 && its.x > 0.0)
		{
			v = circles(its.yz);
			inten += shade1(v);
		}
		
		go += 8.0;
	}
	
	// draw the stream
	for(int j = 0; j < 20; j ++)
	{
		float id = float(j);
		
		vec3 bp = vec3(0.0, (rand11(id) * 2.0 - 1.0) * 0.25, 0.0);
		vec3 its = intersect(ro, rd, bp, vec3(1.0, 0.0, 0.0), vec3(0.0, 0.0, 1.0));
		
		if(its.x > 0.0)
		{
			vec2 pp = its.yz;
			float spd = (1.0 + rand11(id) * 3.0) * 2.5;
			pp.y += time * spd;
			pp += (rand21(id) * 2.0 - 1.0) * vec2(0.3, 1.0);
			float rep = rand11(id) + 1.5;
			pp.y = mod(pp.y, rep * 2.0) - rep;
			float d = box(pp, vec2(0.02, 0.3), 0.1);
			float foc = 0.0;
			float v = 1.0 - smoothstep(0.0, 0.03, abs(d) - 0.001);
			float g = min(exp(d * -20.0), 2.0);
			
			inten += (v + g * 0.7) * 0.5;
			
		}
	}
	
	inten *= 0.4 + (sin(time) * 0.5 + 0.5) * 0.6;
	
	// find a color for the computed intensity
#ifdef GREEN_VERSION
	vec3 col = pow(vec3(inten), vec3(2.0, 0.15, 9.0));
#else
	vec3 col = pow(vec3(inten), 1.5 * vec3(0.15, 2.0, 9.0));
#endif
	
	gl_FragColor = vec4(col, 1.0);
}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderGlassDistance">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)

//"Glass Field" by Kali

#define lightcol1 vec3(1.,.95,.85)
#define lightcol2 vec3(.85,.95,1.)




//Rotation matrix by Syntopia
mat3 rotmat(vec3 v, float angle)
{
	float c = cos(angle);
	float s = sin(angle);
	
	return mat3(c + (1.0 - c) * v.x * v.x, (1.0 - c) * v.x * v.y - s * v.z, (1.0 - c) * v.x * v.z + s * v.y,
		(1.0 - c) * v.x * v.y + s * v.z, c + (1.0 - c) * v.y * v.y, (1.0 - c) * v.y * v.z - s * v.x,
		(1.0 - c) * v.x * v.z - s * v.y, (1.0 - c) * v.y * v.z + s * v.x, c + (1.0 - c) * v.z * v.z
		);
}

//Smooth min by IQ
float smin( float a, float b )
{
    float k = 0.5;
	float h = clamp( 0.5 + 0.5*(b-a)/k, 0.0, 1.0 );
	return mix( b, a, h ) - k*h*(1.0-h);
}


//Distance Field
float de(vec3 pos) {
	vec3 A=vec3(5.);
	vec3 p = abs(A-mod(pos,2.0*A)); //tiling fold by Syntopia
	float sph=length(p)-2.5;
	float cyl=length(p.xy)-.4;
	cyl=min(cyl,length(p.xz))-.4;
	cyl=min(cyl,length(p.yz))-.4;
    return smin(cyl,sph);
}

// finite difference normal
vec3 normal(vec3 pos) {
	vec3 e = vec3(0.0,0.001,0.0);
	
	return normalize(vec3(
			de(pos+e.yxx)-de(pos-e.yxx),
			de(pos+e.xyx)-de(pos-e.xyx),
			de(pos+e.xxy)-de(pos-e.xxy)
			)
		);	
}


void main(void)
{
	float time = iGlobalTime*.6; 

	//camera
	mat3 rotview=rotmat(normalize(vec3(1.)),sin(time*.6));
	vec2 coord = gl_FragCoord.xy / iResolution.xy *2. - vec2(1.);
	coord.y *= iResolution.y / iResolution.x;
	float fov=min((time*.2+.05),0.8); //animate fov at start
	vec3 from = vec3(cos(time)*2.,sin(time*.5)*10.,time*5.);

	//raymarch
	float totdist=0.;
	float distfade=1.;
	float glassfade=1.;
	float intens=1.;
	float maxdist=80.;
	float vol=0.;
	vec3 spec=vec3(0.);
	vec3 dir=normalize(vec3(coord.xy*fov,1.))*rotview; 
	float ref=0.;
	vec3 light1=normalize(vec3(cos(time),sin(time*3.)*.5,sin(time)));
	vec3 light2=normalize(vec3(cos(time),sin(time*3.)*.5,-sin(time)));
	for (int r=0; r<80; r++) {
		vec3 p=from+totdist*dir;
		float d=de(p);
		float distfade=exp(-1.5*pow(totdist/maxdist,1.5));
		intens=min(distfade,glassfade);

		// refraction
		if (d>0.0 && ref>.5) {
			ref=0.;
			vec3 n=normal(p);
			if (dot(dir,n)<-.5) dir=normalize(refract(dir,n,1./.87));
			vec3 refl=reflect(dir,n);
			spec+=lightcol1*pow(max(dot(refl,light1),0.0),40.)*intens*.7;
			spec+=lightcol2*pow(max(dot(refl,light2),0.0),40.)*intens*.7;

		}
		if (d<0.0 && ref<.05) {
			ref=1.;
			vec3 n=normal(p);
			if (dot(dir,n)<-.05) dir=normalize(refract(dir,n,.87));
			vec3 refl=reflect(dir,n);
			glassfade*=.75;
			spec+=lightcol1*pow(max(dot(refl,light1),0.0),40.)*intens;
			spec+=lightcol2*pow(max(dot(refl,light2),0.0),40.)*intens;
		}
		
		totdist+=max(0.005,abs(d)); //advance ray 
		if (totdist>maxdist) break; 

		vol+=intens; //accumulate current intensity
	}
	
	vol=pow(vol,1.5)*.0005;
	vec3 col=vec3(vol)+vec3(spec)*.4+vec3(.05);

	//lights
	col+=1.5*lightcol1*pow(max(0.,max(0.,dot(dir,light1))),10.)*glassfade; 
	col+=1.5*lightcol2*pow(max(0.,max(0.,dot(dir,light2))),10.)*glassfade; 
	//col+=vec3(sin(time*10.)+1.,0.,0.)*.8*pow(max(0.,max(0.,dot(dir,vec3(0.,0.,1.)))),5.)*glassfade; 

	
	col*=min(1.,time); //fade in

	gl_FragColor = vec4(col,1.0);	
}


</script>


<script type="x-shader/x-fragment" id="fragmentShaderAudioWave">
uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;          	 // input channel. XX = 2D/Cube

// by nikos papadopoulos, 4rknova / 2013
// Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

#ifdef GL_ES
precision highp float;
#endif

#define PI  3.14159
#define EPS .001

#define T .03  // Thickness
#define W 2.   // Width
#define A .09  // Amplitude
#define V 1.   // Velocity

void main(void)
{
	vec2 c = gl_FragCoord.xy / iResolution.xy;
	vec4 s = texture2D(iChannel0, c * .5);
	c = vec2(0., A*s.y*sin((c.x*W+iGlobalTime*V)* 2.5)) + (c*2.-1.);
	float g = max(abs(s.y/(pow(c.y, 2.1*sin(s.x*PI))))*T,
				  abs(.1/(c.y+EPS)));
	gl_FragColor = vec4(g*g*s.y*.6, g*s.w*.44, g*g*.7, 1.);
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderChromaticFilter">
// This shader useds noise shaders by stegu -- http://webstaff.itn.liu.se/~stegu/
// This is supposed to look like snow falling, for example like http://24.media.tumblr.com/tumblr_mdhvqrK2EJ1rcru73o1_500.gif

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;

void main(void)
{
    vec2 UV = gl_FragCoord.xy / iResolution.xy;

	float amount = 0.0;
	
	amount = (1.0 + sin(iGlobalTime*6.0)) * 0.5;
	amount *= 1.0 + sin(iGlobalTime*16.0) * 0.5;
	amount *= 1.0 + sin(iGlobalTime*19.0) * 0.5;
	amount *= 1.0 + sin(iGlobalTime*27.0) * 0.5;
	amount = pow(amount, 3.0);

	amount *= 0.05;
	
    vec3 col;
    col.r = texture2D( iChannel0, vec2(UV.x+amount,UV.y) ).r;
    col.g = texture2D( iChannel0, UV ).g;
    col.b = texture2D( iChannel0, vec2(UV.x-amount,UV.y) ).b;

	col *= (1.0 - amount * 0.5);
	
    gl_FragColor = vec4(col,1.0);
}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderSnowy">
// This shader useds noise shaders by stegu -- http://webstaff.itn.liu.se/~stegu/
// This is supposed to look like snow falling, for example like http://24.media.tumblr.com/tumblr_mdhvqrK2EJ1rcru73o1_500.gif

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)

vec2 mod289(vec2 x) {
  return x - floor(x * (1.0 / 289.0)) * 289.0;
}

vec3 mod289(vec3 x) {
	return x - floor(x * (1.0 / 289.0)) * 289.0;
}

vec4 mod289(vec4 x) {
	return x - floor(x * (1.0 / 289.0)) * 289.0;
}

vec3 permute(vec3 x) {
  return mod289(((x*34.0)+1.0)*x);
}

vec4 permute(vec4 x) {
  return mod((34.0 * x + 1.0) * x, 289.0);
}

vec4 taylorInvSqrt(vec4 r)
{
	return 1.79284291400159 - 0.85373472095314 * r;
}

float snoise(vec2 v)
{
		const vec4 C = vec4(0.211324865405187,0.366025403784439,-0.577350269189626,0.024390243902439);
		vec2 i  = floor(v + dot(v, C.yy) );
		vec2 x0 = v -   i + dot(i, C.xx);
		
		vec2 i1;
		i1 = (x0.x > x0.y) ? vec2(1.0, 0.0) : vec2(0.0, 1.0);
		vec4 x12 = x0.xyxy + C.xxzz;
		x12.xy -= i1;
		
		i = mod289(i); // Avoid truncation effects in permutation
		vec3 p = permute( permute( i.y + vec3(0.0, i1.y, 1.0 ))
			+ i.x + vec3(0.0, i1.x, 1.0 ));
		
		vec3 m = max(0.5 - vec3(dot(x0,x0), dot(x12.xy,x12.xy), dot(x12.zw,x12.zw)), 0.0);
		m = m*m ;
		m = m*m ;
		
		vec3 x = 2.0 * fract(p * C.www) - 1.0;
		vec3 h = abs(x) - 0.5;
		vec3 ox = floor(x + 0.5);
		vec3 a0 = x - ox;
		
		m *= 1.79284291400159 - 0.85373472095314 * ( a0*a0 + h*h );
		
		vec3 g;
		g.x  = a0.x  * x0.x  + h.x  * x0.y;
		g.yz = a0.yz * x12.xz + h.yz * x12.yw;

		return 130.0 * dot(m, g);		
}

float cellular2x2(vec2 P)
{
		#define K 0.142857142857 // 1/7
		#define K2 0.0714285714285 // K/2
		#define jitter 0.8 // jitter 1.0 makes F1 wrong more often
		
		vec2 Pi = mod(floor(P), 289.0);
		vec2 Pf = fract(P);
		vec4 Pfx = Pf.x + vec4(-0.5, -1.5, -0.5, -1.5);
		vec4 Pfy = Pf.y + vec4(-0.5, -0.5, -1.5, -1.5);
		vec4 p = permute(Pi.x + vec4(0.0, 1.0, 0.0, 1.0));
		p = permute(p + Pi.y + vec4(0.0, 0.0, 1.0, 1.0));
		vec4 ox = mod(p, 7.0)*K+K2;
		vec4 oy = mod(floor(p*K),7.0)*K+K2;
		vec4 dx = Pfx + jitter*ox;
		vec4 dy = Pfy + jitter*oy;
		vec4 d = dx * dx + dy * dy; // d11, d12, d21 and d22, squared
		// Sort out the two smallest distances
		
		// Cheat and pick only F1
		d.xy = min(d.xy, d.zw);
		d.x = min(d.x, d.y);
		return d.x; // F1 duplicated, F2 not computed
}

float fbm(vec2 p) {
	float f = 0.0;
	float w = 0.5;
	for (int i = 0; i < 5; i ++) {
		f += w * snoise(p);
		p *= 2.;
		w *= 0.5;
	}
	return f;
}

void main(void)
{
		float speed=2.0;
		
		vec2 UV = gl_FragCoord.xy / iResolution.xy;
		
		UV.x*=(iResolution.x/iResolution.y);
		
		vec2 suncent=vec2(0.3,0.9);
		
		float suns=(1.0-distance(UV,suncent));
		suns=clamp(0.2+suns,0.0,1.0);
		float sunsh=smoothstep(0.85,0.95,suns);

		float slope;
		slope=0.8+UV.x-(UV.y*2.3);
		slope=1.0-smoothstep(0.55,0.0,slope);								
		
		float noise=abs(fbm(UV*1.5));
		slope=(noise*0.2)+(slope-((1.0-noise)*slope*0.1))*0.6;
		slope=clamp(slope,0.0,1.0);
								
		vec2 GA;
		GA.x-=iGlobalTime*1.8;
		GA.y+=iGlobalTime*0.9;
		GA*=speed;
	
		float F1=0.0,F2=0.0,F3=0.0,F4=0.0,F5=0.0,N1=0.0,N2=0.0,N3=0.0,N4=0.0,N5=0.0;
		float A=0.0,A1=0.0,A2=0.0,A3=0.0,A4=0.0,A5=0.0;


		// Attentuation
		A = (UV.x-(UV.y*0.3));
		A = clamp(A,0.0,1.0);

		// Snow layers, somewhat like an fbm with worley layers.
		F1 = 1.0-cellular2x2((UV+(GA*0.1))*8.0);	
		A1 = 1.0-(A*1.0);
		N1 = smoothstep(0.998,1.0,F1)*1.0*A1;	

		F2 = 1.0-cellular2x2((UV+(GA*0.2))*6.0);	
		A2 = 1.0-(A*0.8);
		N2 = smoothstep(0.995,1.0,F2)*0.85*A2;				

		F3 = 1.0-cellular2x2((UV+(GA*0.4))*4.0);	
		A3 = 1.0-(A*0.6);
		N3 = smoothstep(0.99,1.0,F3)*0.65*A3;				

		F4 = 1.0-cellular2x2((UV+(GA*0.6))*3.0);	
		A4 = 1.0-(A*1.0);
		N4 = smoothstep(0.98,1.0,F4)*0.4*A4;				

		F5 = 1.0-cellular2x2((UV+(GA))*1.2);	
		A5 = 1.0-(A*1.0);
		N5 = smoothstep(0.98,1.0,F5)*0.25*A5;				
						
		float Snowout=N5+N4+N3+N2+N1;
						
		Snowout = 0.35+(slope*(suns+0.3))+(sunsh*0.6)+N1+N2+N3+N4+N5;
		
		gl_FragColor = vec4(Snowout*0.9, Snowout, Snowout*1.1, 1.0);

}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderStarNest">

// Star Nest by Pablo Román Andrioli

// This content is under the MIT License.

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform vec4	  iMouse;

#define iterations 17
#define formuparam 0.530

#define volsteps 18
#define stepsize 0.100

#define zoom   0.800
#define tile   0.850
#define speed  0.010 

#define brightness 0.0015
#define darkmatter 0.300
#define distfading 0.760
#define saturation 0.800


void main(void)
{
	//get coords and direction
	vec2 UV=gl_FragCoord.xy/iResolution.xy-.5;
	UV.y*=iResolution.y/iResolution.x;
	vec3 dir=vec3(UV*zoom,1.);
	float time=iGlobalTime*speed+.25;

	//mouse rotation
	float a1=.5+iMouse.x/iResolution.x*2.;
	float a2=.8+iMouse.y/iResolution.y*2.;
	mat2 rot1=mat2(cos(a1),sin(a1),-sin(a1),cos(a1));
	mat2 rot2=mat2(cos(a2),sin(a2),-sin(a2),cos(a2));
	dir.xz*=rot1;
	dir.xy*=rot2;
	vec3 from=vec3(1.,.5,0.5);
	from+=vec3(time*2.,time,-2.);
	from.xz*=rot1;
	from.xy*=rot2;
	
	//volumetric rendering
	float s=0.1,fade=1.;
	vec3 v=vec3(0.);
	for (int r=0; r<volsteps; r++) {
		vec3 p=from+s*dir*.5;
		p = abs(vec3(tile)-mod(p,vec3(tile*2.))); // tiling fold
		float pa,a=pa=0.;
		for (int i=0; i<iterations; i++) { 
			p=abs(p)/dot(p,p)-formuparam; // the magic formula
			a+=abs(length(p)-pa); // absolute sum of average change
			pa=length(p);
		}
		float dm=max(0.,darkmatter-a*a*.001); //dark matter
		a*=a*a; // add contrast
		if (r>3) fade*=1.-dm; // dark matter, don't render near
		//v+=vec3(dm,dm*.5,0.);
		v+=fade;
		v+=vec3(s,s*s,s*s*s*s)*a*brightness*fade; // coloring based on distance
		fade*=distfading; // distance fading
		s+=stepsize;
	}
	v=mix(vec3(length(v)),v,saturation); //color adjust
	gl_FragColor = vec4(v*.01,1.);	
	
}



</script>


<script type="x-shader/x-fragment" id="fragmentShaderWarp">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;          	 // input channel. XX = 2D/Cube
const float tau = 6.28318530717958647692;

// Gamma correction
#define GAMMA (2.2)

vec3 ToLinear( in vec3 col )
{
	// simulate a monitor, converting colour values into light values
	return pow( col, vec3(GAMMA) );
}

vec3 ToGamma( in vec3 col )
{
	// convert back into colour values, so the correct light will come out of the monitor
	return pow( col, vec3(1.0/GAMMA) );
}

vec4 Noise( in ivec2 x )
{
	return texture2D( iChannel0, (vec2(x)+0.5)/256.0, -100.0 );
}

vec4 Rand( in int x )
{
	vec2 UV;
	UV.x = (float(x)+0.5)/256.0;
	UV.y = (floor(UV.x)+0.5)/256.0;
	return texture2D( iChannel0, UV, -100.0 );
}


void main(void)
{
	vec3 ray;
	ray.xy = 2.0*(gl_FragCoord.xy-iResolution.xy*.5)/iResolution.x;
	ray.z = 1.0;

	float offset = iGlobalTime*.5;	
	float speed2 = (cos(offset)+1.0)*2.0;
	float speed = speed2+.1;
	offset += sin(offset)*.96;
	offset *= 2.0;
	
	
	vec3 col = vec3(0);
	
	vec3 stp = ray/max(abs(ray.x),abs(ray.y));
	
	vec3 pos = 2.0*stp+.5;
	for ( int i=0; i < 20; i++ )
	{
		float z = Noise(ivec2(pos.xy)).x;
		z = fract(z-offset);
		float d = 50.0*z-pos.z;
		float w = pow(max(0.0,1.0-8.0*length(fract(pos.xy)-.5)),2.0);
		vec3 c = max(vec3(0),vec3(1.0-abs(d+speed2*.5)/speed,1.0-abs(d)/speed,1.0-abs(d-speed2*.5)/speed));
		col += 1.5*(1.0-z)*c*w;
		pos += stp;
	}
	
	gl_FragColor = vec4(ToGamma(col),1.0);
}
</script>

<script type="x-shader/x-fragment" id="fragmentShaderHell">
// Created by inigo quilez - iq/2013
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;          	 // input channel. XX = 2D/Cube
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

vec3 iChannelResolution[4];          	 // input channel. XX = 2D/Cube

float noise( in vec3 x )
{
    vec3 p = floor(x);
    vec3 f = fract(x);
	f = f*f*(3.0-2.0*f);
	
	vec2 UV = (p.xy+vec2(37.0,17.0)*p.z) + f.xy;
	vec2 rg = texture2D( iChannel0, (UV+ 0.5)/256.0, -100.0 ).yx;
	return mix( rg.x, rg.y, f.z );
}

vec4 map( vec3 p )
{
	float den = 0.2 - p.y;

    // invert space	
	p = -7.0*p/dot(p,p);

    // twist space	
	float co = cos(den - 0.25*iGlobalTime);
	float si = sin(den - 0.25*iGlobalTime);
	p.xz = mat2(co,-si,si,co)*p.xz;

    // smoke	
	float f;
	vec3 q = p                          - vec3(0.0,1.0,0.0)*iGlobalTime;;
    f  = 0.50000*noise( q ); q = q*2.02 - vec3(0.0,1.0,0.0)*iGlobalTime;
    f += 0.25000*noise( q ); q = q*2.03 - vec3(0.0,1.0,0.0)*iGlobalTime;
    f += 0.12500*noise( q ); q = q*2.01 - vec3(0.0,1.0,0.0)*iGlobalTime;
    f += 0.06250*noise( q ); q = q*2.02 - vec3(0.0,1.0,0.0)*iGlobalTime;
    f += 0.03125*noise( q );

	den = clamp( den + 4.0*f, 0.0, 1.0 );
	
	vec3 col = mix( vec3(1.0,0.9,0.8), vec3(0.4,0.15,0.1), den ) + 0.05*sin(p);
	
	return vec4( col, den );
}

vec3 raymarch( in vec3 ro, in vec3 rd )
{
	vec4 sum = vec4( 0.0 );

	float t = 0.0;

    // dithering	
	//t += 0.05*texture2D( iChannel0, gl_FragCoord.xy/iChannelResolution[0].x ).x;
	t += 0.05*texture2D( iChannel0, gl_FragCoord.xy/256.0 ).x;
	
	for( int i=0; i<100; i++ )
	{
		if( sum.a > 0.99 ) continue;
		
		vec3 pos = ro + t*rd;
		vec4 col = map( pos );
		
		col.xyz *= mix( 3.1*vec3(1.0,0.5,0.05), vec3(0.48,0.53,0.5), clamp( (pos.y-0.2)/2.0, 0.0, 1.0 ) );
		
		col.a *= 0.6;
		col.rgb *= col.a;

		sum = sum + col*(1.0 - sum.a);	

		t += 0.05;
	}

	return clamp( sum.xyz, 0.0, 1.0 );
}

void main(void)
{

	vec2 q = gl_FragCoord.xy / iResolution.xy;
	vec2 p = -1.0 + 2.0*q;
	p.x *= iResolution.x/ iResolution.y;
	
    vec2 mo = iMouse.xy / iResolution.xy;
    if( iMouse.w<=0.00001 ) mo=vec2(0.0);
	
    // camera
    vec3 ro = 4.0*normalize(vec3(cos(3.0*mo.x), 1.4 - 1.0*(mo.y-.1), sin(3.0*mo.x)));
	vec3 ta = vec3(0.0, 1.0, 0.0);
	float cr = 0.5*cos(0.7*iGlobalTime);
	
    // shake		
	ro += 0.1*(-1.0+2.0*texture2D( iChannel0, iGlobalTime*vec2(0.010,0.014) ).xyz);
	ta += 0.1*(-1.0+2.0*texture2D( iChannel0, iGlobalTime*vec2(0.013,0.008) ).xyz);
	
	// build ray
    vec3 ww = normalize( ta - ro);
    vec3 uu = normalize(cross( vec3(sin(cr),cos(cr),0.0), ww ));
    vec3 vv = normalize(cross(ww,uu));
    vec3 rd = normalize( p.x*uu + p.y*vv + 2.0*ww );
	
    // raymarch	
	vec3 col = raymarch( ro, rd );
	
	// contrast and vignetting	
	col = col*0.5 + 0.5*col*col*(3.0-2.0*col);
	col *= 0.25 + 0.75*pow( 16.0*q.x*q.y*(1.0-q.x)*(1.0-q.y), 0.1 );
	
    gl_FragColor = vec4( col, 1.0 );
}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderEdgeGlowFilter">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;          	 // input channel. XX = 2D/Cube



float d = sin(iGlobalTime * 5.0)*0.5 + 1.5; // kernel offset

float lookup(vec2 p, float dx, float dy)
{
    vec2 UV = (p.xy + vec2(dx * d, dy * d)) / iResolution.xy;
    vec4 c = texture2D(iChannel0, UV.xy);
	
	// return as luma
    return 0.2126*c.r + 0.7152*c.g + 0.0722*c.b;
}

void main(void)
{
    vec2 p = gl_FragCoord.xy;
    
	// simple sobel edge detection
    float gx = 0.0;
    gx += -1.0 * lookup(p, -1.0, -1.0);
    gx += -2.0 * lookup(p, -1.0,  0.0);
    gx += -1.0 * lookup(p, -1.0,  1.0);
    gx +=  1.0 * lookup(p,  1.0, -1.0);
    gx +=  2.0 * lookup(p,  1.0,  0.0);
    gx +=  1.0 * lookup(p,  1.0,  1.0);
    
    float gy = 0.0;
    gy += -1.0 * lookup(p, -1.0, -1.0);
    gy += -2.0 * lookup(p,  0.0, -1.0);
    gy += -1.0 * lookup(p,  1.0, -1.0);
    gy +=  1.0 * lookup(p, -1.0,  1.0);
    gy +=  2.0 * lookup(p,  0.0,  1.0);
    gy +=  1.0 * lookup(p,  1.0,  1.0);
    
	// hack: use g^2 to conceal noise in the video
    float g = gx*gx + gy*gy;
    float g2 = g * (sin(iGlobalTime) / 2.0 + 0.5);
    
    vec4 col = texture2D(iChannel0, p / iResolution.xy);
    col += vec4(0.0, g, g2, 1.0);
    
    gl_FragColor = col;
}
</script>

<script type="x-shader/x-fragment" id="fragmentShaderFireBall">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click




const int _VolumeSteps = 32;
const float _StepSize = 0.1; 
const float _Density = 0.2;

const float _SphereRadius = 2.0;
const float _NoiseFreq = 1.0;
const float _NoiseAmp = 3.0;
const vec3 _NoiseAnim = vec3(0, -1.0, 0);

// iq's nice integer-less noise function

// matrix to rotate the noise octaves
mat3 m = mat3( 0.00,  0.80,  0.60,
              -0.80,  0.36, -0.48,
              -0.60, -0.48,  0.64 );

float hash( float n )
{
    return fract(sin(n)*43758.5453);
}


float noise( in vec3 x )
{
    vec3 p = floor(x);
    vec3 f = fract(x);

    f = f*f*(3.0-2.0*f);

    float n = p.x + p.y*57.0 + 113.0*p.z;

    float res = mix(mix(mix( hash(n+  0.0), hash(n+  1.0),f.x),
                        mix( hash(n+ 57.0), hash(n+ 58.0),f.x),f.y),
                    mix(mix( hash(n+113.0), hash(n+114.0),f.x),
                        mix( hash(n+170.0), hash(n+171.0),f.x),f.y),f.z);
    return res;
}

float fbm( vec3 p )
{
    float f;
    f = 0.5000*noise( p ); p = m*p*2.02;
    f += 0.2500*noise( p ); p = m*p*2.03;
    f += 0.1250*noise( p ); p = m*p*2.01;
    f += 0.0625*noise( p );
    //p = m*p*2.02; f += 0.03125*abs(noise( p ));	
    return f;
}

// returns signed distance to surface
float distanceFunc(vec3 p)
{	
	float d = length(p) - _SphereRadius;	// distance to sphere
	
	// offset distance with pyroclastic noise
	//p = normalize(p) * _SphereRadius;	// project noise point to sphere surface
	d += fbm(p*_NoiseFreq + _NoiseAnim*iGlobalTime) * _NoiseAmp;
	return d;
}

// color gradient 
// this should be in a 1D texture really
vec4 gradient(float x)
{
	// no constant array initializers allowed in GLES SL!
	const vec4 c0 = vec4(2, 2, 1, 1);	// yellow
	const vec4 c1 = vec4(1, 0, 0, 1);	// red
	const vec4 c2 = vec4(0, 0, 0, 0); 	// black
	const vec4 c3 = vec4(0, 0.5, 1, 0.5); 	// blue
	const vec4 c4 = vec4(0, 0, 0, 0); 	// black
	
	x = clamp(x, 0.0, 0.999);
	float t = fract(x*4.0);
	vec4 c;
	if (x < 0.25) {
		c =  mix(c0, c1, t);
	} else if (x < 0.5) {
		c = mix(c1, c2, t);
	} else if (x < 0.75) {
		c = mix(c2, c3, t);
	} else {
		c = mix(c3, c4, t);		
	}
	//return vec4(x);
	//return vec4(t);
	return c;
}

// shade a point based on distance
vec4 shade(float d)
{	
	// lookup in color gradient
	return gradient(d);
	//return mix(vec4(1, 1, 1, 1), vec4(0, 0, 0, 0), smoothstep(1.0, 1.1, d));
}

// procedural volume
// maps position to color
vec4 volumeFunc(vec3 p)
{
	float d = distanceFunc(p);
	return shade(d);
}

// ray march volume from front to back
// returns color
vec4 rayMarch(vec3 rayOrigin, vec3 rayStep, out vec3 pos)
{
	vec4 sum = vec4(0, 0, 0, 0);
	pos = rayOrigin;
	for(int i=0; i<_VolumeSteps; i++) {
		vec4 col = volumeFunc(pos);
		col.a *= _Density;
		//col.a = min(col.a, 1.0);
		
		// pre-multiply alpha
		col.rgb *= col.a;
		sum = sum + col*(1.0 - sum.a);	
#if 0
		// exit early if opaque
        	if (sum.a > _OpacityThreshold)
            		break;
#endif		
		pos += rayStep;
	}
	return sum;
}

void main(void)
{
    vec2 p = (gl_FragCoord.xy / iResolution.xy)*2.0-1.0;
    p.x *= iResolution.x/ iResolution.y;
	
    float rotx = (iMouse.y / iResolution.y)*4.0;
    float roty = -(iMouse.x / iResolution.x)*4.0;

    float zoom = 4.0;

    // camera
    vec3 ro = zoom*normalize(vec3(cos(roty), cos(rotx), sin(roty)));
    vec3 ww = normalize(vec3(0.0,0.0,0.0) - ro);
    vec3 uu = normalize(cross( vec3(0.0,1.0,0.0), ww ));
    vec3 vv = normalize(cross(ww,uu));
    vec3 rd = normalize( p.x*uu + p.y*vv + 1.5*ww );

    ro += rd*2.0;
	
    // volume render
    vec3 hitPos;
    vec4 col = rayMarch(ro, rd*_StepSize, hitPos);
    //vec4 col = gradient(p.x);
	    
    gl_FragColor = col;
}

</script>

<script type="x-shader/x-fragment" id="fragmentShaderSun">
// based on https://www.shadertoy.com/view/lsf3RH by
// trisomie21 (THANKS!)
// My apologies for the ugly code.

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;          	 // input channel. XX = 2D/Cube
uniform sampler2D iChannel1;          	 // input channel. XX = 2D/Cube





float snoise(vec3 inUV, float res)	// by trisomie21
{
	const vec3 s = vec3(1e0, 1e2, 1e4);
	
	inUV *= res;
	
	vec3 uv0 = floor(mod(inUV, res))*s;
	vec3 uv1 = floor(mod(inUV+vec3(1.), res))*s;
	
	vec3 f = fract(inUV); f = f*f*(3.0-2.0*f);
	
	vec4 v = vec4(uv0.x+uv0.y+uv0.z, uv1.x+uv0.y+uv0.z,
		      	  uv0.x+uv1.y+uv0.z, uv1.x+uv1.y+uv0.z);
	
	vec4 r = fract(sin(v*1e-3)*1e5);
	float r0 = mix(mix(r.x, r.y, f.x), mix(r.z, r.w, f.x), f.y);
	
	r = fract(sin((v + uv1.z - uv0.z)*1e-3)*1e5);
	float r1 = mix(mix(r.x, r.y, f.x), mix(r.z, r.w, f.x), f.y);
	
	return mix(r0, r1, f.z)*2.-1.;
}

float freqs[4];

void main(void)
{


	freqs[0] = texture2D( iChannel1, vec2( 0.01, 0.25 ) ).x;
	freqs[1] = texture2D( iChannel1, vec2( 0.07, 0.25 ) ).x;
	freqs[2] = texture2D( iChannel1, vec2( 0.15, 0.25 ) ).x;
	freqs[3] = texture2D( iChannel1, vec2( 0.30, 0.25 ) ).x;

	/*
	freqs[0] = 1.0;
	freqs[1] = 1.0;
	freqs[2] = 1.0;
	freqs[3] = 1.0;
	*/

	float brightness	= freqs[1] * 0.25 + freqs[2] * 0.25;
	float radius		= 0.24 + brightness * 0.2;
	float invRadius 	= 1.0/radius;
	
	vec3 orange			= vec3( 0.8, 0.65, 0.3 );
	vec3 orangeRed		= vec3( 0.8, 0.35, 0.1 );
	float time		= iGlobalTime * 0.1;
	float aspect	= iResolution.x/iResolution.y;
	vec2 xUV		= gl_FragCoord.xy / iResolution.xy;
	//vec2 xUV		= uv;
	vec2 p 			= -0.5 + xUV;
	p.x *= aspect;

	float fade		= pow( length( 2.0 * p ), 0.5 );
	float fVal1		= 1.0 - fade;
	float fVal2		= 1.0 - fade;
	
	float angle		= atan( p.x, p.y )/6.2832;
	float dist		= length(p);
	vec3 coord		= vec3( angle, dist, time * 0.1 );
	
	float newTime1	= abs( snoise( coord + vec3( 0.0, -time * ( 0.35 + brightness * 0.001 ), time * 0.015 ), 15.0 ) );
	float newTime2	= abs( snoise( coord + vec3( 0.0, -time * ( 0.15 + brightness * 0.001 ), time * 0.015 ), 45.0 ) );	
	for( int i=1; i<=7; i++ ){
		float power = pow( 2.0, float(i + 1) );
		fVal1 += ( 0.5 / power ) * snoise( coord + vec3( 0.0, -time, time * 0.2 ), ( power * ( 10.0 ) * ( newTime1 + 1.0 ) ) );
		fVal2 += ( 0.5 / power ) * snoise( coord + vec3( 0.0, -time, time * 0.2 ), ( power * ( 25.0 ) * ( newTime2 + 1.0 ) ) );
	}
	
	float corona		= pow( fVal1 * max( 1.1 - fade, 0.0 ), 2.0 ) * 50.0;
	corona			+= pow( fVal2 * max( 1.1 - fade, 0.0 ), 2.0 ) * 50.0;
	corona			*= 1.2 - newTime1;
	vec3 sphereNormal 	= vec3( 0.0, 0.0, 1.0 );
	vec3 dir 		= vec3( 0.0 );
	vec3 center		= vec3( 0.5, 0.5, 1.0 );
	vec3 starSphere		= vec3( 0.0 );
	
	vec2 sp = -1.0 + 2.0 * xUV;
	sp.x *= aspect;
	sp *= ( 2.0 - brightness );
  	float r = dot(sp,sp);
	float f = (1.0-sqrt(abs(1.0-r)))/(r) + brightness * 0.5;
	if( dist < radius ){
		corona			*= pow( dist * invRadius, 24.0 );
  		vec2 newUv;
 		newUv.x = sp.x*f;
  		newUv.y = sp.y*f;
		newUv += vec2( time, 0.0 );
		
		vec3 texSample 	= texture2D( iChannel0, newUv ).rgb;
		float uOff		= ( texSample.g * brightness * 4.5 + time );
		vec2 starUV		= newUv + vec2( uOff, 0.0 );
		starSphere		= texture2D( iChannel0, starUV ).rgb;
	}
	
	float starGlow	= min( max( 1.0 - dist * ( 1.0 - brightness ), 0.0 ), 1.0 );
	//gl_FragColor.rgb	= vec3( r );
	gl_FragColor.rgb	= vec3( f * ( 0.75 + brightness * 0.3 ) * orange ) + starSphere + corona * orange + starGlow * orangeRed;
	gl_FragColor.a		= 1.0;
}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderBlueFlame">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)


float noise(vec3 p) //Thx to Las^Mercury
{
	vec3 i = floor(p);
	vec4 a = dot(i, vec3(1., 57., 21.)) + vec4(0., 57., 21., 78.);
	vec3 f = cos((p-i)*acos(-1.))*(-.5)+.5;
	a = mix(sin(cos(a)*a),sin(cos(1.+a)*(1.+a)), f.x);
	a.xy = mix(a.xz, a.yw, f.y);
	return mix(a.x, a.y, f.z);
}

//-----------------------------------------------------------------------------
// Scene/Objects
//-----------------------------------------------------------------------------
float sphere(vec3 p, vec4 spr)
{
	return length(spr.xyz-p) - spr.w;
}

float fire(vec3 p)
{
	float d= sphere(p*vec3(1.,.5,1.), vec4(.0,-1.,.0,1.));
	return d+(noise(p+vec3(.0,iGlobalTime*2.,.0))+noise(p*3.)*.5)*.25*(p.y) ;
}
//-----------------------------------------------------------------------------
// Raymarching tools
//-----------------------------------------------------------------------------
float scene(vec3 p)
{
	return min(100.-length(p) , abs(fire(p)) );
}



vec4 Raymarche(vec3 org, vec3 dir)
{
	float d=0.0;
	vec3  p=org;
	float glow = 0.0;
	float eps = 0.02;
	bool glowed=false;
	for(int i=0; i<64; i++)
	{
		d = scene(p) + eps;
		p += d * dir;
		if( d>eps )
		{
			if( fire(p) < .0)
				glowed=true;
			if(glowed)
       			glow = float(i)/64.;
		}
	}
	return vec4(p,glow);
}

//-----------------------------------------------------------------------------
// Main functions
//-----------------------------------------------------------------------------

void main()
{
	vec2 v = -1.0 + 2.0 * gl_FragCoord.xy / iResolution.xy;
	v.x *= iResolution.x/iResolution.y;
	vec3 org = vec3(0.,-2.,4.);
	vec3 dir   = normalize(vec3(v.x*1.6,-v.y,-1.5));
	vec4 p = Raymarche(org,dir);
	float glow = p.w;
	gl_FragColor = mix(vec4(0.), mix(vec4(1.,.5,.1,1.),vec4(0.1,.5,1.,1.),p.y*.02+.4), pow(glow*2.,4.));
	//gl_FragColor = mix(vec4(1.), mix(vec4(1.,.5,.1,1.),vec4(0.1,.5,1.,1.),p.y*.02+.4), pow(glow*2.,4.));

}




</script>

<script type="x-shader/x-fragment" id="fragmentShaderDigitalHeart">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;          	 // input channel. XX = 2D/Cube
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click


float noise(float t) {
	return fract(sin(t)*4397.33);
}

vec3 rotate(vec3 p) {
	float angle = iGlobalTime / 3.;
	return vec3(p.x*cos(angle) + p.z*sin(angle), p.y, p.x*sin(angle) - p.z*cos(angle));
}

float field(vec3 p) {
	float d = 0.;
	p = abs(rotate(p));
	for (int i = 0; i < 7; ++i) {
		d = max(d, exp(-float(i) / 7.) * (length(max(p - .4, vec3(0.))) - .2));
		p = abs(2.*fract(p) - 1.) + .1;
	}
	return d;
}

void main() {
	vec2 UV = 2. * gl_FragCoord.xy / iResolution.xy - 1.;
	UV *= iResolution.xy / max(iResolution.x, iResolution.y);
	vec3 ro = vec3(0., 0., 2.7);
	vec3 rd = normalize(vec3(UV.x, -UV.y, -1.5));
	float dSum = 0.;
	float dMax = 0.;
	
	float variance = mix(3., 1., pow(.5 + .5*sin(iGlobalTime), 8.));
	variance -= .05 * log(1.e-6 + noise(iGlobalTime));
	
	for (int i = 0; i < 64; ++i) {
		float d = field(ro);
		float weight = 1. + .2 * (exp(-10. * abs(2.*fract(abs(4.*ro.y)) - 1.)));
		float value = exp(-variance * abs(d)) * weight;
		dSum += value;
		dMax = max(dMax, value);
		ro += (d / 8.) * rd;
	}
	
	float t = max(dSum / 32., dMax) * mix(.92, 1., noise(UV.x + noise(UV.y + iGlobalTime)));
	gl_FragColor = vec4(t * vec3(t*t*1.3, t*1.3, 1.), 1.);
}



</script>

<script type="x-shader/x-fragment" id="fragmentShaderClouds">
// Created by inigo quilez - iq/2013
// License Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License.

#define FULL_PROCEDURAL

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;          	 // input channel. XX = 2D/Cube
uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click

#ifdef FULL_PROCEDURAL

// hash based 3d value noise
float hash( float n )
{
    return fract(sin(n)*43758.5453);
}
float noise( in vec3 x )
{
    vec3 p = floor(x);
    vec3 f = fract(x);

    f = f*f*(3.0-2.0*f);
    float n = p.x + p.y*57.0 + 113.0*p.z;
    return mix(mix(mix( hash(n+  0.0), hash(n+  1.0),f.x),
                   mix( hash(n+ 57.0), hash(n+ 58.0),f.x),f.y),
               mix(mix( hash(n+113.0), hash(n+114.0),f.x),
                   mix( hash(n+170.0), hash(n+171.0),f.x),f.y),f.z);
}
#else

// LUT based 3d value noise
float noise( in vec3 x )
{
    vec3 p = floor(x);
    vec3 f = fract(x);
	f = f*f*(3.0-2.0*f);
	
	vec2 UV = (p.xy+vec2(37.0,17.0)*p.z) + f.xy;
	vec2 rg = texture2D( iChannel0, (UV+ 0.5)/256.0, -100.0 ).yx;
	//vec2 rg = texture2D( iChannel0, (UV+ 0.5)/256.0, -100.0 ).xy;
	return mix( rg.x, rg.y, f.z );
}
#endif

vec4 map( in vec3 p )
{
	float d = 0.2 - p.y;

	vec3 q = p - vec3(1.0,0.1,0.0)*iGlobalTime;
	float f;
    f  = 0.5000*noise( q ); q = q*2.02;
    f += 0.2500*noise( q ); q = q*2.03;
    f += 0.1250*noise( q ); q = q*2.01;
    f += 0.0625*noise( q );

	d += 3.0 * f;

	d = clamp( d, 0.0, 1.0 );
	
	vec4 res = vec4( d );

	res.xyz = mix( 1.15*vec3(1.0,0.95,0.8), vec3(0.7,0.7,0.7), res.x );
	
	return res;
}


vec3 sundir = vec3(-1.0,0.0,0.0);


vec4 raymarch( in vec3 ro, in vec3 rd )
{
	vec4 sum = vec4(0, 0, 0, 0);

	float t = 0.0;
	for(int i=0; i<64; i++)
	{
		if( sum.a > 0.99 ) continue;

		vec3 pos = ro + t*rd;
		vec4 col = map( pos );
		
		#if 1
		float dif =  clamp((col.w - map(pos+0.3*sundir).w)/0.6, 0.0, 1.0 );

        vec3 lin = vec3(0.65,0.68,0.7)*1.35 + 0.45*vec3(0.7, 0.5, 0.3)*dif;
		col.xyz *= lin;
		#endif
		
		col.a *= 0.35;
		col.rgb *= col.a;

		sum = sum + col*(1.0 - sum.a);	

        #if 0
		t += 0.1;
		#else
		t += max(0.1,0.025*t);
		#endif
	}

	sum.xyz /= (0.001+sum.w);

	return clamp( sum, 0.0, 1.0 );
}

void main(void)
{
	vec2 q = gl_FragCoord.xy / iResolution.xy;
    vec2 p = -1.0 + 2.0*q;
    p.x *= iResolution.x/ iResolution.y;
    vec2 mo = -1.0 + 2.0*iMouse.xy / iResolution.xy;
    
    // camera
    vec3 ro = 4.0*normalize(vec3(cos(2.75-3.0*mo.x), 0.7+(mo.y+1.0), sin(2.75-3.0*mo.x)));
	vec3 ta = vec3(0.0, 1.0, 0.0);
    vec3 ww = normalize( ta - ro);
    vec3 uu = normalize(cross( vec3(0.0,1.0,0.0), ww ));
    vec3 vv = normalize(cross(ww,uu));
    vec3 rd = normalize( p.x*uu + p.y*vv + 1.5*ww );

	
    vec4 res = raymarch( ro, rd );

	float sun = clamp( dot(sundir,rd), 0.0, 1.0 );
	vec3 col = vec3(0.6,0.71,0.75) - rd.y*0.2*vec3(1.0,0.5,1.0) + 0.15*0.5;
	col += 0.2*vec3(1.0,.6,0.1)*pow( sun, 8.0 );
	col *= 0.95;
	col = mix( col, res.xyz, res.w );
	col += 0.1*vec3(1.0,0.4,0.2)*pow( sun, 3.0 );
	    
    gl_FragColor = vec4( col, 1.0 );
}


</script>

<script type="x-shader/x-fragment" id="fragmentShaderDigitalBrain">

uniform vec3      iResolution;           // viewport resolution (in pixels)
uniform float     iGlobalTime;           // shader playback time (in seconds)
uniform sampler2D iChannel0;          // input channel. XX = 2D/Cube
//uniform float     iChannelTime[4];       // channel playback time (in seconds)
//uniform vec3      iChannelResolution[4]; // channel resolution (in pixels)
//uniform vec4      iMouse;                // mouse pixel coords. xy: current (if MLB down), zw: click
//uniform samplerXX iChannel0..3;          // input channel. XX = 2D/Cube
//uniform vec4      iDate;                 // (year, month, day, time in seconds)




// by srtuss, 2013
// was trying to find some sort of "mechanical" fractal for texture/heightmap
// generation, but then i ended up with this.

// rotate position around axis
vec2 rotate(vec2 p, float a)
{
	return vec2(p.x * cos(a) - p.y * sin(a), p.x * sin(a) + p.y * cos(a));
}

// 1D random numbers
float rand(float n)
{
    return fract(sin(n) * 43758.5453123);
}

// 2D random numbers
vec2 rand2(in vec2 p)
{
	return fract(vec2(sin(p.x * 591.32 + p.y * 154.077), cos(p.x * 391.32 + p.y * 49.077)));
}

// 1D noise
float noise1(float p)
{
	float fl = floor(p);
	float fc = fract(p);
	return mix(rand(fl), rand(fl + 1.0), fc);
}

// voronoi distance noise, based on iq's articles
float voronoi(in vec2 x)
{
	vec2 p = floor(x);
	vec2 f = fract(x);
	
	vec2 res = vec2(8.0);
	for(int j = -1; j <= 1; j ++)
	{
		for(int i = -1; i <= 1; i ++)
		{
			vec2 b = vec2(i, j);
			vec2 r = vec2(b) - f + rand2(p + b);
			
			// chebyshev distance, one of many ways to do this
			float d = max(abs(r.x), abs(r.y));
			
			if(d < res.x)
			{
				res.y = res.x;
				res.x = d;
			}
			else if(d < res.y)
			{
				res.y = d;
			}
		}
	}
	return res.y - res.x;
}


float flicker = noise1(iGlobalTime * 2.0) * 0.8 + 0.4;

void main(void)
{
	vec2 UV = gl_FragCoord.xy / iResolution.xy;
	UV = (UV - 0.5) * 2.0;
	vec2 suv = UV;
	UV.x *= iResolution.x / iResolution.y;
	
	
	float v = 0.0;
	
	// that looks highly interesting:
	//v = 1.0 - length(UV) * 1.3;
	
	
	// a bit of camera movement
	UV *= 0.6 + sin(iGlobalTime * 0.1) * 0.4;
	UV = rotate(UV, sin(iGlobalTime * 0.3) * 1.0);
	UV += iGlobalTime * 0.4;
	
	
	// add some noise octaves
	float a = 0.6, f = 1.0;
	
	for(int i = 0; i < 3; i ++) // 4 octaves also look nice, its getting a bit slow though
	{	
		float v1 = voronoi(UV * f + 5.0);
		float v2 = 0.0;
		
		// make the moving electrons-effect for higher octaves
		if(i > 0)
		{
			// of course everything based on voronoi
			v2 = voronoi(UV * f * 0.5 + 50.0 + iGlobalTime);
			
			float va = 0.0, vb = 0.0;
			va = 1.0 - smoothstep(0.0, 0.1, v1);
			vb = 1.0 - smoothstep(0.0, 0.08, v2);
			v += a * pow(va * (0.5 + vb), 2.0);
		}
		
		// make sharp edges
		v1 = 1.0 - smoothstep(0.0, 0.3, v1);
		
		// noise is used as intensity map
		v2 = a * (noise1(v1 * 5.5 + 0.1));
		
		// octave 0's intensity changes a bit
		if(i == 0)
			v += v2 * flicker;
		else
			v += v2;
		
		f *= 3.0;
		a *= 0.7;
	}

	// slight vignetting
	v *= exp(-0.6 * length(suv)) * 1.2;
	
	// use texture channel0 for color? why not.
	vec3 cexp = texture2D(iChannel0, UV * 0.001).xyz * 3.0 + texture2D(iChannel0, UV * 0.01).xyz;//vec3(1.0, 2.0, 4.0);
	cexp *= 1.4;
	
	// old blueish color set
	//vec3 cexp = vec3(6.0, 4.0, 2.0);
	
	vec3 col = vec3(pow(v, cexp.x), pow(v, cexp.y), pow(v, cexp.z)) * 2.0;
	
	gl_FragColor = vec4(col, 1.0);
}


</script>


<script type="x-shader/x-fragment" id="fragmentShaderTexture">
        uniform sampler2D tDiffuse;
        varying vec2 vUv;

        void main() {
                gl_FragColor = texture2D(tDiffuse, vUv);
        }
</script>




<script type="x-shader/x-vertex" id="vertexShaderTest">
<?php echo file_get_contents('glsl/classicnoise3D.glsl'); ?>

varying vec2 vUv;
varying vec3 vNormal;
//uniform vec3 vlightx;

uniform float time;

float rand(vec2 co) {
    return fract(sin(dot(co.xy ,vec2(12.9898,78.233))) * 43758.5453);
}

 
void main() {

/*
WebGLRenderer.js - do a forward search for 'prefix_vertex' and 'prefix_fragment'

viewMatrix, modelViewMatrix, projectionMatrix, normalMatrix, modelMatrix, cameraPosition, morphTargetInfluences boneTexture, boneGlobalMatrices
position, normal, uv, uv2, tangent, color, skinIndex, skinWeight, lineDistance
morphTarget, morphNormal


*/
 
        vUv = uv;
        vNormal = normal;
	
	vec3 newPosition = position;
	//float py = position.y;
	//py = cos( py ) * 2.0;

	//Creates a wav in the plane along the y axis
	//newPosition.z = cos( position.y ) / 2.6;

	//Stretches the geomoetry along the Y axis
	//if( position.y > 0.0 ) newPosition.y += 1.1;




        //float c = cnoise( 28.234 * (vNormal + time)  );
        //float c = cnoise( 8.234 * (vNormal + time)  );

	/*
        float c = cnoise( 1.234 * (position + time)  );
	c = c / 5.0;
	newPosition.z += c;
	*/


	if( position.y > 0.0 && position.y < 1.5 ) {

		float c = cnoise( 1.234 * (position + time)  );
		c = c / 5.0;
		newPosition.z += c;
		

	}


	//if( position.z > 0.0 ) newPosition.z += 1.1;
	//if( position.y > 0.0 ) newPosition.z += rand( position.xy + time );
	//if( position.y > 0.0 ) newPosition.z += c;
	//newPosition.z += c;

	//if( position.y > 0.0 ) newPosition.z += 0.1;

	//Creates a wav in the plane
	//newPosition.z = cos( position.y ) * 2.0;

	//newPosition.z += rand(vec2(1.0, 2.0));	
	//newPosition.z += 1.0;





	//newPosition.y = py;

	//newPosition.y += 10;
        //gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );
        gl_Position = projectionMatrix * modelViewMatrix * vec4( newPosition, 1.0 );
 
}       
</script>


<script type="x-shader/x-fragment" id="fragmentShaderTest">

varying vec2 vUv;
varying vec3 vNormal;

uniform sampler2D tDiffuse;
 
void main() {

	vec3 light = vec3( 0.5, 2.2, -1.0 );
	//light = normalize( light );
	light =  - normalize( light );
	//float dProd = max( 0.0, dot( vNormal, light) );
	float dProd = max( 0.0, dot( vNormal, light) );


	gl_FragColor = texture2D(tDiffuse, vUv);


	//vec4 sample = texture2D(tDiffuse, 
 
	// colour is RGBA: u, v, 0, 1
	//gl_FragColor = vec4( vec3( vUv, 0. ), 1. );
	//gl_FragColor = vec4( 1, 0, 0, 1. );
	//gl_FragColor = vec4( dProd , dProd, dProd, 1.0 - dProd );


	//gl_FragColor = vec4( dProd , dProd, dProd, 1.0  );
 
}



</script>



<script>

// standard global variables
//var container, scene, camera, renderer, controls, stats, composer, object;
var container, scene, camera, cssrenderer, cssScene, renderer, controls, stats, projector, raycaster, loader;
var orthoCamera, orthoScene;

var lights, numLights;
var keyboard = new THREEx.KeyboardState();
var clock = new THREE.Clock();


var ootput, realminfo;

var mouse = new THREE.Vector2(), INTERSECTED;
var camera_dest = new THREE.Vector3();

// custom global variables
var last_update, message;
var globals = new Object();
var app = new Object();

app.hosts = new Object();
app.materials = new Array();
app.net = new Array();
app.netx = new Array();
app.netz = new Array();
app.tiles = new Array();
app.images = new Array();

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
	
	/*
	if( mouse.button != undefined && mouse.button != null && mouse.button == 0  ) {
		app.materials.starnest.uniforms.iMouse.value.set( event.clientX, event.clientY, 1.0, 1.0 );
	} 
	if( mouse.button != undefined && mouse.button != null && mouse.button == 0  ) {
		app.materials.fireball.uniforms.iMouse.value.set( event.clientX, event.clientY, 1.0, 1.0 );
	} 
	*/

	/*	
	var vector = new THREE.Vector3( mouse.x, mouse.y, 0.5 );
	projector.unprojectVector( vector, camera );

	var raycaster = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );
	var intersects = raycaster.intersectObjects( app.net[app.network].children, true );

	if( intersects.length > 0 ) {
		
	} else {

	}
	*/




}

function onWindowResize() {


	if( globals.width == window.innerWidth && globals.height == window.innerHeight ) return;


	globals.width = window.innerWidth || 2;
	globals.height = window.innerHeight || 2;
	globals.halfWidth = globals.width / 2;
	globals.halfHeight = globals.height / 2;

	renderer.setSize( window.innerWidth, window.innerHeight );
	if( cssrenderer ) cssrenderer.setSize( window.innerWidth, window.innerHeight );

	camera.aspect = window.innerWidth / window.innerHeight;
	camera.updateProjectionMatrix();


	
	if( globals.composer ) {
		//app.depthTarget.setSize( window.innerWidth, window.innerHeight );
		app.depthTarget.dispose();
		app.depthTarget = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { minFilter: THREE.NearestFilter, magFilter: THREE.NearestFilter, format: THREE.RGBAFormat } );
		console.debug( app.depthTarget );
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
			
			//camera.lookAt( this.x, this.y, this.z);
			camera.lookAt( this );

		} )
		.onComplete( function() { app.current_selection = selected; }  )
		.start();
					
		//.onComplete( function() { app.flying = 0; } )

		var tween_camera_position = new TWEEN.Tween( { x: camera.position.x, y: camera.position.y, z: camera.position.z } )
		.to( { x: selected.x, y: selected.y + 0.2, z: selected.z }, 2000 )
		.onUpdate( function () {

			var differ = new THREE.Vector3();

			differ.x = Math.abs( Math.abs(selected.x) - Math.abs(this.x));
			differ.y = Math.abs( Math.abs(selected.y) - Math.abs(this.y));
			differ.z = Math.abs( Math.abs(selected.z) - Math.abs(this.z));
			
			if( differ.x > 1.1 ) camera.position.x = this.x; 
			//if( differ.y > 1.1 ) camera.position.y = this.y; 
			camera.position.y = this.y;
			if( differ.z > 1.1 ) camera.position.z = this.z; 
			//app.materials['glow'].uniforms[ 'viewVector' ].value = controls.object.position;
			//app.materials['glow'].uniforms[ 'viewVector' ].value = camera.position;
			
			//camera.updateProjectionMatrix();

		} )
		.onComplete( function() { app.flying = 0; } )
		.start();

		//.onComplete( function() { app.flying = 0; camera.lookAt( selected.x, selected.y, selected.z); } )
			
	} else {

		//camera.position.set( selected.x - 1.1, selected.y, selected.z - 1.1 );
		camera.position.set( 0, 4, 0 );
		//camera.lookAt( selected.x, selected.y, selected.z);
		app.current_selection = selected;

	}
	

}

function onDocumentMouseDown( event ) {

	event.preventDefault();

	console.debug("w: "+window.innerWidth+" h: "+window.innerHeight);
	mouse.button = event.button;
	/*
	var vector = new THREE.Vector3( mouse.x, mouse.y, 0.5 );
	projector.unprojectVector( vector, camera );

	var raycaster = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );
	var intersects = raycaster.intersectObjects( app.net[app.network].children, true );

	if( intersects.length > 0 ) {
		SELECTED = intersects[ 0 ].object;
	}
	*/
}

function onDocumentMouseUp( event ) {

	event.preventDefault();
	mouse.button = null;
	/*
	controls.enabled = true;

	if ( INTERSECTED ) {

		//plane.position.copy( INTERSECTED.position );

		SELECTED = null;

	}

	//container.style.cursor = 'auto';
	*/

}




// FUNCTIONS 		
function init() {

	//ootput = document.getElementById('message').innerHTML;
	//realminfo = document.getElementById('realminfo').innerHTML;

	ootput = document.getElementById('message');
	realminfo = document.getElementById('realminfo');

	scene = new THREE.Scene();
	cssScene = new THREE.Scene();
        orthoScene = new THREE.Scene();

	projector = new THREE.Projector();
	raycaster = new THREE.Raycaster();

	camera = new THREE.PerspectiveCamera( 45, globals.width / globals.height, 0.1, 20000);
	camera.aspect = window.innerWidth / window.innerHeight;
	camera.position.set(-25, 15,-25);
	//camera.lookAt(scene.position);	


	//Depth is irrelevant to orthographic projection except for culling

	//this is needed if I want to use a regular mesh material
        orthoCamera = new THREE.OrthographicCamera( -globals.halfWidth, globals.halfWidth, globals.halfHeight, -globals.halfHeight, 0, 1 );
	
	//this is required for the shader toy fragment shaders the vertex position goes from 0,0 to width,height
        //orthoCamera = new THREE.OrthographicCamera( 0, globals.width, 0, globals.height, 0, 1 );


	controls = new THREE.HybridControls( camera );
	app.current_selection = scene.position;
	app.start = Date.now();
	app.startx = (new Date()).getTime();



	renderer = new THREE.WebGLRenderer( { antialias: false } );
	renderer.setSize(globals.width, globals.height);
	renderer.autoClear = false;
	if( app.shadow ) {
		renderer.shadowMapEnabled = app.shadow;
		renderer.gammaInput = true;
		renderer.gammaOutput = true;
		renderer.physicallyBasedShading = true;
		renderer.shadowMapType = THREE.PCFShadowMap;
		//renderer.setClearColor( 0xFFFFFF, 1 );
		//renderer.shadowMapSoft = false;
		//renderer.shadowMapDebug = true;
	}



	app.renderDest = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { minFilter: THREE.NearestFilter, magFilter: THREE.NearestFilter, format: THREE.RGBAFormat } );



        // when window resizes, also resize this renderer

        renderer.domElement.style.position = 'absolute';
        renderer.domElement.style.top      = 0;
        renderer.domElement.style.zIndex   = 1;


	container = document.createElement( 'div' );
	document.body.appendChild( container );
	container.appendChild( renderer.domElement );

        //cssrenderer     = new THREE.CSS3DRenderer();
	if( cssrenderer ) {
		cssrenderer.setSize( window.innerWidth, window.innerHeight );
		cssrenderer.domElement.style.position = 'absolute';
		cssrenderer.domElement.style.top          = 0;
		cssrenderer.domElement.style.margin       = 0;
		cssrenderer.domElement.style.padding  = 0;
		cssrenderer.domElement.style.zIndex   = 2;
		document.body.appendChild( cssrenderer.domElement );
		container.appendChild( cssrenderer.domElement );
	}


	// STATS
	//stats = new Stats();
	//stats.domElement.style.position = 'absolute';
	//stats.domElement.style.bottom = '0px';
	//stats.domElement.style.zIndex = 100;



	if( orthoCamera != undefined ) {
		orthoCamera.lookAt( scene.position );
		/*
		var quadmat = new THREE.MeshPhongMaterial({
			color: 0x00ff00,
			emissive: 0xffffff,
			opacity: 0.2,
			transparent: true,
			wireframe: true,
			blending: THREE.SubtractiveBlending


		});
		*/

		var quadmat = new THREE.MeshPhongMaterial({
			map: app.renderDest,
			color: 0x00ff00,
			emissive: 0xffffff//,
			//opacity: 0.2,
			//transparent: true,
			//wireframe: true,
			//blending: THREE.SubtractiveBlending


		});




		var tex09 = new THREE.ImageUtils.loadTexture( "shadertoy/tex09.jpg" );
		tex09.wrapS = THREE.RepeatWrapping;
		tex09.wrapT = THREE.RepeatWrapping;

		var tex12 = new THREE.ImageUtils.loadTexture( "shadertoy/tex12.png" )
		tex12.wrapS = THREE.RepeatWrapping;
		tex12.wrapT = THREE.RepeatWrapping;

		var tex11 = new THREE.ImageUtils.loadTexture( "shadertoy/tex11.png" )
		tex11.wrapS = THREE.RepeatWrapping;
		tex11.wrapT = THREE.RepeatWrapping;

		var tex16 = new THREE.ImageUtils.loadTexture( "shadertoy/tex16.png" )
		tex16.wrapS = THREE.RepeatWrapping;
		tex16.wrapT = THREE.RepeatWrapping;






		/*
		app.materials['digibrain'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderDigitalBrain' ).textContent,
			//blending: THREE.SubtractiveBlending,
			//blending: THREE.AdditiveBlending,
			//blending: THREE.MultiplyBlending,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 1.0 ) },
				//iChannel0:   { type: "t", value: new THREE.ImageUtils.loadTexture( "shadertoy/tex16.png" ) }
				iChannel0:   { type: "t", value: tex16 }
			}

		});
		app.materials['digiheart'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderDigitalHeart' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 1.0 ) },
				iChannel0:   { type: "t", value: tex16 },
				iMouse:   { type: "v4", value: new THREE.Vector4( 1.0, 1.0 , 0.0, 0.0 ) }
			}

		});


		app.materials['blueflame'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderBlueFlame' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 1.0 ) }
			}

		});
	

		app.materials['sun'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderSun' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth , window.innerHeight , 1.0 ) },
				iChannel0:   { type: "t", value: tex09 }
				//iChannel1:   { type: "t", value: tex09 },
				//iChannel0:   { type: "t", value: new THREE.ImageUtils.loadTexture( "shadertoy/tex09.jpg" ) },
				//iChannel1:   { type: "t", value: new THREE.ImageUtils.loadTexture( "shadertoy/tex09.jpg" ) }
			}

		});


		app.materials['clouds'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderClouds' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) },
				iChannel0:   { type: "t", value: tex16 },
				iMouse:   { type: "v4", value: new THREE.Vector4( 1.0,  1.0 , 0.0, 0.0 ) }
			}

		});

		app.materials['fireball'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderFireBall' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) },
				iChannel0:   { type: "t", value: tex16 },
				iMouse:   { type: "v4", value: new THREE.Vector4( 1.0,  1.0 , 0.0, 0.0 ) }
			}

		});

		app.materials['edgeglow'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderEdgeGlow' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) },
				iChannel0:   { type: "t", value: app.renderDest }
			}

		});

		app.materials['hell'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderHell' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				//iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight-10, 0.0 ) },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) },
				iChannel0:   { type: "t", value: tex16 },
				//iChannelResolution:   { type: "v3", value: null },
				iMouse:   { type: "v4", value: new THREE.Vector4( window.innerWidth,  window.innerHeight , 0.0, 0.0 ) }
			}

		});

		app.materials['warp'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderWarp' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) },
				iChannel0:   { type: "t", value: tex16 },
				//iChannelResolution:   { type: "v3", value: null },
				iMouse:   { type: "v4", value: new THREE.Vector4( window.innerWidth,  window.innerHeight , 0.0, 0.0 ) }
			}

		});


		app.materials['glassdist'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderGlassDistance' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) }
				//iResolution:   { type: "v3", value: new THREE.Vector3( 320, 240, 0.0 ) }
			}

		});




		app.materials['glassdist'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderGlassDistance' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) }
			}

		});


		app.materials['starnest'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderStarNest' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) },
				iMouse:   { type: "v4", value: new THREE.Vector4( window.innerWidth,  window.innerHeight , 0.0, 0.0 ) }
			}

		});

		app.materials['snowy'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderSnowy' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) },
				iMouse:   { type: "v4", value: new THREE.Vector4( window.innerWidth,  window.innerHeight , 0.0, 0.0 ) }
			}

		});




		app.materials['chromatic'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderChromaticFilter' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iChannel0:   { type: "t", value: app.renderDest },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) }
			}

		});

		app.materials['relentless'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderRelentless' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) }
			}

		});

		app.materials['fire'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderFire' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) }
			}

		});


		app.materials['oceanic'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderOceanic' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) }
			}

		});


		app.materials['oldvideo'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderOldVideo' ).textContent,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iChannel0:   { type: "t", value: app.renderDest },
				iMouse:   { type: "v4", value: new THREE.Vector4( 1.0,  1.0 , 0.0, 0.0 ) },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) }
			}

		});




		*/

		app.materials['testing'] = new THREE.ShaderMaterial({ 
			vertexShader:   document.getElementById( 'vertexShaderX' ).textContent,
			fragmentShader:   document.getElementById( 'fragmentShaderWickedTunnel' ).textContent,
			//transparent: true,
			//opacity: 0.2,
			//blending: THREE.AdditiveBlending,
			uniforms: {
				iGlobalTime:   { type: "f", value: 1.0 },
				iChannel0:   { type: "t", value: app.renderDest },
				iMouse:   { type: "v4", value: new THREE.Vector4( 1.0,  1.0 , 0.0, 0.0 ) },
				iResolution:   { type: "v3", value: new THREE.Vector3( window.innerWidth, window.innerHeight, 0.0 ) }
			}

		});



		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.testing );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.oldvideo );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.oceanic );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.relentless );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.chromatic );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.glassdist );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.warp );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.clouds );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.digiheart );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), app.materials.blueflame );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, globals.width/10, globals.height/10 ), app.materials.shaderx );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, globals.width/10, globals.height/10 ), PATCH.materials.lava );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, globals.width/10, globals.height/10 ), quadmat );
		//var quad = new THREE.Mesh( new THREE.PlaneGeometry( 100, 100, 10, 10 ), quadmat );
		var quad = new THREE.Mesh( new THREE.PlaneGeometry( globals.width, globals.height, 1, 1 ), quadmat );
		orthoScene.add( quad );
	}



	//globals.composer = new THREE.EffectComposer( renderer );


	if( globals.composer ) {
		app.depthTarget = new THREE.WebGLRenderTarget( window.innerWidth, window.innerHeight, { minFilter: THREE.NearestFilter, magFilter: THREE.NearestFilter, format: THREE.RGBAFormat } );


		app.effectSSAO = new THREE.ShaderPass( THREE.SSAOShader );
		app.effectSSAO.uniforms[ 'tDepth' ].value = app.depthTarget;
		//app.effectSSAO.uniforms[ 'size' ].value.set( window.innerWidth, window.innerHeight );
		app.effectSSAO.uniforms[ 'size' ].value.set( 2048, 2048 );
		app.effectSSAO.uniforms[ 'cameraNear' ].value = camera.near;
		app.effectSSAO.uniforms[ 'cameraFar' ].value = camera.far;
		app.effectSSAO.uniforms[ 'onlyAO' ].value = 0;
		//app.effectSSAO.renderToScreen = true;


		app.depthPassPlugin = new THREE.DepthPassPlugin();
		app.depthPassPlugin.renderTarget = app.depthTarget;
		renderer.addPrePlugin( app.depthPassPlugin );

		app.effectBloom = new THREE.BloomPass( 1.8, 13, 1.8, 512 );

		app.effectFXAA = new THREE.ShaderPass( THREE.FXAAShader );
		app.effectFXAA.uniforms[ 'resolution' ].value.set( 1 / globals.width, 1 / globals.height );
		app.effectFXAA.renderToScreen = true;



		globals.composer.addPass( new THREE.RenderPass( scene, camera ) );
		globals.composer.addPass( app.effectSSAO );
		globals.composer.addPass( app.effectBloom );
		globals.composer.addPass( app.effectFXAA );

	}


	
       	
	
	var spotlight = new THREE.SpotLight(0xFFFFFFFF);
	spotlight.position.set(0,30,0);
	spotlight.intensity = 1;
	//spotlight.shadowCameraVisible = true;
	//spotlight.shadowDarkness = 0.95;
	//spotlight.exponent = 1;
	//spotlight.distance = 96.0;
	//spotlight.angle = Math.PI/3;
	//spotlight.castShadow = app.shadow;
	// change the direction this spotlight is facing
	var lightTarget = new THREE.Object3D();
	lightTarget.position.set(0,-10,0);
	spotlight.target = lightTarget;


	if( app.shadow ) {      
                spotlight.castShadow = app.shadow;

                spotlight.shadowMapWidth = 4096;
                spotlight.shadowMapHeight = 4096;

                spotlight.shadowCameraNear = 1;
                spotlight.shadowCameraFar = 60;
                spotlight.shadowCameraFov = 90;
        }

	// common material parameters

	var ambient = 0x050505, diffuse = 0x331100, specular = 0xffffff, shininess = 10, scale = 23;

	/*
	var path = "textures/cube/SwedishRoyalCastle/";
	var format = '.jpg';
	var urls = [
			path + 'px' + format, path + 'nx' + format,
			path + 'py' + format, path + 'ny' + format,
			path + 'pz' + format, path + 'nz' + format
		];

	var reflectionCube = THREE.ImageUtils.loadTextureCube( urls );
	*/


	// normal map shader

	/*
	var shader = THREE.ShaderLib[ "normalmap" ];
	var uniforms = THREE.UniformsUtils.clone( shader.uniforms );

	uniforms[ "enableAO" ].value = true;
	uniforms[ "enableDiffuse" ].value = true;
	uniforms[ "enableSpecular" ].value = true;
	uniforms[ "enableReflection" ].value = true;
	uniforms[ "enableDisplacement" ].value = false;

	//uniforms[ "tNormal" ].value = THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'dplate/normal.bmp', 10 );
	//uniforms[ "tAO" ].value = THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'dplate/ao.bmp', 10 );
	//uniforms[ "tDiffuse" ].value = THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'dplate/diffuse.bmp',10 );
	//uniforms[ "tSpecular" ].value = THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'dplate/specular_strength.bmp', 10 );
	//uniforms[ "tDisplacement" ].value = THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'dplate/bump.bmp', 10 );
	

	uniforms[ "tNormal" ].value = THREE.ImageUtils.loadTexture( PATCH.img_path+'dplate/normal.bmp' );
	uniforms[ "tAO" ].value = THREE.ImageUtils.loadTexture( PATCH.img_path+'dplate/ao.bmp' );
	uniforms[ "tDiffuse" ].value = THREE.ImageUtils.loadTexture( PATCH.img_path+'dplate/diffuse.bmp');
	uniforms[ "tSpecular" ].value = THREE.ImageUtils.loadTexture( PATCH.img_path+'dplate/specular_strength.bmp' );
	uniforms[ "tDisplacement" ].value = THREE.ImageUtils.loadTexture( PATCH.img_path+'dplate/bump.bmp' );



	//uniforms[ "uDisplacementBias" ].value = - 0.428408;
	//uniforms[ "uDisplacementScale" ].value = 0.436143;

	//uniforms[ "uNormalScale" ].value.y = -1;
	uniforms[ "uNormalScale" ].value.y = 1;

	uniforms[ "uDiffuseColor" ].value.setHex( diffuse );
	uniforms[ "uSpecularColor" ].value.setHex( specular );
	uniforms[ "uAmbientColor" ].value.setHex( ambient );

	uniforms[ "uShininess" ].value = shininess;

	uniforms[ "tCube" ].value = reflectionCube;
	uniforms[ "uReflectivity" ].value = 0.1;
	uniforms[ "uRepeat" ].value = new THREE.Vector2(10, 10);

	uniforms[ "uDiffuseColor" ].value.convertGammaToLinear();
	uniforms[ "uSpecularColor" ].value.convertGammaToLinear();
	uniforms[ "uAmbientColor" ].value.convertGammaToLinear();


	var material1 = new THREE.ShaderMaterial({ 
		fragmentShader: shader.fragmentShader, 
		vertexShader: shader.vertexShader, 
		uniforms: uniforms, 
		lights: true, 
		fog: false 
	});
	*/

	app.materials['simplex'] = new THREE.MeshPhongMaterial({ 
		//color: 0xffffff,
		specular: 0xffffff,
		map: THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'dplate/diffuse.bmp',10 ),
		bumpMap: THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'dplate/bump.bmp', 10 ),
		specularMap: THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'dplate/specular_strength.bmp', 10 ),
		normalMap: THREE.ImageUtils.loadTiledTexture( PATCH.img_path+'dplate/normal.bmp', 10 ),
		//envMap: reflectionCube,
		normalScale: new THREE.Vector2( 8.0, 8.0 ),
		reflectivity: 9.1,
		bumpScale: 6.0
	});





	app.materials['floor'] = new THREE.MeshPhongMaterial({ 
		color: 0xffffff,
		//specular: 0xffffff,
		map: PATCH.images['checker'],
		bumpMap: PATCH.images['checker'],
		specularMap: PATCH.images['checker'],
		shadowBias: 0.001,
		//bumpScale: -1.5,
		metal: true//,
		//shininess: 10
	});


	
	app.materials['floorx'] = new THREE.MeshPhongMaterial({ 
		color: 0x404040,
		map: PATCH.images['checker']
	});

	app.materials['simple'] = new THREE.MeshPhongMaterial({ 
		color: 0xffffff,
		map: PATCH.images['checker'],
		bumpMap: PATCH.images['checker'],
		specularMap: PATCH.images['checker'],
		shadowBias: 0.001
	});

	app.materials['simple2'] = new THREE.MeshPhongMaterial({ 
		color: 0xffffff,
		map: PATCH.images['checker'],
		bumpMap: PATCH.images['checker'],
		specularMap: PATCH.images['checker'],
		shadowBias: 0.001,
	});




	var spherex = new THREE.IcosahedronGeometry( 3.0, 5 );
	//app.meshx = new THREE.Mesh( spherex, app.materials.simple2);
	app.meshx = new THREE.Mesh( spherex, app.materials.simple2);
	
	app.meshx.position.set( 0, 18, 0);
	app.meshx.castShadow = app.shadow;
	app.meshx.receiveShadow = app.shadow;
	
	scene.add( app.meshx );


	var spherey = new THREE.IcosahedronGeometry( 3.0, 5 );
	spherey.computeTangents();
	app.meshy = new THREE.Mesh( spherey, app.materials.simple );
	//app.meshy = new THREE.Mesh( spherey, material1);
	
	app.meshy.position.set( 5, 6, -5 );
	app.meshy.castShadow = app.shadow;
	app.meshy.receiveShadow = app.shadow;
	
	scene.add( app.meshy );

	camera.lookAt( app.meshx.position );




	app.cubes = new Array();
	app.cubes.push( new THREE.Mesh( new THREE.CubeGeometry( 5, 5, 5 ), new THREE.MeshPhongMaterial({ color: 0xffffff })) );
	app.cubes.push( new THREE.Mesh( new THREE.CubeGeometry( 5, 5, 5 ), new THREE.MeshPhongMaterial({ color: 0xffffff })) );
	app.cubes.push( new THREE.Mesh( new THREE.CubeGeometry( 5, 5, 5 ), new THREE.MeshPhongMaterial({ color: 0xffffff })) );
	
	app.cubes[0].position.set(  4, 2, 5 );
	app.cubes[0].castShadow = app.shadow;
	app.cubes[0].receiveShadow = app.shadow;
	app.cubes[1].position.set( 2, 4, 7 );
	app.cubes[1].castShadow = app.shadow;
	app.cubes[1].receiveShadow = app.shadow;
	app.cubes[2].position.set( -2, 3, 9 );
	app.cubes[2].castShadow = app.shadow;
	app.cubes[2].receiveShadow = app.shadow;

	scene.add( app.cubes[0] );	
	scene.add( app.cubes[1] );	
	scene.add( app.cubes[2] );	



	if( app.floor == true ) {
		//var floor = new THREE.Mesh( new THREE.PlaneGeometry(50, 50, 10, 10), app.materials.floor );
		var floorgeo = new THREE.PlaneGeometry(50, 50, 10, 10);
		floorgeo.computeTangents();
		//var floor = new THREE.Mesh( floorgeo, material1 );
		var floor = new THREE.Mesh( floorgeo, app.materials.floor );
		floor.receiveShadow = app.shadow;
		floor.rotation.x = -(Math.PI / 2);
		scene.add(floor);

	}

	scene.add(lightTarget);
	scene.add(spotlight);



	/*
	var spherex = new THREE.IcosahedronGeometry( 20.1, 5 );
	app.meshx = new THREE.Mesh( 
		spherex,	
		PATCH.materials.explode	
	);
	app.meshx.scale.set( 0.3, 0.3, 0.3 );
	app.meshx.position.set( 0, 6, 0);
	*/

	onWindowResize();

	window.addEventListener( 'resize', onWindowResize, false );
	document.addEventListener( 'mousemove', onDocumentMouseMove, false );
	document.addEventListener( 'mousedown', onDocumentMouseDown, false );
	document.addEventListener( 'mouseup', onDocumentMouseUp, false );


	cLog('Note, the same material that casts shadow cannot recv shadow.');

}








function animate() {

	TWEEN.update();	

	requestAnimationFrame( animate );
	update();
	render();		

}




function update() {

	var isXpressed = keyboard.pressed("x");
	var isRpressed = keyboard.pressed("r");
	var isCpressed = keyboard.pressed("c");
	var isYpressed = keyboard.pressed("y");

	var isUPpressed = keyboard.pressed("w");
	var isDOWNpressed = keyboard.pressed("s");

	var isESCpressed = keyboard.pressed("escape");
	//var isCONSOLEpressed = keyboard.pressed("backtick");
	var isCONSOLEpressed = keyboard.pressed("tab");



	if( isCONSOLEpressed ) {

		keyboard.pause();
		//cLog("console: "+app.console );
		//controls.enabled = false;
		//app.console = app.console == 1 ? 0 : 1;
		document.getElementById('cmdline').style.display = '';

		return;

	}

	if( isCpressed ) {
		ootput.innerHTML = "";
		realminfo.innerHTML = "";
	}


	if ( isRpressed ) {
		//flyTo( app.meshx.position );
		//camera.updateProjectionMatrix();
		console.log("CAMERA X:"+camera.position.x+" Y:"+camera.position.y+" Z:"+camera.position.z);

	}

	if( isESCpressed ) {
		//flyTo( app.hosts[0].mesh.position );
		if( controls != undefined ) {
			flyTo( scene.position );
			//flyTo( app.lavatorus.position );
		} else {
			//camera.position.set(-5,5,-5);
			camera.lookAt(scene.position);	

		}
	
		app.current_selection = scene.position;
	}

	

	if( controls ) { controls.update(); }
	//stats.update();
}


function render() {
	


	var delta = 5 * clock.getDelta();

	var timer = Date.now() * 0.0001;
	var ltime = ( (new Date()).getTime() - app.startx )/1000.0;

	if( last_update == null || last_update == 0 ) last_update = timer;

	/*
	app.materials.matrix.uniforms[ 'time' ].value = .00002 * ( Date.now() - app.start );
	app.materials.trixy.uniforms[ 'time' ].value = .00002 * ( Date.now() - app.start );
	app.materials.test.uniforms[ 'time' ].value = .0002 * ( Date.now() - app.start );
	*/
	//PATCH.materials.lava.uniforms.time.value += 0.2 * delta;
	//PATCH.materials.matrix.uniforms.time.value = .00002 * ( Date.now() - app.start );
	//PATCH.materials.explode.uniforms.time.value = .00025 * ( Date.now() - app.start );

	
	//app.materials.shaderx.uniforms.iGlobalTime.value = .00025 * ( Date.now() - app.start );
	//app.materials.clouds.uniforms.iGlobalTime.value = .0025 * ( Date.now() - app.start );
	//app.materials.digiheart.uniforms.iGlobalTime.value = .00025 * ( Date.now() - app.start );

	//app.materials.sun.uniforms.iGlobalTime.value = .0001 * ( Date.now() - app.start );
	//app.materials.sun.uniforms.iGlobalTime.value = ltime;
	//app.materials.clouds.uniforms.iGlobalTime.value = ltime;
	//app.materials.fireball.uniforms.iGlobalTime.value = ltime;
	//app.materials.hell.uniforms.iGlobalTime.value = ltime;
	//app.materials.warp.uniforms.iGlobalTime.value = ltime;
	//app.materials.glassdist.uniforms.iGlobalTime.value = ltime;
	//app.materials.starnest.uniforms.iGlobalTime.value = ltime;
	//app.materials.snowy.uniforms.iGlobalTime.value = ltime;
	//app.materials.chromatic.uniforms.iGlobalTime.value = ltime;
	//app.materials.relentless.uniforms.iGlobalTime.value = ltime;
	//app.materials.fire.uniforms.iGlobalTime.value = ltime;
	//app.materials.oceanic.uniforms.iGlobalTime.value = ltime;
	//app.materials.oldvideo.uniforms.iGlobalTime.value = ltime;
	app.materials.testing.uniforms.iGlobalTime.value = ltime;

	if( globals.composer != undefined ) {

		renderer.autoClear = false;
		renderer.autoUpdateObjects = true;
		renderer.shadowMapEnabled = true;
		app.depthPassPlugin.enabled = true;

		renderer.render( scene, camera, globals.composer.renderTarget2, true );

		renderer.shadowMapEnabled = false;
		app.depthPassPlugin.enabled = false;

		// do postprocessing

		globals.composer.render(0.1);


	} else {

		//renderer.render( scene, camera, app.renderDest, true );
		renderer.render( scene, camera );
		if( orthoCamera ) renderer.render( orthoScene, orthoCamera );
		if( cssrenderer ) cssrenderer.render( cssScene, camera );
	}

}

init();
animate();

</script>


</body>
</html>
