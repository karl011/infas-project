@extends('layouts.master')

@section('title')
Coordonnées bancaires
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">LIAISON DES COORDONNEES BANCAIRES A UN ETUDIANT</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('etubanques.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 offset-2">
                            <div class="form-group row">
                            <label class="col-lg-4 col-form-label">La Banque</label>
                            <div class="col-lg-8">
                                <select class="form-control custom-select @error('banque_id') is-invalid @enderror" name="banque_id" value="{{ old('banque_id') }}">
                                    <option selected disabled>La banque concerné</option>
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
                                <label class="col-lg-4 col-form-label">Le code</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('code_banque') is-invalid @enderror" name="code_banque" value="{{ old('code_banque') }}" placeholder="le code de la banque">
                                    @error('code_banque')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Compte</label>
                                <div class="col-lg-8">
                                    <input type="text" id="ids" class="form-control @error('numero_cpte_banque') is-invalid @enderror" name="numero_cpte_banque" value="{{ old('numero_cpte_banque') }}" placeholder="Compte de la banque">
                                    @error('numero_cpte_banque')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Etudiant</label>
                                <div class="col-lg-8">
                                    <select class="form-control custom-select @error('etudiant_id') is-invalid @enderror" name="etudiant_id" value="{{ old('etudiant_id') }}">
                                        <option selected disabled>Etudiant concerné</option>
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
@section('script')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
