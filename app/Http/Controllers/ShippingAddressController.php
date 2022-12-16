<?php

namespace App\Http\Controllers;

use App\Models\shipping_address;
use App\Http\Requests\Storeshipping_addressRequest;
use App\Http\Requests\Updateshipping_addressRequest;
use Illuminate\Support\Facades\Auth;

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
        return view('makeaddress', [
            'pagetitle' => 'makeaddress',  
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeshipping_addressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeshipping_addressRequest $request)
    {
        $user = Auth::user();
        $id = $user['id'];

        $this->validate($request, [
            "postal_code" => 'required|integer',
            "shipment_address" => 'required|string|max:155',
            "contact" => 'required|string|max:155',
            "city" => 'required|string|max:155',
            "notes" => 'required|string|max:155',
        ]);

        shipping_address::create([
            'user_id' => $id,
            'postal_code' => $request->postal_code,
            'shipment_address' => $request->shipment_address,
            'contact' => $request->contact,
            'city' => $request->city,
            'notes' => $request->notes
        ]);
        return redirect('/dashboard');
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
    public function edit($id)
    {
        return view("updateaddress", [
            "shipping_address" =>shipping_address::findOrFail($id),
            'pagetitle'=>"Update Address",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateshipping_addressRequest  $request
     * @param  \App\Models\shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function update(Updateshipping_addressRequest $request, $id)
    {
        $shipping_address = shipping_address::findOrFail($id);

        $user = Auth::user();
        $id = $user['id'];
        $shipping_address->update([
            'user_id' => $id,
            'postal_code' => $request->postal_code,
            'shipment_address' => $request->shipment_address,
            'contact' => $request->contact,
            'city' => $request->city,
            'notes' => $request->notes
        ]);

        return redirect("/dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shipping_address  $shipping_address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping_address = shipping_address::findOrFail($id);

        $shipping_address->delete();

        return redirect("/dashboard");
    }
}
