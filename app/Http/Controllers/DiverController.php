<?php

namespace App\Http\Controllers;

use App\Models\Diver;
use Illuminate\Http\Request;

class DiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divers = Diver::all();
        return view("divers.index", compact("divers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("divers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "date"=> "required",
            "nomclient"=> "required",
            "nomdevis"=> "required",
            "transport"=> "required",
            "mainoeuvre"=> "required",
        ]);
        $divers = new Diver;
        $divers->date = $request->date;
        $divers->nomclient = $request->nomclient;
        $divers->nomdevis = $request->nomdevis;
        $divers->transport = $request->transport;
        $divers->mainoeuvre = $request->mainoeuvre;
        $divers->save();
        return redirect()->route("divers.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Diver $diver)
    {
        return view('divers.show', compact('diver'));
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
    }
}
