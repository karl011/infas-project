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
                    <form method="POST" action="{{ route('vacataires.update', $vacataire) }}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Matricule</label>
                                    <div class="col-lg-9">
                                        <input type="text"
                                            class="form-control @error('matricule_vac') is-invalid @enderror"
                                            name="matricule_vac" value="{{ $vacataires['matricule_vac'] }}" required
                                            placeholder="Le matricule du vacataire">
                                        @error('matricule_vac')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nom</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                            name="nom" value="{{ $vacataires['nom'] }}" required placeholder="Nom">
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
                                            name="prenoms" value="{{ $vacataires['prenoms'] }}" required
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
                                        <input type="date" class="form-control @error('date_naiss') is-invalid @enderror"
                                            name="date_naiss" value="{{ $vacataires['date_naiss'] }}">
                                        @error('date_naiss')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Email</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $vacataires['email'] }}"
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
                                            name="phone_1" value="{{ $vacataires['phone_1'] }}"
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
                                            name="rib" value="{{ $vacataires['rib'] }}"
                                            placeholder="Le rib du vacataire" required>
                                        @error('rib')
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
                                <div class="form-group mt-2">
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
