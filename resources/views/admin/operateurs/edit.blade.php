@extends('layouts.master')

@section('title')
    Editer un opérateur
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <a href="#collapseOper" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="collapseOper"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter</a>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseOper">
                <div class="card-body">
                    <form method="POST" action="{{ route('operateurs.update', $users) }}">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('oper_nom') is-invalid @enderror" name="oper_nom" value="{{ $users['oper_nom'] }}"
                                            placeholder="Nom">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('oper_login') is-invalid @enderror" name="oper_login" value="{{ $users['oper_login'] }}"
                                            placeholder="Login">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="password" class="form-control @error('oper_pwd') is-invalid @enderror" name="oper_pwd" value="{{ $users['oper_pwd'] }}"
                                            placeholder="Mot de passe" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <input type="password" class="form-control" name="oper_pwd_confirm"
                                            placeholder="Confirmer" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10 offset-1">
                                <button type="submit" class="btn btn-danger btn-block">
                                    Enregistrer
                                </button>
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
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
