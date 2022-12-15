<?php

namespace App\Http\Controllers;

use App\Models\item_picture;
use App\Http\Requests\Storeitem_pictureRequest;
use App\Http\Requests\Updateitem_pictureRequest;

class ItemPictureController extends Controller
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
     * @param  \App\Http\Requests\Storeitem_pictureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeitem_pictureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item_picture  $item_picture
     * @return \Illuminate\Http\Response
     */
    public function show(item_picture $item_picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item_picture  $item_picture
     * @return \Illuminate\Http\Response
     */
    public function edit(item_picture $item_picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateitem_pictureRequest  $request
     * @param  \App\Models\item_picture  $item_picture
     * @return \Illuminate\Http\Response
     */
    public function update(Updateitem_pictureRequest $request, item_picture $item_picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item_picture  $item_picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(item_picture $item_picture)
    {
        //
    }
}
