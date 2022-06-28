@extends('layouts.master')

@section('title')
    Filières
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> IMPRIMER</a>
        <a href="#collapseExer" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="collapseExer"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseExer">
                <div class="card-body">
                    <form method="POST" action="{{ route('filieres.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('fil_code') is-invalid @enderror" name="fil_code" value="{{ old('fil_code') }}"
                                            placeholder="Code">
                                        @error('fil_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('fil_lib') is-invalid @enderror" name="fil_lib" value="{{ old('fil_lib') }}"
                                            placeholder="Libelle">
                                        @error('fil_lib')
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
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('fil_statut') is-invalid @enderror" name="fil_statut" value="{{ old('fil_statut') }}"
                                            placeholder="Statut">
                                        @error('fil_statut')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <select class="form-control custom-select" name="section_id">
                                            <option>--Sections--</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->sect_lib }}</option>
                                            @endforeach
                                        </select>
                                        @error('section_id')
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
            <h6 class="m-0 font-weight-bold text-danger">LISTE DES FILIERES</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Code</th>
                            <th>Libelle</th>
                            <th>Section</th>
                            <th>Statut</th>
                            <th>Crée le...</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filieres as $filiere)
                        <tr>
                            <td>{{ $filiere->fil_code }}</td>
                            <td>{{ $filiere->fil_lib }}</td>
                            <td>{{ $filiere->section->sect_lib }}</td>
                            <td>{{ $filiere->fil_statut }}</td>
                            <td>{{ $filiere->created_at }}</td>
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
