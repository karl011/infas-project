<?php

namespace App\Http\Controllers\User;

use App\Models\Detailop;
use App\Models\Antenne;
use App\Models\Ordrepaiement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\Fournisseur;
use App\Models\Vacataire;

class DetailopController extends Controller
{
    public function index()
    {
        $detailops = Detailop::all();
        $ordrepaiements = Ordrepaiement::all();
        $antennes = Antenne::all();
        $etudiants = Etudiant::all();
        $fournisseurs = Fournisseur::all();
        $vacataires = Vacataire::all();
        return view('user.detailops.index', compact(
            'detailops',
            'ordrepaiements',
            'antennes',
            'etudiants',
            'fournisseurs',
            'vacataires'
        ));
    }

    public function create()
    {
        $detailops = Detailop::all();
        $ordrepaiements = Ordrepaiement::all();
        $antennes = Antenne::all();
        $etudiants = Etudiant::all();
        $fournisseurs = Fournisseur::all();
        $vacataires = Vacataire::all();
        return view('user.detailsops.index', [
            'detailops' => $detailops,
            'ordrepaiements' => $ordrepaiements,
            'antennes' => $antennes,
            'etudiants' => $etudiants,
            'fournisseurs' => $fournisseurs,
            'vacataires' => $vacataires
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'dop_benef' => ['required', 'string', 'max:50'],
            'dop_mont' => ['required', 'integer'],
            'dop_objet' => ['required', 'string', 'max:400'],
            'dop_bqe_code' => ['required', 'string', 'max:20'],
            'num_cpte' => ['string', 'max:50', 'nullable'],
            'dop_statut' => ['required', 'string', 'max:3'],
            'ordrepaiement_id' => ['required', 'integer'],
            'antenne_id' => ['integer'],
            'benef_id' => ['numeric', 'required'],
            'guichet' => ['required', 'string', 'max:10', 'nullable'],
            'rib' => ['required', 'string', 'max:10', 'nullable'],
            // 'dop_type' => ['string', 'max:50', 'nullable'],
            // 'date_reg' => ['date', 'nullable'],
            // 'mont_net' => ['integer', 'nullable'],
            // 'dop_motif_diff' => ['string', 'max:300'],
            // 'dop_motif_rej' => ['string', 'max:300'],
            // 'etudiant_id' => ['integer', 'nullable'],
            // 'vacataire_id' => ['integer', 'nullaable'],
            // 'fournisseur_id' => ['integer', 'nullable'],
        ]);

        $detailop = Detailop::create([
            'dop_benef' => $request->dop_benef,
            'dop_mont' => $request->dop_mont,
            'dop_objet' => $request->dop_objet,
            'dop_bqe_code' => $request->dop_bqe_code,
            'num_cpte' => $request->num_cpte,
            'dop_statut' => $request->dop_statut,
            'ordrepaiement_id' => $request->ordrepaiement_id,
            'antenne_id' => $request->antenne_id,
            'guichet' => $request->guichet,
            'rib' => $request->rib,
            // 'dop_type' => $request->dop_type,
            // 'date_reg' => $request->date_reg,
            // 'mont_net' => $request->mont_net,
            // 'dop_motif_diff' => $request->dop_motif_diff,
            // 'dop_motif_rej' => $request->dop_motiff_rej,
        ]);

        if ($request->dop_benef == 'Etudiants') {
            $detailop->etudiant_id = $request->benef_id;
            $detailop->save();
        } elseif ($request->dop_benef == 'Fournisseurs') {
            $detailop->fournisseur_id = $request->benef_id;
            $detailop->save();
        } else {
            $detailop->vacataire_id = $request->benef_id;
            $detailop->save();
        }
        return back()->with('toast_success', 'L\'assignation d\'un bénéficiaire à un ordrement de paiement effectée.');
    }

    public function edit($detailop)
    {
        $antennes = Antenne::all();
        $ordrepaiements = Ordrepaiement::all();
        $ordrepaiements = Ordrepaiement::all();
        $detailops = Detailop::where('id', '=', $detailop)->get()->first();

        return view('user.detailops.edit', compact('detailops', 'detailop', 'antennes', 'ordrepaiements'));
    }

    public function update(Request $request, $detailop)
    {
        $detailops = Detailop::find($detailop);
        $detailops->date_reg = $request->date_reg;
        $detailops->mont_net = $request->mont_net;
        $detailops->dop_motif_diff = $request->dop_motif_diff;
        $detailops->dop_motif_rej = $request->dop_motif_rej;

        $detailops->save();
        return redirect()->route('detailops.index')->with('info', 'Enregistré');
    }

    public function show(Detailop $detailop)
    {
        //
    }

    public function destroy(Detailop $detailop)
    {
        //
    }
}
