@extends('layouts.obs')

@section('title')
    Consultation
@endsection

@section('styles')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary text-center">CONSULTATION DE STATUT DES ETUDIANTS</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0"
                            style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Matricule</th>
                                    <th class="text-center">Nom et prénoms</th>
                                    <th class="text-center">Antenne</th>
                                    <th class="text-center">Filière</th>
                                    <th class="text-center">inscrit ?</th>
                                    <th class="text-center">Exercice</th>
                                    {{-- <th class="text-center">Scolarité</th> --}}
                                    <th class="text-right">Consultation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($etudiants as $etudiant)
                                    @php
                                        $b = $inscriptions->where('etudiant_id', '=', $etudiant->id)->first();
                                        if ($b == null) {
                                            $fil = 'étudiant non inscrit';
                                            $exe = 'étudiant non inscrit';
                                        } else {
                                            $fil = $b->filiere->fil_lib;
                                            $exe = $b->exercice->exe_code;
                                        }

                                        // $sco = $scolarites->where('etudiant_id', '=', $etudiant->id)->first();
                                        // if ($sco == null) {
                                        //     $sco = 'scolarité non à jour';
                                        // }else{
                                        //     $scol = $sco->montant_vers."/".$sco->montant_scol;
                                        // }
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $etudiant->matricule_etd }}</td>
                                        <td class="text-center">{{ $etudiant->nom }} {{ $etudiant->prenoms }}</td>
                                        <td class="text-center">{{ $etudiant->antenne->ant_lib }}</td>
                                        <td class="text-center">{{ $fil }}</td>
                                        <td class="text-center font-weight-bold">
                                            @php
                                                $a = $inscriptions->where('etudiant_id', '=', $etudiant->id)->first();
                                                if ($a == null) {
                                                    echo 'NON';
                                                } else {
                                                    echo 'OUI';
                                                }
                                            @endphp
                                        </td>
                                        <td class="text-center">{{ $exe }}</td>
                                        {{-- <td class="text-center">{{ $scol }}</td> --}}
                                        <td class="text-right">
                                            <a type="button" href="{{-- {{ route('stats.statut', $inscription->id) }} --}}" class="btn btn-primary  btn-sm">Consulter</a>
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