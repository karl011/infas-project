@extends('layouts.master')

@section('title')
    Reglelog
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <h1 class="h5 p-2 mb-5 bg-dark text-white">ENREGISTREMENT DES REGLELOGS</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('reglelogs.store') }}">
                    @csrf
                        <div class="row">
                        <div class="col-lg-11">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">La date d'enregistrement</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('relog_date') is-invalid @enderror" name="relog_date" value="{{ old('relog_date') }}" required
                                    placeholder="Date d'enregistrement">
                                    @error('relog_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="fonction_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="relog_stat_code" value="F1S">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">La ligne de règlement</label>
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('ligne_reglement_id') is-invalid @enderror" name="ligne_reglement_id" value="{{ old('ligne_reglement_id') }}">
                                        <option disabled selected>Ligne de règlement</option>
                                        @foreach ($ligne_reglements as $ligne_reglement)
                                            <option value="{{ (int)$ligne_reglement->id }}">{{ $ligne_reglement->lreg_num }}</option>
                                        @endforeach
                                    </select>
                                    @error('ligne_reglement_id')
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