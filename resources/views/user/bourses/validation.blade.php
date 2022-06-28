@extends('layouts.master')

@section('title')
    Bourses
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div>
            <h1 class="h5 p-2 mb-4 bg-dark text-white">VALIDATION DES BOURSES</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('bourses.valider') }}">
                    @csrf
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Matricule</th>
                                    <th>Etudiant concerné</th>
                                    <th>Montant de bourse</th>
                                    <th>Libellé de la bourse</th>
                                    <th>Choix de vérification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bourses as $bourse)
                                <tr>
                                    <td>{{ $bourse->etudiant->matricule_etd }}</td>
                                    <td>{{ $bourse->etudiant->nom }} {{ $bourse->etudiant->prenoms }}</td>
                                    <td>{{ $bourse->montant }}</td>
                                    <td>{{ $bourse->libelle }}</td>
                                    <td style="width: 5%" class="text-center"><input type="checkbox" name="bourses[]" value="{{$bourse->id}}"></td>
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