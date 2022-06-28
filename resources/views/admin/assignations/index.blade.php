@extends('layouts.master')

@section('title')
    Assignations
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
        <a href="#collapseAssign" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="collapseAssign"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <div class="card shadow mb-4 collapse" id="collapseAssign">
                <div class="card-body">
                    <form method="POST" action="{{ route('assignations.store') }}">
                        @csrf
                        
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <select class="form-control custom-select" name="user_id">
                                            <option>--Opérateur--</option>
                                            @foreach ($operateurs as $operateur)
                                                <option value="{{ $operateur->id }}">{{ $operateur->oper_nom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <select class="form-control custom-select" name="fonction_id">
                                            <option>--Fonction--</option>
                                            @foreach ($fonctions as $fonction)
                                                <option value="{{ $fonction->id }}">{{ $fonction->fonc_lib }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <label>Début assignation</label>
                                        <input type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ old('date_debut') }}"
                                            placeholder="Date début">
                                    </div>
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <label>Fin assignation</label>
                                        <input type="date" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ old('date_fin') }}"
                                            placeholder="Date fin">
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

    <!-- 
        DataTales Example 
        L'affichage des données récupérées depuis la base de données
    -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">LISTE DES ASSIGNATIONS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Opérateur</th>
                            <th>Fonction</th>
                            <th>Début</th>
                            <th>Fin</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignations as $assignation)
                        <tr>
                            <td>{{ $assignation->user->oper_nom }}</td>
                            <td>{{ $assignation->fonction->fonc_lib }}</td>
                            <td>{{ $assignation->date_debut }}</td>
                            <td>{{ $assignation->date_fin }}</td>
                            <td class="text-right">
                                <a type="button" href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="#" method="POST" style="display: inline">
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
