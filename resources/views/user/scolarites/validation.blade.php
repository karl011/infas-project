@extends('layouts.master')

@section('title')
    Scolarites
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div>
            <h1 class="h5 p-2 mb-4 bg-dark text-white">VALIDATION DES SCOLARITES</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('scolarites.valider') }}">
                    @csrf
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Matricule</th>
                                    <th>Etudiant</th>
                                    <th>Date de scolarité</th>
                                    <th>Montant de scolarité</th>
                                    <th>Montant versé</th>
                                    <th>Antenne</th>
                                    <th>année</th>
                                    <th>Choix de vérification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scolarites as $scolarite)
                                <tr>
                                    <td>{{ $scolarite->etudiant->matricule_etd }}</td>
                                    <td>{{ $scolarite->etudiant->nom }} {{ $scolarite->etudiant->prenoms }}</td>
                                    <td>{{ $scolarite->date_scol }}</td>
                                    <td>{{ $scolarite->montant_scol }}</td>
                                    <td>{{ $scolarite->montant_vers }}</td>
                                    <td>{{ $scolarite->antenne->ant_lib }} </td>
                                    <td>{{ $scolarite->exercice->exe_code }} </td>
                                    <td style="width: 5%" class="text-center"><input type="checkbox" name="scolarites[]" value="{{$scolarite->id}}"></td>
                                </tr>
                                @endforeach
                            </tbody>   
                        </table>
                        <button type="submit" class="btn btn-danger btn-block">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection