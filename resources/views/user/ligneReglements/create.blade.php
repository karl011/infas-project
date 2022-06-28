@extends('layouts.master')

@section('title')
    Reglement
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <h1 class="h5 p-2 mb-5 bg-dark text-white">ENREGISTREMENT DES LIGNES DE REGLEMENTS</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">

                <form method="POST" action="{{ route('ligneReglements.store') }}">
                    @csrf
                        <div class="row">
                        <!-- Debut du bloc gauche -->
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">N° de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lreg_num') is-invalid @enderror" name="lreg_num" value="{{ old('lreg_num') }}" required
                                    placeholder="N° de ligne de règlement (Ex: Ligne001)">
                                    @error('lreg_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Montant de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lreg_lib') is-invalid @enderror" name="lreg_lib" value="{{ old('lreg_lib') }}" required
                                    placeholder="Libelle de règlement">
                                    @error('lreg_lib')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Date de recouvrement</label> -->
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('lreg_mont') is-invalid @enderror" name="lreg_mont" value="{{ old('lreg_mont') }}" required
                                    placeholder="Montant du règlement">
                                    @error('lreg_mont')
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
                                    <input type="number" class="form-control @error('lreg_qte') is-invalid @enderror" name="lreg_qte" value="{{ old('lreg_qte') }}" required
                                    placeholder="La quantité">
                                    @error('lreg_qte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">Matricule Vacataire</label> -->
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lreg_stat_code') is-invalid @enderror" name="lreg_stat_code" value="{{ old('lreg_stat_code') }}" required
                                    placeholder="Le statut">
                                    @error('lreg_stat_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- <label class="col-lg-3 col-form-label">La focntion d'origine</label> -->
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('reglement_id') is-invalid @enderror" name="reglement_id" value="{{ old('reglement_id') }}">
                                        <option>--Le n° de règlement--</option>
                                        @foreach ($reglements as $reglement)
                                            <option value="{{ (int)$reglement->id }}">{{ $reglement->reg_num }}</option>
                                        @endforeach
                                    </select>
                                    @error('reglement_id')
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