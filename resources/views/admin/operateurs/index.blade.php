@extends('layouts.master')

@section('title')
    Operateurs
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
                    <form method="POST" action="{{ route('operateurs.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('oper_code') is-invalid @enderror" name="oper_code" value="{{ old('oper_code') }}"
                                            placeholder="Code">
                                    </div>
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('oper_nom') is-invalid @enderror" name="oper_nom" value="{{ old('oper_nom') }}"
                                            placeholder="Nom">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="email" class="form-control @error('oper_email') is-invalid @enderror" name="oper_email" value="{{ old('oper_email') }}"
                                            placeholder="Email">
                                    </div>
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('oper_statut') is-invalid @enderror" name="oper_statut" value="{{ old('oper_statut') }}"
                                            placeholder="Statut">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="text" class="form-control @error('oper_login') is-invalid @enderror" name="oper_login" value="{{ old('oper_login') }}"
                                            placeholder="Login">
                                    </div>
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <select class="form-control custom-select" name="antenne_id">
                                            <option>--Antenne--</option>
                                            @foreach ($antennes as $antenne)
                                                <option value="{{ $antenne->id }}">{{ $antenne->ant_lib }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 offset-sm-1">
                                <div class="row">
                                    <div class="col-sm-6 mb-2 mb-sm-0">
                                        <input type="password" class="form-control @error('oper_pwd') is-invalid @enderror" name="oper_pwd" value="{{ old('oper_pwd') }}"
                                            placeholder="Mot de passe" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-2 mb-sm-0">
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
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">LISTE DES OPERATEURS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0" style="font-size: 0.8em;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Matricule</th>
                            <th>Nom & Prénoms</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th>Enregistré le...</th>
                            <th>Editer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->oper_code }}</td>
                            <td>{{ $user->oper_nom }}</td>
                            <td>{{ $user->oper_login }}</td>
                            <td>{{ $user->oper_email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td class="text-center" style="width: 10%">
                                <a type="button" href="{{ route('operateurs.edit', $user->id) }}" class="btn btn-info btn-sm">Modifier</a>
                                {{-- <form action="{{ route('operateurs.destroy',$user->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
