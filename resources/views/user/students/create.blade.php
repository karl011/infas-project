@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Importer un fichier excel dans la base de données</div>
                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="fichier" />
                                <button type="submit" class="btn btn-primary">Importer</button>
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
                    <div class="card-header text-center">Exportation de données depuis la base de données fichier excel ou
                        csv</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('excel.export') }}">
                            @csrf
                            <input type="text" name="fichier" placeholder="Nom de fichier">

                            <select name="antenne">
                                <option value="*">Tout</option>
                                @foreach (App\Models\Antenne::all() as $ant)
                                    <option value="{{ $ant->id }}">{{ $ant->ant_lib }}</option>
                                @endforeach
                            </select>
                            <select name="extension">
                                <option value="xlsx">.xlsx</option>
                                <option value="csv">.csv</option>
                            </select>
                            <button type="submit" class="btn btn-success">Exporter par antenne</button>
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
                    <div class="card-header text-center">Etat des étudiants inscrits</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('excel.exporti') }}">
                            @csrf
                            <input type="text" name="fichier" placeholder="Nom de fichier">

                            <select name="antenne">
                                <option value="*">Tout</option>
                                @foreach (App\Models\Antenne::all() as $ant)
                                    <option value="{{ $ant->id }}">{{ $ant->ant_lib }}</option>
                                @endforeach
                            </select>
                            <select name="filiere">
                                <option value="*">Tout</option>
                                @foreach (App\Models\Filiere::all() as $fil)
                                    <option value="{{ $fil->id }}">{{ $fil->fil_lib }}</option>
                                @endforeach
                            </select>
                            <select name="extension">
                                <option value="xlsx">.xlsx</option>
                                <option value="csv">.csv</option>
                            </select>
                            <button type="submit" class="btn btn-info">Exporter par filière</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
