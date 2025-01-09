@extends('layouts.app')

@section('title', 'Liste des Factures')

@section('content')
    <div class="container">
        <h1>AUtre info sur le devis</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>Clien</th>
                    <th>Devis</th>
                    <th>Transport</th>
                    <th>Main d'oeuvre</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($divers as $diver)
                    <tr>
                        <td>{{ $diver->date }}</td>
                        <td>{{ $diver->nomclient }}</td>
                        <td>{{ $diver->nomdevis }}</td>
                        <td>{{ $diver->transport }}</td>
                        <td>{{ $diver->mainoeuvre }}</td>
                        <td>
                            <a href="{{ route('factures.create', ['diver_id' => $diver->id]) }}" class="btn btn-primary mb-3">Suivant</a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
