@extends('layouts.master')

@section('title')
    LigneRecouvrements
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
            role="button" aria-expanded="false" aria-controls="collapseExer"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter une ligne</a>
    </div>


    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseExer">
                <div class="card-body">
                    <form method="POST" action="{{ route('ligneRecouvrement.store') }}">
                    @csrf
                        <div class="row">
                        <!-- Debut du bloc gauche -->
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">N° de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lrecouv_num') is-invalid @enderror" name="lrecouv_num" value="{{ old('lrecouv_num') }}" required
                                    placeholder="N° de ligne de recouvrement">
                                    @error('lrecouv_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Montant de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lrecouv_lib') is-invalid @enderror" name="lrecouv_lib" value="{{ old('lrecouv_lib') }}" required
                                    placeholder="Libelle de recouvrement">
                                    @error('lrecouv_lib')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Date de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('lrecouv_mont') is-invalid @enderror" name="lrecouv_mont" value="{{ old('lrecouv_mont') }}" required>
                                    @error('lrecouv_mont')
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
                                <!-- <label class="col-lg-3 col-form-label">Code MRG</label> -->
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('lrecouv_qte') is-invalid @enderror" name="lrecouv_qte" value="{{ old('lrecouv_qte') }}" required
                                    placeholder="La quantité">
                                    @error('lrecouv_qte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Matricule Vacataire</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lrecouv_stat_code') is-invalid @enderror" name="lrecouv_stat_code" value="{{ old('lrecouv_stat_code') }}" required
                                    placeholder="Le statut">
                                    @error('lrecouv_stat_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">La focntion d'origine</label> -->
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('recouvrement_id') is-invalid @enderror" name="recouvrement_id" value="{{ old('recouvrement_id') }}">
                                        <option>--Le recouvrement--</option>
                                        @foreach ($recouvrements as $recouvrement)
                                            <option value="{{ (int)$recouvrement->id }}">{{ $recouvrement->recouv_num }}</option>
                                        @endforeach
                                    </select>
                                    @error('recouvrement_id')
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
            <h6 class="m-0 font-weight-bold text-danger">LA GESTION DES LIGNES DE RECOUVREMENTS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            <th>N° de ligne RCV</th>
                            <th>Le libelle</th>
                            <th>Montant</th>
                            <th>La quantité</th>
                            <th>Le statut</th>
                            <th>Le recouvrement n°</th>
                            <th>Editer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lignerecouvrements as $lignerecouvrement)
                        <tr>
                            <td>{{ $lignerecouvrement->lrecouv_num }}</td>
                            <td>{{ $lignerecouvrement->lrecouv_lib }}</td>
                            <td>{{ $lignerecouvrement->lrecouv_mont }}</td>
                            <td>{{ $lignerecouvrement->lrecouv_qte }}</td>
                            <td>{{ $lignerecouvrement->lrecouv_stat_code }}</td>
                            <td>{{ $lignerecouvrement->recouvrement->recouv_num }}</td>
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