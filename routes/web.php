<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\UserCOntroller;
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

Route::get('/admin-dashboard', [Controller::class, 'adminDashboard']);

Route::get('/admin-profile', [Controller::class, 'adminProfile']);

Route::get('/admin-item_requests', [Controller::class, 'adminItem_requests']);

Route::get('/admin-billing_options', [Controller::class, 'adminBilling_options']);

Route::get('/admin-manage_accounts', [Controller::class, 'adminManage_accounts']);

Route::get('/admin-orders', [Controller::class, 'adminOrders']);

Route::get('/admin-website_feedbacks', [Controller::class, 'adminWebsite_feedbacks'])->middleware(['auth', 'verified'])->name('admin-website_feedbacks');

Route::get('/dashboard', [Controller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('dashboard', [RegisteredUserController::class, 'update']);

Route::get('/makeaddress', [Controller::class, 'makeaddress']);
// Route::post('/makeaddress', [ShippingAddressController::class, 'store']);

Route::resource('shipping_address', ShippingAddressController::class);

require __DIR__.'/auth.php';
