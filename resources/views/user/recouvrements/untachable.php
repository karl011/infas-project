@extends('layouts.master')

@section('title')
    Recouvrement
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <h1 class="h5 p-2 mb-5 bg-dark text-white">ENREGISTREMENT DES RECOUVREMENTS</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">

                <!-- Debut du formaulaire -->
                <form method="POST" action="{{ route('recouvrements.store') }}">
                    @csrf
                    <div class="row">
                        <!-- Debut du bloc gauche -->
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">N° de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_num') is-invalid @enderror" name="recouv_num" value="{{ old('recouv_num') }}" required
                                    placeholder="N° de recouvrement">
                                    @error('recouv_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Montant de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('recouv_mont') is-invalid @enderror" name="recouv_mont" value="{{ old('recouv_mont') }}" required
                                    placeholder="Montant de recouvrement">
                                    @error('recouv_mont')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Date de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('recouv_date') is-invalid @enderror" name="recouv_date" value="{{ old('recouv_date') }}" required>
                                    @error('recouv_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">N° chèque</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_num_chq') is-invalid @enderror" name="recouv_num_chq" value="{{ old('recouv_num_chq') }}" required
                                    placeholder="N° de chèque">
                                    @error('recouv_num_chq')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">N° de bordéreau</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_num_bord_vert') is-invalid @enderror" name="recouv_num_bord_vert" value="{{ old('recouv_num_bord_vert') }}" required
                                    placeholder="N° de bordéreau">
                                    @error('recouv_num_bord_vert')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">N° de Compte B</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_cpb_code') is-invalid @enderror" name="recouv_cpb_code" value="{{ old('recouv_cpb_code') }}" required
                                    placeholder="N° de compte bancaire">
                                    @error('recouv_cpb_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">N° de OP</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_op_num') is-invalid @enderror" name="recouv_op_num" value="{{ old('recouv_op_num') }}" required
                                    placeholder="N° d'opération">
                                    @error('recouv_op_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Code de statut de RCV</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_stat_code') is-invalid @enderror" name="recouv_stat_code" value="{{ old('recouv_stat_code') }}" required
                                    placeholder="Le code statut de RVC">
                                    @error('recouv_stat_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="recouv_stat_code" value="RCV1">
                        </div>

                        <!-- Fin du bloc gauche et -->

                        <!-- Debut du bloc droit -->
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Code MRG</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_mrg_code') is-invalid @enderror" name="recouv_mrg_code" value="{{ old('recouv_mrg_code') }}" required
                                    placeholder="Code de MRG">
                                    @error('recouv_mrg_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Code du fournisseur</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_fourn_code') is-invalid @enderror" name="recouv_fourn_code" value="{{ old('recouv_fourn_code') }}" required
                                    placeholder="Code du fournisseur">
                                    @error('recouv_fourn_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Matricule Etudiant</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_etex_mat') is-invalid @enderror" name="recouv_etex_mat" value="{{ old('recouv_etex_mat') }}" required
                                    placeholder="Matricule de l'étudiant">
                                    @error('recouv_etex_mat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Matricule Vacataire</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('recouv_vacex_mat') is-invalid @enderror" name="recouv_vacex_mat" value="{{ old('recouv_vacex_mat') }}" required
                                    placeholder="Matricule du vacataire">
                                    @error('recouv_vacex_mat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">La focntion d'origine</label> -->
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('fonction_id') is-invalid @enderror" name="fonction_id" value="{{ old('fonction_id') }}">
                                        <option>--Fonctions--</option>
                                        @foreach ($fonctions as $fonction)
                                            <option value="{{ $fonction->id }}">{{ $fonction->fonc_lib }}</option>
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
                                <!-- <label class="col-lg-3 col-form-label">L'antenne d'origine</label> -->
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('antenne_id') is-invalid @enderror" name="antenne_id" value="{{ old('antenne_id') }}">
                                        <option disabled>Antennes</option>
                                        @foreach ($antennes as $antenne)
                                            <option value="{{ $antenne->id }}">{{ $antenne->ant_lib }}</option>
                                        @endforeach
                                    </select>
                                    @error('antenne_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Année en cours</label> -->
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('exercice_id') is-invalid @enderror" name="exercice_id" value="{{ old('exercice_id') }}">
                                        <option>--Exercices--</option>
                                        @foreach ($exercices as $exercice)
                                            <option value="{{ $exercice->id }}">{{ $exercice->exe_code }}</option>
                                        @endforeach
                                    </select>
                                    @error('exercice_id')
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

                <!-- Fin du formulaire -->
            </div>
        </div>
    </div>
</div>
@endsection