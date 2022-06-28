<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche d'impression des paiements</title>
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
        <h3>La liste des paiements enregistrés par agent responsable</h3>
    <table id="tout">
        <thead id="entete">
            <tr>
                <td>N° OP</td>
                <td>Date</td>
                <td>Montant</td>
                <td>N° de compte</td>
                <td>N° de liquidation</td>
                <td>Objet</td>
                <td>Mode de reglement</td>
                <td>Compte ordre</td>
                <td>N° bodereau</td>
                <td>Antenne</td>
                {{-- <td>Agent responsable</td> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($fichepaiement as $op)
            <tr>
                <td>{{ $op->num_ordre }}</td>
                <td>{{ $op->date_op }}</td>
                <td>{{ $op->mont_ordre }}</td>
                <td>{{ $op->numero_cpte }}</td>
                <td>{{ $op->numero_liq }}</td>
                <td>{{ $op->objet}}</td>
                <td>{{ $op->mrg_code}}</td>
                <td>{{ $op->cpte_ordre}}</td>
                <td>{{ $op->bordereau->num_bord }}</td>
                <td>{{ $op->antenne->ant_lib }}</td>
                {{-- <td>{{ $op->user->oper_nom }}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>