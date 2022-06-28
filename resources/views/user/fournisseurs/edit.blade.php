@extends('layouts.master')

@section('title')
Fournisseur
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">MODIFICATION DES INFORMATIONS D'UN FOURNISSEUR</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('fournisseurs.update', $fournisseur) }}">
                    @csrf
                    @method('put')
                    {{-- <input type="hidden" name="id" value="{{ $fournisseurs['id'] }}"> --}}
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Le code</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('code_four') is-invalid @enderror" name="code_four" value="{{ $fournisseurs['code_four']}}" required placeholder="Le code fournisseur">
                                    @error('code_four')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Identifiants</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('nom_four') is-invalid @enderror" name="nom_four" value="{{ $fournisseurs['nom_four']}}" required placeholder="Nom et prénoms du fournisseur">
                                    @error('nom_four')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Adresse</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('adresse_four') is-invalid @enderror" name="adresse_four" value="{{ $fournisseurs['adresse_four']}}">
                                    @error('adresse_four')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Le RIB</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('rib_four') is-invalid @enderror" name="rib_four" value="{{ $fournisseurs['rib_four']}}" placeholder="Le rib du fournisseur ">
                                    @error('rib_four')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Téléphone</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('tel_four') is-invalid @enderror" name="tel_four" value="{{ $fournisseurs['tel_four']}}" placeholder="L'adresse e-mail">
                                    @error('tel_four')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="form-group mt-3">
                                <button class="btn btn-danger btn-block" type="submit">Enregistrer les modifications</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection