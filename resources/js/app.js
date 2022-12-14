import './bootstrap';

import Alpine from 'alpinejs';

import * as THREE from 'three';

import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

import { DRACOLoader } from 'three/addons/loaders/DRACOLoader.js';

import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls';

import { RenderPass } from 'three/examples/jsm/postprocessing/RenderPass';

import { EffectComposer } from 'three/examples/jsm/postprocessing/EffectComposer';

import { UnrealBloomPass } from 'three/examples/jsm/postprocessing/UnrealBloomPass';

import { GUI } from 'dat.gui'

window.THREE = THREE;

window.Alpine = Alpine;

window.GLTFLoader = GLTFLoader;

window.DRACOLoader = DRACOLoader;

window.OrbitControls = OrbitControls;

window.RenderPass = RenderPass;

window.EffectComposer = EffectComposer;

window.UnrealBloomPass = UnrealBloomPass;

window.GUI = GUI;

Alpine.start();
