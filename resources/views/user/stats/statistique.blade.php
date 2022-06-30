@extends('layouts.obs')

@section('title')
    Statidtiques
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-danger">LES STATISTIQUES</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    </table>
                    <h3>Les statistiques des données enrégitrées</h3>
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Etudiants</th>
                                <th>Etudiants inscris</th>
                                <th>Scolarités</th>
                                <th>Vacatiares</th>
                                <th>Vacations</th>
                                <th>Règlements</th>
                                <th>Recouvrements</th>
                                <th>Bordereaux</th>
                                <th>OP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$etudiants->count()}}</td>
                                <td>{{$inscriptions->count()}}</td>
                                <td>{{$scolarites->count()}}</td>
                                <td>{{$vacataires->count()}}</td>
                                <td>{{$vacations->count()}}</td>
                                <td>{{$reglements->count()}}</td>
                                <td>{{$recouvrements->count()}}</td>
                                <td>{{$bordereaux->count()}}</td>
                                <td>{{$opaiements->count()}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h3>Les totaux de montant</h3>
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Montant total inscription</th>
                                <th>Montant total de scolarités payées</th>
                                <th>Montant total de scolarités</th>
                                <th>Montant total de scolarités versées</th>
                                <th>Montant total de bourses</th>
                                <th>Montant total de recettes</th>
                                <th>Montant total de dépenses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$montantinscs}}</td>
                                <td>{{$montantscols}}</td>
                                <td>{{$mont_scol}}</td>    
                                <td>{{$mont_scol_vers}}</td>    
                                <td>{{$bourses}}</td>       
                                <td>{{$mont_recouvrements}}</td>       
                                <td>{{$mont_reglements}}</td>             
                            </tr>
                        </tbody>
                    </table>
                    <h3>Recette propre</h3>
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Recettes propres</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>       
                                <td>{{$resultats}}</td>       
                            </tr>
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