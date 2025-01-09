<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devis - {{ $diver->nomdevis }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 10px solid black;
            border-bottom-style: double;
            padding-bottom: 10px;
        }
        header h1 {
            font-size: 24px;
            margin: 0;
        }
        header h2 {
            font-size: 18px;
            margin: 5px 0;
        }
        .info {
            margin-bottom: 30px;
        }
        .info p {
            margin: 5px 0;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
            margin-right: 50px;
        }
        .total-row {
            background-color: #f9f9f9;
        }
        .montant-lettres {
            margin-top: 30px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>ETS MAWOULI (DIEU EST LA)</h1>
        <h2>TOUS TRAVAUX DE SOUDURE - FERRAILLAGE</h2>
        <p>FORGE - AJUSTAGE</p>
        <p>Tel : 98 07 75 94 / 70 44 63 55</p>
    </header>

    <div class="info">
        <p><strong>Date :</strong> {{ $diver->date }}</p>
        <p><strong>Devis N° :</strong> {{ $diver->nomdevis }}</p>
        <p><strong>Client :</strong> {{ $diver->nomclient }}</p>
    </div>

    <table>
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
                    <td>{{ number_format($facture->prixunit, 0, ',', ' ') }} FCFA</td>
                    <td>{{ number_format($facture->prixunit * $facture->qte, 0, ',', ' ') }} FCFA</td>
                </tr>
            @endforeach

            @php
                $totalAchat = $diver->factures->sum(function($facture) { 
                    return $facture->prixunit * $facture->qte; 
                });
                $totalGeneral = $totalAchat + $diver->transport + $diver->mainoeuvre;
            @endphp

            <tr class="total-row">
                <td colspan="3"><strong>Total Achat</strong></td>
                <td><strong>{{ number_format($totalAchat, 0, ',', ' ') }} FCFA</strong></td>
            </tr>
            <tr>
                <td colspan="3"><strong>Transport</strong></td>
                <td><strong>{{ number_format($diver->transport, 0, ',', ' ') }} FCFA</strong></td>
            </tr>
            <tr>
                <td colspan="3"><strong>Main D'Oeuvre</strong></td>
                <td><strong>{{ number_format($diver->mainoeuvre, 0, ',', ' ') }} FCFA</strong></td>
            </tr>
            <tr class="total-row">
                <td colspan="3"><strong>TOTAL GENERAL</strong></td>
                <td><strong>{{ number_format($totalGeneral, 0, ',', ' ') }} FCFA</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="montant-lettres">
        <p>Arrêté le présent devis à la somme de : ________________________________________________</p>
    </div>

    <div class="signature">
        <p>Le Responsable</p>
        <p>GUINGBEGNON Charles</p>
    </div>
</body>
</html>