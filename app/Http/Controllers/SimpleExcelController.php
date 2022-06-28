<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Antenne;
use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\SimpleExcel\SimpleExcelWriter;

class SimpleExcelController extends Controller
{
    public function export(Request $request)
    {
        $this->validate($request, [
            'fichier' => 'bail|required|string',
            'antenne' => 'string|required',
            'extension' => 'bail|required|string|in:xlsx,csv'
        ]);

        $file_name = $request->fichier . "." . $request->extension;
        $writer = SimpleExcelWriter::streamDownload($file_name);
        if ($request->antenne == '*') {
            $etudiants = Etudiant::orderBy('antenne_id')->orderBy('nom')->get();
        } else {
            $etudiants = Etudiant::where('antenne_id', '=', $request->antenne)->orderBy('nom')->get();
        }
        $etudiants->each(function ($etudiant) use ($writer) {
            $type = Type::find($etudiant->type_id)->lib_type;
            $antenne = Antenne::find($etudiant->antenne_id)->ant_lib;
            $writer->addRow([
                'Matricule' => $etudiant->matricule_etd,
                'Noms' => $etudiant->nom,
                'Prénoms' => $etudiant->prenoms,
                'Date naissance' => $etudiant->naissance,
                'Lieu naissance' => $etudiant->lieu,
                'Contact' => $etudiant->phone,
                'Type' => $type,
                'Antenne' => $antenne
            ]);
        });

        $writer->toBrowser();
    }

    public function inscitexport(Request $request)
    {
        $this->validate($request, [
            'fichier' => 'bail|required|string',
            'antenne' => 'string|required',
            'filiere' => 'string|required',
            'extension' => 'bail|required|string|in:xlsx,csv'
        ]);

        $file_name = $request->fichier . "." . $request->extension;

        if ($request->antenne == '*') {
            $inscriptions = Inscription::orderBy('antenne_id')->get();
        } else {
            $inscriptions = Inscription::where('antenne_id', '=', $request->antenne)->get();
        }
        if ($request->filiere == '*') {
            $inscriptions =  $inscriptions->orderBy('filiere_id');
        } else {
            $inscriptions = $inscriptions->where('filiere_id', '=', $request->filiere);
        }
        $writer = SimpleExcelWriter::streamDownload($file_name);
        $inscriptions->each(function ($inscription) use ($writer) {
            $etudiantNom = Etudiant::find($inscription->etudiant_id)->nom;
            $etudiantPrenoms = Etudiant::find($inscription->etudiant_id)->prenoms;
            $antenne = Antenne::find($inscription->antenne_id)->ant_lib;
            $filiere = Filiere::find($inscription->filiere_id)->fil_lib;
            $writer->addRow([
                'Nom' => $etudiantNom,
                'Prénoms' => $etudiantPrenoms,
                'Date inscription' => $inscription->date_insc,
                'Niveau d\étude' => $inscription->niveau_etud,
                'Montant inscription' => $inscription->mont_insc,
                'Montant scolarité' => $inscription->mont_scol,
                'Montant bourse' => $inscription->mont_bour,
                'Scolarité versée' => $inscription->scol_verse,
                'Antenne' => $antenne,
                'Filière' => $filiere,
            ]);
        });
        $writer->toBrowser();
    }
}
