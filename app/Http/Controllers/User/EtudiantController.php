<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Helpers\Helper;
use App\Models\Antenne;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Scolarite;

class EtudiantController extends Controller
{
    public function index()
    {
        // $etudiants = auth()->user()->antenne->etudiants()->get();
        $etudiants = Etudiant::all();
        $antennes = Antenne::all();
        $types = Type::all();

        return view('user.etudiants.index', compact('etudiants', 'antennes', 'types'));
    }

    public function create()
    {
        $etudiants = Etudiant::all();
        $antennes = Antenne::all();
        $types = Type::all();

        return view('user.etudiants.create', [
            'antennes' => $antennes,
            'etudiants' => $etudiants,
            'types' => $types
        ]);
    }

    public function store(Request $request)
    {
        $etudiant = $request->validate([
            'nom' => ['required', 'string'],
            'prenoms' => ['required', 'string'],
            'naissance' => ['required', 'date'],
            'lieu' => ['required', 'string'],
            'matricule_etd' => ['required', 'string'],
            'phone' => ['required', 'string', 'nullable'],
            'nationalite' => ['required', 'string', 'nullable'],
            'sexe' => ['required', 'string', 'max:1', 'nullable'],
            'email' => ['required', 'string', 'nullable'],
            'boursier' => ['required', 'string', 'max:5', 'nullable'],
            'statut' => ['required', 'string', 'max:5'],
            'type_id' => ['required', 'integer'],
            'antenne_id' => ['required', 'integer'],
        ]);

        Etudiant::create($etudiant);
        return back()->with('toast_success', 'Etudiant enregistré avec succès');

        // $studName = $request->nom; //les autres colonnes a importer obligatoirement
        // $studForName = $request->prenoms; //les autres colonnes a importer obligatoirement
        // $studBirthDate = $request->naissance;
        // $studPhone = $request->phone;
        // $studNation = $request->nationalite;
        // $studSexe = $request->sexe;
        // $studMail = $request->email;
        // $studBour = $request->boursier;
        // $studStat = $request->statut;
        // $studType = $request->type_id;
        // $studAnt = $request->antenne_id;

        // $matricule_etd = Helper::MatriculeVac(new Etudiant, 'matricule_etd', 5, 'E22-INFAS'); //la colonne qui prendra le numero de Etudiant

        // $q = new Etudiant;
        // $q->matricule_etd = $matricule_etd;
        // $q->nom = $studName;
        // $q->prenoms = $studForName;
        // $q->naissance = $studBirthDate;
        // $q->phone = $studPhone;
        // $q->nationalite = $studNation;
        // $q->sexe = $studSexe;
        // $q->email = $studMail;
        // $q->boursier = $studBour;
        // $q->statut = $studStat;
        // $q->type_id = $studType;
        // $q->antenne_id = $studAnt;
        // $q->save();


    }

    public function show($etudiant)
    {
        $etudiants = Etudiant::where('id', '=', $etudiant)->get();
        return view('user.etudiants.show', compact('etudiant'));
    }

    public function edit($etudiant)
    {
        $etudiants = Etudiant::where('id', '=', $etudiant)->get()->first();
        $antennes = Antenne::all();
        $types = Type::all();

        return view('user.etudiants.edit', compact('etudiants', 'etudiant', 'antennes', 'types'));
    }

    public function update(Request $request,  $etudiant)
    {
        $etudiants = Etudiant::find($etudiant);
        $etudiants->nom = $request->nom;
        $etudiants->prenoms = $request->prenoms;
        $etudiants->naissance = $request->naissance;
        $etudiants->lieu = $request->lieu;
        $etudiants->phone = $request->phone;
        $etudiants->nationalite = $request->nationalite;
        $etudiants->sexe = $request->sexe;
        $etudiants->email = $request->email;
        $etudiants->boursier = $request->boursier;
        $etudiants->type_id = $request->type_id;
        // $etudiants->antenne_id = $request->antenne_id;
        $etudiants->save();

        return redirect()->route('etudiants.index')->with('toast_success', 'Les informations ont été modifiées');
    }

    public function destroy(Etudiant $etudiant)
    {
        //
    }
}
