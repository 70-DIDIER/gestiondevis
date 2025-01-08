@extends('layouts.app')

@section('title', 'Autres Informations')

@section('content')
    <div class="container">
        <h1>Compléter les Informations</h1>
        <form action="{{ route('divers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date">Date de facture</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomclient">Nom client</label>
                <input type="text" name="nomclient" id="nomclient" class="form-control">
            </div>
            <div class="form-group">
                <label for="nom">Nom devis</label>
                <input type="text" name="nomdevis" id="nom" class="form-control">
            </div>
            <div class="form-group">
                <label for="transport">Transport</label>
                <input type="number" name="transport" id="transport" class="form-control">
            </div>
            <div class="form-group">
                <label for="nomclient">Main Oeuvre</label>
                <input type="number" name="mainoeuvre" id="mainoeuvre" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
@endsection