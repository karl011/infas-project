@extends('layouts.master')

@section('title')
    Liste vacations
@endsection

@section('styles')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <a href="{{ route('vacations.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" role="button"><i class="fas fa-plus fa-sm text-white-50"></i> Nouvelle vacation</a>
        </div>
    </div>


    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">LISTE DES VACATIONS PAYEES</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Date Paiement</th>
                                <th>Matricule du vacataire</th>
                                <th>Nom et prénoms du vacataire</th>
                                <th>Montant de la vacation</th>
                                <th>Année de la vacation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacations as $vacation)
                            <tr>
                                <td>{{ $vacation->date_vac }}</td>
                                <td>{{ $vacation->vacataire->matricule_vac }}</td>
                                <td>{{ $vacation->vacataire->nom }} {{ $vacation->vacataire->prenoms }}</td>
                                <td>{{ $vacation->mont_vac }}</td>
                                <td>{{ $vacation->exercice->exe_code }}</td>
                                {{-- <td class="text-center" style="width: 10%">
                                    <a type="button" href="{{ route('vacations.edit',$vacation) }}" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                --}}
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
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
