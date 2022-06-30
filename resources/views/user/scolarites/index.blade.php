@extends('layouts.master')

@section('title')
    Scolarites
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Impression</a> --}}
            <a href="#collapseExer" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
                role="button" aria-expanded="false" aria-controls="collapseExer"><i
                    class="fas fa-plus fa-sm text-white-50"></i>Nouvelle scolarité</a>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-1">
                <div class="card shadow mb-4 collapse" id="collapseExer">
                    <div class="card-body">
                        <form method="POST" action="{{ route('scolarites.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Etudiant</label>
                                        <div class="col-lg-9">
                                            <select id="inscription"
                                                class="form-control custom-select @error('inscription_id') is-invalid @enderror"
                                                name="inscription_id" value="{{ old('inscription_id') }}">
                                                <script>
                                                    let type = {};
                                                </script>
                                                <option disabled selected>Etudiant concerné</option>
                                                @foreach ($inscriptions as $inscription)
                                                    <option value="{{ $inscription->id }}">
                                                        {{ $inscription->etudiant->nom }}
                                                        {{ $inscription->etudiant->prenoms }}</option>
                                                    <script>
                                                        type['{{ $inscription->id }}'] = ['{{ $inscription->mont_scol }}',
                                                            '{{ $inscription->mont_scol - $inscription->scol_verse }}', '{{ $inscription->exercice->exe_code }}'
                                                        ]
                                                    </script>
                                                @endforeach
                                            </select>
                                            @error('inscription_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Versement</label>
                                        <div class="col-lg-9">
                                            <input type="number" min="0" id="montantVerse" onblur="recalculateSum();"
                                                class="form-control @error('montant_vers') is-invalid @enderror"
                                                name="montant_vers" value="{{ old('montant_vers') }}" required
                                                placeholder="Montant versé">
                                            @error('montant_vers')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Exercice</label>
                                        <div class="col-lg-9">
                                            <input type="text" id="exercice"
                                                class="form-control @error('exercice_id') is-invalid @enderror"
                                                name="exercice_id" readonly value="{{ old('exercice_id') }}">
                                            @error('exercice_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Montant S</label>
                                        <div class="col-lg-9">
                                            <input type="number" min="0" id="montantScol" readonly="readonly"
                                                class="form-control @error('montant_scol') is-invalid @enderror"
                                                name="montant_scol" value="{{ old('montant_scol') }}"
                                                placeholder="Montant de scolarité">
                                            @error('montant_scol')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Restant</label>
                                        <div class="col-lg-9">
                                            <input type="number" min="0" readonly id="montantRestant"
                                                class="form-control @error('montant_rest') is-invalid @enderror"
                                                name="montant_rest" value="{{ old('montant_rest') }}"
                                                placeholder="Montant de scolarité restant">
                                            @error('montant_rest')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <script>
                                        const scol = document.getElementById('montantScol')
                                        const reste = document.getElementById('montantRestant')
                                        const inscription = document.getElementById('inscription')
                                        const exercice = document.getElementById('exercice')
                                        inscription.addEventListener('change', (function() {
                                            scol.value = type[inscription.value][0]
                                            reste.value = type[inscription.value][1]
                                            exercice.value = type[inscription.value][2]
                                        }))
                                    </script>
                                    <input type="hidden" name="statut_scol" value="F1S">
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
        <!-- DataTales Example Chargement des données de la base de données-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-danger">LES SCOLARITES ENREGISTREES</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                        style="font-size: 0.8em;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Matricule</th>
                                <th>Nom et prénoms</th>
                                <th>Date de versement</th>
                                <th>Scolarité</th>
                                <th>Montant versé</th>
                                <th>Reste à payer</th>
                                <th>Année en cours</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scolarites as $scolarite)
                                <tr>
                                    <td>{{ $scolarite->etudiant->matricule_etd }}</td>
                                    <td>{{ $scolarite->etudiant->nom }} {{ $scolarite->etudiant->prenoms }}</td>
                                    <td>{{ $scolarite->date_scol }}</td>
                                    <td>{{ $scolarite->montant_scol }}</td>
                                    <td>{{ $scolarite->montant_vers }}</td>
                                    <td>{{ $scolarite->montant_rest }}</td>
                                    <td class="text-center">{{ $scolarite->exercice->exe_code }}</td>
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
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
