<?php

namespace App\Http\Controllers\User;

use App\Helpers\Helper;
use App\Models\Vacataire;
use App\Models\Recouvrement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VacataireController extends Controller
{
    public function index()
    {
        $vacataires = Vacataire::where('antenne_id', auth()->user()->antenne->id)->get();

        return view('user.vacataires.index', compact('vacataires'));
    }

    public function create()
    {
        return view('user.vacataires.create');
    }

    public function store(Request $request)
    {
        $vacataire = $request->validate([
            'matricule_vac' => ['required_if:matr,==,non', 'string', 'max:20', 'unique:App\Models\Vacataire,matricule_vac','nullable'],
            'nom' => ['required', 'string', 'max:255'],
            'prenoms' => ['required', 'string', 'max:255'],
            'date_naiss' => ['date', 'nullable'],
            'phone_1' => ['string', 'max:15', 'nullable'],
            'phone_2' => ['string', 'max:15', 'nullable'],
            'sexe' => ['required', 'string', 'max:1'],
            'email' => ['required', 'email'],
            'type' => ['required', 'string', 'max:255'],
            'statut' => ['required', 'string', 'max:5'],
            'antenne_id' => ['required', 'integer'],
        ]);

        $name = $request->nom; //les autres colonnes a importer obligatoirement
        $forName = $request->prenoms; //les autres colonnes a importer obligatoirement
        $birthDate = $request->date_naiss;
        $cell1 = $request->phone_1;
        $cell2 = $request->phone_2;
        $sexe = $request->sexe;
        $mail = $request->email;
        $types = $request->type;
        $stat = $request->statut;
        $ant = $request->antenne_id;

        if ($request->matr == 'non') {
            $matricule_vac = $request->matricule_vac;
        } else {
            $matricule_vac = Helper::MatriculeVac(new Vacataire, 'matricule_vac', 4, 'V22-INFAS');
        } //la colonne qui prendra le numero de Vacataire

        $q = new Vacataire;
        $q->matricule_vac = $matricule_vac;
        $q->nom = $name;
        $q->prenoms = $forName;
        $q->date_naiss = $birthDate;
        $q->phone_1 = $cell1;
        $q->phone_2 = $cell2;
        $q->sexe = $sexe;
        $q->email = $mail;
        $q->type = $types;
        $q->statut = $stat;
        $q->antenne_id = $ant;
        $q->save();

        // Vacataire::create($vacataire);

        return back()->with('toast_success', 'Vacataire crée avec succès');
    }

    public function show(Vacataire $vacataire)
    {
        //
    }

    public function edit(Vacataire $vacataire)
    {
        //
    }

    public function update(Request $request, Vacataire $vacataire)
    {
        //
    }

    public function destroy(Vacataire $vacataire)
    {
        //
    }
}
