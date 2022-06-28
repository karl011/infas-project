@extends('layouts.master')

@section('title')
    Scolarites
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> IMPRIMER</a> -->
        <a href="#collapseExer" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="collapse"
            role="button" aria-expanded="false" aria-controls="collapseExer"><i class="fas fa-plus fa-sm text-white-50"></i>Afficher la scolarité à mettre à jour</a>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-1">
            <div class="card shadow mb-4 collapse" id="collapseExer">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    <form method="POST" action="{{ route('scolarites.update', $scolarite ) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Date versement</label>
                                <div class="col-lg-8">
                                    <input type="date" class="form-control @error('date_scol') is-invalid @enderror" name="date_scol" value="{{ $scolarites['date_scol'] }}" required>
                                    @error('date_scol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Montant versé</label>
                                <div class="col-lg-8">
                                    <input type="number" class="form-control @error('montant_vers') is-invalid @enderror" name="montant_vers" value="{{ $scolarites['montant_vers'] }}" required>
                                    @error('montant_vers')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Montant scolarité</label>
                                <div class="col-lg-8">
                                <input type="number" class="form-control @error('montant_scol') is-invalid @enderror" name="montant_scol" value="{{ $scolarites['montant_scol'] }}" required>
                                    @error('montant_scol')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Montant Montant restant</label>
                                <div class="col-lg-8">
                                <input type="number" class="form-control @error('montant_rest') is-invalid @enderror" name="montant_rest" value="{{ $scolarites['montant_rest'] }}" required>
                                    @error('montant_rest')
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
                                <button class="btn btn-danger btn-block" type="submit">Enregistrer la mise à jour</button>
                            </div>
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
