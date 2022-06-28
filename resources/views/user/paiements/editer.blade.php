@extends('layouts.master')

@section('title')
Ordre de paiement
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">DIFFERER UN ORDRE DE PAIEMENT</h1>
    </div>
    <div class="panel-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Désolé !</strong> Il y a un problème avec les valeurs saisies.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('paiements.updateDiff', $ordrepaiement) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Ordre / Diff</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_ordre') is-invalid @enderror"
                                        name="date_ordre" value="{{ old('date_ordre') }}">
                                    @error('date_ordre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Motif diff</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('motif_diff') is-invalid @enderror"
                                        name="motif_diff" value="{{ old('motif_diff') }}"
                                        placeholder="Le motif  de diff">
                                    @error('motif_diff')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Emission</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_emission') is-invalid @enderror"
                                        name="date_emission" value="{{ old('date_emission') }}">
                                    @error('date_emission')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- gauche et droite -->
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Montant net</label>
                                <div class="col-lg-9">
                                    <input type="number"
                                        class="form-control @error('mont_net_ordre') is-invalid @enderror"
                                        name="mont_net_ordre" value="{{ old('mont_net_ordre') }}"
                                        placeholder="Le montant net de l'op">
                                    @error('mont_net_ordre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">PLC GST</label>
                                <div class="col-lg-9">
                                    <input type="month" class="form-control @error('plc_gst') is-invalid @enderror"
                                        name="plc_gst" value="{{ old('plc_gst') }}">
                                    @error('plc_gst')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="statut" value="DIF">
                            <input type="hidden" name="antenne_id" value="{{ auth()->user()->antenne->id }}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">N° annule</label>
                                <div class="col-lg-9">
                                    <input type="text"
                                        class="form-control @error('ordre_num_annule') is-invalid @enderror"
                                        name="ordre_num_annule" value="{{ old('ordre_num_annule') }}"
                                        placeholder="Numéro d'annulation">
                                    @error('ordre_num_annule')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de validation sgc</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_val_sgc') is-invalid @enderror"
                                        name="date_val_sgc" value="{{ old('date_val_sgc') }}">
                                    @error('date_val_sgc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de validation cds</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_val_cds') is-invalid @enderror"
                                        name="date_val_cds" value="{{ old('date_val_cds') }}">
                                    @error('date_val_cds')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Bordereau N° de validation</label>
                                <div class="col-lg-9">
                                    <input type="text"
                                        class="form-control @error('ordre_bord_numV') is-invalid @enderror"
                                        name="ordre_bord_numV" value="{{ old('ordre_bord_numV') }}"
                                        placeholder="Bordereau N° de validation">
                                    @error('ordre_bord_numV')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> --}}
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
@endsection