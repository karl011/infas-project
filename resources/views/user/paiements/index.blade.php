@extends('layouts.master')

@section('title')
    Liste de paiements
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route('paiements.getPaiement') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                 Afficher toutes les informations de tous les OP</a>
            <a href="{{ route('paiements.filePDF') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i>Télecharger ici</a>
            <a href="{{ route('paiements.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                role="button"><i class="fas fa-plus fa-sm text-white-50"></i>Ajouter</a>
        </div>
    </div>
    
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">LISTE DES PAIEMENTS ENREGISTRES</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Numéro de paiement</th>
                                <th>Montant de paiement</th>
                                <th>Date de saisie</th>
                                <th>Fournisseur</th>
                                <th>Exercice</th>
                                <th>Objet</th>
                                <th>Editer</th>
                                <th>Plus</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordrepaiements as $ordrepaiement)
                            <tr>
                                <td>{{ $ordrepaiement->num_ordre }}</td>
                                <td>{{ $ordrepaiement->mont_ordre }}</td>
                                <td>{{ $ordrepaiement->created_at }}</td>
                                <td>{{ $ordrepaiement->fournisseur_id}}</td>
                                <td>{{ $ordrepaiement->exercice->exe_code }}</td>
                                <td>{{ $ordrepaiement->objet }}</td>
                                <td class="text-center" style="width: 10%">
                                    <a type="button" href="{{ route('paiements.edit', $ordrepaiement->id) }}" class="btn btn-success btn-sm">Modifier</a>
                                </td>
                                <td class="text-center" style="width: 10%">
                                    <a type="button" href="{{ route('paiements.show', $ordrepaiement->id) }}" class="btn btn-primary btn-sm">Voir +</a>
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