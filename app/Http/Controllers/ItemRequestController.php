<?php

namespace App\Http\Controllers;

use App\Models\item_request;
use App\Http\Requests\Storeitem_requestRequest;
use App\Http\Requests\Updateitem_requestRequest;

class ItemRequestController extends Controller
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
     * @param  \App\Http\Requests\Storeitem_requestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeitem_requestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item_request  $item_request
     * @return \Illuminate\Http\Response
     */
    public function show(item_request $item_request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\item_request  $item_request
     * @return \Illuminate\Http\Response
     */
    public function edit(item_request $item_request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateitem_requestRequest  $request
     * @param  \App\Models\item_request  $item_request
     * @return \Illuminate\Http\Response
     */
    public function update(Updateitem_requestRequest $request, item_request $item_request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item_request  $item_request
     * @return \Illuminate\Http\Response
     */
    public function destroy(item_request $item_request)
    {
        //
    }
}
