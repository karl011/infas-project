@extends('layouts.master')

@section('title')
    modification des types
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
 <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="#collapseExer" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="collapseExer"><i class="fas fa-plus fa-sm text-white-50"></i> Afficher les données à modifier</a>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseExer">
                <div class="card-body">
                    <form method="POST" action="{{ route('types.update', $types) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-10 offset-1">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Le libelle du type</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('lib_type') is-invalid @enderror" name="lib_type" value="{{ $types['lib_type'] }}" required
                                    placeholder="Le libellé du type d'étudiant">
                                    @error('lib_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Montant d'inscription</label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control @error('montant_ins') is-invalid @enderror" name="montant_ins" value="{{ $types['montant_ins'] }}" required
                                    placeholder="Le montant d'inscription">
                                    @error('montant_ins')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Montant de scolarité</label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control @error('montant_scol') is-invalid @enderror" name="montant_scol" value="{{ $types['montant_scol'] }}" required
                                    placeholder="Le montant de la scolarité">
                                    @error('montant_scol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Montant de la bourse</label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control @error('montant_bourse') is-invalid @enderror" name="montant_bourse" value="{{ $types['montant_bourse'] }}" required
                                    placeholder="Le montant de la bourse">
                                    @error('montant_bourse')
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
                                <button class="btn btn-primary btn-block" type="submit">Enregistrer les modifications</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
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