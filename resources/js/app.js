import './bootstrap';

import Alpine from 'alpinejs';

import * as THREE from 'three';

import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';

window.THREE = THREE;

window.Alpine = Alpine;

window.GLTFLoader = GLTFLoader;

window.OrbitControls = OrbitControls;

Alpine.start();
