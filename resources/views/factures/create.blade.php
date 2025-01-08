@extends('layouts.app')

@section('title', 'Créer une Facture')

@section('content')
    <div class="container">
        <h1>Créer une Facture</h1>
        <form action="{{ route('factures.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="qte">QTE</label>
                <input type="number" name="qte" id="qte" class="form-control" >
            </div>
            <div class="form-group">
                <label for="designation">Désignation</label>
                <input type="text" name="designation" id="designation" class="form-control">
            </div>
            <div class="form-group">
                <label for="prixunit">Prix unitaire</label>
                <input type="number" name="prixunit" id="prixunit" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <!-- <script>
        function calculateTotal() {
            var qte = document.getElementById('qte').value;
            var prixunit = document.getElementById('prixunit').value;
            var prixtotal = document.getElementById('prixtotal');

            if (qte && prixunit) {
                prixtotal.value = qte * prixunit;
            } else {
                prixtotal.value = 0;
            }
        }
    </script> -->
@endsection
