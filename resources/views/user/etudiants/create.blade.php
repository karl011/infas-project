@extends('layouts.master')

@section('title')
    Etudiant
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <h1 class="h5 p-2 mb-5 bg-dark text-white">IDENTIFICATION DES ETUDIANTS</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('etudiants.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Matricule</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('matricule_etd') is-invalid @enderror" name="matricule_etd" value="{{ old('matricule_etd') }}" required
                                    placeholder="Matricule de l'étudiant">
                                    @error('matricule_etd')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nom</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required
                                    placeholder="Nom">
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Prénoms</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('prenoms') is-invalid @enderror" name="prenoms" value="{{ old('prenoms') }}" required
                                    placeholder="Prénoms">
                                    @error('prenoms')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Né(e) le</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('naissance') is-invalid @enderror" name="naissance" value="{{ old('naissance') }}" required
                                    placeholder="Date de naissance">
                                    @error('naissance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Lieu</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lieu') is-invalid @enderror" name="lieu" value="{{ old('lieu') }}" required
                                    placeholder="Lieu de naissance">
                                    @error('lieu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Genre</label>
                                <div class="col-lg-9">
                                    <select class="form-control @error('sexe') is-invalid @enderror" name="sexe" value="{{ old('sexe') }}">
                                        <option disabled selected>Le genre</option>
                                        <option value="M">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                    @error('sexe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Email</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required
                                    placeholder="L'adresse e-mail">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Téléphone</label>
                                <div class="col-lg-9">
                                    <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"
                                    placeholder="Numéro de téléphone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Nationalité</label>
                                <div class="col-lg-9">{{-- custom-select --}}
                                <select class="form-control @error('nationalite') is-invalid @enderror" name="nationalite" value="{{ old('nationalite') }}">
                                        <option disabled selected>Choisir la nationalité</option>
                                        <option>Ivoirienne</option>
                                        <option>Autres</option>
                                    </select>
                                    @error('nationalite')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Le type</label>
                                <div class="col-lg-9">
                                    <select class="form-control  @error('type_id') is-invalid @enderror" name="type_id" value="{{ old('type_id') }}">
                                        <option disabled selected>Choisir le type de l'étudiant</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->lib_type }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Antenne</label>
                                <div class="col-lg-9">
                                    <select class="form-control  @error('antenne_id') is-invalid @enderror" name="antenne_id" value="{{ old('antenne_id') }}">
                                        <option disabled selected>Choisir l'antenne</option>
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
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Boursier</label>
                                <div class="col-lg-9">
                                    <select class="form-control @error('boursier') is-invalid @enderror" name="boursier" value="{{ old('boursier') }}">
                                        <option disabled selected>Boursier / Non boursier</option>
                                        <option value="OUI">Oui</option>
                                        <option value="NON">Non</option>
                                    </select>
                                    @error('boursier')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="statut" value="F1S">
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