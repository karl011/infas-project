@extends('layouts.master')

@section('title')
    infos-recttes
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">MISE A JOUR D'UN DREC</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('detailrecettes.update', $detailrecette) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de reglement</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_reg_drec') is-invalid @enderror" name="date_reg_drec" value="{{ $detailrecettes['date_reg_drec']}}" required>
                                    @error('date_reg_drec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Montant net</label>
                                <div class="col-lg-9">
                                    <input type="number" class="form-control @error('mont_net_drec') is-invalid @enderror" name="mont_net_drec" value="{{ $detailrecettes['mont_net_drec']}}" required
                                    placeholder="Le montant net du détail">
                                    @error('mont_net_drec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Motif de différer</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('drec_motif_diff') is-invalid @enderror" name="drec_motif_diff" value="{{ $detailrecettes['drec_motif_diff']}}"
                                    placeholder="Le motif de différer">
                                    @error('drec_motif_diff')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Motif de rejet</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('drec_motif_rej') is-invalid @enderror" name="drec_motif_rej" value="{{ $detailrecettes['drec_motif_rej']}}"
                                    placeholder="Le motif de rejet">
                                    @error('drec_motif_rej')
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
                                <button class="btn btn-danger btn-block" type="submit">Mettre à jour</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection