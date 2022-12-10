<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/catalog', [Controller::class, 'catalog']);

Route::get('/login', [Controller::class, 'login']);

Route::get('/signin', [Controller::class, 'signin']);

Route::get('/cart', [Controller::class, 'cart']);

Route::get('/wishlist', [Controller::class, 'wishlist']);



Route::get('/', [Controller::class, 'home']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
