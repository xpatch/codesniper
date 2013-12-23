#ifdef GL_ES
precision highp float;
#endif

uniform vec3 BrickColor, MortarColor;
uniform vec3 BrickSize;
uniform vec3 BrickPct;

varying vec3 vColor;
varying vec3 localPos;
void main()
{
    vec3 color;
	vec3 position, useBrick;
	

	position = localPos / BrickSize.xyz;

	if (fract(position.y * 0.5) > 0.5){
		position.x += 0.5;
        position.z += 0.5;
	}
    
	position = fract(position);

	useBrick = step(position, BrickPct.xyz);

	color = mix(MortarColor, BrickColor, useBrick.x * useBrick.y * useBrick.z);
	color *= vColor;

	gl_FragColor = vec4(color, 1.0);
}

