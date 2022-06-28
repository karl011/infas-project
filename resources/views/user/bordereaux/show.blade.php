@extends('layouts.autres')

@section('title')
    les détails sur bordéreau
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="col-lg-12">

        <h3 class="fw-bold text-center fs-1">Les informations liées au bordéreau N°
            <span class="text-danger fw-bold text-decoration-underline">{{ $bordereaus->num_bord }}</span>
        </h3>
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
                        <th>Antenne</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $bordereaus->num_bord }}</td>
                        <td>{{ $bordereaus->type_bord }}</td>
                        <td>{{ $bordereaus->direction_bord }}</td>
                        <td>{{ $bordereaus->montant_bord }}</td>
                        <td>{{ $bordereaus->date_trans_bord }}</td>
                        <td>{{ $bordereaus->categorie_bord }}</td>
                        <td>{{ $bordereaus->antenne->ant_lib }}</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tbody>
                    <div class="container-fluid">
                            @php
                                $opaiements = $ordrepaiements->where('bordereau_id', '=', $bordereaus->id);
                            @endphp
                        <p>Le bordéreau N°
                            <span class="text-danger">{{ $bordereaus->num_bord }} contient
                                {{ $bordereaus->ordrepaiements->count() }} ordre(s) de paiement
                            </span>
                        </p>
                        @foreach ($opaiements as $op)
                            <div class="font-weight-bold">{{ $op->num_ordre }} | {{ $op->date_op }} | {{ $op->mont_ordre }}</div>
                        @endforeach
                    </div>
                </tbody>
            </table>
            <div class="col-lg-3 offset-4 btn btn-secondary">
                <a href="{{ route('bordereaux.index') }}" class="text-light text-decoration-none">Retour à la liste des bordéreaux</a>
            </div><br><br>
            <div class="col-lg-3 offset-4 btn btn-danger">
                <a href="{{ route('home') }}" class="text-light text-decoration-none">Retour à la l'accueil</a>
            </div>
        </div>
    </div>
@endsection
