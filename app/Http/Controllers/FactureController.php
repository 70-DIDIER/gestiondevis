<?php

namespace App\Http\Controllers;

use App\Models\Diver;
use App\Models\factures;
use PDF;
use Illuminate\Http\Request;


class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factures = Factures::all();
        $divers = Diver::all();
        $date = $divers->pluck("date")->first();
        $nomclient = $divers->pluck("nomclient")->first();
        $nomdevis = $divers->pluck("nomdevis")->first();

        $totalAchat = $factures->sum(function($facture) {
            return $facture->prixunit * $facture->qte;
        });

        $totalTransport = $divers->sum('transport');
        $totalMainOeuvre = $divers->sum('mainoeuvre');

        $totalGeneral = $totalAchat + $totalTransport + $totalMainOeuvre;
        return view("factures.index", compact("factures","divers", "totalAchat", "totalTransport", "totalMainOeuvre", "totalGeneral", "date", "nomclient", "nomdevis"));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("factures.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $data = $request->validate([
            'qte' => 'required',
            'designation' => 'required',
            'prixunit' => 'required',
        ]);

        // Créer une nouvelle facture
        $factures = new factures;
        $factures->qte = $request->qte;
        $factures->designation = $request->designation;
        $factures->prixunit = $request->prixunit;
        $factures->save();
        return redirect()->route('factures.index');
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

    public function generatePDF()
    {
        $factures = Factures::all();
        $divers = Diver::all();

        $totalAchat = $factures->sum(function($facture) {
            return $facture->prixunit * $facture->qte;
        });

        $totalTransport = $divers->sum('transport');
        $totalMainOeuvre = $divers->sum('mainoeuvre');
        $totalGeneral = $totalAchat + $totalTransport + $totalMainOeuvre;

        $date = $divers->pluck('date')->first();
        $nomclient = $divers->pluck('nomclient')->first();
        $nomdevis = $divers->pluck('nomdevis')->first();

        $pdf = PDF::loadView('factures.pdf', compact('factures', 'divers', 'totalAchat', 'totalTransport', 'totalMainOeuvre', 'totalGeneral', 'date', 'nomclient', 'nomdevis'));

        return $pdf->download('factures.pdf');
    }
}
