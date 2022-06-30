@extends('layouts.master')

@section('title')
    types d'etudiant
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
                    <form method="POST" action="{{ route('types.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-10 offset-1">
                            <h4 class="m-0 font-weight-bold text-danger mb-5 text-center">IDENTIFICATION DES DIFFERENTS TYPES D'ETUDIANTS</h4>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Le libelle du type</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('lib_type') is-invalid @enderror" name="lib_type" value="{{ old('lib_type') }}" required
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
                                    <input type="number" min="0" class="form-control @error('montant_ins') is-invalid @enderror" name="montant_ins" value="{{ old('montant_ins') }}" required
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
                                    <input type="number" min="0" class="form-control @error('montant_scol') is-invalid @enderror" name="montant_scol" value="{{ old('montant_scol') }}" required
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
                                    <input type="number" min="0" class="form-control @error('montant_bourse') is-invalid @enderror" name="montant_bourse" value="{{ old('montant_bourse') }}" required
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
                                <button class="btn btn-primary btn-block" type="submit">Enregistrer</button>
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
            <h6 class="m-0 font-weight-bold text-danger">LA LISTE DES DIFFERENTS TYPES D'ETUDIANTS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Le libellé du type</th>
                            <th>Montant d'inscription</th>
                            <th>Montant de la scolarité</th>
                            <th>Montant de la bourse</th>
                            <th>Editer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->lib_type }}</td>
                            <td>{{ $type->montant_ins }}</td>
                            <td>{{ $type->montant_scol }}</td>
                            <td>{{ $type->montant_bourse }}</td>
                            <td class="text-right">
                                <a type="button" href="{{ route('types.edit', $type->id) }}" class="btn btn-info btn-sm">Modifier</a>
                                {{-- <form action="" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form> --}}
                            </td>
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