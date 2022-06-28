@extends('layouts.master')

@section('title')
    Recettes
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">ENREGISTRER DES RECETTES</h1>
    </div>
    <div class="container">
        <div class="card shadow mb-4">
            <h3 class="text-center text-danger font-weight-bold display-5">La date de ce enregistrement correspond à la date d'émission</h3>
            <div class="card-body">
                <form method="POST" action="{{ route('recettes.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 ">
                            <div class="form-group row">
                                {{-- <label class="col-lg-3 col-form-label">Le N° de recette</label> --}}
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('titre_num') is-invalid @enderror" name="titre_num" value="{{ old('titre_num') }}" required
                                    placeholder="Le numéro de la recette">
                                    @error('titre_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- <label class="col-lg-3 col-form-label">Le montant de la recette</label> --}}
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('mont_titre') is-invalid @enderror" name="mont_titre" value="{{ old('mont_titre') }}" required
                                    placeholder="Le montant de la recette">
                                    @error('mont_titre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- <label class="col-lg-3 col-form-label">Date d'émission</label> --}}
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_emission') is-invalid @enderror" name="date_emission" value="{{ old('date_emission') }}">
                                    @error('date_emission')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <select aria-selected="true"
                                        class="form-control @error('type_titre') is-invalid @enderror" name="type_titre"
                                        value="{{ old('type_titre') }}">
                                        <option selected disabled>Type de recette</option>
                                        <option>Recettes propres</option>
                                        <option>Autres recettes</option>
                                    </select>
                                    @error('type_titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- <label class="col-lg-3 col-form-label">Objet</label> --}}
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('objet') is-invalid @enderror" name="objet" value="{{ old('objet') }}" required
                                    placeholder="Objet de la recette">
                                    @error('objet')
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
                                {{-- <label class="col-lg-3 col-form-label">Lire code</label> --}}
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lire_code') is-invalid @enderror" name="lire_code" value="{{ old('lire_code') }}" required
                                    placeholder="Lire code">
                                    @error('lire_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- <label class="col-lg-3 col-form-label">Exercice</label> --}}
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('exercice_id') is-invalid @enderror" name="exercice_id" value="{{ old('exercice_id') }}">
                                        <option selected disabled>Exercice</option>
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
                            <div class="form-group row">
                                {{-- <label class="col-lg-3 col-form-label">Bordéreau</label> --}}
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('bordereau_id') is-invalid @enderror" name="bordereau_id" value="{{ old('bordereau_id') }}">
                                        <option selected disabled>Bordéreau</option>
                                        @foreach ($bordereaus as $bordereau)
                                            <option value="{{ $bordereau->id }}">{{ $bordereau->num_bord }}</option>
                                        @endforeach
                                    </select>
                                    @error('bordereau_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {{-- <label class="col-lg-3 col-form-label">Fournisseur</label> --}}
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('fournisseur_id') is-invalid @enderror" name="fournisseur_id" value="{{ old('fournisseur_id') }}">
                                        <option disabled selected>Fournisseur</option>
                                        @foreach ($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom_four }}</option>
                                        @endforeach
                                    </select>
                                    @error('fournisseur_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="date_saisie" value="{{ date('Y'.'-'.'m'.'-'.'j')}}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                            <input type="hidden" name="statut" value="F1S">
                            <div class="form-group row">
                                {{-- <label class="col-lg-3 col-form-label">N° de déclaration</label> --}}
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('num_declar') is-invalid @enderror" name="num_declar" value="{{ old('num_declar') }}"
                                    placeholder="Numéro de déclaration">
                                    @error('num_declar')
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
                            <div class="form-group mt-3">
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