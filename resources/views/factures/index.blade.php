@extends('layouts.app')

@section('title', 'Liste des Factures')

@section('content')
    <div class="container">
    <p>la date du devis est :{{$date}}</p>
    <p>Nom du client : {{$nomclient}}</p>
    <p>Nom du devis : {{$nomdevis}}</p>
    </div>
    <div class="container">
        <h1>Liste des Factures</h1>
        <a href="{{ route('factures.create') }}" class="btn btn-primary mb-3">Ajouter</a>
        <a href="{{ route('factures.pdf') }}" class="btn btn-secondary mb-3">Télécharger en PDF</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>QTE</th>
                    <th>Désignation</th>
                    <th>Prix Unitaire</th>
                    <th>Prix Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($factures as $facture)
                    <tr>
                        <td>{{ $facture->qte }}</td>
                        <td>{{ $facture->designation }}</td>
                        <td>{{ $facture->prixunit }}</td>
                        <td>{{ $facture->prixunit * $facture->qte }}</td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="3"><strong>Total Achat</strong></td>
                        <td><strong>{{ $totalAchat }}</strong></td>
                    </tr>
                @foreach ($divers as $diver)
                    <tr>
                        <td colspan="3"><strong>Transport</strong></td>
                        <td><strong>{{$diver->transport}}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Main D'Oeuvre</strong></td>
                        <td><strong>{{$diver->mainoeuvre}}</strong></td>
                    </tr>
                @endforeach    
                    <tr>
                        <td colspan="3"><strong>TOTAL GENERAL</strong></td>
                        <td><strong>{{ $totalGeneral }}</strong></td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection
