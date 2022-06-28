<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Models\Antenne;
use App\Models\Exercice;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Recouvrement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RecouvrementController extends Controller
{
    public function index()
    {
        $users = User::all();
        $antennes = Antenne::all();
        $exercices = Exercice::all();
        $recouvrements = Recouvrement::all();

        return view('user.recouvrements.index', compact('users', 'antennes', 'exercices', 'recouvrements'));
    }

    public function create()
    {
        $exercices = Exercice::all();
        $antennes = Antenne::all();
        // $users = auth()->user()->antenne->etudiants()->get();
        $users = User::all();
        $recouvrements = Recouvrement::all();

        return view('user.recouvrements.create', [
            'users' => $users,
            'exercices' => $exercices,
            'antennes' => $antennes,
            'recouvrements' => $recouvrements,
        ]);

        //return view('user.recouvrements.create');
    }

    public function store(Request $request)
    {
        $recouvrement = $request->validate([
            //'recouv_num' => ['required', 'string', 'max:50'],
            //'recouv_date_entr' => [ 'date'],
            // 'recouv_num_bord_vert' => ['string', 'max:50'],
            // 'recouv_cpb_code' => ['string', 'max:50'],
            'recouv_date' => ['required', 'date'],
            'recouv_mont' => ['integer'],
            'recouv_mrg_code' => ['string', 'max:50'],
            'recouv_numBCV' => ['string', 'max:50'],
            'recouv_op_num' => ['string', 'max:50'],
            'recouv_stat_code' => ['string', 'max:5'],
            'recouv_fourn_code' => ['string', 'max:50', 'nullable'],
            'recouv_etex_mat' => ['string', 'max:50', 'nullable'],
            'recouv_vacex_mat' => ['string', 'max:50', 'nullable'],
            'user_id' => ['required', 'integer'],
            'antenne_id' => ['required', 'integer'],
            'exercice_id' => ['required', 'integer'],
            // 'inscription_id' => ['required','integer']
        ]);
        
        $rmont = $request->recouv_mont; //les autres colonnes a importer obligatoirement
        $num_chq = $request->recouv_numBCV; //les autres colonnes a importer obligatoirement
        $num_op = $request->recouv_op_num;
        $dateR = $request->recouv_date;
        $stat_code = $request->recouv_stat_code;
        $mrg_code = $request->recouv_mrg_code;
        $fourns = $request->recouv_fourn_code;
        $etex_mat = $request->recouv_etex_mat;
        $vacex_mat = $request->recouv_vacex_mat;
        $fonc_id = $request->user_id;
        $ant_id = $request->antenne_id;
        $exe_id = $request->exercice_id;

        $recouv_num = Helper::IDGenerator(new Recouvrement, 'recouv_num', 5, 'RCV'); //la colonne qui prendra le numero de recouvrement

        $q = new Recouvrement;
        $q->recouv_num = $recouv_num;
        $q->recouv_mont = $rmont;
        $q->recouv_numBCV = $num_chq;
        $q->recouv_op_num = $num_op;
        $q->recouv_date = $dateR;
        $q->recouv_stat_code = $stat_code;
        $q->recouv_mrg_code = $mrg_code;
        $q->recouv_fourn_code = $fourns;
        $q->recouv_etex_mat = $etex_mat;
        $q->recouv_vacex_mat = $vacex_mat;
        $q->user_id = $fonc_id;
        $q->antenne_id = $ant_id;
        $q->exercice_id = $exe_id;
        $q->save();

        return back()->with('toast_success', 'Recouvrement enregistré avec succès');
    }

    public function show(Recouvrement $recouvrement)
    {
        //
    }

    public function edit(Recouvrement $recouvrement)
    {
        //
    }

    public function update(Request $request, Recouvrement $recouvrement)
    {
        //
    }

    public function destroy(Recouvrement $recouvrement)
    {
        //
    }

    public function formValidation()
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $recouvrements = Recouvrement::where('antenne_id', auth()->user()->antenne->id)->where('recouv_stat_code', 'F1S')->get();
        } else {
            # code...
            $recouvrements = Recouvrement::where('antenne_id', auth()->user()->antenne->id)->where('recouv_stat_code', 'F1V')->get();
        }
        return view('user.recouvrements.validation', compact('recouvrements'));
    }

    public function updateValidation(Request $request)
    {
        if ($request) {
            foreach ($request->recouvrements as $recouvrement) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Recouvrement::find($recouvrement)->update(['recouv_stat_code' => 'F1V']);
                } else {
                    # code...
                    Recouvrement::find($recouvrement)->update(['recouv_stat_code' => 'F2V']);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Recouvrement validé avec succès');
    }

    public function getPaiement()
    {
        $fichepaiement = Recouvrement::all();
        return view('user.recouvrements.fiche', compact('fichepaiement'));
    }

    public function filePDF()
    {
        $fichepaiement = Recouvrement::where('user_id', '=', Auth::user()->id)->get();
        $pdf = PDF::loadView('user.recouvrements.fiche', compact('fichepaiement'));
        return $pdf->setPaper('a4', 'landscape')->download('Fiche de recouvrement' . date('j' . 'm' . 'Y' . '-' . 's') . '.pdf');
    }
}
