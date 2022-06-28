@extends('layouts.master')

@section('title')
    Vacations
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="container">
            <h1 class="h5 p-2 mb-4 bg-dark text-white">PAIEMENT DES VACATIONS</h1>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('vacations.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label offset-1">Date de paiement</label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control @error('date_vac') is-invalid @enderror"
                                            name="date_vac" value="{{ old('date_vac') }}" required>
                                        @error('date_vac')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label offset-1">Montant de la vacation</label>
                                    <div class="col-lg-6">
                                        <input type="number" class="form-control @error('mont_vac') is-invalid @enderror"
                                            name="mont_vac" value="{{ old('mont_vac') }}" required
                                            placeholder="Montant de la vacation">
                                        @error('mont_vac')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label offset-1">Vacataire</label>
                                    <div class="col-lg-6">
                                        <select
                                            class="form-control custom-select @error('vacataire_id') is-invalid @enderror"
                                            name="vacataire_id" value="{{ old('vacataire_id') }}">
                                            <option selected disabled>Vacataire concerné</option>
                                            @foreach ($vacataires as $vacataire)
                                                <option value="{{ $vacataire->id }}"> {{ $vacataire->matricule_vac }}
                                                    {{ $vacataire->nom }} {{ $vacataire->prenoms }}</option>
                                            @endforeach
                                        </select>
                                        @error('vacataire_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label offset-1">Exercice</label>
                                    <div class="col-lg-6">
                                        <select
                                            class="form-control custom-select @error('exercice_id') is-invalid @enderror"
                                            name="exercice_id" value="{{ old('exercice_id') }}">
                                            <option selected disabled>Année de réalisation de la vacation</option>
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
                            <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                            <input type="hidden" name="statut" value="F1S">
                        </div>

                        <div class="row">
                            <div class="col-lg-4 offset-lg-4">
                                <div class="form-group mt-3">
                                    <button class="btn btn-danger btn-block" type="submit">Payer la vacation</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
