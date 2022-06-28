<?php

namespace App\Http\Controllers\User;

use App\Models\Etubanque;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banque;
use App\Models\Etudiant;

class EtubanqueController extends Controller
{
    public function index()
    {
        $banques = Banque::all();
        $etudiants = Etudiant::where('boursier', '=', 'OUI')->get();

        return view('user.etubanques.index', compact('banques', 'etudiants'));
    }

    public function create()
    {
        $banques = Banque::all();
        $etudiants = Etudiant::where('boursier', '=', 'OUI')->get();

        return view('user.etubanques.create', compact('banques', 'etudiants'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'code_banque' => ['required', 'string', 'max:3'],
                'numero_cpte_banque' => ['required', 'string'],
                'etudiant_id' => ['required', 'integer'],
                'banque_id' => ['required', 'integer']
            ]);

            Etubanque::create([
                'code_banque' => $request->code_banque,
                'numero_cpte_banque' => $request->numero_cpte_banque,
                'etudiant_id' => $request->etudiant_id,
                'banque_id' => $request->banque_id,
                // 'etudiant_id' => Inscription::find($request->inscription_id)->etudiant->id,
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('etubanques.create')->with('toast_error', 'Désolé une erreur s\'est produite. Veuillez bien remplir le formulaire');
        }

        return back()->with('toast_success', 'Affectation d\'informations bancaires enregistrée avec succès.');
    }

    public function show(Etubanque $etubanque)
    {
        //
    }

    public function edit(Etubanque $etubanque)
    {
        //
    }

    public function update(Request $request, Etubanque $etubanque)
    {
        //
    }

    public function destroy(Etubanque $etubanque)
    {
        //
    }
}
