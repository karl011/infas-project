<?php

namespace App\Http\Controllers\User;

use App\Models\Bourse;
use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Exercice;
use App\Models\Vacation;
use App\Models\Reglement;
use App\Models\Scolarite;
use App\Models\Vacataire;
use App\Models\Inscription;
use App\Models\Recouvrement;
use App\Http\Controllers\Controller;
use App\Models\Bordereau;
use App\Models\Ordrepaiement;

class StatistiqueController extends Controller
{
    public function index()
    {
        //Les variables utilisées pour compter le nombre total de données par table.
        $scolarites = Scolarite::get();
        $etudiants = Etudiant::get();
        $inscriptions = Inscription::get();
        $vacataires = Vacataire::get();
        $vacations = Vacation::get();
        $reglements = Reglement::get();
        $recouvrements = Recouvrement::get();
        $bordereaux = Bordereau::get();
        $opaiements = Ordrepaiement::get();

        //Les variables utilisées pour calculer les montants
        $montantinscs = Inscription::get()->sum('mont_insc');
        $montantscols = Inscription::get()->sum('mont_scol');
        $mont_scol = Scolarite::get()->sum('montant_scol');
        $mont_scol_vers = Scolarite::get()->sum('montant_vers');
        $bourses = Bourse::get()->sum('montant');
        $mont_recouvrements = Recouvrement::get()->sum('recouv_mont');
        $mont_reglements = Reglement::get()->sum('reg_mont');

        $resultats = $mont_recouvrements - $mont_reglements;

        return view('user.stats.statistique', compact(
            'scolarites',
            'etudiants',
            'inscriptions',
            'vacataires',
            'vacations',
            'reglements',
            'recouvrements',
            'montantinscs',
            'montantscols',
            'mont_scol',
            'mont_scol_vers',
            'bourses',
            'mont_recouvrements',
            'mont_reglements',
            'resultats',
            'bordereaux',
            'opaiements'
        ));
    }

    public function consulte()
    {
        $etudiants = Etudiant::all();
        $inscriptions = Inscription::all();
        $filieres = Filiere::all();
        $exercices = Exercice::all();
        $scolarites = Scolarite::all();
        return view('user.stats.consultation', compact(
            'etudiants',
            'inscriptions',
            'filieres',
            'exercices',
            'scolarites'
        ));
    }

    // public function show($inscription)
    // {
    //     $inscriptions = Inscription::where('id', '=', $inscription)->get();
    //     return view('user.stats.show', compact('inscriptions', 'inscription'));
    // }

    public function show($stat)
    {
        $inscriptions = Inscription::where('id', '=', $stat)->get()->first();
        return view('user.stats.show', compact('inscriptions', $stat));
    }

    
}
