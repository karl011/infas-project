@extends('layouts.master')

@section('title')
    Rejet ou différencement
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white text-center">REJETER OU DIFFERER</h1>
    </div>
    <div class="col-lg-10 mb-4 offset-1">
        <select name="selection" id="selection" class="form-control">
            <option class="disabled">Selectionnez une action à mener</option>
            <option value="1" class="rejeter">REJETER</option>
            <option value="2" class="differer">DIFFERER</option>
        </select>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">CONDISTIONNEMENT DES DONNEES ENREGISTREES</h1>
    </div>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('recettes.update', $recettes) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de rejet</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_rej') is-invalid @enderror" name="date_rej" value="{{ old('date_rej') }}">
                                    @error('date_rej')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Motif de rejet</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('motif_rej') is-invalid @enderror" name="motif_rej" value="{{ old('motif_rej') }}"
                                    placeholder="Motif de rejet">
                                    @error('motif_rej')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date diff</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_diff') is-invalid @enderror" name="date_diff" value="{{ old('date_diff') }}">
                                    @error('date_diff')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Motif diff</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('motif_diff') is-invalid @enderror" name="motif_diff" value="{{ old('motif_diff') }}"
                                    placeholder="Motif de diff ">
                                    @error('motif_diff')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de PEC</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_pec') is-invalid @enderror" name="date_pec" value="{{ old('date_pec') }}">
                                    @error('date_pec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Fonction PEC</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('titre_fonc_code_pec') is-invalid @enderror" name="titre_fonc_code_pec" value="{{ old('titre_fonc_code_pec') }}"
                                    placeholder="Fonction de prise en charge">
                                    @error('titre_fonc_code_pec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- gauche et droite -->
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">N° de bordéreau R</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('bord_numR') is-invalid @enderror" name="bord_numR" value="{{ old('bord_numR') }}"
                                    placeholder="Le numéro de bordéreau R">
                                    @error('bord_numR')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Geste code</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('gest_code') is-invalid @enderror" name="gest_code" value="{{ old('gest_code') }}"
                                    placeholder="Geste code (ex: 2022)">
                                    @error('gest_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">fonc-code R</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('titre_fonc_code_rejet') is-invalid @enderror" name="titre_fonc_code_rejet" value="{{ old('titre_fonc_code_rejet') }}"
                                    placeholder="Titre fonc-code rejet">
                                    @error('titre_fonc_code_rejet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Numéro annulation</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('titre_num_annule') is-invalid @enderror" name="titre_num_annule" value="{{ old('titre_num_annule') }}"
                                    placeholder="Numéro d'annulation">
                                    @error('titre_num_annule')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}"> -->
                            <input type="hidden" name="statut" value="REJ">
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Compte code</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('cpte_code') is-invalid @enderror" name="cpte_code" value="{{ old('cpte_code') }}"
                                    placeholder="Compte code">
                                    @error('cpte_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="form-group mt-5">
                                <button class="btn btn-danger btn-block" type="submit">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid">
    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">DIFFERER UNE RECETTE</h1>
    </div>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('recettes.update', $recettes) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                           {{--  <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de rejet</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_rej') is-invalid @enderror" name="date_rej" value="{{ old('date_rej') }}">
                                    @error('date_rej')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Motif de rejet</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('motif_rej') is-invalid @enderror" name="motif_rej" value="{{ old('motif_rej') }}"
                                    placeholder="Motif de rejet">
                                    @error('motif_rej')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date diff</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_diff') is-invalid @enderror" name="date_diff" value="{{ old('date_diff') }}">
                                    @error('date_diff')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Motif diff</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('motif_diff') is-invalid @enderror" name="motif_diff" value="{{ old('motif_diff') }}"
                                    placeholder="Motif de diff ">
                                    @error('motif_diff')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de PEC</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_pec') is-invalid @enderror" name="date_pec" value="{{ old('date_pec') }}">
                                    @error('date_pec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label"> Fonction PEC</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('titre_fonc_code_pec') is-invalid @enderror" name="titre_fonc_code_pec" value="{{ old('titre_fonc_code_pec') }}"
                                    placeholder="Fonction de prise en charge">
                                    @error('titre_fonc_code_pec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- gauche et droite -->
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">N° de bordéreau R</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('bord_numR') is-invalid @enderror" name="bord_numR" value="{{ old('bord_numR') }}"
                                    placeholder="Le numéro de bordéreau R">
                                    @error('bord_numR')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Geste code</label>
                                <div class="col-lg-9">
                                    <input type="month" class="form-control @error('gest_code') is-invalid @enderror" name="gest_code" value="{{ old('gest_code') }}"
                                    placeholder="Geste code (ex: 2022)">
                                    @error('gest_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            {{-- <div class="form-group row">
                                <label class="col-lg-3 col-form-label">fonc-code R</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('titre_fonc_code_rejet') is-invalid @enderror" name="titre_fonc_code_rejet" value="{{ old('titre_fonc_code_rejet') }}"
                                    placeholder="Titre fonc-code rejet">
                                    @error('titre_fonc_code_rejet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Numéro annulation</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('titre_num_annule') is-invalid @enderror" name="titre_num_annule" value="{{ old('titre_num_annule') }}"
                                    placeholder="Numéro d'annulation">
                                    @error('titre_num_annule')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}"> -->
                            <input type="hidden" name="statut" value="REJ">
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Compte code</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('cpte_code') is-invalid @enderror" name="cpte_code" value="{{ old('cpte_code') }}"
                                    placeholder="Compte code">
                                    @error('cpte_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="form-group mt-5">
                                <button class="btn btn-danger btn-block" type="submit">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection