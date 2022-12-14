<?php

namespace App\Http\Controllers;

use App\Models\shopping_cart;
use App\Http\Requests\Storeshopping_cartRequest;
use App\Http\Requests\Updateshopping_cartRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeshopping_cartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeshopping_cartRequest $request)
    {
        if(!DB::table('shopping_carts')
        ->where('item_id', '=', $request->itemid)
        ->where('user_id', '=', $request->userid)
        ->exists()){
            shopping_cart::create([
                'item_id' => $request->itemid,
                'user_id' => $request->userid,
                'jumlah' => $request->qty,
                'item_size_stock_id' => $request->size,
            ]);
        }
        return redirect('/catalog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function show(shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function edit(shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateshopping_cartRequest  $request
     * @param  \App\Models\shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function update(Updateshopping_cartRequest $request, shopping_cart $shopping_cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shopping_cart  $shopping_cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = shopping_cart::findOrFail($id);

        $wishlist->delete();

        return redirect()->back();
    }
}
