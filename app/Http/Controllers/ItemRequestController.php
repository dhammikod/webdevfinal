<?php

namespace App\Http\Controllers;

use App\Models\item_request;
use App\Http\Requests\Storeitem_requestRequest;
use App\Http\Requests\Updateitem_requestRequest;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $id = $user['id'];

        $this->validate($request, [
            "picture" => 'required',
            "title" => 'required|string|max:155',
            "description" => 'required|string|max:155',
        ]);

        item_request::create([
            'user_id' => $id,
            'title' => $request->title,
            'description' => $request->description,
            'request_picture' => $request->file('picture')->store('req_picture', 'public'),
        ]);
        return redirect('/dashboard');
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
    public function update(Updateitem_requestRequest $request, $id)
    {
        $item_request = item_request::findOrFail($id);

        if($item_request->status){
            $item_request->status = false;
        }else{
            $item_request->status = true;
        }

        $item_request->update([
            'status' => $item_request->status,
        ]);

        return redirect("/admin-item_requests");
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
