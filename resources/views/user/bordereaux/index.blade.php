@extends('layouts.master')

@section('title')
    Liste de bordéreaux
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-end mb-4">
                <a href="{{ route('bordereaux.create') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" role="button"><i class="fas fa-plus fa-sm text-white-50"></i>Ajouter</a>
            </div>
        </div>

        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">LISTE DES BORDEREAUX ENREGISTRES</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>N° de bordéreau</th>
                                    <th>Type de bordéreau</th>
                                    <th>Direction de bordérau</th>
                                    <th>Montant du bordéreau</th>
                                    <th>Date de transmission</th>
                                    <th>Catégorie de bordérau</th>
                                    <th>Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bordereaus as $bordereau)
                                    <tr>
                                        <td>{{ $bordereau->num_bord }}</td>
                                        <td>{{ $bordereau->type_bord }}</td>
                                        <td>{{ $bordereau->direction_bord }}</td>
                                        <td>{{ $bordereau->montant_bord }}</td>
                                        <td>{{ $bordereau->date_trans_bord }}</td>
                                        <td>{{ $bordereau->categorie_bord }}</td>
                                        <td class="text-center" style="width: 10%">
                                            <a type="button" href="{{ route('bordereaux.edit', $bordereau->id) }}"
                                                class="btn btn-success  btn-sm">Editer</a>
                                        </td>
                                        <td class="text-center" style="width: 10%">
                                            <a type="button" href="{{ route('bordereaux.show', $bordereau->id) }}"
                                                class="btn btn-primary  btn-sm">Voir plus</a>
                                        </td>
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
