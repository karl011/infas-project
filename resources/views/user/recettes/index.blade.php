@extends('layouts.master')

@section('title')
    Liste de recettes
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    {{-- <div class="container">
        <a href="{{ route('recettes.getPaiement') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                 Afficher toutes les informations de toutes les recettes</a>
            <a href="{{ route('recettes.filePDF') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Télecharger ici</a>
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <a href="{{ route('recettes.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                role="button"><i class="fas fa-plus fa-sm text-white-50"></i>Ajouter</a>
        </div>
    </div> --}}
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('recettes.getPaiement') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                Afficher toutes les informations de toutes les recettes</a>
            <a href="{{ route('recettes.filePDF') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Télecharger ici</a>
            <a href="{{ route('recettes.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                role="button"><i class="fas fa-plus fa-sm text-white-50"></i>Ajouter</a>
        </div>
    </div>
    
    
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">LISTE DES RECETTES ENREGISTREES</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Numéro de la recette</th>
                                <th>Montant du titre</th>
                                <th>Date de saisie</th>
                                <th>Type de titre</th>
                                <th>Objet</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recettes as $recette)
                            <tr>
                                <td>{{ $recette->titre_num }}</td>
                                <td>{{ $recette->mont_titre}}</td>
                                <td>{{ $recette->created_at }}</td>
                                <td>{{ $recette->type_titre }}</td>
                                <td>{{ $recette->objet }}</td>
                                <td class="text-center" style="width: 10%">
                                    <a type="button" href="{{ route('recettes.edit',$recette->id) }}" class="btn btn-success btn-sm">Modifier</a>
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