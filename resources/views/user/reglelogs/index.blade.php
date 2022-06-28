@extends('layouts.master')

@section('title')
    Recolog
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
            role="button" aria-expanded="false" aria-controls="collapseExer"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter un reglelog</a>
    </div>


    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseExer">
                <div class="card-body">
                    <form method="POST" action="{{ route('reglelogs.store') }}">
                    @csrf
                        <div class="row">
                        <!-- Debut du bloc gauche -->
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">N° de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('relog_date') is-invalid @enderror" name="relog_date" value="{{ old('relog_date') }}" required
                                    placeholder="Date d'enregistrement">
                                    @error('relog_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Montant de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('relog_stat_code') is-invalid @enderror" name="relog_stat_code" value="{{ old('relog_stat_code') }}" required
                                    placeholder="Code de statut">
                                    @error('relog_stat_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Fin du bloc gauche et -->

                        <!-- Debut du bloc droit -->
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">La focntion d'origine</label> -->
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('fonction_id') is-invalid @enderror" name="fonction_id" value="{{ old('fonction_id') }}">
                                        <option>--Fonctions--</option>
                                        @foreach ($fonctions as $fonction)
                                            <option value="{{ (int)$fonction->id }}">{{ $fonction->fonc_lib }}</option>
                                        @endforeach
                                    </select>
                                    @error('fonction_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">La focntion d'origine</label> -->
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('ligne_reglement_id') is-invalid @enderror" name="ligne_reglement_id" value="{{ old('ligne_reglement_id') }}">
                                        <option>--Ligne de règlement--</option>
                                        @foreach ($ligne_reglements as $ligne_reglement)
                                            <option value="{{ (int)$ligne_reglement->id }}">{{ $ligne_reglement->lreg_num }}</option>
                                        @endforeach
                                    </select>
                                    @error('ligne_reglement_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- La section d'enregistrement -->
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="form-group mt-5">
                                <button class="btn btn-danger btn-block" type="submit">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                    <!-- Finde la section -->
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example
        Chargement des données de la base de données
    -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">LA GESTION DES REGLELOGS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Date d'enregistrement</th>
                            <th>Code de statut</th>
                            <th>Fonction</th>
                            <!-- <th>Ligne de recouvrement</th> -->
                            <th>Editer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reglelogs as $reglelog)
                        <tr>
                            <td>{{ $reglelog->relog_date }}</td>
                            <td>{{ $reglelog->relog_stat_code }}</td>
                            <td>{{ $reglelog->fonction->fonc_lib }}</td>
                            <!-- <td>{{ $reglelog->ligne_recouvrement_id }}</td> -->
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