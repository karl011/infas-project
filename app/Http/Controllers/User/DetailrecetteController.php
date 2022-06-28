<?php

namespace App\Http\Controllers\User;

use App\Models\Antenne;
use App\Models\Recette;
use App\Models\Detailrecette;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Fournisseur;
use App\Models\Vacataire;

class DetailrecetteController extends Controller
{
    public function index()
    {
        $detailrecettes = Detailrecette::all();
        $recettes = Recette::all();
        $antennes = Antenne::all();
        $etudiants = Etudiant::all();
        $fournisseurs = Fournisseur::all();
        $vacataires = Vacataire::all();
        return view('user.detailrecettes.index', compact(
            'detailrecettes',
            'recettes',
            'antennes',
            'etudiants',
            'vacataires',
            'fournisseurs'
        ));
    }

    public function create()
    {
        $detailrecettes = Detailrecette::all();
        $recettes = Recette::all();
        $antennes = Antenne::all();
        $etudiants = Etudiant::all();
        $fournisseurs = Fournisseur::all();
        $vacataires = Vacataire::all();
        return view('user.detailrecettes.index', [
            'detailrecettes' => $detailrecettes,
            'recettes' => $recettes,
            'antennes' => $antennes,
            'etudiants' => $etudiants,
            'fournisseurs' => $fournisseurs,
            'vacataires' => $vacataires
        ]);
    }

    public function store(Request $request)
    {
        $detailrecettes = $request->validate([
            'drec_num' => ['required', 'string', 'max:20'],
            'drec_benef' => ['required', 'string', 'max:50'],
            'drec_mont' => ['required', 'integer'],
            'drec_objet' => ['required', 'string', 'max:400'],
            'drec_bqe' => ['required', 'string', 'max:20'],
            'drec_num_cpte' => ['string', 'max:50'],
            'drec_statut' => ['required', 'string', 'max:3'],
            'recette_id' => ['required', 'integer'],
            'antenne_id' => ['required', 'integer'],
            'benef_id' => ['required', 'numeric']
            // 'drec_type' => ['string', 'max:50'],
            // 'date_reg_drec' => ['date'],
            // 'mont_net_drec' => ['integer'],
            // 'drec_motif_diff' => ['string', 'max:300'],
            // 'drec_motif_rej' => ['string', 'max:300'],
            // 'etudiant_id' => ['required', 'integer'],
            // 'vacataire_id' => ['required', 'integer'],
            // 'fournisseur_id' => ['required', 'integer']
        ]);

        $detailrecette = Detailrecette::create([
            'drec_num' => $request->drec_num,
            'drec_benef' => $request->drec_benef,
            'drec_mont' => $request->drec_mont,
            'drec_objet' => $request->drec_objet,
            'drec_bqe' => $request->drec_bqe,
            'drec_num_cpte' => $request->drec_num_cpte,
            'drec_statut' => $request->drec_statut,
            'recette_id' => $request->recette_id,
            'antenne_id' => $request->antenne_id,
            // 'drec_type' =>$request->drec_type,
            // 'date_reg_drec' =>$request->date_reg_drec,
            // 'mont_net_drec' =>$request->mont_net_drec,
            // 'drec_motif_diff' =>$request->drec_motif_diff,
            // 'drec_motif_rej' =>$request->drec_motif_rej,

        ]);

        if ($request->drec_benef == 'Etudiants') {
            $detailrecette->etudiant_id = $request->benef_id;
            $detailrecette->save();
        } elseif ($request->drec_benef == 'Fournisseurs') {
            $detailrecette->fournisseur_id = $request->benef_id;
            $detailrecette->save();
        } else {
            $detailrecette->vacataire_id = $request->benef_id;
            $detailrecette->save();
        }
        // Detailrecette::create($detailrecettes);
        return back()->with('toast_success', 'Detail de recette enregistré.');
    }

    public function edit($detailrecette)
    {
        $antennes = Antenne::all();
        $recettes = Recette::all();
        $detailrecettes = Detailrecette::where('id', '=', $detailrecette)->get()->first();

        return view('user.detailrecettes.edit', compact('detailrecettes', 'detailrecette', 'antennes', 'recettes'));
    }

    public function update(Request $request, $detailrecette)
    {
        $detailrecettes = Detailrecette::find($detailrecette);
        $detailrecettes->date_reg_drec = $request->date_reg_drec;
        $detailrecettes->mont_net_drec = $request->mont_net_drec;
        $detailrecettes->drec_motif_diff = $request->drec_motif_diff;
        $detailrecettes->drec_motif_rej = $request->drec_motif_rej;

        $detailrecettes->save();
        return redirect()->route('detailrecettes.index')->with('info', 'Mise à jour effectuée.');
    }

    public function show(Detailrecette $detailrecette)
    {
        //
    }

    public function destroy(Detailrecette $detailrecette)
    {
        //
    }
}
