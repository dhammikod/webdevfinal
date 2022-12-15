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

Route::get('/', [Controller::class, 'home']);

Route::get('/catalog', [Controller::class, 'catalog']);

Route::get('/cart', [Controller::class, 'cart']);

Route::get('/checkout', [Controller::class, 'checkout']);

Route::get('/wishlist', [Controller::class, 'wishlist']);

Route::get('/aboutus', [Controller::class, 'aboutus']);

// Route::get('/dashboard', [Controller::class, 'dashboard']);

Route::get('/admin-dashboard', [Controller::class, 'adminDashboard']);

Route::get('/admin-profile', [Controller::class, 'adminProfile']);

Route::get('/admin-item_requests', [Controller::class, 'adminItem_requests']);

Route::get('/admin-billing_options', [Controller::class, 'adminBilling_options']);

Route::get('/admin-manage_accounts', [Controller::class, 'adminManage_accounts']);

Route::get('/admin-orders', [Controller::class, 'adminOrders']);

Route::get('/admin-website_feedbacks', [Controller::class, 'adminWebsite_feedbacks']);


Route::get('/dashboard', function () {
    return view('dashboard', [
        'pagetitle' => 'Dashboard'
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
