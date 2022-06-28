<!--
    La page principale et celle relative à la connexion des agents utilisateurs de la plate-forme
-->

@extends('layouts.auth')

@section('title')
    Connexion
@endsection

@section('content')
<div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="text-center">
                <h1 class="text-success mb-5"><b>INFAS-COMPTA</b></h1>
            </div>
            <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: rgba(0,0,0,0.4);">
                <div class="card-body">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control
                                            @error('oper_login') is-invalid @enderror" name="oper_login" value="{{ old('oper_login') }}" required placeholder="Login">
                                        @error('oper_login')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control
                                            @error('password') is-invalid @enderror" name="oper_pwd" required placeholder="Mot de passe">
                                        @error('oper_pwd')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-user btn-block">
                                        Connexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection