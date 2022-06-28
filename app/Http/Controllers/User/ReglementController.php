<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Helpers\Helper;
use App\Models\Antenne;
use App\Models\Etudiant;
use App\Models\Exercice;
use App\Models\Reglement;
use App\Models\Vacataire;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ReglementController extends Controller
{
    public function index()
    {
        $users = User::all();
        $antennes = Antenne::all();
        $exercices = Exercice::all();
        $etudiants = Etudiant::all();
        $vacataires = Vacataire::all();
        $fournisseurs = Fournisseur::all();
        $reglements = Reglement::all();

        return view('user.reglements.index', compact('users', 'antennes', 'exercices', 'reglements', 'etudiants', 'vacataires', 'fournisseurs'));
    }

    public function create()
    {
        $exercices = Exercice::all();
        $antennes = Antenne::all();
        $users = User::all();
        $etudiants = Etudiant::all();
        $vacataires = Vacataire::all();
        $fournisseurs = Fournisseur::all();
        $reglements = Reglement::all();

        return view('user.reglements.create', [
            'users' => $users,
            'exercices' => $exercices,
            'antennes' => $antennes,
            'reglements' => $reglements,
            'etudiants' => $etudiants,
            'vacataires' => $vacataires,
            'fournisseurs' => $fournisseurs
        ]);
    }

    public function store(Request $request)
    {
        $reglement = $request->validate([
            'reg_mont' => ['integer'],
            'reg_date' => ['required', 'date'],
            'reg_mrg_code' => ['required', 'string', 'max:50'],
            'reg_numREG' => ['string', 'max:50'],
            'reg_retenu' => ['integer', 'nullable'],
            'reg_op_num' => ['string', 'max:50'],
            'type_acteur' => ['required', 'string', 'max:50'],
            'reg_stat_code' => ['string', 'max:5'],
            'antenne_id' => ['required', 'integer'],
            'exercice_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            // 'etudiant_id' => ['integer'],
            // 'vacataire_id' => ['integer'],
            // 'fournisseur_id' => ['integer'],
            // 'acteurs' => ['string', 'max:200'],
        ]);


        $rmont = $request->reg_mont;
        $num_chq = $request->reg_numREG;
        $dateR = $request->reg_date;
        $num_cpb = $request->reg_retenu;
        $num_op = $request->reg_op_num;
        $stat_code = $request->reg_stat_code;
        $mrg_code = $request->reg_mrg_code;
        $acte = $request->type_acteur;
        $use_id = $request->user_id;
        // $acteur = $request->acteurs;//enlever
        $ant_id = $request->antenne_id;
        $exe_id = $request->exercice_id;
        $four_id = $request->fournisseur_id;
        $etud_id = $request->etudiant_id;
        $vac_id = $request->vacataire_id;

        $reg_num = Helper::IDGenerator(new Reglement, 'reg_num', 5, 'REG'); //la colonne qui prendra le numero de Reglement

        //Les pointures des noms des attributs sur les variables des colonnes à importer
        $q = new Reglement;
        $q->reg_num = $reg_num;
        $q->reg_mont = $rmont;
        $q->reg_numREG = $num_chq;
        $q->reg_date = $dateR;
        $q->reg_retenu = $num_cpb;
        $q->reg_op_num = $num_op;
        $q->reg_mrg_code = $mrg_code;
        $q->type_acteur = $acte;
        $q->reg_stat_code = $stat_code;
        // $q->acteurs = $acteur;//enlever
        $q->user_id = $use_id;
        $q->antenne_id = $ant_id;
        $q->exercice_id = $exe_id;
        $q->fournisseur_id = $four_id;
        $q->etudiant_id = $etud_id;
        $q->vacataire_id = $vac_id;
        $q->save();

        if ($request->type_acteur == 'Etudiants') {
            $q->etudiant_id = $request->benef_id;
            $q->save();
        } elseif ($request->type_acteur == 'Fournisseurs') {
            $q->fournisseur_id = $request->benef_id;
            $q->save();
        } else {
            $q->vacataire_id = $request->benef_id;
            $q->save();
        }

        
        return back()->with('toast_success', 'Règlement enregistré avec succès');
    }

    public function show(Reglement $reglement)
    {
        //
    }

    public function edit(Reglement $reglement)
    {
        //
    }

    public function update(Request $request, Reglement $reglement)
    {
        //
    }

    public function destroy(Reglement $reglement)
    {
        //
    }

    public function formValidation()
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $reglements = Reglement::where('antenne_id', auth()->user()->antenne->id)->where('reg_stat_code', 'F1S')->get();
        } else {
            # code...
            $reglements = Reglement::where('antenne_id', auth()->user()->antenne->id)->where('reg_stat_code', 'F1V')->get();
        }
        return view('user.reglements.validation', compact('reglements'));
    }

    public function updateValidation(Request $request)
    {
        if ($request) {
            foreach ($request->reglements as $reglement) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Reglement::find($reglement)->update(['reg_stat_code' => 'F1V']);
                } else {
                    # code...
                    Reglement::find($reglement)->update(['reg_stat_code' => 'F2V']);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Reglement validé avec succès');
    }

    public function getPaiement()
    {
        $fichepaiement = Reglement::all();
        return view('user.reglements.fiche', compact('fichepaiement'));
    }

    public function filePDF()
    {
        $fichepaiement = Reglement::where('user_id', '=', Auth::user()->id)->get();
        $pdf = PDF::loadView('user.reglements.fiche', compact('fichepaiement'));
        return $pdf->setPaper('a4', 'landscape')->download('Fiche de reglement' . date('j' . 'm' . 'Y' . '-' . 's') . '.pdf');
    }
}
