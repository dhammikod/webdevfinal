//scene and camera declaration
// const orbit = new OrbitControls(camera, renderer.domElement);

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

const renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth, window.innerHeight );
document.body.appendChild( renderer.domElement );

//2 lines for developing helper
const axeshelper = new THREE.AxesHelper(10);
scene.add(axeshelper);

//orbital control
camera.position.z = 5;
camera.position.y = 2;
// const orbit = new OrbitControls(camera, renderer.domElement);
// orbit.update();

//for the materials
const boxgeometry = new THREE.BoxGeometry();
const boxmaterial = new THREE.MeshBasicMaterial({color: 0x00FF00});
const box = new THREE.Mesh(boxgeometry, boxmaterial);
scene.add(box);

//rendering, insert code above not below
renderer.render( scene, camera );