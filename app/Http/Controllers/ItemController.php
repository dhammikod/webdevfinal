<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
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
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        // $this->validate($request, [
        //     "postal_code" => 'required|integer',
        //     "shipment_address" => 'required|string|max:155',
        //     "contact" => 'required|string|max:155',
        //     "city" => 'required|string|max:155',
        //     "notes" => 'required|string|max:155',
        // ]);

        Item::create([
            'nama' => $request->nama,
            'price' => $request->price,
            'sold' => 0,
            'description' => $request->description,
            'category' => $request->category,
        ]);
        return redirect('/admin-items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin-update-items", [
            "item" =>Item::findOrFail($id),
            'pagetitle'=>"Update items",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, $id)
    {
        $Item = Item::findOrFail($id);

        $Item->update([
            'nama' => $request->nama,
            'price' => $request->price,
            'description' => $request->description,
            'category' => $request->category,
        ]);

        

        return redirect('/admin-items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        $item->delete();

        return redirect('/admin-items');
    }
}
