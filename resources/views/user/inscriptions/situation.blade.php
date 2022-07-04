@extends('layouts.master')

@section('title')
    Inscription/Situation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <h1 class="h5 p-2 mb-4 bg-dark text-white">SITUATION DE SYNTHESE D'UN ETUDIANT</h1>
        </div>

        <div class="container">
            <!-- Formulaire de recherche -->
            <div class="card mb-5">
                <div class="card-body">
                    <form method="POST" action="{{ route('inscriptions.search') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-">
                                        <input type="text" class="form-control" placeholder="Nom, prénoms ou matricule"
                                            name="search" {{ old('search') }}>
                                        @error('search')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-">
                                        <select class="form-control @error('exercice_id') is-invalid @enderror"
                                            name="exercice_id" value="{{ old('exercice_id') }}">
                                            <option selected disabled>Année d'exercice</option>
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
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-">
                                        <select class="form-control @error('niveau_etud') is-invalid @enderror"
                                            name="niveau_etud" value="{{ old('niveau_etud') }}">
                                            <option selected value="" >Niveau d'etude</option>
                                            @foreach (App\Models\Inscription::select('niveau_etud')->distinct()->get()  as $niveau)
                                                <option value="{{ $niveau->niveau_etud }}">{{ $niveau->niveau_etud }}</option>
                                            @endforeach
                                        </select>
                                        @error('niveau_etud')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-">
                                        <select class="form-control @error('filiere_id') is-invalid @enderror"
                                            name="filiere_id" value="{{ old('filiere_id') }}">
                                            <option selected disabled>Filière</option>
                                            @foreach ($filieres as $filiere)
                                                <option value="{{ $filiere->id }}">{{ $filiere->fil_lib }}</option>
                                            @endforeach
                                        </select>
                                        @error('filiere_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group row">
                                    <div class="col-lg-">
                                        <select class="form-control @error('antenne_id') is-invalid @enderror"
                                            name="antenne_id" value="{{ old('antenne_id') }}">
                                            <option selected disabled>Antenne</option>
                                            @foreach (App\Models\Antenne::all() as $antenne)
                                                <option value="{{ $antenne->id }}">{{ $antenne->ant_lib }}</option>
                                            @endforeach
                                        </select>
                                        @error('antenne_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 offset-4">
                                <div class="form-group mt-1">
                                    <button class="btn btn-primary btn-block" type="submit">Rechercher</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('inscriptions.permission') }}" method="post">
                            @csrf
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                                <thead class="thead-dark">
                                    <tr id="colonnes_tab">
                                        <th>Date Inscription</th>
                                        <th>Matricule</th>
                                        <th>Nom et prénoms</th>
                                        <th>Filière</th>
                                        <th>Antenne</th>
                                        <th>M scolarité</th>
                                        <th>M total payé</th>
                                        <th>Statut Scolarité</th>
                                    </tr>
                                    <script>
                                        var bool = false;
                                        const newColonne = document.getElementById('colonnes_tab')
                                    </script>
                                </thead>
                                <tbody>
                                    @if (Session::has('answer'))
                                        @foreach ($inscriptions as $inscription)
                                            <tr>
                                                <td>{{ $inscription->date_insc }}</td>
                                                <td>{{ $inscription->etudiant->matricule_etd }}</td>
                                                <td>{{ $inscription->etudiant->nom }}
                                                    {{ $inscription->etudiant->prenoms }}
                                                </td>
                                                <td>{{ $inscription->filiere->fil_lib }}</td>
                                                <td>{{ $inscription->antenne->ant_lib }}</td>
                                                <td>{{ $inscription->mont_scol }}</td>
                                                <td>{{ $inscription->scol_verse }}</td>
                                                <td class="text-center">
                                                    @if ($inscription->mont_scol == $inscription->scol_verse)
                                                        @php
                                                            $bool = false;
                                                        @endphp
                                                        <span style="font-size:1.9em;"
                                                            class="text-success font-weight-bold text-center"><i
                                                                class="fa fa-check" aria-hidden="true"></i></span>
                                                    @else
                                                        @php
                                                            $bool = true;
                                                        @endphp
                                                        <span style="font-size:1.9em;"
                                                            class="text-danger font-weight-bold text-center"><i
                                                                class="fa fa-times" aria-hidden="true"></i></span>
                                                    @endif
                                                </td>
                                                @if ($bool)
                                                    <script>
                                                        if (!bool) {
                                                            newColonne.innerHTML += '<th>Permission</th>'
                                                            bool = true
                                                        }
                                                    </script>
                                                    <td class="text-center">
                                                        @if (!$inscription->cas_special)
                                                            <input style="width: 40%" class="text-center" type="checkbox"
                                                                id="permission" name="cas_special[]"
                                                                value="{{ $inscription->id }}">
                                                        @else
                                                            <span style="font-size:1em;"
                                                                class="text-center text-success font-weight-bold">Permission
                                                                accordée</span>
                                                        @endif
                                                    </td>
                                                @else
                                                    <td class="text-center">
                                                        <span style="font-size:1em;"
                                                            class="text-center text-success font-weight-bold">Non requise</span>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="col-lg-4 offset-4" id="valider">

                            </div>
                            <script>
                                const valider = document.getElementById('valider')
                                if (bool == true) {
                                    valider.innerHTML =
                                        '<button type="submit" class="btn btn-success font-weight-bold btn-block">Accordez la permission</button>'
                                }
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
