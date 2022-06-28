@extends('layouts.master')

@section('title')
    Validation paiement
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div>
            <h1 class="h5 p-2 mb-4 bg-dark text-white">VALIDATION DES PAIEMENTS</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('paiements.valider') }}">
                    @csrf
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Numéro de paiement</th>
                                    <th>Montant de paiement</th>
                                    <th>Date de saisie</th>
                                    <th>Fournisseur</th>
                                    <th>Exercice</th>
                                    <th>Objet</th>
                                    <th>Choix</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($ordrepaiements as $ordrepaiement)
                                <tr>
                                    <td>{{ $ordrepaiement->num_ordre }}</td>
                                    <td>{{ $ordrepaiement->mont_ordre }}</td>
                                    <td>{{ $ordrepaiement->date_saisie }}</td>
                                    <td>{{ $ordrepaiement->founis_code }}</td>
                                    <td>{{ $ordrepaiement->exercice_code }}</td>
                                    <td>{{ $ordrepaiement->objet }}</td>
                                    <td style="width: 5%" class="text-center"><input type="checkbox" name="ordrepaiements[]" value="{{$ordrepaiement->id}}"></td>
                                </tr>
                                @endforeach
                            </tbody>   
                        </table>
                        <button type="submit" class="btn btn-danger btn-block">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection