<?php

namespace App\Http\Controllers;

use App\Models\NewProduct;
use Illuminate\Http\Request;

class NewProductController extends Controller
{
    public function index() {
        return view('new', [
            'title' => "What's New",
            'new_products' => NewProduct::index()
        ]);
    }
}
