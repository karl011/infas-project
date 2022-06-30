@extends('layouts.master')

@section('title')
    Ordre de paiement
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">LES ORDRES DE PAIEMENTS</h1>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="text-danger text-center">{{ $error }}</div>
        @endforeach
    @endif
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('paiements.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Le N° de paiement</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('num_ordre') is-invalid @enderror"
                                        name="num_ordre" value="{{ old('num_ordre') }}" required
                                        placeholder="Le numéro de la paiement">
                                    @error('num_ordre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de OP</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_op') is-invalid @enderror"
                                        name="date_op" value="{{ old('date_op') }}" required>
                                    @error('date_op')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">M paiement</label>
                                <div class="col-lg-9">
                                    <input type="number" min="0" class="form-control @error('mont_ordre') is-invalid @enderror"
                                        name="mont_ordre" value="{{ old('mont_ordre') }}"
                                        placeholder="Montant de paiement">
                                    @error('mont_ordre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">N°compte</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('numero_cpte') is-invalid @enderror"
                                        name="numero_cpte" value="{{ old('numero_cpte') }}"
                                        placeholder="Numéro de compte">
                                    @error('numero_cpte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">N° liquidation</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('numero_liq') is-invalid @enderror"
                                        name="numero_liq" value="{{ old('numero_liq') }}"
                                        placeholder="Numéro liquidation">
                                    @error('numero_liq')
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
                                <label class="col-lg-3 col-form-label">Mode de reglement</label>
                                <div class="col-lg-9">
                                    <select aria-selected="true"
                                        class="form-control @error('mrg_code') is-invalid @enderror" name="mrg_code"
                                        value="{{ old('mrg_code') }}">
                                        <option selected disabled>Le mode reglement</option>
                                        <option>Espèce</option>
                                        <option>Chèque</option>
                                        <option>Virement</option>
                                    </select>
                                    @error('mrg_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Banque</label>
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('banque_id') is-invalid @enderror" name="banque_id" value="{{ old('banque_id') }}">
                                        <option selected disabled>Choisir la banque</option>
                                        @foreach ($banques as $banque)
                                            <option value="{{ $banque->id }}">{{ $banque->ban_design }}</option>
                                        @endforeach
                                    </select>
                                    @error('banque_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Imputation</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('cpte_ordre') is-invalid @enderror"
                                        name="cpte_ordre" value="{{ old('cpte_ordre') }}" placeholder="Imputation de l'OP">
                                    @error('cpte_ordre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Objet</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('objet') is-invalid @enderror"
                                        name="objet" value="{{ old('objet') }}" required
                                        placeholder="Objet de paiement">
                                    @error('objet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Bordéreau</label>
                                <div class="col-lg-9">
                                    <select
                                        class="form-control custom-select @error('bordereau_id') is-invalid @enderror"
                                        name="bordereau_id" value="{{ old('bordereau_id') }}">
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
                            <input type="hidden" name="date_saisie" value="{{ date('Y'.'-'.'m'.'-'.'j')}}">
                            <input type="hidden" name="statut" value="F1S">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                            <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Exercice</label>
                                <div class="col-lg-9">
                                    <select
                                        class="form-control custom-select @error('exercice_id') is-invalid @enderror"
                                        name="exercice_id" value="{{ old('exercice_id') }}">
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