@extends('layouts.master')

@section('title')
    Vacations
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div>
            <h1 class="h5 p-2 mb-4 bg-dark text-white">VALIDATION DES VACATIONS</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('vacations.valider') }}">
                        @csrf
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Date de vacation</th>
                                    <th>Matricule</th>
                                    <th>Vacataire concerné</th>
                                    <th>Numéro</th>
                                    <th>Montant de la vacation</th>
                                    <th>Choix de vérification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vacations as $vacation)
                                <tr>
                                    <td>{{ $vacation->date_vac }}</td>
                                    <td>{{ $vacation->vacataire->matricule_vac }}</td>
                                    <td>{{ $vacation->vacataire->nom }} {{ $vacation->vacataire->prenoms }}</td>
                                    <td>{{ $vacation->vacataire->phone_1}}</td>
                                    <td>{{ $vacation->mont_vac }}</td>
                                    <td style="width: 5%" class="text-center"><input type="checkbox" name="vacations[]" value="{{$vacation->id}}"></td>
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
