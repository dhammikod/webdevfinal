<?php

namespace App\Http\Controllers;

use App\Models\shipping_address;
use App\Http\Requests\Storeshipping_addressRequest;
use App\Http\Requests\Updateshipping_addressRequest;

class ShippingAddressController extends Controller
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
     * @param  \App\Http\Requests\Storeshipping_addressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeshipping_addressRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function show(shipping_address $shipping_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function edit(shipping_address $shipping_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateshipping_addressRequest  $request
     * @param  \App\Models\shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function update(Updateshipping_addressRequest $request, shipping_address $shipping_address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function destroy(shipping_address $shipping_address)
    {
        //
    }
}
