@extends('layouts.master')

@section('title')
    detailops
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">MISE A JOUR D'UN DOP</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('detailops.update', $detailop) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Date de reglèment</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('date_reg') is-invalid @enderror" name="date_reg" value="{{ $detailops['date_reg']}}" required>
                                    @error('date_reg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Montant net</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('mont_net') is-invalid @enderror" name="mont_net" value="{{ $detailops['mont_net']}}" required
                                    placeholder="Le montant net">
                                    @error('mont_net')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Motif diff</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('dop_motif_diff') is-invalid @enderror" name="dop_motif_diff" value="{{ $detailops['dop_motif_diff']}}" 
                                    placeholder="Le motif de différer">
                                    @error('dop_motif_diff')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Motif de rejet</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control @error('dop_motif_rej') is-invalid @enderror" name="dop_motif_rej" value="{{ $detailops['dop_motif_rej']}}"
                                    placeholder="Le motif de rejet">
                                    @error('dop_motif_rej')
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
                                <button class="btn btn-danger btn-block" type="submit">Mettre à jour le dop</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection