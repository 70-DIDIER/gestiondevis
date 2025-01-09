@extends('layouts.app')

@section('title', 'Liste des Factures')

@section('content')
    <div class="container">
        <h1>Liste des Factures</h1>
        <form method="GET" action="{{ route('factures.index') }}">
            <div class="form-group">
                <label for="diver_id">Sélectionnez un devis :</label>
                <select name="diver_id" id="diver_id" class="form-control" onchange="this.form.submit()">
                    @foreach($divers as $d)
                        <option value="{{ $d->id }}" {{ $d->id == $diver->id ? 'selected' : '' }}>{{ $d->nomclient}}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <a href="{{ route('factures.create', ['diver_id' => $diver->id]) }}" class="btn btn-primary mb-3">Ajouter</a>
        <a href="{{ route('factures.pdf', ['diver_id' => $diver->id]) }}" class="btn btn-secondary mb-3">Télécharger en PDF</a>
        @if($diver)
            <h2>Devis : {{ $diver->nomdevis }}</h2>
            <p>Date: {{ $diver->date }}</p>
            <p>Nom Client: {{ $diver->nomclient }}</p>
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
                            <td>{{ $facture->qte * $facture->prixunit }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"><strong>Total Achat</strong></td>
                        <td><strong>{{ $diver->factures->sum(function($facture) { return $facture->prixunit * $facture->qte; }) }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Transport</strong></td>
                        <td><strong>{{ $diver->transport }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Main D'Oeuvre</strong></td>
                        <td><strong>{{ $diver->mainoeuvre }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>TOTAL GENERAL</strong></td>
                        <td><strong>{{ $diver->factures->sum(function($facture) { return $facture->prixunit * $facture->qte; }) + $diver->transport + $diver->mainoeuvre }}</strong></td>
                    </tr>
                </tbody>
            </table>
        @else
            <p>Aucun devis disponible</p>
        @endif
    </div>
@endsection
