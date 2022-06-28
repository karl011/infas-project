<?php

namespace App\Http\Controllers\User;

use App\Models\Antenne;
use App\Models\Recette;
use App\Models\Exercice;
use App\Models\Fonction;
use App\Models\Bordereau;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RecetteController extends Controller
{
    public function index()
    {
        $recettes = Recette::all();
        $antennes = Antenne::all();
        $fonctions = Fonction::all();
        $fournisseurs = Fournisseur::all();
        $exercices = Exercice::all();
        $bordereaus = Bordereau::all();

        return view('user.recettes.index', compact(
            'recettes',
            'antennes',
            'fonctions',
            'fournisseurs',
            'exercices',
            'bordereaus'
        ));
    }

    public function create()
    {
        $recettes = Recette::all();
        $antennes = Antenne::all();
        $fonctions = Fonction::all();
        $fournisseurs = Fournisseur::all();
        $exercices = Exercice::all();
        $bordereaus = Bordereau::all();

        return view('user.recettes.create', [
            'recettes' => $recettes,
            'antennes' => $antennes,
            'fonctions' => $fonctions,
            'fournisseurs' => $fournisseurs,
            'exercices' => $exercices,
            'bordereaus' => $bordereaus,
        ]);
    }

    public function store(Request $request)
    {
        $recettes = $request->validate([
            'titre_num' => ['string', 'max:20'],
            'mont_titre' => ['integer'],
            'date_emission' => ['date'],
            'type_titre' => ['string', 'max:50'],
            'objet' => ['string', 'max:400'],
            'lire_code' => ['string', 'max:50'],
            'num_declar' => ['string', 'max:20'],
            'bordereau_id' => ['integer'],
            'fournisseur_id' => ['integer'],
            'exercice_id' => ['integer'],

            'date_saisie' => ['date'],
            'user_id' => ['integer'],
            'antenne_id' => ['integer'],
            'statut' => ['string', 'max:3'],

            'date_diff' => ['date'],
            'date_rej' => ['date'],
            'bord_numR' => ['string', 'max:20'],
            // 'titre_fonc_code_rejet' => ['string', 'max:50'],
            'titre_num_annule' => ['string', 'max:20'],
            'gest_code' => ['string', 'max:30'],
            'motif_diff' => ['string', 'max:200'],
            'motif_rej' => ['string', 'max:200'],
            'cpte_code' => ['string', 'max:50'],
        ]);
        
        Recette::create($recettes);

        return back()->with('toast_success', 'Recette enregistrée avec succès');
    }

    public function show(Recette $recette)
    {
        //
    }

    public function edit($recette)
    {
        $fournisseurs = Fournisseur::where('id', '=', $recette)->get()->first();
        $antennes = Antenne::find($recette);
        $fonctions = Fonction::find($recette);
        $exercices = Exercice::find($recette);
        $bordereaus = Bordereau::find($recette);
        $recettes = Recette::find($recette);

        return view('user.recettes.edit', compact('recettes', 'antennes', 'fonctions', 'fournisseurs', 'exercices', 'bordereaus'));
    }

    public function update(Request $request, $recette)
    {
        $recettes = Recette::find($recette);
        // $recettes->date_pec = $request->date_pec;
        // $recettes->titre_fonc_code_rejet = $request->titre_fonc_code_rejet;
        $recettes->date_diff = $request->date_diff;
        $recettes->date_rej = $request->date_rej;
        $recettes->bord_numR = $request->bord_numR;
        $recettes->titre_num_annule = $request->titre_num_annule;
        $recettes->statut = $request->statut; //statut
        $recettes->gest_code = $request->gest_code;
        $recettes->motif_diff = $request->motif_diff;
        $recettes->motif_rej = $request->motif_rej;
        $recettes->cpte_code = $request->cpte_code;
        $recettes->date_pec = date('Y' . '-' . 'm' . '-' . 'j');

        $recettes->save();
        return redirect()->route('recettes.index')->with('toast_success', 'Action effectuée avec succès');
    }

    public function destroy(Recette $recette)
    {
        //
    }

    public function formValidation()
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $recettes = Recette::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1S')->get();
        } else {
            # code...
            $recettes = Recette::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1V')->get();
        }
        return view('user.recettes.validation', compact('recettes'));
    }

    public function updateValidation(Request $request)
    {
        if ($request) {
            foreach ($request->recettes as $recette) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Recette::find($recette)->update(['statut' => 'F1V']);
                } else {
                    # code...
                    Recette::find($recette)->update(['statut' => 'F2V']);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Recette validée avec succès');
    }

    public function getPaiement()
    {
        $fichepaiement = Recette::all();
        return view('user.recettes.fiche', compact('fichepaiement'));
    }

    public function filePDF()
    {
        $fichepaiement = Recette::where('user_id', '=', Auth::user()->id)->get();
        $pdf = PDF::loadView('user.recettes.fiche', compact('fichepaiement'));
        return $pdf->setPaper('a4', 'landscape')->download('Fiche de recette' . date('j' . 'm' . 'Y' . '-' . 's') . '.pdf');
    }
}
