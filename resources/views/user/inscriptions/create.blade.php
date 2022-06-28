@extends('layouts.master')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('title')
    Inscription
@endsection
{{-- <script type="text/javascript">
		$(function(){
			$('#etudiant').change(function(){
				var displayourres = $('#etudiant option:selected').text();
				$('#montantIns').val(displayourres);
				var displayourres1 = $('#etudiant option:selected').text();
				$('#montantScol').val(displayourres1);
				var displayourres2 = $('#etudiant option:selected').text();
				$('#montantBourse').val(displayourres2);
			})
		})
</script> --}}
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="container">
            <h1 class="h5 p-2 mb-4 bg-dark text-white">INSCRIPTION DES ETUDIANTS</h1>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('inscriptions.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Etudiant</label>
                                    <div class="col-lg-9">
                                        <select id="etudiant"
                                            class="form-control @error('etudiant_id') is-invalid @enderror"
                                            name="etudiant_id" value="{{ old('etudiant_id') }}">
                                            <option selected disabled>Etudiant concerné</option>
                                            <script>
                                                let type = {};
                                            </script>
                                            @foreach ($etudiants as $etudiant)
                                               <option value="{{ $etudiant->id }}">{{ $etudiant->matricule_etd }}->{{ $etudiant->nom }} {{ $etudiant->prenoms }}</option>
                                                <script>
                                                    type['{{ $etudiant->id }}'] = ['{{ $etudiant->type->montant_ins }}', '{{ $etudiant->type->montant_scol }}',
                                                        '{{ $etudiant->type->montant_bourse }}'
                                                    ]
                                                </script>
                                            @endforeach
                                        </select>
                                        @error('etudiant_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Montant I</label>
                                    <div class="col-lg-9">
                                        <input type="number" readonly="readonly" id="montantIns"
                                            class="form-control @error('mont_insc') is-invalid @enderror" name="mont_insc"
                                            value="{{ old('mont_insc') }}" required placeholder="Montant d'inscription">
                                        @error('mont_insc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Montant S</label>
                                    <div class="col-lg-9">
                                        <input type="number" readonly="readonly" id="montantScol"
                                            class="form-control @error('mont_scol') is-invalid @enderror" name="mont_scol"
                                            value="{{ old('mont_scol') }}" placeholder="Montant de scolarité">
                                        @error('mont_scol')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Montant B</label>
                                    <div class="col-lg-9">
                                        <input type="number" readonly="readonly" id="montantBourse"
                                            class="form-control @error('mont_bour') is-invalid @enderror" name="mont_bour"
                                            value="{{ old('mont_bour') }}" required placeholder="Montant de bourse">
                                        @error('mont_bour')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <script>
                                    const ins = document.getElementById('montantIns')
                                    const scol = document.getElementById('montantScol')
                                    const bourse = document.getElementById('montantBourse')
                                    const etudiant = document.getElementById('etudiant')
                                    etudiant.addEventListener('change', (function() {
                                        ins.value = type[etudiant.value][0]
                                        scol.value = type[etudiant.value][1]
                                        bourse.value = type[etudiant.value][2]
                                    }))
                                </script>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Exercice</label>
                                    <div class="col-lg-9">
                                        <select class="form-control @error('exercice_id') is-invalid @enderror"
                                            name="exercice_id" value="{{ old('exercice_id') }}">
                                            <option selected disabled>Année en cours</option>
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
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Niveau</label>
                                    <div class="col-lg-9">{{-- custom-select --}}
                                        <select class="form-control @error('niveau_etud') is-invalid @enderror"
                                            name="niveau_etud" value="{{ old('niveau_etud') }}">
                                            <option disabled selected>Choisir le niveau d'étude</option>
                                            <option>1ère année</option>
                                            <option>2ème année</option>
                                            <option>3ème année</option>
                                        </select>
                                        @error('niveau_etud')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Filière</label>
                                    <div class="col-lg-9">
                                        <select class="form-control @error('filiere_id') is-invalid @enderror"
                                            name="filiere_id" value="{{ old('filiere_id') }}">
                                            <option selected disabled>Choisir une filière</option>
                                            @foreach ($filieres as $filiere)
                                                <option value="{{ (int) $filiere->id }}">{{ $filiere->fil_lib }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('filiere_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Antenne</label>
                                    <div class="col-lg-9">
                                        <select class="form-control @error('antenne_id') is-invalid @enderror"
                                            name="antenne_id" value="{{ old('antenne_id') }}">
                                            <option selected disabled>Choisir l'antenne</option>
                                            @foreach ($antennes as $antenne)
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
                                <input type="hidden" name="statut" value="F1S">
                            </div>

                        </div>

                        <div class="form-group row">
                            {{-- <label class="col-lg-3 col-form-label">La date ins</label> --}}
                            <div class="col-lg-9">
                                <input type="hidden" readonly class="form-control @error('date_insc') is-invalid @enderror"
                                    name="date_insc" value="{{ date('Y' . '-' . 'm' . '-' . 'j') }}" required>
                                @error('date_insc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="form-group mt-2">
                                    <button class="btn btn-danger btn-block" type="submit">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
