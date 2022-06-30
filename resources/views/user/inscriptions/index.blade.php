@extends('layouts.master')

@section('title')
    Etudiants inscrits
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <a href="{{ route('inscriptions.create') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" role="button"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Inscrire</a>
            </div>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">LISTE DES ETUDIANTS INSCRITS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr id="colonnes_tab">
                                    <th>Date inscription</th>
                                    <th>Matricule</th>
                                    <th>Nom et Prénoms</th>
                                    <th>Montant</th>
                                    <th>Filière</th>
                                    <th>Niveau et année</th>
                                    <th>Reçu</th>
                                    <th>Modifier</th>
                                    <th>Payer scolarité</th>
                                </tr>
                                <script>
                                        var bool = false;
                                        const newColonne = document.getElementById('colonnes_tab')
                                    </script>
                            </thead>
                            <tbody>
                                <script>
                                    let type = {};
                                </script>
                                @foreach ($inscriptions as $inscription)
                                    <tr>
                                        <td>{{ $inscription->date_insc }}</td>
                                        <td>{{ $inscription->etudiant->matricule_etd }}</td>
                                        <td>{{ $inscription->etudiant->nom }} {{ $inscription->etudiant->prenoms }}</td>
                                        <td>{{ $inscription->mont_insc }}</td>
                                        <td>{{ $inscription->filiere->fil_lib }}</td>
                                        <td>{{ $inscription->niveau_etud }} ; {{ $inscription->exercice->exe_code }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('inscriptions.show', $inscription->id) }}"
                                                class="btn btn-danger btn-sm"><i class="fas fa-fw fa-download"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a type="button" href="{{ route('inscriptions.edit', $inscription->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                        </td>
                                        <td class="text-center">
                                            @if ($inscription->mont_scol == $inscription->scol_verse)
                                                @php
                                                    $bool = false;
                                                @endphp
                                                <span style="font-size:1.9em;"
                                                    class="text-success font-weight-bold text-center"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            @else
                                                @php
                                                    $bool = true;
                                                @endphp
                                                <button type="button" value="{{ $inscription->id }}"
                                                class="payer btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#myModal"><i class="fas fa-fw fa-money-bill"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                    <script>
                                        type['{{ $inscription->id }}'] = ['{{ $inscription->mont_scol }}',
                                            '{{ $inscription->mont_scol - $inscription->scol_verse }}', '{{ $inscription->exercice->exe_code }}'
                                        ]
                                    </script>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Effectuer le paiement d'une scolarité</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('scolarites.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" name="inscription_id" id="inscription_id">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Versement</label>
                                        <div class="col-lg-9">
                                            <input type="number" id="montantVerse" min="0"
                                                onblur="recalculateSum();"
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
                                            <input type="number" id="montantScol" readonly="readonly"
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
                                            <input type="number" readonly id="montantRestant"
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
                                        var payer = document.getElementsByClassName('payer')
                                        for (var i = 0; i < payer.length; i++) {
                                            payer[i].addEventListener('click', (function() {
                                                document.getElementById('inscription_id').value = this.value
                                                document.getElementById('montantScol').value = type[this.value][0]
                                                document.getElementById('montantRestant').value = type[this.value][1]
                                                document.getElementById('exercice').value = type[this.value][2]
                                            }));
                                        }
                                    </script>
                                    <input type="hidden" name="statut_scol" value="F1S">
                                    <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 offset-lg-3">
                                    <div class="form-group mt-5">
                                        <button class="btn btn-success btn-block" type="submit">Enregistrer</button>
                                        <button type="button" class="btn btn-danger btn-block"
                                            data-dismiss="modal">Fermer</button>
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
