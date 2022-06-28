@extends('layouts.master')

@section('title')
Rejet ou différé
@endsection

@section('content')
<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
        <div class="container">
            <h1 class="h5 p-2 mb-2 bg-dark text-white fw-bold text-center">REJETER OU DIFFERER</h1>
        </div>
        <select id="menu" class="form-control mb-2 col-sm-10 offset-1 text-center" required>
            <option value="none" selected disabled>Veuillez selectioner une action à mener</option>
            <option value="un">REJETER UNE RECETTE</option>
            <option value="deux">DIFFERER UNE RECETTE</option>
        </select>
    </div>
    <div id="layerun" class="layer">
        <div class="container-fluid">
            <div class="container">
                <h1 class="h5 p-2 mb-4 bg-dark text-white">REJETER DES DONNEES ENREGISTREES</h1>
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
                                            <input type="date"
                                                class="form-control @error('date_rej') is-invalid @enderror"
                                                name="date_rej" value="{{ old('date_rej') }}">
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
                                            <input type="text"
                                                class="form-control @error('motif_rej') is-invalid @enderror"
                                                name="motif_rej" value="{{ old('motif_rej') }}"
                                                placeholder="Motif de rejet">
                                            @error('motif_rej')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Date de PEC</label>
                                        <div class="col-lg-9">
                                            <input type="date"
                                                class="form-control @error('date_pec') is-invalid @enderror"
                                                name="date_pec" value="{{ old('date_pec') }}">
                                            @error('date_pec')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label"> Compte </label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('cpte_code') is-invalid @enderror"
                                                name="cpte_code" value="{{ old('cpte_code') }}"
                                                placeholder="Compte code">
                                            @error('cpte_code')
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
                                        <label class="col-lg-3 col-form-label">N° B de rejet</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('bord_numR') is-invalid @enderror"
                                                name="bord_numR" value="{{ old('bord_numR') }}"
                                                placeholder="Le numéro de bordéreau de rejet">
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
                                            <input type="month"
                                                class="form-control @error('gest_code') is-invalid @enderror"
                                                name="gest_code" value="{{ old('gest_code') }}">
                                            @error('gest_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Fonc Rejet</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('titre_fonc_code_rejet') is-invalid @enderror"
                                                name="titre_fonc_code_rejet" value="{{ old('titre_fonc_code_rejet') }}"
                                                placeholder="Fonction de rejet">
                                            @error('titre_fonc_code_rejet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">N° annulation</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('titre_num_annule') is-invalid @enderror"
                                                name="titre_num_annule" value="{{ old('titre_num_annule') }}"
                                                placeholder="Numéro d'annulation">
                                            @error('titre_num_annule')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="statut" value="REJ">
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="form-group mt-3">{{-- petite modification ici sur le mt-5 en mt-3 --}}
                                        <button class="btn btn-danger btn-block" type="submit">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--La separation des deux blocs de formulaires qui sont accessibles en fonction du champ select --}}
    <div id="layerdeux" class="layer">
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
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Date diff</label>
                                        <div class="col-lg-9">
                                            <input type="date"
                                                class="form-control @error('date_diff') is-invalid @enderror"
                                                name="date_diff" value="{{ old('date_diff') }}">
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
                                            <input type="text"
                                                class="form-control @error('motif_diff') is-invalid @enderror"
                                                name="motif_diff" value="{{ old('motif_diff') }}"
                                                placeholder="Motif de diff ">
                                            @error('motif_diff')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Date de PEC</label>
                                        <div class="col-lg-9">
                                            <input type="date"
                                                class="form-control @error('date_pec') is-invalid @enderror"
                                                name="date_pec" value="{{ old('date_pec') }}">
                                            @error('date_pec')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- gauche et droite -->
                                <div class="col-lg-6">
                                    {{-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">N° de bordéreau R</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('bord_numR') is-invalid @enderror"
                                                name="bord_numR" value="{{ old('bord_numR') }}"
                                                placeholder="Le numéro de bordéreau R">
                                            @error('bord_numR')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Geste code</label>
                                        <div class="col-lg-9">
                                            <input type="month"
                                                class="form-control @error('gest_code') is-invalid @enderror"
                                                name="gest_code" value="{{ old('gest_code') }}"
                                                placeholder="Geste code (ex: 2022)">
                                            @error('gest_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">N° annulation</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('titre_num_annule') is-invalid @enderror"
                                                name="titre_num_annule" value="{{ old('titre_num_annule') }}"
                                                placeholder="Numéro d'annulation">
                                            @error('titre_num_annule')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->antenne->id }}">
                                    <input type="hidden" name="statut" value="DIF">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Compte code</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('cpte_code') is-invalid @enderror"
                                                name="cpte_code" value="{{ old('cpte_code') }}"
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
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
			$('#menu').on('change', function(){
				var valeur = $(this).val(); 
				$("div.layer").hide();
				$("#layer"+valeur).fadeIn();
			});
		});
    </script>
</body>

</html>
@endsection