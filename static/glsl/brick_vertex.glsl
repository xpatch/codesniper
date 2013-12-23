attribute vec3 vertex;
attribute vec3 normal;

uniform mat4 _mvProj;
uniform mat3 _norm;

varying vec3 vColor;
varying vec3 localPos;

#pragma include "light.glsl"

// constants
vec3 materialColor = vec3(1.0,0.7,0.8);
vec3 specularColor = vec3(1.0,1.0,1.0);

void main(void) {
 // compute position
 gl_Position = _mvProj * vec4(vertex, 1.0);

 localPos = vertex;

 // compute light info
 vec3 n = normalize(_norm * normal);
 vec3 diffuse;
 float specular;
 float glowingSpecular = 50.0;
 getDirectionalLight(n, _dLight, glowingSpecular, diffuse, specular);
 vColor = max(diffuse,_ambient.xyz)*materialColor+specular*specularColor+_ambient;
} 
