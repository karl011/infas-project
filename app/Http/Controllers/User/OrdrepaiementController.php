<?php

namespace App\Http\Controllers\User;

use App\Models\Banque;
use App\Models\Antenne;
use App\Models\Exercice;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Bordereau;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Models\Ordrepaiement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrdrepaiementController extends Controller
{
    public function index()
    {
        $exercices = Exercice::get();
        $antennes = Antenne::all();
        $bordereaus = Bordereau::all();
        $banques = Banque::all();
        $ordrepaiements = Ordrepaiement::where('user_id', '=', Auth::user()->id)->get();

        return view('user.paiements.index', compact(
            'ordrepaiements',
            'exercices',
            'antennes',
            'bordereaus',
            'banques'
        ));
    }

    public function create()
    {
        $exercices = Exercice::all();
        $bordereaus = Bordereau::all();
        $antennes = Antenne::all();
        $banques = Banque::all();
        return view('user.paiements.create', [
            'exercices' => $exercices,
            'bordereaus' => $bordereaus,
            'antennes' => $antennes,
            'banques' => $banques
        ]);
    }

    public function store(Request $request)
    {
        $ordrepaiements = $request->validate([
            'num_ordre' => ['string', 'max:20'],
            'date_op' => ['date'],
            'mont_ordre' => ['integer'],
            'numero_cpte' => ['string', 'max:50'],
            'numero_liq' => ['string', 'max:50'],
            'objet' => ['string', 'max:400'],
            'mrg_code' => ['string', 'max:20'],
            'cpte_ordre' => ['string', 'max:50'],
            'exercice_id' => ['integer'],
            'bordereau_id' => ['integer'],
            'banque_id' => ['integer'],

            'date_saisie' => ['date'],
            'statut' => ['string', 'max:3'],
            'user_id' => ['integer'],
            'antenne_id' => ['integer'],

            'date_pec' => ['date'],
            'date_rej' => ['date'],
            'date_emission' => ['date'],
            'date_val_sgc' => ['date'],
            'date_val_cds' => ['date'],
            'date_ordre' => ['date'],
            'mont_net_ordre' => ['integer'],
            'motif_diff' => ['string', 'max:300'],
            'motif_rej' => ['string', 'max:300'],
            'ordre_bord_numR' => ['string', 'max:20'],
            'ordre_num_annule' => ['string', 'max:20'],
            'plc_gst' => ['string', 'max:30'],
            'cpte_pec' => ['string', 'max:50']
        ]);
        Ordrepaiement::create($ordrepaiements);

        return back()->with('toast_success', 'Ordre de paiement enregistré avec succès');
    }

    public function edit($ordrepaiement)
    {
        $ordrepaiements = Ordrepaiement::where('id', '=', $ordrepaiement)->get()->first(); //a revoir des ce soir
        $exercices = Exercice::find($ordrepaiement);
        $antennes = Antenne::find($ordrepaiement);
        $bordereaus = Bordereau::find($ordrepaiement);
        $banques = Banque::find($ordrepaiement);
        $ordrepaiements = Ordrepaiement::find($ordrepaiement);

        return view('user.paiements.edit', compact('fournissseurs', 'exercices', 'antennes', 'bordereaus', 'ordrepaiements', 'ordrepaiement', 'banques'));
    }


    public function update(Request $request, $ordrepaiement)
    {
        $ordrepaiements = Ordrepaiement::find($ordrepaiement);
        $ordrepaiements->date_rej = $request->date_rej;
        $ordrepaiements->motif_rej = $request->motif_rej;
        $ordrepaiements->cpte_pec = $request->cpte_pec;
        $ordrepaiements->ordre_num_annule = $request->ordre_num_annule;
        $ordrepaiements->motif_diff = $request->motif_diff;
        $ordrepaiements->plc_gst = $request->plc_gst;
        $ordrepaiements->mont_net_ordre = $request->mont_net_ordre;
        $ordrepaiements->date_val_sgc = $request->date_val_sgc;
        $ordrepaiements->date_val_cds = $request->date_val_cds;
        $ordrepaiements->statut = $request->statut;
        $ordrepaiements->ordre_bord_numR = $request->ordre_bord_numR;
        $ordrepaiements->date_pec = date('Y' . '-' . 'm' . '-' . 'j');
        $ordrepaiements->date_ordre = date('Y' . '-' . 'm' . '-' . 'j');
        $ordrepaiements->date_emission = date('Y' . '-' . 'm' . '-' . 'j');

        $ordrepaiements->save();
        return redirect()->route('paiements.index')->with('toast_success', 'L\'action effectuée avec succès');
    }

    public function show($ordrepaiement)
    {
        $ordrepaiements = Ordrepaiement::where('id', '=', $ordrepaiement)->first();
        return view('user.paiements.show', compact('ordrepaiements', 'ordrepaiement'));
    }

    // public function show($id)
    // {
    //     $op = Ordrepaiement::find($id);
    //     return view('user.paiements.show', compact('op'));
    // }

    public function destroy(Ordrepaiement $ordrepaiement)
    {
        //
    }

    public function formValidation()
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $ordrepaiements = Ordrepaiement::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1S')->get();
        } else {
            # code...
            $ordrepaiements = Ordrepaiement::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1V')->get();
            $ordrepaiements = Ordrepaiement::where('antenne_id', auth()->user()->antenne->id)->where('date_val_cds', date('Y' . '-' . 'm' . '-' . 'j'))->get();
        }
        return view('user.paiements.validation', compact('ordrepaiements'));
    }

    public function updateValidation(Request $request)
    {
        if ($request) {
            foreach ($request->ordrepaiements as $ordrepaiement) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Ordrepaiement::find($ordrepaiement)->update(['statut' => 'F1V']);
                } else {
                    # code...
                    Ordrepaiement::find($ordrepaiement)->update(['statut' => 'F2V']);
                    Ordrepaiement::find($ordrepaiement)->update(['date_val_sgc' => date('Y' . '-' . 'm' . '-' . 'j')]);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Paiement validé avec succès');
    }

    public function getPaiement()
    {
        $fichepaiement = Ordrepaiement::all();
        return view('user.paiements.fiche', compact('fichepaiement'));
    }

    public function filePDF()
    {
        $fichepaiement = Ordrepaiement::where('user_id', '=', Auth::user()->id)->get();
        $pdf = PDF::loadView('user.paiements.fiche', compact('fichepaiement'));
        return $pdf->setPaper('a4', 'landscape')->download('Fiche de paiement' . date('j' . 'm' . 'Y' . '-' . 's') . '.pdf');
    }
}
