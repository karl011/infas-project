<?php

namespace App\Http\Controllers\User;

use App\Models\Exercice;
use App\Models\Vacation;
use App\Models\Vacataire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class VacationController extends Controller
{
    public function index()
    {
        $vacations = Vacation::where('antenne_id', auth()->user()->antenne->id)->get();

        return view('user.vacations.index', compact('vacations'));
    }

    public function create()
    {
        $exercices = Exercice::all();
        $vacataires = Vacataire::where('antenne_id', auth()->user()->antenne->id)->get();

        return view('user.vacations.create', [
            'exercices' => $exercices,
            'vacataires' => $vacataires,
        ]);
    }

    public function store(Request $request)
    {
        $vacation = $request->validate([
            'date_vac' => ['required', 'date'],
            'mont_vac' => ['required', 'integer'],
            'vacataire_id' => ['required', 'integer'],
            'exercice_id' => ['required', 'integer'],
            'antenne_id' => ['required', 'integer'],
            'statut' => ['required', 'string', 'max:5'],
        ]);

        Vacation::create($vacation);

        return back()->with('toast_success', 'Vacation réalisée avec succès');
    }

    public function show(Vacation $vacation)
    {
        //
    }

    public function edit(Vacation $vacation)
    {
        //
    }

    public function formValidation()
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $vacations = Vacation::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1S')->get();
        } else {
            # code...
            $vacations = Vacation::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1V')->get();
        }
        return view('user.vacations.validation', compact('vacations'));
    }

    public function updateValidation(Request $request)
    {
        if ($request) {
            foreach ($request->vacations as $vacation) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Vacation::find($vacation)->update(['statut' => 'F1V']);
                } else {
                    # code...
                    Vacation::find($vacation)->update(['statut' => 'F2V']);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Vacation(s) validée(s) avec succès');
    }

    public function update(Request $request, Vacation $vacation)
    {
        //
    }

    public function destroy(Vacation $vacation)
    {
        //
    }
}
