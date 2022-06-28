@extends('layouts.obs')

@section('title')
    suite de la consultation
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-danger">Consultation des données enregistrées et les statuts des
                        étudiants</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 0.8em;">
                        </table>
                        <h3>Consultation des données enrégitrées</h3>
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 0.8em;">
                            <tbody>
                            @foreach ($inscriptions as $inscription)
                            <tr>
                                <td>{{ $inscription->date_insc }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
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
