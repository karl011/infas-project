@extends('layouts.autres')

@section('title')
    les détails sur les OP
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="col-lg-12">

        <h3 class="fw-bold text-center fs-1">Les informations liées au bordéreau N°
            <span class="text-danger fw-bold text-decoration-underline">{{ $ordrepaiements->num_ordre }}</span>
        </h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                style="font-size: 0.8em;">
                <thead class="thead-dark">
                    <tr>
                        <th>N° ordre</th>
                        <th>Date OP</th>
                        <th>Montant OP</th>
                        <th>Objet</th>
                        <th>Mote de reglement</th>
                        <th>N° de compte</th>
                        <th>Antenne</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $ordrepaiements->num_ordre }}</td>
                        <td>{{ $ordrepaiements->date_op }}</td>
                        <td>{{ $ordrepaiements->mont_ordre }}</td>
                        <td>{{ $ordrepaiements->objet }}</td>
                        <td>{{ $ordrepaiements->mrg_code }}</td>
                        <td>{{ $ordrepaiements->numero_cpte }}</td>
                        <td>{{ $ordrepaiements->antenne->ant_lib }}</td>
                    </tr>
                </tbody>
            </table>

            <table>

                <div class="container-fluid">
                    @php
                        $benef = $ordrepaiements->detailops;
                    @endphp
                    <p>L'ordre de paiement N°<span class="text-danger fw-bold">
                            {{ $ordrepaiements->num_ordre }}</span> contient les bénéficiaires suivants : </p>
                    @foreach ($benef as $detailop)
                        <tbody>
                            <tr>
                                @if ($detailop->dop_benef == 'Etudiants')
                                    <td>{{ $detailop->etudiant->matricule_etd }} {{ $detailop->etudiant->nom }}
                                        {{ $detailop->etudiant->prenoms }}</td>
                                @elseif($detailop->dop_benef == 'Fournisseurs')
                                <td>{{ $detailop->fournisseur->nom_four }}</td>
                                @else
                                <td>{{ $detailop->vacataire->vac }} {{ $detailop->vacataire->nom }}
                                        {{ $detailop->vacataire->prenoms }}</td>
                                @endif
                            </tr>
                        </tbody>
                    @endforeach

                </div>
            </table>
            <div class="col-lg-3 offset-4 btn btn-secondary">
                <a href="{{ route('paiements.index') }}" class="text-light text-decoration-none">Retour à la liste des
                    OP</a>
            </div><br><br>
            <div class="col-lg-3 offset-4 btn btn-danger">
                <a href="{{ route('home') }}" class="text-light text-decoration-none">Retour à la l'accueil</a>
            </div>
        </div>
    </div>
@endsection
