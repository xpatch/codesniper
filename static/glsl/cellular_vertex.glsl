attribute vec3 vertex;
attribute vec3 normal;
attribute vec2 uv1;

uniform mat4 _mvProj;
uniform mat4 _m;
uniform mat3 _norm;
uniform float _time;

varying vec2 uv;
varying vec3 pos;

void main(void) {
	// compute position
	gl_Position = _mvProj * vec4(vertex, 1.0);
	pos = (_m * vec4(vertex, 1.0)).xyz;
	uv = uv1;
} 
