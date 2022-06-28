@extends('layouts.master')

@section('title')
    Bordéreaux
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">ENREGISTREMENT DES BORDEREAUX</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('bordereaux.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Le N°</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('num_bord') is-invalid @enderror" name="num_bord" value="{{ old('num_bord') }}" required
                                    placeholder="Le N° de bordérau">
                                    @error('num_bord')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Le type</label>
                                <div class="col-lg-9">
                                    <select aria-selected="true"
                                        class="form-control @error('type_bord') is-invalid @enderror" name="type_bord"
                                        value="{{ old('type_bord') }}">
                                        <option selected disabled>Le type de bordéreau</option>
                                        <option>Bordéreaux de paiements</option>
                                        <option>Bordéreaux de recettes</option>
                                    </select>
                                    @error('type_bord')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Direction</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('direction_bord') is-invalid @enderror" name="direction_bord" value="{{ old('direction_bord') }}" required
                                    placeholder="Direction de bordéreau">
                                    @error('direction_bord')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de transmission</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_trans_bord') is-invalid @enderror" name="date_trans_bord" value="{{ old('date_trans_bord') }}" required>
                                    @error('date_trans_bord')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Catégorie</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('categorie_bord') is-invalid @enderror" name="categorie_bord" value="{{ old('categorie_bord') }}" required
                                    placeholder="Catégorie de bordéreau">
                                    @error('categorie_bord')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Montant</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('montant_bord') is-invalid @enderror" name="montant_bord" value="{{ old('montant_bord') }}" required
                                    placeholder="Montant de bordéreau">
                                    @error('montant_bord')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                            <input type="hidden" name="statut_bord" value="F1S">
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