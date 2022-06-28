@extends('layouts.master')

@section('title')
    Validation recette
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div>
            <h1 class="h5 p-2 mb-4 bg-dark text-white">VALIDATION DES RECETTES</h1>
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
                                    <th>Numéro de la recette</th>
                                    <th>Montant du titre</th>
                                    <th>Date de saisie</th>
                                    <th>Type de titre</th>
                                    <th>Objet</th>
                                    <th>Choix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recettes as $recette)
                                <tr>
                                    <td>{{ $recette->titre_num }}</td>
                                    <td>{{ $recette->mont_titre}}</td>
                                    <td>{{ $recette->date_saisie }}</td>
                                    <td>{{ $recette->type_titre }}</td>
                                    <td>{{ $recette->objet }}</td>
                                    <td style="width: 5%" class="text-center"><input type="checkbox" name="recettes[]" value="{{$recette->id}}"></td>
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