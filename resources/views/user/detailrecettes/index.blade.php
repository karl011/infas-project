@extends('layouts.master')

@section('title')
detailrecettes
@endsection

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="#collapseExer" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExer"><i class="fas fa-plus fa-sm text-white-50"></i> Imprimer</a>
        <a href="#collapseExer" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExer"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseExer">
                <div class="card-body">
                    <form method="POST" action="{{ route('detailrecettes.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">N° de DREC</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control @error('drec_num') is-invalid @enderror" name="drec_num" value="{{ old('drec_num') }}" required placeholder="Le numéro de deétail recette">
                                        @error('drec_num')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="countries">Le type</label>
                                    <div class="col-lg-8">
                                        <select class="form-control @error('drec_benef') is-invalid @enderror" name="drec_benef" value="{{ old('drec_benef') }} id=" countries" name="countries" content-type="choices" trigger="true" target="department">
                                            <option disabled selected>Le type de bénéficiaire</option>
                                            <option value="Etudiants">Etudiants</option>
                                            <option value="Fournisseurs">Fournisseurs</option>
                                            <option value="Vacataires">Vacataires</option>
                                        </select>
                                        @error('drec_benef')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="department">Bénéficiaires</label>
                                    <div class="col-lg-8">
                                        <select class="form-control @error('drec_type') is-invalid @enderror" name="benef_id" value="{{ old('drec_type') }}" id="department" name="department">
                                            <optgroup reference="Etudiants">
                                                <option disabled selected>Etudiants</option>
                                                @foreach ($etudiants as $etudiant)
                                                <option value="{{ $etudiant->id }}">{{ $etudiant->nom }}
                                                    {{ $etudiant->prenoms }}</option>
                                                @endforeach
                                            </optgroup>

                                            {{-- deuxieme lot --}}
                                            <optgroup reference="Fournisseurs">
                                                <option disabled selected>Fournisseurs</option>
                                                @foreach ($fournisseurs as $fournisseur)
                                                <option value="{{ $fournisseur->id }}">
                                                    {{ $fournisseur->nom_four }}</option>
                                                @endforeach
                                            </optgroup>

                                            {{-- troisieme lot --}}
                                            <optgroup reference="Vacataires">
                                                <option disabled selected>Vacataires</option>
                                                @foreach ($vacataires as $vacataire)
                                                <option value="{{ $vacataire->id }}">{{ $vacataire->nom }}
                                                    {{ $vacataire->prenoms }}</option>
                                                @endforeach
                                            </optgroup>

                                        </select>
                                        @error('drec_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Bénéficiaire</label>
                                    <div class="col-lg-8">
                                    <select class="form-control custom-select @error('drec_benef') is-invalid @enderror" name="drec_benef" value="{{ old('drec_benef') }}">
                                <option>---Bénéficiaire---</option>
                                <option>Etudiants</option>
                                <option>Vacataires</option>
                                <option>Fournisseurs</option>
                                </select>
                                @error('drec_benef')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Type de DREC</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control @error('drec_type') is-invalid @enderror" name="drec_type" value="{{ old('drec_type') }}" required placeholder="Le type de détail: 5 caractères aux max">
                                @error('drec_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label">Le montant</label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control @error('drec_mont') is-invalid @enderror" name="drec_mont" value="{{ old('drec_mont') }}" required placeholder="Le Montant destiné">
                                @error('drec_mont')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Recettes</label>
                        <div class="col-lg-9">
                            <select class="form-control @error('recette_id') is-invalid @enderror" name="recette_id" value="{{ old('recette_id') }}">
                                <option disabled selected>Code de recettes</option>
                                @foreach ($recettes as $recette)
                                <option value="{{ $recette->id }}">{{ $recette->titre_num }}
                                </option>
                                @endforeach
                            </select>
                            @error('recette_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Objet</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('drec_objet') is-invalid @enderror" name="drec_objet" value="{{ old('drec_objet') }}" required placeholder="L'objet du détail">
                            @error('drec_objet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Code BQE</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('drec_bqe') is-invalid @enderror" name="drec_bqe" value="{{ old('drec_bqe') }}" required placeholder="Le code bancaire">
                            @error('drec_bqe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">N° du compte</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control @error('drec_num_cpte') is-invalid @enderror" name="drec_num_cpte" value="{{ old('drec_num_cpte') }}" required placeholder="Le numéro du compte">
                            @error('drec_num_cpte')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="drec_statut" value="F1S">
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
<!-- DataTales Example
            Chargement des données de la base de données
        -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">LES DETAILS DES RECETTES</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th>N° du DREC</th> --}}
                        <th>N° de DREC</th>
                        <th>Montant du DREC</th>
                        <th>Objet du DREC</th>
                        <th>Type DREC</th>
                        {{-- <th>Bénéficiaire</th> --}}
                        <th>Editer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailrecettes as $detailrecette)
                    <tr>
                        {{-- <td>{{ $detailrecette->drec_num }}</td> --}}
                        <td>{{ $detailrecette->recette->titre_num }}</td>
                        <td>{{ $detailrecette->drec_mont }}</td>
                        <td>{{ $detailrecette->drec_objet }}</td>
                        <td>{{ $detailrecette->drec_benef }}</td>
                        {{-- <td>{{ $detailrecette->drec_benef }}</td> --}}
                        <td class="text-right">
                            <a type="button" href="{{ route('detailrecettes.edit',$detailrecette->id) }}" class="btn btn-primary btn-sm">Mise à jour</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
