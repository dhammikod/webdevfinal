<?php

namespace App\Http\Controllers;

use App\Models\wishlist;
use App\Http\Requests\StorewishlistRequest;
use App\Http\Requests\UpdatewishlistRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $wishlists = DB::table('wishlists')
        ->where('user_id', '=', $user->id)
        ->get();


        
        // $items = [];
        // foreach($wishlists as $item){
        //     array_push($items, DB::table('items')
        //     ->where('id', '=', $item->item_id)
        //     ->get());   
        // }

        //getting the items with extra dolomn named stocked
        $stockeditems = [];
        foreach($wishlists as $item){
                array_push($stockeditems, DB::table('items')
                ->select('items.id', 'items.nama', 'items.price', 'items.description', DB::raw('(EXISTS( SELECT 1 FROM `item_size_stocks` item_size_stocks WHERE item_size_stocks.stock > 0 AND item_size_stocks.id_item = items.id)) AS stocked'), DB::raw($item->id. " AS id_wishlist"))
                ->where('id', '=', $item->item_id)
                ->get()); 
            }
              
        return view('wishlist', [
            'pagetitle' => 'Wishlist',
            'tes' => $wishlists,
            'wishlistitems' => $stockeditems
        ]);
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
     * @param  \App\Http\Requests\StorewishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorewishlistRequest $request)
    {
        if(!DB::table('wishlists')
        ->where('item_id', '=', $request->itemid)
        ->where('user_id', '=', $request->userid)
        ->exists()){
            wishlist::create([
                'item_id' => $request->itemid,
                'user_id' => $request->userid,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewishlistRequest  $request
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatewishlistRequest $request, wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = wishlist::findOrFail($id);

        $wishlist->delete();

        return redirect()->back();
    }
}
