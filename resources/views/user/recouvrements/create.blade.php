@extends('layouts.master')

@section('title')
    Recouvrements
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
     <div class="container">
        <h1 class="h5 p-2 mb-5 bg-dark text-white">ENREGISTREMENT DE RECOUVREMENTS</h1>
    </div>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('recouvrements.store') }}">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="number" class="form-control @error('recouv_mont') is-invalid @enderror" name="recouv_mont" value="{{ old('recouv_mont') }}"
                                        placeholder="Montant de recouvrement">
                                        @error('recouv_mont')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                    <select class="form-control @error('recouv_mrg_code') is-invalid @enderror" name="recouv_mrg_code" value="{{ old('recouv_mrg_code') }}">
                                            <option selected disabled>Mode de règlement</option>
                                            <option>Chèque</option>
                                            <option>Espèce</option>
                                            <option>Virement</option>
                                        </select>
                                        @error('recouv_mrg_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('recouv_numBCV') is-invalid @enderror" name="recouv_numBCV" value="{{ old('recouv_numBCV') }}"
                                        placeholder="Le numéro du compte">
                                        @error('recouv_numBCV')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('recouv_op_num') is-invalid @enderror" name="recouv_op_num" value="{{ old('recouv_op_num') }}"
                                        placeholder="N° d'opération">
                                        @error('recouv_op_num')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="recouv_stat_code" value="F1S">
                                <input type="hidden" name="recouv_date" value="{{ date('Y'.'-'.'m'.'-'.'j') }}">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('recouv_fourn_code') is-invalid @enderror" name="recouv_fourn_code" value="{{ old('recouv_fourn_code') }}"
                                        placeholder="Code du fournisseur">
                                        @error('recouv_fourn_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('recouv_etex_mat') is-invalid @enderror" name="recouv_etex_mat" value="{{ old('recouv_etex_mat') }}"
                                        placeholder="Matricule de l'étudiant">
                                        @error('recouv_etex_mat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('recouv_vacex_mat') is-invalid @enderror" name="recouv_vacex_mat" value="{{ old('recouv_vacex_mat') }}"
                                        placeholder="Matricule du vacataire">
                                        @error('recouv_vacex_mat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <select class="form-control @error('exercice_id') is-invalid @enderror" name="exercice_id" value="{{ old('exercice_id') }}">
                                            <option>Exercices</option>
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
                                <div class="form-group mt-5">
                                    <button class="btn btn-danger btn-block" type="submit">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Debut dela ligne de recouvrement -->
    <div class="container">
        <h1 class="h5 p-2 mb-5 bg-dark text-white">ENREGISTREMENT DES LIGNES DE RECOUVREMENTS</h1>
    </div>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">

                <form method="POST" action="{{ route('ligneRecouvrement.store') }}">
                    @csrf
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lrecouv_num') is-invalid @enderror" name="lrecouv_num" value="{{ old('lrecouv_num') }}"
                                    placeholder="N° de ligne de recouvrement (Ex: Ligne001)">
                                    @error('lrecouv_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('lrecouv_lib') is-invalid @enderror" name="lrecouv_lib" value="{{ old('lrecouv_lib') }}"
                                    placeholder="Libelle de recouvrement">
                                    @error('lrecouv_lib')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('lrecouv_mont') is-invalid @enderror" name="lrecouv_mont" value="{{ old('lrecouv_mont') }}"
                                    placeholder="Le montant de recouvrement">
                                    @error('lrecouv_mont')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('lrecouv_qte') is-invalid @enderror" name="lrecouv_qte" value="{{ old('lrecouv_qte') }}"
                                    placeholder="La quantité">
                                    @error('lrecouv_qte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="lrecouv_stat_code" value="F1S">
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <select class="form-control @error('recouvrement_id') is-invalid @enderror" name="recouvrement_id" value="{{ old('recouvrement_id') }}">
                                        <option selected disabled>Le n° de recouvrement</option>
                                        @foreach ($recouvrements as $recouvrement)
                                            <option value="{{ (int)$recouvrement->id }}">{{ $recouvrement->recouv_num }}</option>
                                        @endforeach
                                    </select>
                                    @error('recouvrement_id')
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
@endsection

@section('script')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection