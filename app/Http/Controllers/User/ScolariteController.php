<?php

namespace App\Http\Controllers\User;


use App\Models\Antenne;
use App\Models\Etudiant;
use App\Models\Exercice;
use App\Models\Scolarite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Support\Facades\Gate;

class ScolariteController extends Controller
{
    public function index()
    {
        $exercices = Exercice::all();
        $antennes = Antenne::all();
        $inscriptions = Inscription::whereColumn('scol_verse', '<', 'mont_scol')->get();
        $scolarites = Scolarite::where('antenne_id', auth()->user()->antenne->id)->get();


        // $inscriptions = Inscription::where('antenne_id',auth()->user()->antenne->id)->get();
        // return view('user.scolarites.create', compact('etudiants','exercices'));
        return view('user.scolarites.index', compact('inscriptions', 'scolarites', 'exercices'));
    }

    public function create()
    {
        $exercices = Exercice::all();
        $antennes = Antenne::all();
        // $etudiants = auth()->user()->antenne->etudiants()->get();

        return view('user.scolarites.create', compact('exercices', 'antennes', 'inscriptions'));
    }

    public function store(Request $request)
    {
        $scolarite = $request->validate([
            // 'date_scol' => ['required', 'date'],
            'montant_vers' => ['required', 'integer'],
            'montant_scol' => ['required', 'integer'],
            'montant_rest' => ['integer', 'nullable'],
            'inscription_id' => ['required', 'integer'],
            'antenne_id' => ['required', 'integer'],
            // 'exercice_id' => ['required', 'integer'],
            'statut_scol' => ['required', 'string', 'max:5'],
        ]);

        Scolarite::create([
            'date_scol' => date('Y' . '-' . 'm' . '-' . 'j'),
            'montant_vers' => $request->montant_vers,
            'montant_scol' => $request->montant_scol,
            'montant_rest' => $request->montant_rest - $request->montant_vers,
            'etudiant_id' => Inscription::find($request->inscription_id)->etudiant->id,
            'antenne_id' => $request->antenne_id,
            'exercice_id' => Inscription::find($request->inscription_id)->exercice->id,
            'statut_scol' => $request->statut_scol,
        ]);

        $inscription = Inscription::find($request->inscription_id);
        $inscription->scol_verse += $request->montant_vers;
        $inscription->save();

        return back()->with('toast_success', 'Scolarité enregistrée avec succès');
    }

    public function show(Scolarite $scolarite)
    {
        //
    }

    public function edit($scolarite)
    {
        $scolarites = Scolarite::where('id', '=', $scolarite)->get()->first();
        $exercices = Exercice::find($scolarite);
        $antennes = Antenne::find($scolarite);
        $etudiants = Etudiant::find($scolarite);
        return view('user.scolarites.edit', compact('scolarites', 'scolarite', 'exercices', 'etudiants', 'antennes'));
    }

    public function update(Request $request, $scolarite)
    {
        $scolarites = Scolarite::find($scolarite);
        $scolarites->date_scol = $request->date_scol;
        $scolarites->montant_vers = $request->montant_vers;
        // $scolarites->montant_scol= $request-> montant_scol;
        $scolarites->montant_rest = $request->montant_rest;

        $scolarites->save();
        return redirect()->route('scolarites.index')->with('info', 'Scolarité mise à jour !');
    }

    public function destroy(Scolarite $scolarite)
    {
        //
    }

    public function formValidation()
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $scolarites = Scolarite::where('antenne_id', auth()->user()->antenne->id)->where('statut_scol', 'F1S')->get();
        } else {
            # code...
            $scolarites = Scolarite::where('antenne_id', auth()->user()->antenne->id)->where('statut_scol', 'F1V')->get();
        }
        return view('user.scolarites.validation', compact('scolarites'));
    }

    public function updateValidation(Request $request)
    {
        if ($request) {
            foreach ($request->scolarites as $scolarite) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Scolarite::find($scolarite)->update(['statut_scol' => 'F1V']);
                } else {
                    # code...
                    Scolarite::find($scolarite)->update(['statut_scol' => 'F2V']);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Scolarité validée avec succès');
    }
}
