//basic things
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

//loading screen
const loadingScreen = new THREE.LoadingManager();
// loadingScreen.onStart = function(url, item, total){
// 	console.log('started loading : ${url}')
// }

const progressbar = document.getElementById('progress-bar');
loadingScreen.onProgress = function(url, loaded, total){
	progressbar.value = (loaded / total) * 100;
}
let zoom = 0.0;
const progressbardiv = document.querySelector('.progress-bar-container');
loadingScreen.onLoad = function(){
	progressbardiv.style.display = 'none';
	zoom = 0.3;
}

//onclick
const raycaster = new THREE.Raycaster();
const pointer = new THREE.Vector2();

function onPointerMove( event ) {

	// calculate pointer position in normalized device coordinates
	// (-1 to +1) for both components

	pointer.x = ( event.clientX / window.innerWidth ) * 2 - 1;
	pointer.y = - ( event.clientY / window.innerHeight ) * 2 + 1;

}

function onclick( event ) {

	// calculate pointer position in normalized device coordinates
	// (-1 to +1) for both components

	pointer.x = ( event.clientX / window.innerWidth ) * 2 - 1;
	pointer.y = - ( event.clientY / window.innerHeight ) * 2 + 1;

	raycaster.setFromCamera( pointer, camera );

	// calculate objects intersecting the picking ray
	const intersects = raycaster.intersectObjects( scene.children );

	// if(intersects[ i ] == 94){

	// }
	if(intersects.length > 0){
		// intersects[ 0 ].object.material.color.set( 0xff0000 );
		// console.log(intersects[0].object);
		// console.log(scene.children[2]['children'][96]);
		// console.log(scene.children[2]['children']);
		// console.log(scene.children[2]['children'][47]);
		// console.log(scene.children);
		// console.log(intersects[0]['object']['name']);
		if(intersects[0]['object']['name'] == "log_in" || intersects[0]['object']['name'] == "Cube054_2" || intersects[0]['object']['name'] == "Cube054_1"){
			console.log("berhasil masuk page catalog");
			window.location.assign('/catalog');
		}
		// console.log(intersects[0]['object']['name']);
		if(intersects[0]['object']['name'] == "log_in001" || intersects[0]['object']['name'] == "Cube055_2" || intersects[0]['object']['name'] == "Cube055_1"){
			window.location.assign('/dashboard');

		}
		if(intersects[0]['object']['name'] == "log_in002" || intersects[0]['object']['name'] == "Cube034_2" || intersects[0]['object']['name'] == "Cube034_1"){
			window.location.assign('/dashboard');
		}
		if(intersects[0]['object']['name'] == "log_in003" || intersects[0]['object']['name'] == "Cube052_2" || intersects[0]['object']['name'] == "Cube052_1"){
			window.location.assign('/cart');
		}
		// console.log(scene.children)
		// var tes = 0;
		// while (tes < 100) {
		// 	if(intersects[0]['object'] == scene.children[5]['children'][tes]){
		// 		console.log(tes);
				
		// 		break;
		// 	}
		// 	tes++;
		//   }
		
		
		
	}

}
//scene
const renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth, window.innerHeight );
document.body.appendChild( renderer.domElement );
renderer.shadowMap.enabled = true;
//for helping the development process
// const axesHelper = new THREE.AxesHelper(5);
// scene.add(axesHelper);

//orbit camera
const orbit = new OrbitControls(camera, renderer.domElement);
camera.position.z = 7;
camera.position.y = 7;
//must be declared after camera position declaration
orbit.update();
orbit.target.set(0,3,0);
orbit.enablePan = false;
orbit.minDistance = 9;
orbit.maxDistance = 15;
orbit.maxPolarAngle = Math.PI / 2.2;
orbit.minPolarAngle = Math.PI / 5;


//bloommm
const renderScene = new RenderPass(scene, camera);
const composer = new EffectComposer(renderer);

composer.addPass(renderScene);

//spotlight
// const spotlight = new THREE.SpotLight(0x858179);
// scene.add(spotlight);
// spotlight.castShadow = true;
// spotlight.angle = 0.2;

// spotlight.position.set(-100, 100, 100);

// const ambientlight = new THREE.AmbientLight(0x333333);
// scene.add(ambientlight);

//lampu
let light1, light2, light3, light4;
light1 = new THREE.PointLight( 0xff0040, 0.67, 20 );
light1.position.set( 4.1 , 3, 4.2 );
scene.add( light1 );

light2 = new THREE.PointLight( 0x0040ff, 1.12, 50 );
light2.position.set( 1 , 4, -2 );
scene.add( light2 );

light3 = new THREE.PointLight( 0xede15a, 2, 5 );
light3.position.set( -1 , 7, -1	 );
scene.add( light3 );

light4 = new THREE.PointLight( 0x226827, 1.17, 12 );
light4.position.set( -2 , 2, -1	 );
scene.add( light4 );

// const helper = new THREE.PointLightHelper(light1);
// scene.add(helper);

// const helper2 = new THREE.PointLightHelper(light2);
// scene.add(helper2);

// const helper3 = new THREE.PointLightHelper(light3);
// scene.add(helper3);
// const helper4 = new THREE.PointLightHelper(light4);
// scene.add(helper4);
// function updateLight() {
//   helper4.update();
// }

// class ColorGUIHelper {
//     constructor(object, prop) {
//       this.object = object;
//       this.prop = prop;
//     }
//     get value() {
//       return `#${this.object[this.prop].getHexString()}`;
//     }
//     set value(hexString) {
//       this.object[this.prop].set(hexString);
//     }
//   }

// function makeXYZGUI(gui, vector3, name, onChangeFn) {
//     const folder = gui.addFolder(name);
//     folder.add(vector3, 'x', -10, 10).onChange(onChangeFn);
//     folder.add(vector3, 'y', 0, 10).onChange(onChangeFn);
//     folder.add(vector3, 'z', -10, 10).onChange(onChangeFn);
//     folder.open();
//   }

// const gui = new GUI();
// gui.addColor(new ColorGUIHelper(light4, 'color'), 'value').name('color');
// gui.add(light4, 'intensity', 0, 2, 0.01);
// gui.add(light4, 'distance', 0, 40).onChange(updateLight);

// makeXYZGUI(gui, light4.position, 'position');


//creating the plane
const planeform = new THREE.PlaneGeometry(100,100);
const planecolour = new THREE.MeshStandardMaterial({color: 0x858179});
const plane = new THREE.Mesh(planeform, planecolour);
scene.add(plane);
plane.rotation.x = -0.5 * Math.PI;
plane.receiveShadow = true;


//BLOOMMMM
const bloomPass = new UnrealBloomPass(
	new THREE.Vector2(window.innerWidth, window.innerHeight), 
	1.6,
	0.1,
	0.1
);
composer.addPass(bloomPass);

//membuat object
// const loader = new GLTFLoader();

//     loader.load( '/3d/CYBER.glb', function ( glb ) {
//         const model = glb.scene;

//         scene.add( model );
// 		var i = 0;
// 		// while (i < 99) {
// 		// 	scene.children[2]['children'][i].receiveShadow = true;
// 		// 	scene.children[2]['children'][i].castShadow = true;
// 		// 	i++;
// 		//   }
		
// 		console.log(model);
// 		model.traverse(function(node){
// 			if(node.isMesh){
// 				node.castShadow = true;
// 			}
// 		});
//     }, undefined, function ( error ) {

//         console.error( error );

//     } );

//dracoloader
var loader = new GLTFLoader(loadingScreen);
var dracoLoader = new DRACOLoader();
dracoLoader.setDecoderPath("/3d/draco/");
loader.setDRACOLoader( dracoLoader );

loader.load( '/3d/logdrc.gltf', function ( GLTF ) {
	        const model = GLTF.scene;
	
	        scene.add( model );
			
			// console.log(model);
			model.traverse(function(node){
				if(node.isMesh){
					node.castShadow = true;
				}
			});
	    }, undefined, function ( error ) {
	
	        console.error( error );
	
	    } );

//tes
// const sphere = new THREE.SphereGeometry(4);
// const spheremat = new THREE.MeshStandardMaterial( { color: 0x00ff00, wireframe: false } );
// const ril = new THREE.Mesh(sphere, spheremat);
// scene.add(ril);
// ril.position.set(-10,10,0);
// ril.castShadow = true;


//lighting
// const directionallight1 = new THREE.DirectionalLight(0xFFFFFF, 1);
// scene.add(directionallight1);
// directionallight1.position.set(-10, 30, 0);
// directionallight1.castShadow = true;
// directionallight1.shadow.camera.bottom = -100;
// directionallight1.shadow.radius = 10;

// const dlight1shadowHelper = new THREE.CameraHelper(spotlight.shadow.camera);
// scene.add(dlight1shadowHelper);




// const helper = new THREE.DirectionalLightHelper(directionallight1);
// scene.add(helper);

// tes2
// let step = 0;
let speed = 0.01;

//refresh the page
function animate() {
	// requestAnimationFrame( animate );

	// tes2
	// step += speed;
	// ril.position.y = 10 * Math.abs(Math.sin(step)); 

	if(zoom < 1.2){
		zoom += speed;
		camera.position.y = 10 * Math.abs(Math.sin(zoom));
		camera.position.z = 10 * Math.abs(Math.sin(zoom));
	}
	
	

	renderer.render( scene, camera );

	composer.render();
	requestAnimationFrame(animate);
};

function onWindowResize() {

	camera.aspect = window.innerWidth / window.innerHeight;
	camera.updateProjectionMatrix();

	renderer.setSize( window.innerWidth, window.innerHeight );

}

addEventListener( 'pointermove', onPointerMove );
addEventListener( 'click', onclick );
addEventListener( 'resize', onWindowResize );
animate();