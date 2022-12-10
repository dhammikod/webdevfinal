<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home() {
        return view('welcome', [
            'pagetitle' => 'Home'
        ]);
    }

    public function catalog() {
        return view('catalog', [
            'pagetitle' => 'Catalog'
        ]);
    }

    public function login() {
        return view('login', [
            'pagetitle' => 'Login'
        ]);
    }

    public function signin() {
        return view('signin', [
            'pagetitle' => 'Sign In'
        ]);
    }

    public function wishlist() {
        return view('wishlist', [
            'pagetitle' => 'Wishlist'
        ]);
    }

    public function cart() {
        return view('cart', [
            'pagetitle' => 'Cart'
        ]);
    }
}