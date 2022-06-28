@extends('layouts.master')

@section('title')
    Liste de fournisseurs
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <a href="{{ route('fournisseurs.create') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" role="button"><i
                        class="fas fa-plus fa-sm text-white-50"></i>Ajouter</a>
            </div>
        </div>


        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">LISTE DES FOURNISSEURS ENREGISTRES</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Code du fournisseur</th>
                                    <th>Nom et prénoms</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Editer</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fournisseurs as $fournisseur)
                                    <tr>
                                        <td>{{ $fournisseur->code_four }}</td>
                                        <td>{{ $fournisseur->nom_four }}</td>
                                        <td>{{ $fournisseur->adresse_four }}</td>
                                        <td>{{ $fournisseur->tel_four }}</td>
                                        <td class="text-center" style="width: 10%">
                                            <a type="button" href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-success  btn-sm">Editer</a>
                                        </td>
                                        <td class="text-center" style="width: 10%">
                                            <a type="button" href="{{ route('fournisseurs.show', $fournisseur->id) }}" class="btn btn-primary  btn-sm">Voir plus</a>
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
