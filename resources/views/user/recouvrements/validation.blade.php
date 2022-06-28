@extends('layouts.master')

@section('title')
    Recouvrements
@endsection

@section('content')
    <div class="container-fluid">

        <div class="container">
            <div>
                <h1 class="h5 p-2 mb-4 bg-dark text-white">VALIDATION DES RECETTES</h1>
            </div>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="POST" action="{{ route('recouvrements.valider') }}">
                            @csrf
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                style="font-size: 0.8em;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Date</th>
                                        <th>Montant</th>
                                        <th>Mode de règlement</th>
                                        <th>№ de règlement</th>
                                        <th>Numéro OP</th>
                                        <th>№ du bénéficiaire</th>
                                        <th>Choix de vérification</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recouvrements as $recouvrement)
                                        <tr>
                                            <td>{{ $recouvrement->recouv_date }}</td>
                                            <td>{{ $recouvrement->recouv_mont }}</td>
                                            <td>{{ $recouvrement->recouv_mrg_code }}</td>
                                            <td>{{ $recouvrement->recouv_numBCV }}</td>
                                            <td>{{ $recouvrement->recouv_op_num }}</td>
                                            <td>{{ $recouvrement->recouv_fourn_code }}
                                                {{ $recouvrement->recouv_etex_mat }}
                                                {{ $recouvrement->recouv_vacex_mat }}</td>
                                            <td style="width: 5%" class="text-center"><input type="checkbox"
                                                    name="recouvrements[]" value="{{ $recouvrement->id }}"></td>
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
