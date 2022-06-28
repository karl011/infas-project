@extends('layouts.master')

@section('title')
    Liste des recouvrements
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('recouvrements.getPaiement') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                 Afficher toutes les informations de tous les OP</a>
            <a href="{{ route('recouvrements.filePDF') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Télecharger ici</a>
            <a href="{{ route('recouvrements.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                role="button"><i class="fas fa-plus fa-sm text-white-50"></i>Ajouter un recouvrement</a>
        </div>
    </div>
    <div class="container">
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">LA GESTION DES RECOUVREMENTS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            <th>№ de RCV</th>
                            <th>Montant RCV</th>
                            <th>№ Opération</th>
                            <th>№ bénéficiaire</th>
                            <th>MRG</th>
                            <th>№ MRG</th>
                            <th>Année en cours</th>
                            <th>Antenne</th>
                            <th>Editer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recouvrements as $recouvrement)
                        <tr>
                            <td>{{ $recouvrement->recouv_num }}</td>
                            <td>{{ $recouvrement->recouv_mont }}</td>
                            <td>{{ $recouvrement->recouv_op_num }}</td>
                            <td>{{ $recouvrement->recouv_mrg_code }}</td>
                                    <td>{{ $recouvrement->recouv_numBCV }}</td>
                            <td>{{ $recouvrement->recouv_fourn_code }} {{ $recouvrement->recouv_etex_mat }} {{ $recouvrement->recouv_vacex_mat }}</td>
                            <td>{{ $recouvrement->exercice->exe_code }}</td>
                            <td>{{ $recouvrement->antenne->ant_lib }}</td>
                            <td class="text-right">
                                <a type="button" href="#" class="btn btn-info btn-sm">Modifier</i></a>
                                {{-- <form action="" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection