@extends('layouts.master')

@section('title')
    Recolog
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <h1 class="h5 p-2 mb-5 bg-dark text-white">ENREGISTREMENT DES RECOLOGS</h1>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">

                <form method="POST" action="{{ route('recologs.store') }}">
                    @csrf
                        <div class="row">
                        <div class="col-lg-11">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">La date d'enregistrement</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control @error('reco_date') is-invalid @enderror" name="reco_date" value="{{ old('reco_date') }}" required
                                    placeholder="Date d'enregistrement">
                                    @error('reco_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="fonction_id" value="{{ Auth::user()->id }}">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">La ligne de recouvrement</label>
                                <div class="col-lg-9">
                                    <select class="form-control custom-select @error('ligne_recouvrement_id') is-invalid @enderror" name="ligne_recouvrement_id" value="{{ old('ligne_recouvrement_id') }}" required>
                                        <option selected disabled>Ligne de recouvrement</option>
                                        @foreach ($ligne_recouvrements as $ligne_recouvrement)
                                            <option value="{{ (int)$ligne_recouvrement->id }}">{{ $ligne_recouvrement->lrecouv_num }}</option>
                                        @endforeach
                                    </select>
                                    @error('ligne_recouvrement_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="reco_stat_code" value="F1S">
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