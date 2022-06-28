@extends('layouts.autres')

@section('title')
    les détails sur fournisseur
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="col-lg-12">
        <h3 class="font-weight-bold text-center">Les informations liées au fournisseur N°
            <span class="text-danger fw-bold text-decoration-underline">{{ $fournisseurs->code_four }}</span>
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="container-fluid">
                {{-- <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 0.8em;">
                    <p>CODE DU FOURNISSEUR : <strong class="text-center">{{ $fournisseurs->code_four }}</strong></p>
                    <p>NOM ET PRENOMS DU FOURNISSEUR : <strong>{{ $fournisseurs->nom_four }}</strong></p>
                    <p>N° TELEPHONE DU FOURNISSEUR : <strong>{{ $fournisseurs->tel_four }}</strong></p>
                    <p>ADRESSE DU FOURNISSEUR : <strong>{{ $fournisseurs->adresse_four }}</strong></p>
                    <p>LE RIB DU FOURNISSEUR : <strong>{{ $fournisseurs->rib_four }}</strong></p>
                    <p>N° DE COMPTE BANCAIRE : <strong>{{ $fournisseurs->banque->ban_code }}</strong></p>
                    <p>ANTENNE : <strong>{{ $fournisseurs->antenne->ant_lib }}</strong></p>
                </table> --}}
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 0.9em;">
                    <tr>
                        <td>CODE DU FOURNISSEUR</td>
                        <td><strong>{{ $fournisseurs->code_four }}</strong></td>
                    </tr>
                    <tr>
                        <td>NOM ET PRENOMS DU FOURNISSEUR</td>
                        <td>{{ $fournisseurs->nom_four }}</td>
                    </tr>
                    <tr>
                        <td>N° TELEPHONE DU FOURNISSEUR</td>
                        <td>{{ $fournisseurs->tel_four }}</td>
                    </tr>
                    <tr>
                        <td>ADRESSE DU FOURNISSEUR</td>
                        <td>{{ $fournisseurs->adresse_four }}</td>
                    </tr>
                    <tr>
                        <td>LE RIB DU FOURNISSEUR</td>
                        <td>{{ $fournisseurs->rib_four }}</td>
                    </tr>
                    <tr>
                        <td>N° DE COMPTE BANCAIRE</td>
                        <td>{{ $fournisseurs->banque->ban_code }}</td>
                    </tr>
                    <tr>
                        <td>ANTENNE</td>
                        <td>{{ $fournisseurs->antenne->ant_lib }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-3 offset-4 btn btn-secondary">
                <a href="{{ route('fournisseurs.index') }}" class="text-light text-decoration-none">Retour à la liste des
                    fournisseurs</a>
            </div><br><br>
            <div class="col-lg-3 offset-4 btn btn-danger">
                <a href="{{ route('home') }}" class="text-light text-decoration-none">Aller à la page d'accueil</a>
            </div>
        </div>
    </div>
@endsection
