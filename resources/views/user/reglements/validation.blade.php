@extends('layouts.master')

@section('title')
    Reglements
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div>
            <h1 class="h5 p-2 mb-4 bg-dark text-white">VALIDATION DES DEPENSES</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('reglements.valider') }}">
                    @csrf
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th>Numéro OP</th>
                                    <th>Mode de règlement</th>
                                    <th>Compte MRG</th>
                                    <th>N° fournisseur</th>
                                    <th>Agent de prise en charge</th>
                                    <th>Choix de vérification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reglements as $reglement)
                                <tr>
                                    <td>{{ $reglement->reg_date }}</td>
                                    <td>{{ $reglement->reg_mont }}</td>
                                    <td>{{ $reglement->reg_op_num }}</td>
                                    <td>{{ $reglement->reg_mrg_code }}</td>
                                    <td>{{ $reglement->reg_numREG }}</td>
                                    <td>{{ $reglement->reg_fourn_code }}</td>
                                    <td>{{ $reglement->user->oper_nom }}</td>
                                    <td style="width: 5%" class="text-center"><input type="checkbox" name="reglements[]" value="{{$reglement->id}}"></td>
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