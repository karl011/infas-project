@extends('layouts.master')

@section('title')
    Validation Inscription
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div>
            <h1 class="h5 p-2 mb-4 bg-dark text-white">VALIDATION DES INSCRIPTIONS</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('inscriptions.valider') }}">
                    @csrf
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Matricule</th>
                                    <th>Nom et Prénoms</th>
                                    <th>Date Inscription</th>
                                    {{-- <th>Montant d'inscription</th> --}}
                                    <th>Scolarité</th>
                                    <th>Total versé</th>
                                    <th>Niveau et Exercice</th>
                                    <th>Choix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inscriptions as $inscription)
                                <tr>
                                    <td>{{ $inscription->etudiant->matricule_etd }}</td>
                                    <td>{{ $inscription->etudiant->nom }} {{ $inscription->etudiant->prenoms }}</td>
                                    <td>{{ $inscription->date_insc }}</td>
                                    {{-- <td>{{ $inscription->mont_insc }}</td> --}}
                                    <td>{{ $inscription->mont_scol }}</td>
                                    <td>{{ $inscription->scol_verse }}</td>
                                    <td>{{ $inscription->niveau_etud }} ; {{ $inscription->exercice->exe_code }}</td>
                                    <td style="width: 5%" class="text-center"><input type="checkbox" name="inscriptions[]" value="{{$inscription->id}}"></td>
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
