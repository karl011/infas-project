@extends('layouts.master')

@section('title')
    Liste vacataires
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <a href="{{ route('vacations.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                role="button"><i class="fas fa-plus fa-sm text-white-50"></i> Payer un vacataire</a>
        </div>
    </div>
    
    
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">LISTE DES VACATAIRES</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Matricule</th>
                                <th>Email</th>
                                <th>Genre</th>
                                <th>Téléphone(s)</th>
                                <th>Le type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacataires as $vacataire)
                            <tr>
                                <td>{{ $vacataire->nom }}</td>
                                <td>{{ $vacataire->prenoms}}</td>
                                <td>{{ $vacataire->matricule_vac}}</td>
                                <td>{{ $vacataire->email }}</td>
                                <td>{{ $vacataire->sexe }}</td>
                                <td>{{ $vacataire->phone_1 }}, {{ $vacataire->phone_2 }}</td>
                                <td>{{ $vacataire->type }}</td>
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