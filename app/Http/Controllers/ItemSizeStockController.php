<?php

namespace App\Http\Controllers;

use App\Models\item_size_stock;
use App\Http\Requests\Storeitem_size_stockRequest;
use App\Http\Requests\Updateitem_size_stockRequest;

class ItemSizeStockController extends Controller
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
     * @param  \App\Http\Requests\Storeitem_size_stockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeitem_size_stockRequest $request)
    {
        item_size_stock::create([
            'id_item' => $request->id,
            'stock' => $request->stock,
            'size' => $request->SIZE,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item_size_stock  $item_size_stock
     * @return \Illuminate\Http\Response
     */
    public function show(item_size_stock $item_size_stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item_size_stock  $item_size_stock
     * @return \Illuminate\Http\Response
     */
    public function edit(item_size_stock $item_size_stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateitem_size_stockRequest  $request
     * @param  \App\Models\item_size_stock  $item_size_stock
     * @return \Illuminate\Http\Response
     */
    public function update(Updateitem_size_stockRequest $request, $id)
    {
        $item_size_stocks = item_size_stock::findOrFail($id);
        $item_size_stocks->update([
            'id_item' => $request->id,
            'stock' => $request->stock,
            'size' => $request->SIZE,
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item_size_stock  $item_size_stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(item_size_stock $item_size_stock)
    {
        //
    }
}
