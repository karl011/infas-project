@extends('layouts.master')
@section('title')
    Importation ou exportation de données
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-light bg-dark">Importer un fichier excel dans la base de données</div>
                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-8 offset-2">
                                    <div class="form-group row">
                                        <input type="file" name="fichier" required />
                                        <button type="submit" class="btn btn-primary col-lg-3">Importer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-light bg-dark">Exporter des données depuis la base de données en fichier excel ou
                        csv</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('excel.export') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group row">
                                        <input type="text" class="form-control" name="fichier"
                                            placeholder="Nom de fichier" required>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group row">
                                        <select name="antenne" class="form-control">
                                            <option value="*">Tout</option>
                                            @foreach (App\Models\Antenne::all() as $ant)
                                                <option value="{{ $ant->id }}">{{ $ant->ant_lib }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group row">
                                        <select name="extension" class="form-control text-center">
                                            <option value="xlsx">.xlsx</option>
                                            <option value="csv">.csv</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 offset-4">
                                    <div class="form-group mt-1">
                                        <button type="submit" class="btn btn-success btn-block">Exporter par antenne</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-light bg-dark" >Etat des étudiants inscrits</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('excel.exporti') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group row">
                                        <input type="text" class="form-control" name="fichier"
                                            placeholder="Nom de fichier" required>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group row">
                                        <select name="antenne" class="form-control">
                                            <option value="*">Tout</option>
                                            @foreach (App\Models\Antenne::all() as $ant)
                                                <option value="{{ $ant->id }}">{{ $ant->ant_lib }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group row">
                                        <select name="filiere" class="form-control">
                                            <option value="*">Tout</option>
                                            @foreach (App\Models\Filiere::all() as $fil)
                                                <option value="{{ $fil->id }}">{{ $fil->fil_lib }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group row">
                                        <select name="extension" class="form-control text-center">
                                            <option value="xlsx">.xlsx</option>
                                            <option value="csv">.csv</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 offset-4">
                                    <div class="form-group mt-1">
                                        <button type="submit" class="btn btn-success btn-block">Exporter par filière</button>
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
