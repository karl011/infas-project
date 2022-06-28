<?php

namespace App\Http\Controllers\User;

use App\Models\Banque;
use App\Models\Antenne;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        $antennes = Antenne::all();
        $banques = Banque::all();
        return view('user.fournisseurs.index', compact('fournisseurs', 'antennes', 'banques'));
    }

    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $antennes = Antenne::all();
        $banques = Banque::all();
        return view('user.fournisseurs.create', [
            'fournisseurs' => $fournisseurs,
            'antennes' => $antennes,
            'banques' => $banques
        ]);
    }

    public function store(Request $request)
    {
        $fournisseurs = $request->validate([
            'code_four' => ['required', 'string', 'max:50'],
            'nom_four' => ['required', 'string', 'max:200'],
            'adresse_four' => ['string', 'max:200'],
            'rib_four' => ['required', 'string', 'max:20'],
            // 'compte_four' => ['string', 'max:50'],
            'tel_four' => ['string', 'max:50'],
            'banque_id' => ['required', 'integer'],
            'antenne_id' => ['required', 'integer'],
        ]);

        Fournisseur::create($fournisseurs);

        return back()->with('toast_success', 'Fournisseur enregistré avec succès');
    }

    public function show($fournisseur)
    {
        $fournisseurs = Fournisseur::where('id', '=', $fournisseur)->get()->first();
        return view('user.fournisseurs.show', compact('fournisseurs'));
    }

    public function edit($fournisseur)
    {
        $fournisseurs = Fournisseur::where('id', '=', $fournisseur)->get()->first();
        $banques = Banque::find($fournisseur);
        return view('user.fournisseurs.edit', compact('fournisseurs', 'fournisseur', 'banques'));
    }

    public function update(Request $request, $fournisseur)
    {
        $fournisseurs = Fournisseur::find($fournisseur);
        $fournisseurs->code_four = $request->code_four;
        $fournisseurs->nom_four = $request->nom_four;
        $fournisseurs->adresse_four = $request->adresse_four;
        $fournisseurs->rib_four = $request->rib_four;
        $fournisseurs->tel_four = $request->tel_four;
        // $fournisseurs->banque_id = $request->banque_id;
        $fournisseurs->antenne_id = $request->antenne_id;
        $fournisseurs->save();

        return redirect()->route('fournisseurs.index')->with('toast_success', 'Fournisseur a été modifié');
    }

    public function destroy(Fournisseur $fournisseur)
    {
        //
    }

    public function formValidation()
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $fournisseurs = Fournisseur::where('antenne_id', auth()->user()->antenne->id)->where('statut_four', 'F1S')->get();
        } else {
            # code...
            $fournisseurs = Fournisseur::where('antenne_id', auth()->user()->antenne->id)->where('statut_four', 'F1V')->get();
        }
        return view('user.fournisseurs.validation', compact('fournisseurs'));
    }

    public function updateValidation(Request $request)
    {
        if ($request) {
            foreach ($request->fournisseurs as $fournisseur) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Fournisseur::find($fournisseur)->update(['statut_four' => 'F1V']);
                } else {
                    # code...
                    Fournisseur::find($fournisseur)->update(['statut_four' => 'F2V']);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Fournisseur validé avec succès');
    }
}
