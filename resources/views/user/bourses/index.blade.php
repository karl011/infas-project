@extends('layouts.master')

@section('title')
    Bourses
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> IMPRIMER</a>
        <a href="#collapseExer" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="collapseExer"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseExer">
                <div class="card-body">
                    <form method="POST" action="{{ route('bourses.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            {{-- <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Code de bourse</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required
                                    placeholder="Le code de la bourse (Ex: BO001)">
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Montant</label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control @error('montant') is-invalid @enderror" name="montant" value="{{ old('montant') }}" required
                                    placeholder="Le montant de la bourse">
                                    @error('montant')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">O paiement</label>
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('ordrepaiement') is-invalid @enderror" name="ordrepaiement" value="{{ old('ordrepaiement') }}">
                                        <option selected disabled>O paiement</option>   
                                        @foreach ($ordrepaiements as $ordrepaiement)
                                            <option value="{{ $ordrepaiement->id }}">{{ $ordrepaiement->num_ordre }}</option>
                                        @endforeach
                                    </select>
                                    @error('ordrepaiement')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            {{-- <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Etudiant</label>
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('etudiant_id') is-invalid @enderror" name="etudiant_id" value="{{ old('etudiant_id') }}">
                                        <option selected disabled>Etudiant concerné</option>
                                        @foreach ($etudiants as $etudiant)
                                            <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenoms }}</option>
                                        @endforeach
                                    </select>
                                    @error('etudiant_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Libelle</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}" required
                                    placeholder="Le libelle de la bourse">
                                    @error('libelle')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="statut" value="F1S">
                            <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
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
    <!-- DataTales Example
        Chargement des données de la base de données
    -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">LES BOURSES ENREGISTREES</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Code de la bourse</th>
                            <th>Nom et prénoms</th>
                            <th>Montant de la bourse</th>
                            <th>Libelle de la bourse</th>
                            {{-- <th>Statut de la bourse</th> --}}
                            {{-- <th>Editer</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bourses as $bourse)
                        <tr>
                            <td>{{ $bourse->code }}</td>
                            <td>{{ $bourse->etudiant->nom }} {{ $bourse->etudiant->prenoms }}</td>
                            <td>{{ $bourse->montant }}</td>
                            <td>{{ $bourse->libelle }}</td>
                            {{-- <td>{{ $bourse->statut }}</td> --}}
                            {{-- <td class="text-right">
                                <a type="button" href="#" class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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