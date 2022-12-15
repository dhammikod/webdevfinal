<?php

namespace App\Http\Controllers;

use App\Models\Payment_types;
use App\Http\Requests\StorePayment_typesRequest;
use App\Http\Requests\UpdatePayment_typesRequest;

class PaymentTypesController extends Controller
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
     * @param  \App\Http\Requests\StorePayment_typesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePayment_typesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment_types  $payment_types
     * @return \Illuminate\Http\Response
     */
    public function show(Payment_types $payment_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment_types  $payment_types
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment_types $payment_types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePayment_typesRequest  $request
     * @param  \App\Models\Payment_types  $payment_types
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayment_typesRequest $request, Payment_types $payment_types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment_types  $payment_types
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment_types $payment_types)
    {
        //
    }
}
