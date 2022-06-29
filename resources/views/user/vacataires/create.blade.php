@extends('layouts.master')

@section('title')
    Vacataire
@endsection

@section('content')
    <div class="container-fluid">

        <div class="container">
            <h1 class="h5 p-2 mb-4 bg-dark text-white">IDENTIFICATION DE VACATAIRES</h1>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('vacataires.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nom</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                            name="nom" value="{{ old('nom') }}" required placeholder="Nom">
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
                                        <input type="text" class="form-control @error('prenoms') is-invalid @enderror"
                                            name="prenoms" value="{{ old('prenoms') }}" required placeholder="Prénoms">
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
                                        <input type="date" class="form-control @error('date_naiss') is-invalid @enderror"
                                            name="date_naiss" value="{{ old('date_naiss') }}">
                                        @error('date_naiss')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Genre</label>
                                    <div class="col-lg-9">
                                        <select class="form-control custom-select @error('sexe') is-invalid @enderror"
                                            name="sexe" value="{{ old('sexe') }}" required>
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
                                <div class="offset-3">
                                    {{-- <label for="matr_oui">Sans matricule</label> --}}
                                    {{-- <label for="matr_non">Avec un matricule</label> --}}
                                    <label for="matricule" class="font-weight-bold text-danger"
                                        style="font-size: 1em; text-transform:uppercase">Le vacataire a t-il un matricule ?</label><br>
                                    <div class="row">
                                        <div class="col-lg-4 offset-2">
                                            <input type="radio" name="matr" id="matr_oui" checked value="oui">
                                            <label class="font-weight-bold text-danger" for="matr_oui"> NON</label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="radio" name="matr" id="matr_non" value="non">
                                            <label class="font-weight-bold text-primary" for="matr_non"> OUI</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Email</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}"
                                            placeholder="L'adresse e-mail">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Téléphone</label>
                                    <div class="col-lg-9">
                                        <input type="phone" class="form-control @error('phone_1') is-invalid @enderror"
                                            name="phone_1" value="{{ old('phone_1') }}"
                                            placeholder="Numéro de téléphone">
                                        @error('phone_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">RIB</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('rib') is-invalid @enderror"
                                            name="rib" value="{{ old('rib') }}"
                                            placeholder="Le rib du vacataire" required>
                                        @error('rib')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Le Type</label>
                                    <div class="col-lg-9">
                                        <select aria-selected="true"
                                            class="form-control @error('type') is-invalid @enderror" name="type"
                                            value="{{ old('type') }}">
                                            <option selected disabled>Le type de vacataire</option>
                                            <option>Enseignant</option>
                                            <option>Enseignant chercheur</option>
                                            <option>Doctorant</option>
                                            <option>Autres</option>
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <script>
                                    document.getElementById('matr_non').addEventListener('change', (function() {
                                        if (document.getElementById('matr_non').checked) {
                                            document.getElementById('new_matr').style.display = 'flex'
                                        }
                                    }))
                                    document.getElementById('matr_oui').addEventListener('change', (function() {
                                        document.getElementById('new_matr').style.display = 'none'
                                    }))
                                </script>
                                <div class="form-group row" id="new_matr" style="display: none">
                                    @if ($errors->has('matricule_vac'))
                                        <script>
                                            document.getElementById('matr_non').checked = true;
                                            document.getElementById('new_matr').style.display = 'flex'
                                        </script>
                                    @endif
                                    <label class="col-lg-3 col-form-label">Matricule</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('matricule_vac') is-invalid @enderror"
                                            name="matricule_vac" value="{{ old('matricule_vac') }}"
                                            placeholder="Matricule">
                                        @error('matricule_vac')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                                <input type="hidden" name="statut" value="F1S">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="form-group mt-2">
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
