<?php

namespace App\Http\Controllers;

use App\Models\Bourse;
use App\Models\Antenne;
use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Exercice;
use App\Models\Inscription;
use App\Models\Ordrepaiement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class BourseController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::where('boursier', '=', 'OUI')->get();
        $bourses = Bourse::all();
        $antennes = Antenne::all();
        $ordrepaiements = Ordrepaiement::all();
        // $bourses = Bourse::where('antenne_id',auth()->user()->antenne->id)->get();

        return view('user.bourses.index', compact('bourses', 'etudiants', 'antennes', 'ordrepaiements'));
    }

    public function create()
    {
        return view('user.bourses.index');
    }

    public function store(Request $request)
    {
        $bourse = $request->validate([
            'libelle' => ['required', 'string', 'max:255'],
            'statut' => ['required', 'string', 'max:255'],
            'antenne_id' => ['required', 'integer'],
            'ordrepaiement_id' => ['required', 'integer'],
        ]);
        Bourse::create($bourse);

        return back()->with('toast_success', 'Bourse enregistrée avec succès');
    }

    public function show(Bourse $bourse)
    {
        //
    }

    public function edit(Bourse $bourse)
    {
        //
    }

    public function update(Request $request, Bourse $bourse)
    {
        //
    }

    public function destroy(Bourse $bourse)
    {
        //
    }

    public function formValidation()
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $bourses = Bourse::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1S')->get();
        } else {
            # code...
            $bourses = Bourse::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1V')->get();
        }
        return view('user.bourses.validation', compact('bourses'));
    }

    public function updateValidation(Request $request)
    {
        if ($request) {
            foreach ($request->bourses as $bourse) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Bourse::find($bourse)->update(['statut' => 'F1V']);
                } else {
                    # code...
                    Bourse::find($bourse)->update(['statut' => 'F2V']);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Bourse enregistrée avec succès');
    }
}
