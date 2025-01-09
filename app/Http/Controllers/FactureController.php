<?php

namespace App\Http\Controllers;

use App\Models\Diver;
use App\Models\Factures;
use PDF;
use Illuminate\Http\Request;


class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diver_id = $request->input('diver_id');
        $divers = Diver::orderBy('created_at', 'desc')->get();

        if ($diver_id) {
            $diver = Diver::find($diver_id);
        } else {
            $diver = $divers->first();
        }

        if (!$diver) {
            return redirect()->route('divers.index')->with('error', 'Aucun devis trouvé');
        }

        $factures = Factures::where('diver_id', $diver->id)->get();
        return view('factures.index', compact('divers', 'diver', 'factures'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($diver_id)
    {
        $diver = Diver::findOrFail($diver_id);
        return view('factures.create', compact('diver', 'diver_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'diver_id' => 'required|exists:divers,id',
            'qte' => 'required|numeric',
            'designation' => 'required|string',
            'prixunit' => 'required|numeric',
        ]);

        Factures::create($validatedData);

        return redirect()->route('factures.index')->with('success', 'Facture créée avec succès');
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
    public function generatePDF(Request $request)
    {
        // Récupérer le diver_id de la session ou de la requête
        $diver_id = $request->input('diver_id', session('diver_id'));
        
        // Si aucun diver_id n'est spécifié, prendre le premier
        if (!$diver_id) {
            $diver = Diver::orderBy('created_at', 'desc')->first();
        } else {
            $diver = Diver::findOrFail($diver_id);
        }

        // Récupérer les factures associées
        $factures = Factures::where('diver_id', $diver->id)->get();

        // Générer le PDF
        $pdf = PDF::loadView('factures.pdf', compact('diver', 'factures'));
        
        // Télécharger avec un nom personnalisé
        return $pdf->download('facture_' . $diver->nomdevis . '.pdf');
    }
}
