@extends('layouts.master')

@section('title')
    Recouvrement
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <h1 class="h5 p-2 mb-5 bg-dark text-white">ENREGISTREMENT DES LIGNES DE RECOUVREMENTS</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
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
                                    placeholder="N° de ligne de recouvrement (Ex: Ligne001)">
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
                                    <input type="number" class="form-control @error('lrecouv_mont') is-invalid @enderror" name="lrecouv_mont" value="{{ old('lrecouv_mont') }}" required
                                    placeholder="Le montant de recouvrement">
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
                                        <option>--Le n° de recouvrement--</option>
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

                <!-- Fin du formulaire -->
            </div>
        </div>
    </div>
</div>
@endsection