<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $client = Client::all();
        return view('index',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view (' create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $storeData = $request->validate([
            'name' =>' required|max:255',
            'email' =>' required|max:255',
            'phone' =>' required|numeric',
            'department' =>' required|max:255',
            'job_title' =>' required|max:255',
            'password' =>' required|max:255',

        ]);
        $client = Client::create($storeData);
        return redirect('/client')->width('completed','Client has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client = Client::findOrFail($id);
        return view('edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $updateData = $request->validate([
            'name' =>' required|max:255',
            'email' =>' required|max:255',
            'phone' =>' required|numeric',
            'department' =>' required|max:255',
            'job_title' =>' required|max:255',
            'password' =>' required|max:255',

        ]);
        Client::whereId($id)->update($updateData);
        return redirect('/client')->with('completed', 'Client has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect('/client')->with('completed', 'Client has been deleted');
    }
}
