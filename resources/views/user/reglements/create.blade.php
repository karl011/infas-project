@extends('layouts.master')

@section('title')
    Reglements
@endsection

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <h1 class="h5 p-2 mb-5 bg-dark text-white">ENREGISTREMENT DE REGLEMENTS</h1>
        </div>
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('reglements.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="number" class="form-control @error('reg_mont') is-invalid @enderror"
                                            name="reg_mont" value="{{ old('reg_mont') }}"
                                            placeholder="Montant de règlement">
                                        @error('reg_mont')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <select class="form-control  @error('reg_mrg_code') is-invalid @enderror"
                                            name="reg_mrg_code" value="{{ old('reg_mrg_code') }}">
                                            <option disabled selected>Mode de règlement</option>
                                            <option>Espèce</option>
                                            <option>Chèque</option>
                                            <option>Virement</option>
                                        </select>
                                        @error('reg_mrg_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('reg_numREG') is-invalid @enderror"
                                            name="reg_numREG" value="{{ old('reg_numREG') }}"
                                            placeholder="N° de compte de règlement">
                                        @error('reg_numREG')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="number" class="form-control @error('reg_retenu') is-invalid @enderror"
                                            name="reg_retenu" value="{{ old('reg_retenu') }}"
                                            placeholder="Règlement retenu (mettre 0 par défaut)">
                                        @error('reg_retenu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="reg_stat_code" value="F1S">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('reg_op_num') is-invalid @enderror"
                                            name="reg_op_num" value="{{ old('reg_op_num') }}"
                                            placeholder="N° d'opération">
                                        @error('reg_op_num')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <select class="form-control @error('type_acteur') is-invalid @enderror"
                                            name="type_acteur" value="{{ old('type_acteur') }}" id="type_acteur"
                                            content-type="choices" trigger="true" target="acteurs">
                                            <option disabled selected>Le type d'acteur</option>
                                            <option value="Etudiants">Etudiants</option>
                                            <option value="Fournisseurs">Fournisseurs</option>
                                            <option value="Vacataires">Vacataires</option>
                                        </select>
                                        @error('type_acteur')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <select class="form-control" value="{{ old('acteurs') }}" id="acteurs" name="benef_id">
                                            <optgroup reference="Etudiants" name="etudiant_id"
                                                value="{{ old('etudiant_id') }}">
                                                <option disabled selected>Etudiants</option>
                                                @foreach ($etudiants as $etudiant)
                                                    <option value="{{ $etudiant->id }}">{{ $etudiant->nom }} {{ $etudiant->prenoms }}</option>
                                                @endforeach
                                            </optgroup>
                                            {{-- deuxieme lot --}}
                                            <optgroup reference="Fournisseurs" name="fournisseur_id"
                                                value="{{ old('fournisseur_id') }}">
                                                <option disabled selected>Fournisseurs</option>
                                                @foreach ($fournisseurs as $fournisseur)
                                                    <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom_four }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                            {{-- troisieme lot --}}
                                            <optgroup reference="Vacataires" name="vacataire_id"
                                                value="{{ old('vacataire_id') }}">
                                                <option disabled selected>Vacataires</option>
                                                @foreach ($vacataires as $vacataire)
                                                    <option value="{{ $vacataire->id }}">{{ $vacataire->nom }} {{ $vacataire->prenoms }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        @error('acteurs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="reg_date" value="{{ date('Y' . '-' . 'm' . '-' . 'j') }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <select class="form-control  @error('exercice_id') is-invalid @enderror"
                                            name="exercice_id" value="{{ old('exercice_id') }}">
                                            <option selected disabled>Exercice</option>
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


        <div class="container">
            <h1 class="h5 p-2 mb-5 bg-dark text-white">ENREGISTREMENT DES LIGNES DE REGLEMENTS</h1>
        </div>
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('ligneReglements.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('lreg_num') is-invalid @enderror"
                                            name="lreg_num" value="{{ old('lreg_num') }}"
                                            placeholder="N° de ligne de règlement (Ex: Ligne001)">
                                        @error('lreg_num')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('lreg_lib') is-invalid @enderror"
                                            name="lreg_lib" value="{{ old('lreg_lib') }}"
                                            placeholder="Libelle de règlement">
                                        @error('lreg_lib')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="number" class="form-control @error('lreg_mont') is-invalid @enderror"
                                            name="lreg_mont" value="{{ old('lreg_mont') }}"
                                            placeholder="Montant du règlement">
                                        @error('lreg_mont')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <input type="number" class="form-control @error('lreg_qte') is-invalid @enderror"
                                            name="lreg_qte" value="{{ old('lreg_qte') }}" placeholder="La quantité">
                                        @error('lreg_qte')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="lreg_stat_code" value="F1S">
                                <div class="form-group row">
                                    <div class="col-lg-9">
                                        <select class="form-control  @error('reglement_id') is-invalid @enderror"
                                            name="reglement_id" value="{{ old('reglement_id') }}">
                                            <option disabled selected>Le n° de règlement</option>
                                            @foreach ($reglements as $reglement)
                                                <option value="{{ (int) $reglement->id }}">{{ $reglement->reg_num }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('reglement_id')
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
    <script type="text/javascript">
        function updateSelectBox(object) {
            var target = $("#" + object.attr('target'));
            var listGroups = target.find("optgroup");
            var validGroup = target.find("optgroup[reference='" + object.find(':selected').val() + "']");
            target.val(validGroup.find("option").val());
            listGroups.hide();
            validGroup.show();
            if (target.attr('content-type') == 'choices')
                target.change();
        }

        $("select[content-type='choices']").on('change', function() {
            updateSelectBox($(this));
        });

        $(document).ready(function() {
            updateSelectBox($("select[trigger='true']"));
        });
    </script>
@endsection
@section('script')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
