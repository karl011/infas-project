<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche d'impression des recouvrements</title>
    <style>
        #tout{
            font-family: sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        #tout td, #tout th{
            border: 1px solid;
            padding: 5px;
            font-size: 0.8em;
        }
        #entete{
            background-color: gray;
            color: white;
            text-transform: uppercase;
            text-align: center;
            border: 2px solid;
        }
        h3{
            text-align: center;
            text-transform: uppercase;
        }
        .infas{
            width: 8%;
            height: 8%;
            padding: 8px;
            margin-left: 20px;
        }
        #dateImp{
            margin-left: 65%;
            margin-top: 15%;
            font-size: 1.3em;
            font-weight: bold;
            font-style: italic;
        }
    </style>
</head>
<body>
    {{-- <img src="/images/logo-INFAS.png" alt="infas" class="infas"> --}}<span id="dateImp">Imprimé le : {{ date('j'.'-'.'m'.'-'.'Y'.' : ') }}{{ date('H').' h'.' - '}}{{ date('i').' min'}}</span>    
        <h3>La liste des recouvrements enregistrés par agent responsable</h3>
    <table id="tout">
        <thead id="entete">
            <tr>
                <td>N° RCV</td>
                <td>Date</td>
                <td>Montant</td>
                <td>Mode de reglement</td>
                <td>N° de compte</td>
                <td>Exercice</td>
                {{-- <td>Fonctions</td> --}}
                <td>Antenne</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($fichepaiement as $rcv)
            <tr>
                <td>{{ $rcv->recouv_num }}</td>
                <td>{{ $rcv->recouv_date }}</td>
                <td>{{ $rcv->recouv_mont }}</td>
                <td>{{ $rcv->recouv_mrg_code }}</td>
                <td>{{ $rcv->recouv_numBCV }}</td>
                <td style="text-align:center">{{ $rcv->exercice->exe_code }}</td>
                {{-- <td>{{ $rcv->user->oper_nom }}</td> --}}
                <td>{{ $rcv->antenne->ant_lib }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>