<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\item_picture;
use App\Models\item_size_stock;
use App\Models\order;
use App\Models\shipping_address;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        return view('welcome', [
            'pagetitle' => 'Home'
        ]);
    }

    public function catalog()
    {
        return view('catalog', [
            $itemSizeStocks = DB::table('item_size_stocks')->get(),
            'pagetitle' => 'Catalog',
            'item' => Item::all(),    
            'itemPictures' => item_picture::all(),      
            'itemSizeStocks' => $itemSizeStocks
 
        ]);
    }

    public function productDetails($id)
    {
        $items = DB::table('items')
        ->where('id', $id)
        ->get();
        $pics = DB::table('item_pictures')
        ->where('id_item', $id)
        ->get();
        $sizestock = DB::table('item_size_stocks')
        ->where('id_item', $id)
        ->get();

        return view('product-details', [
            'pagetitle' => 'Product Details',
            'items' => $items,
            'itemPictures' => $pics,      
            'itemSizeStocks' => $sizestock
 
        ]);
    }

    public function login()
    {
        return view('login', [
            'pagetitle' => 'Login'
        ]);
    }

    public function makeaddress()
    {
        return view('makeaddress', [
            'pagetitle' => 'makeaddress',  
        ]);
    }

    public function signin() {
        return view('signin', [
            'pagetitle' => 'Sign In'
        ]);
    }

    public function wishlist()
    {
        return view('wishlist', [
            'pagetitle' => 'Wishlist'
        ]);
    }

    public function cart()
    {
        return view('cart', [
            'pagetitle' => 'Cart'
        ]);
    }

    public function checkout()
    {
        return view('checkout', [
            'pagetitle' => 'Checkout'
        ]);
    }

    public function aboutus()
    {
        return view('aboutus', [
            'pagetitle' => 'About Us'
        ]);
    }

    public function dashboard() {
        $user = Auth::user();
        $id = $user['id'];
        $shipping_addresses = DB::table('shipping_addresses')
        ->where('user_id', '=', $id)
        ->get();
        return view('dashboard', [
            'pagetitle' => 'Dashboard',
            "shipping_addresses" => $shipping_addresses
        ]);
    }

    public function adminDashboard()
    {
        return view('admin-dashboard', [
            'pagetitle' => 'Admin Dashboard'
        ]);
    }

    public function adminProfile()
    {
        return view('admin-profile', [
            'pagetitle' => 'Admin Profile',
        ]);
    }

    public function adminItem_requests()
    {
        return view('admin-item_requests', [
            'pagetitle' => 'Admin Item Requests'
        ]);
    }

    public function adminItem()
    {
        return view('admin-items', [
            'pagetitle' => 'Admin Item',
            'item' => Item::all()          
        ]);
    }

    public function adminBilling_options()
    {
        return view('admin-billing_options', [
            'pagetitle' => 'Admin Billing'
        ]);
    }

    public function adminManage_account()
    {
        return view('admin-manage_account', [
            'pagetitle' => 'Admin Manage Accounts',
            'user' => User::all()
        ]);
    }

    public function adminOrders()
    {
        return view('admin-orders', [
            'pagetitle' => 'Admin Orders',
            'order' => order::all()          
        ]);
    }

    public function adminWebsite_feedbacks()
    {
        return view('admin-website_feedbacks', [
            'pagetitle' => 'Admin Website Feedbacks'
        ]);
    }
}
