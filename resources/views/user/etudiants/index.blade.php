@extends('layouts.master')

@section('title')
    Etudiants
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <a href="{{ route('etudiants.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                    role="button"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
            </div>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">LISTE DES ETUDIANTS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom et prénoms</th>
                                    <th>Date naissance</th>
                                    <th>Lieu naissance</th>
                                    <th>Numéro</th>
                                    <th>RIB</th>
                                    <th>Nationalité</th>
                                    <th>Type</th>
                                    <th>Boursier</th>
                                    <th>Editer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($etudiants as $etudiant)
                                    <tr>
                                        <td>{{ $etudiant->matricule_etd }}</td>
                                        <td>{{ $etudiant->nom }} {{ $etudiant->prenoms }}</td>
                                        <td>{{ $etudiant->naissance }}</td>
                                        <td>{{ $etudiant->lieu }}</td>
                                        <td>{{ $etudiant->phone }}</td>
                                        <td>{{ $etudiant->rib }}</td>
                                        <td>{{ $etudiant->nationalite }}</td>
                                        <td>{{ $etudiant->type->lib_type }}</td>
                                        <td>{{ $etudiant->boursier }}</td>
                                        <td class="text-center">
                                            <a type="button" href="{{ route('etudiants.edit', $etudiant->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                        </td>
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