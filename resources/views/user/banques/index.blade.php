@extends('layouts.master')

@section('title')
    Banques
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <h1 class="h5 p-2 mb-4 bg-dark text-white">ENREGISTRER UNE BANQUE</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('banques.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 offset-2">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Le code</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('ban_code') is-invalid @enderror" name="ban_code" value="{{ old('ban_code') }}" 
                                    placeholder="le code de la banque">
                                    @error('ban_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Désignation</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control @error('ban_design') is-invalid @enderror" name="ban_design" value="{{ old('ban_design') }}" 
                                    placeholder="La désignation de la banque">
                                    @error('ban_design')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Guichet</label>
                                <div class="col-lg-8">
                                    <input type="text" id="ids" class="form-control @error('ban_guichet') is-invalid @enderror" name="ban_guichet" value="{{ old('ban_guichet') }}"
                                    placeholder="Le guichet de la banque">
                                    @error('ban_guichet')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Compte</label>
                                <div class="col-lg-8">
                                    <input type="text" id="ids" class="form-control @error('ban_compte') is-invalid @enderror" name="ban_compte" value="{{ old('ban_compte') }}"
                                    placeholder="Compte de la banque">
                                    @error('ban_compte')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Description</label>
                                <div class="col-lg-8">
                                    <input type="text" id="ids" class="form-control @error('ban_desc') is-invalid @enderror" name="ban_desc" value="{{ old('ban_desc') }}"
                                    placeholder="la description de la banque">
                                    @error('ban_desc')
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
@section('script')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection