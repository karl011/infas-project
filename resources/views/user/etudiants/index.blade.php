@extends('layouts.master')

@section('title')
    Etudiants
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <button type="button" class="payer btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><i
                        class="fas fa-plus fa-sm text-white-50"></i>Ajouter directement</button>
                <a href="{{ route('etudiants.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                    role="button"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
            </div>
        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Identification d'un nouvel étudiant</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('etudiants.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Matricule</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('matricule_etd') is-invalid @enderror"
                                                name="matricule_etd" value="{{ old('matricule_etd') }}" required
                                                placeholder="Matricule de l'étudiant">
                                            @error('matricule_etd')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Nom</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                                name="nom" value="{{ old('nom') }}" required placeholder="Nom">
                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Prénoms</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('prenoms') is-invalid @enderror" name="prenoms"
                                                value="{{ old('prenoms') }}" required placeholder="Prénoms">
                                            @error('prenoms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Né(e) le</label>
                                        <div class="col-lg-9">
                                            <input type="date"
                                                class="form-control @error('naissance') is-invalid @enderror"
                                                name="naissance" value="{{ old('naissance') }}" required
                                                placeholder="Date de naissance">
                                            @error('naissance')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Lieu</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control @error('lieu') is-invalid @enderror"
                                                name="lieu" value="{{ old('lieu') }}" required
                                                placeholder="Lieu de naissance">
                                            @error('lieu')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Genre</label>
                                        <div class="col-lg-9">
                                            <select class="form-control @error('sexe') is-invalid @enderror" name="sexe"
                                                value="{{ old('sexe') }}">
                                                <option disabled selected>Le genre</option>
                                                <option value="M">Homme</option>
                                                <option value="F">Femme</option>
                                            </select>
                                            @error('sexe')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Téléphone</label>
                                        <div class="col-lg-9">
                                            <input type="phone" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}"
                                                placeholder="Numéro de téléphone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Email</label>
                                        <div class="col-lg-9">
                                            <input type="text"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" placeholder="L'adresse e-mail">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">RIB</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control @error('rib') is-invalid @enderror"
                                                name="rib" value="{{ old('rib') }}"
                                                placeholder="Le rib de l'étudiant" required>
                                            @error('rib')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Nationalité</label>
                                        <div class="col-lg-9">{{-- custom-select --}}
                                            <select class="form-control @error('nationalite') is-invalid @enderror"
                                                name="nationalite" value="{{ old('nationalite') }}">
                                                <option disabled selected>Choisir la nationalité</option>
                                                <option>Ivoirienne</option>
                                                <option>Autres</option>
                                            </select>
                                            @error('nationalite')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Le type</label>
                                        <div class="col-lg-9">
                                            <select class="form-control  @error('type_id') is-invalid @enderror"
                                                name="type_id" value="{{ old('type_id') }}">
                                                <option disabled selected>Choisir le type de l'étudiant</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->lib_type }}</option>
                                                @endforeach
                                            </select>
                                            @error('type_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Antenne</label>
                                        <div class="col-lg-5">
                                            <select class="form-control  @error('antenne_id') is-invalid @enderror"
                                                name="antenne_id" value="{{ old('antenne_id') }}">
                                                <option disabled selected>Antenne</option>
                                                @foreach ($antennes as $antenne)
                                                    <option value="{{ $antenne->id }}">{{ $antenne->ant_lib }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('antenne_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <select class="form-control @error('boursier') is-invalid @enderror"
                                                name="boursier" value="{{ old('boursier') }}">
                                                <option disabled selected>Boursier ?</option>
                                                <option value="OUI">Oui</option>
                                                <option value="NON">Non</option>
                                            </select>
                                            @error('boursier')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="statut" value="F1S">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 offset-3">
                                    <div class="form-group row mt-2 justify-content-between">
                                        <button class="btn btn-success " type="submit">Enregistrer</button>
                                        <button type="button"
                                            class="btn btn-danger "data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">LISTE DES ETUDIANTS</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom et prénoms</th>
                                    <th>Date naissance</th>
                                    <th>Lieu naissance</th>
                                    <th>Numéro</th>
                                    <th>RIB</th>
                                    <th>Nationalité</th>
                                    <th>Type</th>
                                    <th>Boursier</th>
                                    <th>Editer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($etudiants as $etudiant)
                                    <tr>
                                        <td>{{ $etudiant->matricule_etd }}</td>
                                        <td>{{ $etudiant->nom }} {{ $etudiant->prenoms }}</td>
                                        <td>{{ $etudiant->naissance }}</td>
                                        <td>{{ $etudiant->lieu }}</td>
                                        <td>{{ $etudiant->phone }}</td>
                                        <td>{{ $etudiant->rib }}</td>
                                        <td>{{ $etudiant->nationalite }}</td>
                                        <td>{{ $etudiant->type->lib_type }}</td>
                                        <td>{{ $etudiant->boursier }}</td>
                                        <td class="text-center">
                                            <a type="button" href="{{ route('etudiants.edit', $etudiant->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
