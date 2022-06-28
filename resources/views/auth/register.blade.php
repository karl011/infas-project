@extends('layouts.auth')

@section('title')
    Inscription
@endsection

@section('content')
<div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="text-center">
                <h1 class="text-success mb-5"><b>INFAS-COMPTA</b></h1>
            </div>
            <div class="card o-hidden border-0 shadow-lg" style="background-color: rgba(0,0,0,0.4);">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <form method="POST" action="{{ route('register') }}" class="user">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control @error('oper_code') is-invalid @enderror" name="oper_code" value="{{ old('oper_code') }}"
                                                placeholder="Code">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control @error('oper_nom') is-invalid @enderror" name="oper_nom" value="{{ old('oper_nom') }}"
                                                placeholder="Nom">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="email" class="form-control @error('oper_email') is-invalid @enderror" name="oper_email" value="{{ old('oper_email') }}"
                                                placeholder="Email">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control @error('oper_statut') is-invalid @enderror" name="oper_statut" value="{{ old('oper_statut') }}"
                                                placeholder="Statut">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control @error('oper_login') is-invalid @enderror" name="oper_login" value="{{ old('oper_login') }}"
                                                placeholder="Username">
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select class="form-control custom-select" name="antenne_id">
                                                <option>Choix de l'antenne</option>
                                                @foreach ($antennes as $antenne)
                                                    <option value="{{ $antenne->id }}">{{ $antenne->ant_lib }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control @error('oper_pwd') is-invalid @enderror" name="oper_pwd" value="{{ old('oper_pwd') }}"
                                                placeholder="Password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="oper_pwd_confirm"
                                                placeholder="Confirm" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-block">
                                        S'enregistrer
                                    </button>
                                </form>

                                <div class="mt-2 text-center">
                                    <a class="small text-white" href="{{ route('login') }}">Déja inscris ? Connectez-vous</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection