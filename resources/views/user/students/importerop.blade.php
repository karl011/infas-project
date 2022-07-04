@extends('layouts.master')
@section('title')
    Importation ou exportation de données
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-light bg-dark">Importer un fichier excel d'ordre de paiement.
                    </div>
                    <div class="card-body">
                        <form action="{{ route('students.postImporter') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 offset-2">
                                    <div class="form-group row">
                                        <input type="file" name="fichier" required />
                                        {{-- <select class="form-group">
                                            <option value="">Type de bénéficiaire</option>
                                            <option value="Etudiants">Etudiants</option>
                                            <option value="Fournisseurs">Fournisseurs</option>
                                            <option value="Vacataires">Vacataires</option>
                                        </select> --}}
                                        <button type="submit" class="btn btn-primary col-lg-4">Importer un OP</button>
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
