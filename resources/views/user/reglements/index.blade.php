@extends('layouts.master')

@section('title')
    La liste des règlements
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        {{-- <div class="container">
            <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <a href="{{ route('reglements.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                    role="button"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter un règlement</a>
            </div>
        </div> --}}
        <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('reglements.getPaiement') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                 Afficher toutes les informations de tous les règlements</a>
            <a href="{{ route('reglements.filePDF') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Télecharger ici</a>
            <a href="{{ route('reglements.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                role="button"><i class="fas fa-plus fa-sm text-white-50"></i>Ajouter un règlement</a>
        </div>
    </div>
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">LA GESTION DES REGLEMENTS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Date</th>
                                    <th>№ de REG</th>
                                    <th>Montant REG</th>
                                    <th>№ Opération</th>
                                    {{-- <th>№ du bénéficiaire</th> --}}
                                    <th>Année en cours</th>
                                    <th>Antenne</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reglements as $reglement)
                                    <tr>
                                        <td>{{ $reglement->reg_date }}</td>
                                        <td>{{ $reglement->reg_num }}</td>
                                        <td>{{ $reglement->reg_mont }}</td>
                                        <td>{{ $reglement->reg_op_num }}</td>
                                        {{-- <td>{{ $reglement->reg_fourn_code }}</td> --}}
                                        <td>{{ $reglement->exercice->exe_code }}</td>
                                        <td>{{ $reglement->antenne->ant_lib }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
