@extends('layouts.master')

@section('title')
    Validation bordereau
@endsection

@section('content')
<div class="container-fluid">

    <div class="container">
        <div>
            <h1 class="h5 p-2 mb-4 bg-dark text-white">VALIDATION DES BORDEREAUX</h1>
        </div>
    </div>

    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" action="{{ route('bordereaux.valider') }}">
                    @csrf
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" style="font-size: 0.8em;">
                            <thead class="thead-dark">
                                <tr>
                                    <th>N° de bordéreau</th>
                                    <th>Type de bordéreau</th>
                                    <th>Direction de bordérau</th>
                                    <th>Date de transmission</th>
                                    <th>Montant du bordéreau</th>
                                    <th>Choix</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bordereaus as $bordereau)
                            <tr>
                                <td>{{ $bordereau->num_bord }}</td>
                                <td>{{ $bordereau->type_bord}}</td>
                                <td>{{ $bordereau->direction_bord }}</td>
                                <td>{{ $bordereau->date_trans_bord }}</td>
                                <td>{{ $bordereau->montant_bord }}</td>
                                <td style="width: 5%" class="text-center">
                                    <input type="checkbox" name="bordereaus[]" value="{{$bordereau->id}}">
                                </td>
                                <td class="text-center" style="width: 10%">
                                    <a type="button" href="{{ route('bordereaux.show', $bordereau->id) }}"
                                        class="btn btn-primary  btn-sm">Voir plus</a>
                                </td>
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