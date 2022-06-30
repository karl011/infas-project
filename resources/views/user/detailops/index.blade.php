@extends('layouts.master')

@section('title')
detailops
@endsection

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="#collapseExer" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="collapseExer"><i
                class="fas fa-plus fa-sm text-white-50"></i> Imprimer</a>
        <a href="#collapseExer" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="collapseExer"><i
                class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseExer">
                <div class="card-body">
                    <form method="POST" action="{{ route('detailops.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">O paiement</label>
                                    <div class="col-lg-8">
                                        <select class="form-control @error('ordrepaiement_id') is-invalid @enderror" name="ordrepaiement_id" value="{{ old('ordrepaiement_id') }}">
                                            <option disabled selected>Ordre de paiement</option>
                                            @foreach ($ordrepaiements as $ordrepaiement)
                                            <option value="{{ $ordrepaiement->id }}">{{ $ordrepaiement->num_ordre}}</option>
                                            @endforeach
                                        </select>
                                        @error('ordrepaiement_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="countries">Le type</label> 
                                    <div class="col-lg-8">
                                        <select class="form-control @error('dop_benef') is-invalid @enderror" name="dop_benef" value="{{ old('dop_benef') }}" id="countries" content-type="choices" trigger="true" target="department"> 
                                            <option disabled selected>Choisir le type de beneficiaire</option>
                                            <option value="Etudiants" >Etudiants</option> 
                                            <option value="Fournisseurs" >Fournisseurs</option>
                                            <option value="Vacataires" >Vacataires</option>  
                                        </select>
                                         @error('dop_benef')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label class="col-lg-4 col-form-label" for="department">Bénéficiaires</label> 
                                    <div class="col-lg-8">
                                     <select class="form-control @error('dop_type') is-invalid @enderror" name="benef_id" value="{{ old('dop_type') }}" id="department" name="department" > 
                                        <optgroup  reference="Etudiants"> 
                                            <option disabled selected>Etudiants</option>
                                            @foreach ($etudiants as $etudiant)
                                            <option value="{{ $etudiant->id }}">{{ $etudiant->nom}} {{ $etudiant->prenoms}}</option>
                                            @endforeach
                                        </optgroup>
                                         {{--deuxieme lot  --}}
                                        <optgroup  reference="Fournisseurs"> 
                                            <option disabled selected>Fournisseurs</option>
                                            @foreach ($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom_four}}</option>
                                            @endforeach
                                        </optgroup>
                                        {{-- troisieme lot --}}
                                        <optgroup  reference="Vacataires"> 
                                            <option disabled selected>Vacataires</option>
                                            @foreach ($vacataires as $vacataire)
                                            <option value="{{ $vacataire->id }}">{{ $vacataire->nom}} {{ $vacataire->prenoms}}</option>
                                            @endforeach
                                        </optgroup>
                                        </select> 
                                        @error('dop_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Le montant</label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control @error('dop_mont') is-invalid @enderror"
                                            name="dop_mont" value="{{ old('dop_mont') }}" required
                                            placeholder="Le Montant destiné">
                                        @error('dop_mont')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Objet</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('dop_objet') is-invalid @enderror"
                                            name="dop_objet" value="{{ old('dop_objet') }}" required
                                            placeholder="L'objet du détail">
                                        @error('dop_objet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Code BQE</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('dop_bqe_code') is-invalid @enderror"
                                            name="dop_bqe_code" value="{{ old('dop_bqe_code') }}" required
                                            placeholder="Le code bancaire">
                                        @error('dop_bqe_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Guichet</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('guichet') is-invalid @enderror"
                                            name="guichet" value="{{ old('guichet') }}" required
                                            placeholder="Le guichet">
                                        @error('guichet')
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
                                            name="rib" value="{{ old('rib') }}" required
                                            placeholder="Le rib">
                                        @error('rib')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">N° du compte</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control @error('num_cpte') is-invalid @enderror"
                                            name="num_cpte" value="{{ old('num_cpte') }}" required
                                            placeholder="Le numéro du compte">
                                        @error('num_cpte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="dop_statut" value="F1S">
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
            <h6 class="m-0 font-weight-bold text-danger">LES DETAILS DES ORDRES DE PAIEMENTS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            {{-- <th>N° du DOP</th> --}}
                            <th>N° de l'OP</th>
                            <th>Montant du DOP</th>
                            <th>Objet du DOP</th>
                            <th>Type</th>
                            {{-- <th>Bénéficiaire</th> --}}
                            <th>Editer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailops as $detailop)
                        <tr>
                            {{-- <td>{{ $detailop->dop_num }}</td> --}}
                            <td>{{ $detailop->ordrepaiement->num_ordre }}</td>
                            <td>{{ $detailop->dop_mont }}</td>
                            <td>{{ $detailop->dop_objet }}</td>
                            <td>{{ $detailop->dop_benef }}</td>
                            {{-- @if ($detailop->dop_benef == 'Vacataires')
                                <td>{{App\Models\Vacataire::find($detailop->vacataire_id)->nom }}</td>
                            @elseif($detailop->dop_benef == 'Etudiants')
                                <td>{{App\Models\Etudiant::find($detailop->etudiant_id)->nom}}</td>
                            @elseif($detailop->dop_benef == 'Fournisseurs')
                                <td>{{App\Models\Fournisseur::find($detailop->fournisseur_id)->nom_four }}</td>
                            @endif --}}
                            <td class="text-right">
                                <a type="button" href="{{ route('detailops.edit',$detailop->id) }}" class="btn btn-primary btn-sm">Mise à jour</a>
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
        function updateSelectBox(object){ 
            var target = $("#"+object.attr('target'));  
            var listGroups = target.find("optgroup");           
            var validGroup = target.find("optgroup[reference='"+object.find(':selected').val()+"']");           
            target.val(validGroup.find("option").val());           
            listGroups.hide();           
            validGroup.show();           
            if(target.attr('content-type')=='choices') 
                target.change(); 
        } 
          
        $("select[content-type='choices']").on('change',function(){ 
            updateSelectBox($(this)); 
        }); 

        $(document).ready(function(){ 
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