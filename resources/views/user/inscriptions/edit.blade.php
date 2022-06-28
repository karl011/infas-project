@extends('layouts.master')

@section('title')
    Edition d'une inscription
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="container">
            <h1 class="h5 p-2 mb-4 bg-dark text-white">MODIFICATION DES INSCRIPTIONS</h1>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('inscriptions.update', $inscription) }}">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $inscriptions['id'] }}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">La date ins</label>
                                    <div class="col-lg-9">
                                        <input type="date" class="form-control @error('date_insc') is-invalid @enderror"
                                            name="date_insc" value="{{ $inscriptions['date_insc'] }}" required>
                                        @error('date_insc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Montan I</label>
                                    <div class="col-lg-9">
                                        <input type="number" readonly class="form-control @error('mont_insc') is-invalid @enderror"
                                            name="mont_insc" value="{{ $inscriptions['mont_insc'] }}" required
                                            placeholder="Montant d'inscription">
                                        @error('mont_insc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Montant S</label>
                                    <div class="col-lg-9">
                                        <input type="number" readonly class="form-control @error('mont_scol') is-invalid @enderror"
                                            name="mont_scol" value="{{ $inscriptions['mont_scol'] }}" required
                                            placeholder="Montant de scolarité">
                                        @error('mont_scol')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Montant B</label>
                                    <div class="col-lg-9">
                                        <input type="number" readonly class="form-control @error('mont_bour') is-invalid @enderror"
                                            name="mont_bour" value="{{ $inscriptions['mont_bour'] }}" required
                                            placeholder="Montant de bourse">
                                        @error('mont_bour')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Etudiant</label>
                                    <div class="col-lg-9">
                                        <select class="form-control @error('etudiant_id') is-invalid @enderror"
                                            name="etudiant_id" value="{{ $inscriptions['etudiant_id'] }}">
                                            <option>Etudiant concerné</option>
                                            @foreach ($etudiants as $etudiant)
                                                <option value="{{ $etudiant->id }}">{{ $etudiant->nom }}
                                                    {{ $etudiant->prenoms }}</option>
                                            @endforeach
                                        </select>
                                        @error('etudiant_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Exercice</label>
                                    <div class="col-lg-9">
                                        <select class="form-control @error('exercice_id') is-invalid @enderror"
                                            name="exercice_id" value="{{ $inscriptions['exercice_id'] }}">
                                            <option>Année en cours</option>
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
                                    <label class="col-lg-3 col-form-label">Filière</label>
                                    <div class="col-lg-9">
                                        <select class="form-control @error('filiere_id') is-invalid @enderror"
                                            name="filiere_id" value="{{ $inscriptions['filiere_id'] }}">
                                            <option>Choisir la filière</option>
                                            @foreach ($filieres as $filiere)
                                                <option value="{{ (int) $filiere->id }}">{{ $filiere->fil_lib }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('filiere_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Antenne</label>
                                    <div class="col-lg-9">
                                        <select class="form-control @error('antenne_id') is-invalid @enderror"
                                            name="antenne_id" value="{{ $inscriptions['antenne_id'] }}">
                                            <option>Choisir la l'antenne</option>
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
                                <input type="hidden" name="statut" value="F1S">
                            </div>
                        </div>
                        <div class="form-group row">
                                {{-- <label class="col-lg-3 col-form-label">Niveau d'étude</label> --}}
                                <div class="col-lg-10 offset-1">{{-- custom-select --}}
                                <select class="form-control @error('niveau_etud') is-invalid @enderror" name="niveau_etud" value="{{ $inscriptions['niveau_etud'] }}">
                                        <option disabled selected>Choisir le niveau d'étude</option>
                                        <option>1ère année</option>
                                        <option>2ème année</option>
                                        <option>3ème année</option>
                                    </select>
                                    @error('niveau_etud')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="form-group mt-5">
                                    <button class="btn btn-danger btn-block" type="submit">Enregistrer les
                                        modifications</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
