<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Factures</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
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
            margin-bottom: 20px;
            border-bottom: 10px solid black ;
            border-bottom-style: double;
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
            margin-bottom: 20px;
        }

        .info p {
            margin: 5px 0;
        }
        .signature {
            margin-top: 30px;
            text-align: right;
            margin-right: 30px;
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
    <p>A Lome le : {{ $date }}</p>
     <p>Devis : {{ $nomdevis }}</p>
     <p>Client : {{ $nomclient }}</p>
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
                    <td><strong>{{ $diver->transport }}</strong></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Main D'Oeuvre</strong></td>
                    <td><strong>{{ $diver->mainoeuvre }}</strong></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"><strong>TOTAL GENERAL</strong></td>
                <td><strong>{{ $totalGeneral }}</strong></td>
            </tr>
        </tbody>
    </table>
    <div>
        <p>Arrêté le présent devis à la somme de : __________________________</p>
        <p class="signature" >Le Responsable</p>
        <p class="signature">GUINGBEGNON Charles</p>
    </div>
</body>
</html>