@extends('layouts.master')

@section('title')
    Fonctions
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!--<h1 class="h3 mb-0 text-gray-800">LISTE DES OPERATEURS</h1>-->
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> IMPRIMER</a>
        <a href="#collapseFonc" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="collapseFonc"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseFonc">
                <div class="card-body">
                    <form method="POST" action="{{ route('fonctions.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('fonc_code') is-invalid @enderror" name="fonc_code" value="{{ old('fonc_code') }}"
                                            placeholder="Code">
                                        @error('fonc_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('fonc_lib') is-invalid @enderror" name="fonc_lib" value="{{ old('fonc_lib') }}"
                                            placeholder="Libelle">
                                        @error('fonc_lib')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-12 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('fonc_statut') is-invalid @enderror" name="fonc_statut" value="{{ old('fonc_statut') }}"
                                            placeholder="Statut">
                                        @error('fonc_statut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 offset-3 mt-5">
                                <button type="submit" class="btn btn-danger btn-block">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">LISTE DES FONCTIONS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Code</th>
                            <th>Libelle</th>
                            <th>Statut</th>
                            <th>Date de création</th>
                            <th>Editer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fonctions as $fonction)
                        <tr>
                            <td>{{ $fonction->fonc_code }}</td>
                            <td>{{ $fonction->fonc_lib }}</td>
                            <td>{{ $fonction->fonc_statut }}</td>
                            <td>{{ $fonction->created_at }}</td>
                            <td class="text-right">
                                <a type="button" href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
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
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
