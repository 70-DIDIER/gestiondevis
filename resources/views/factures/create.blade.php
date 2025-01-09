@extends('layouts.app')

@section('title', 'Créer une Facture')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="mb-4">Créer une Facture</h1>
                <form action="{{ route('factures.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="diver_id" value="{{ $diver_id }}">
                    <div class="form-group">
                        <label for="qte">Quantité</label>
                        <input type="number" name="qte" id="qte" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="designation">Désignation</label>
                        <input type="text" name="designation" id="designation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="prixunit">Prix unitaire</label>
                        <input type="number" name="prixunit" id="prixunit" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
