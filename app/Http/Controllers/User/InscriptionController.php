<?php

namespace App\Http\Controllers\User;

use App\Models\Antenne;
use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Exercice;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class InscriptionController extends Controller
{
    public function index()
    {
        $inscriptions = Inscription::get();
        $etudiants = Etudiant::all();
        $exercices = Exercice::all();
        // $inscriptions = Inscription::where('antenne_id', auth()->user()->antenne->id)->get();

        return view('user.inscriptions.index', compact('inscriptions', 'etudiants', 'exercices'));
    }

    public function create()
    {
        $filieres = Filiere::all();
        $exercices = Exercice::all();
        $antennes = Antenne::all();
        $etudiants = Etudiant::get();
        // $inscriptions =Inscription::all();
        // $etudiants = auth()->user()->antenne->etudiants()->get();

        return view('user.inscriptions.create', [
            'filieres' => $filieres,
            'exercices' => $exercices,
            'etudiants' => $etudiants,
            'antennes' => $antennes,
            // 'inscriptions' =>$inscriptions
        ]);
    }

    public function store(Request $request)
    {
        $inscription = $request->validate([
            'date_insc' => ['required', 'date'],
            'mont_insc' => ['required', 'integer'],
            'mont_scol' => ['required', 'integer'],
            'mont_bour' => ['required', 'integer'],
            'scol_verse' => ['integer', 'nullable'],
            'niveau_etud' => ['required', 'string', 'max:100'],
            'etudiant_id' => ['required', 'integer'],
            'filiere_id' => ['required', 'integer'],
            'exercice_id' => ['required', 'integer'],
            'antenne_id' => ['required', 'integer'],
            'statut' => ['required', 'string', 'max:5']
        ]);

        $inscriptionPrecedente = Inscription::where('etudiant_id', '=', $request->etudiant_id)->latest()->first();
        if ($inscriptionPrecedente != null) {
            if ($inscriptionPrecedente->exercice->exe_code >= Exercice::find($request->exercice_id)->exe_code) {
                return back()->with('toast_error', 'vous ??tes d??j?? inscrit pour cet exercice.');
            }
            if ($inscriptionPrecedente->niveau_etud[0] >= $request->niveau_etud[0]) {
                return back()->with('toast_error', 'vous ne pouvez pas vous inscrire en ann??e inf??rieure.');
            }
            if ($inscriptionPrecedente->scol_verse < $inscriptionPrecedente->mont_scol && !$inscriptionPrecedente->cas_special) {
                return back()->with('toast_error', 'vous n\'??tes pas ??ligible ?? vous inscrire pour cause de scolarit??.');
            }
        }

        $idinscription = Inscription::create($inscription)->id;

        return back()->with('toast_success', 'Etudiant inscrit avec succ??s');
    }

    public function show($inscription)
    {
        // $etudiants = Etudiant::get('matricule_etd');
        // $inscriptions = Inscription::where('id', '=', $inscription)->get();
        // return view('user.inscriptions.fiche', compact('inscriptions', 'etudiants'));

        $inscriptions = Inscription::where('id', '=', $inscription)->get();
        $pdf = PDF::loadView('user.inscriptions.fiche', compact('inscriptions'));
        return $pdf->download('Fiche d\'inscription' . '-' . date('m' . 'Y' . '-' . 's') . '.pdf');
        // separe
        // return $pdf->stream(Str::slug($inscription->matricule) . '.pdf');
    }

    public function statut($inscription)
    {
        $inscriptions = Inscription::where('id', '=', $inscription)->get();
        return view('user.stats.show', compact('inscriptions'));
    }

    public function edit($inscription)
    {
        $inscriptions = Inscription::where('id', '=', $inscription)->get()->first();
        $filieres = Filiere::all();
        $exercices = Exercice::all();
        $antennes = Antenne::all();
        $etudiants = auth()->user()->antenne->etudiants()->get();

        return view('user.inscriptions.edit', compact(
            'inscriptions',
            'inscription',
            'filieres',
            'exercices',
            'antennes',
            'etudiants'
        ));
    }

    public function update(Request $request, $inscription)
    {
        $inscriptions = Inscription::find($inscription);
        $inscriptions->date_insc = $request->date_insc;
        $inscriptions->mont_insc = $request->mont_insc;
        $inscriptions->mont_scol = $request->mont_scol;
        $inscriptions->mont_bour = $request->mont_bour;
        $inscriptions->niveau_etud = $request->niveau_etud;
        $inscriptions->etudiant_id = $request->etudiant_id;
        $inscriptions->filiere_id = $request->filiere_id;
        $inscriptions->exercice_id = $request->exercice_id;
        $inscriptions->antenne_id = $request->antenne_id;
        $inscriptions->save();

        return redirect()->route('inscriptions.index')->with('toast_success', 'L\'inscription a ??t?? modifi??e');
    }

    public function destroy(Inscription $inscription)
    {
        //
    }

    public function formValidation() //fonction de validation des donn??es par le sup??rieur hi??rarchique
    {
        if (Gate::allows('chef-comptable')) {
            # code...
            $inscriptions = Inscription::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1S')->get();
        } else {
            # code...
            $inscriptions = Inscription::where('antenne_id', auth()->user()->antenne->id)->where('statut', 'F1V')->get();
        }
        return view('user.inscriptions.validation', compact('inscriptions'));
    }

    public function updateValidation(Request $request) //Modification des donn??es par le sup??rieur hi??rarchique
    {
        if ($request) {
            foreach ($request->inscriptions as $inscription) {
                if (Gate::allows('chef-comptable')) {
                    # code...
                    Inscription::find($inscription)->update(['statut' => 'F1V']);
                } else {
                    # code...
                    Inscription::find($inscription)->update(['statut' => 'F2V']);
                }
            }
        }
        return redirect()->back()->with('toast_success', 'Inscription valid??e avec succ??s');
    }

    public function formSituation()
    {
        $inscriptions = Session::get('inscriptions');
        $exercices = Exercice::all();
        $filieres = Filiere::all();
        return view('user.inscriptions.situation', compact('exercices', 'inscriptions', 'filieres'));
    }

    public function searchSituation(Request $request) //Fonction de recherche des donn??es  en fonction la valeur entr??e en param??tre
    {
        $search = $request->post('search');
        $niveau_etud = $request->post('niveau_etud');
        $filiere = $request->post('filiere_id');
        $exercice = $request->post('exercice_id');
        $antenne = $request->post('antenne_id');


        $inscriptions = [];
        $etudiants = Etudiant::where('matricule_etd', 'like', "%{$search}%")->orwhere('nom', 'like', "%{$search}%")
            ->orwhere('prenoms', 'like', "%{$search}%")->get();
        // dd($etudiants);
        $filieres = Filiere::orwhere('id', 'like', "%{$filiere}%")->get();
        $exercices = Exercice::orWhere('id', 'like', "%{$exercice}%")->get();
        $antennes = Antenne::orWhere('id', 'like', "%{$antenne}%")->get();

        foreach ($etudiants as $etudiant) {
            foreach ($filieres as $filiere) {
                foreach ($exercices as $exercice) {
                    foreach ($antennes as $antenne) {
                        if ($niveau_etud == null) {
                            $inscription = Inscription::where('exercice_id', '=', $exercice->id)
                                ->where('etudiant_id', '=', $etudiant->id)
                                ->where('filiere_id', '=', $filiere->id)
                                ->where('antenne_id', '=', $antenne->id)
                                ->first();
                        } else {
                            $inscription = Inscription::where('exercice_id', '=', $exercice->id)
                                ->where('etudiant_id', '=', $etudiant->id)
                                ->where('filiere_id', '=', $filiere->id)
                                ->where('niveau_etud', 'like', "%{$niveau_etud}%")
                                ->where('antenne_id', '=', $antenne->id)
                                ->first();
                        }
                        if ($inscription != null) {
                            $inscriptions[] = $inscription;
                        }
                    }
                }
            }
        }
        $request->session()->flash('inscriptions', $inscriptions);
        $request->session()->flash('answer', 'true');
        return back();
    }

    public function casSpecial(Request $request)
    {
        if ($request->cas_special != null) {
            foreach ($request->cas_special as $special) {
                $inscription = Inscription::find($special);
                $inscription->cas_special = true;
                $inscription->save();
            }
        } else {
            return back()->with('info', 'Pour accordez une permission, cochez au moins une case.');
        }
        return back()->with('info', 'Permission d\'inscription accord??e.');
    }
}
