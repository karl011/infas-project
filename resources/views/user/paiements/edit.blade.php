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
            <option value="un">REJETER UN ORDRE DE PAIEMENT</option>
            <option value="deux">DIFFERER UN ORDRE DE PAIEMENT</option>
        </select>
    </div>

    <div id="layerun" class="layer">
        <div class="container-fluid">
            <div class="container">
                <h1 class="h5 p-2 mb-4 bg-dark text-white">REJETER UN ORDRE DE PAIEMENT</h1>
            </div>
            <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Désolé !</strong> Il y a un problème avec les valeurs saisies.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="container">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('paiements.update', $ordrepaiement) }}">
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
                                                placeholder="Le motif de rejet">
                                            @error('motif_rej')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">PLC GST</label>
                                        <div class="col-lg-9">
                                            <input type="month"
                                                class="form-control @error('plc_gst') is-invalid @enderror"
                                                name="plc_gst" value="{{ old('plc_gst') }}">
                                            @error('plc_gst')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- gauche et droite -->
                                <div class="col-lg-6">
                                    <input type="hidden" name="statut" value="REJ">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">CPTE de PEC</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('cpte_pec') is-invalid @enderror"
                                                name="cpte_pec" value="{{ old('cpte_pec') }}"
                                                placeholder="Compte de prise en charge">
                                            @error('cpte_pec')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">N° B de rejet</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('ordre_bord_numR') is-invalid @enderror"
                                                name="ordre_bord_numR" value="{{ old('ordre_bord_numR') }}"
                                                placeholder="Bordereau N° de rejet">
                                            @error('ordre_bord_numR')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">N° annule</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('ordre_num_annule') is-invalid @enderror"
                                                name="ordre_num_annule" value="{{ old('ordre_num_annule') }}"
                                                placeholder="Numéro d'annulation">
                                            @error('ordre_num_annule')
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
{{-- separation des block d'action --}}
    <div id="layerdeux" class="layer">
        <div class="container-fluid">
            <div class="container">
                <h1 class="h5 p-2 mb-4 bg-dark text-white">DIFFERER UN ORDRE DE PAIEMENT</h1>
            </div>
            <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Désolé !</strong> Il y a un problème avec les valeurs saisies.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="container">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('paiements.update', $ordrepaiement) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Date Diff</label>
                                        <div class="col-lg-9">
                                            <input type="date"
                                                class="form-control @error('date_ordre') is-invalid @enderror"
                                                name="date_ordre" value="{{ old('date_ordre') }}">
                                            @error('date_ordre')
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
                                                placeholder="Le motif  de différer">
                                            @error('motif_diff')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Emission</label>
                                        <div class="col-lg-9">
                                            <input type="date"
                                                class="form-control @error('date_emission') is-invalid @enderror"
                                                name="date_emission" value="{{ old('date_emission') }}">
                                            @error('date_emission')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- gauche et droite -->
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Montant net</label>
                                        <div class="col-lg-9">
                                            <input type="number"
                                                class="form-control @error('mont_net_ordre') is-invalid @enderror"
                                                name="mont_net_ordre" value="{{ old('mont_net_ordre') }}"
                                                placeholder="Le montant net de l'op">
                                            @error('mont_net_ordre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">PLC GST</label>
                                        <div class="col-lg-9">
                                            <input type="month"
                                                class="form-control @error('plc_gst') is-invalid @enderror"
                                                name="plc_gst" value="{{ old('plc_gst') }}">
                                            @error('plc_gst')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="statut" value="DIF">
                                    <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->antenne->id }}">
                                    {{-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Date de validation sgc</label>
                                        <div class="col-lg-9">
                                            <input type="date"
                                                class="form-control @error('date_val_sgc') is-invalid @enderror"
                                                name="date_val_sgc" value="{{ old('date_val_sgc') }}">
                                            @error('date_val_sgc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Date de validation cds</label>
                                        <div class="col-lg-9">
                                            <input type="date"
                                                class="form-control @error('date_val_cds') is-invalid @enderror"
                                                name="date_val_cds" value="{{ old('date_val_cds') }}">
                                            @error('date_val_cds')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Bordereau N° de validation</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('ordre_bord_numV') is-invalid @enderror"
                                                name="ordre_bord_numV" value="{{ old('ordre_bord_numV') }}"
                                                placeholder="Bordereau N° de validation">
                                            @error('ordre_bord_numV')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}
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
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
    </script>
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