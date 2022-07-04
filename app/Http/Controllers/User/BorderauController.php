<?php

namespace App\Http\Controllers\User;

use App\Models\Antenne;
use App\Models\Bordereau;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ordrepaiement;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class BorderauController extends Controller
{
    public function index()
    {
        $bordereaus = Bordereau::all();
        $antennes = Antenne::all();
        $users = User::all();

        return view('user.bordereaux.index', compact('bordereaus', 'users', 'antennes'));
    }

    public function create()
    {
        $bordereaus = Bordereau::all();
        $users = User::all();
        $antennes = Antenne::all();

        return view('user.bordereaux.create', [
            'bordereaus' => $bordereaus,
            'users' => $users,
            'antennes' => $antennes
        ]);
    }

    public function store(Request $request)
    {
        $bordereaus = $request->validate([
            'num_bord' => ['required', 'string', 'max:20'],
            'type_bord' => ['required', 'string', 'max:100'],
            'direction_bord' => ['required', 'string', 'max:100'],
            'categorie_bord' => ['required', 'string', 'nullable'],
            'montant_bord' => ['required', 'integer'],
            'date_trans_bord' => ['date'],
            'statut_bord' => ['required', 'string', 'max:3'],
            'user_id' => ['required', 'integer'],
            'antenne_id' => ['required', 'integer'],
        ]);

        Bordereau::create($bordereaus);

        return back()->with('toast_success', 'Bordéreau enregistré avec succès');
    }

    public function show($bordereau)
    {
        $bordereaus = Bordereau::where('id', '=', $bordereau)->first();
        $ordrepaiements = Ordrepaiement::all();
        return view('user.bordereaux.show', compact('bordereaus', 'ordrepaiements'));
    }

    public function edit($bordereau)
    {
        $bordereaus = Bordereau::where('id', '=', $bordereau)->get()->first();
        $users = User::all();
        return view('user.bordereaux.edit', compact('bordereaus', 'bordereau', 'users'));
    }

    public function update(Request $request, $bordereau)
    {
        $bordereaus = Bordereau::find($bordereau);
        $bordereaus->num_bord = $request->num_bord;
        $bordereaus->type_bord =  $request->type_bord;
        $bordereaus->direction_bord = $request->direction_bord;
        $bordereaus->date_trans_bord = $request->date_trans_bord;
        $bordereaus->montant_bord = $request->montant_bord;
        $bordereaus->statut_bord = $request->statut_bord;
        $bordereaus->user_id = $request->user_id;
        $bordereaus->antenne_id = $request->antenne_id;
        // $bordereaus->categorie_bord = $request->categorie_bord;

        $bordereaus->save();

        return redirect()->route('bordereaux.index')->with('toast_success', 'Bordéreau a été modifié');
    }

    public function destroy(Bordereau $bordereau)
    {
        //
    }

    public function formValidation()
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $bordereaus = Bordereau::where('antenne_id', auth()->user()->antenne->id)->where('statut_bord', 'F1S')->get();
        } else {
            # code...
            $bordereaus = Bordereau::where('antenne_id', auth()->user()->antenne->id)->where('statut_bord', 'F1V')->get();
        }
        return view('user.bordereaux.validation', compact('bordereaus'));
    }

    public function updateValidation(Request $request)
    {
        if ($request) {
            foreach ($request->bordereaus as $bordereau) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Bordereau::find($bordereau)->update(['statut_bord' => 'F1V']);
                } else {
                    # code...
                    Bordereau::find($bordereau)->update(['statut_bord' => 'F2V']);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Bordéreau validé avec succès');
    }
}
