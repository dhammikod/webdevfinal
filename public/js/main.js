//basic things
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

const renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth, window.innerHeight );
document.body.appendChild( renderer.domElement );
renderer.shadowMap.enabled = true;

//for helping the development process
const axesHelper = new THREE.AxesHelper(5);
scene.add(axesHelper);

//orbit camera
const orbit = new OrbitControls(camera, renderer.domElement);
camera.position.z = 5;
camera.position.y = 3;
//must be declared after camera position declaration
orbit.update();

//creating the plane
const planeform = new THREE.PlaneGeometry(100,100);
const planecolour = new THREE.MeshStandardMaterial({color: 0xFFFFFF});
const plane = new THREE.Mesh(planeform, planecolour);
scene.add(plane);
plane.rotation.x = -0.5 * Math.PI;
plane.receiveShadow = true;

//membuat object
const loader = new GLTFLoader();

    loader.load( '/3d/building.glb', function ( glb ) {
        const model = glb.scene;

        scene.add( model );
		model.traverse(function(node){
			if(node.isMesh){
				node.castShadow = true;
				node.receiveShadow = true;
			}
		});
		model.receiveShadow = true;

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
const directionallight1 = new THREE.DirectionalLight(0xFFFFFF, 1);
scene.add(directionallight1);
directionallight1.position.set(-10, 30, 0);
directionallight1.castShadow = true;
directionallight1.shadow.camera.bottom = -100;

const dlight1shadowHelper = new THREE.CameraHelper(directionallight1.shadow.camera);
scene.add(dlight1shadowHelper);

const ambientlight = new THREE.AmbientLight(0x333333);
scene.add(ambientlight);


const helper = new THREE.DirectionalLightHelper(directionallight1);
scene.add(helper);

//tes2
// let step = 0;
// let speed = 0.01;

//refresh the page
function animate() {
	requestAnimationFrame( animate );

	//tes2
	// step += speed;
	// ril.position.y = 10 * Math.abs(Math.sin(step)); 

	renderer.render( scene, camera );
};

animate();