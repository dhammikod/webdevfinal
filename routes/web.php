<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ItemRequestController;
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

Route::get('/admin-dashboard', [Controller::class, 'adminDashboard'])->middleware(['auth', 'verified'])->name('admin-dashboard');;

Route::get('/admin-profile', [Controller::class, 'adminProfile'])->middleware(['auth', 'verified'])->name('admin-profile');;
Route::post('admin-profile', [RegisteredUserController::class, 'updateAdmin']);

Route::get('/admin-item_requests', [Controller::class, 'adminItem_requests'])->middleware(['auth', 'verified'])->name('admin-item_requests');;


Route::get('/admin-items', [Controller::class, 'adminItem'])->middleware(['auth', 'verified'])->name('admin-items');;


Route::get('/admin-billing_options', [Controller::class, 'adminBilling_options'])->middleware(['auth', 'verified'])->name('admin-billing_options');;

Route::get('/admin-manage_account', [Controller::class, 'adminManage_account'])->middleware(['auth', 'verified'])->name('admin-manage_account');
Route::post('/admin-manage_accountDelete', [RegisteredUserController::class, 'deleteAdmin']);
Route::post('/admin-manage_accountAdd', [RegisteredUserController::class, 'AdminStore']);

Route::get('/admin-orders', [Controller::class, 'adminOrders'])->middleware(['auth', 'verified'])->name('admin-orders');

Route::get('/admin-website_feedbacks', [Controller::class, 'adminWebsite_feedbacks'])->middleware(['auth', 'verified'])->name('admin-website_feedbacks');

Route::get('/dashboard', [Controller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('dashboard', [RegisteredUserController::class, 'update']);

Route::get('/makeaddress', [Controller::class, 'makeaddress']);
// Route::post('/makeaddress', [ShippingAddressController::class, 'store']);

Route::resource('shipping_address', ShippingAddressController::class);

Route::resource('item_requests', ItemRequestController::class);
require __DIR__.'/auth.php';
