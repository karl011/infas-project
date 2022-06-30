<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Antenne;
use App\Models\Filiere;
use App\Models\Detailop;
use App\Models\Etudiant;
use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Models\Ordrepaiement;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;


class ImportationController extends Controller
{
    public function create()
    {
        return view('user.students.create');
    }

    public function store(Request $request)
    {
        $file = $request->fichier->move(public_path(), $request->fichier->hashName());
        SimpleExcelReader::create($file)->getRows()->each(function (array $rowsValue) {
            $type = Type::where('lib_type', '=', $rowsValue['Statut'])->first();
            if ($type->montant_bourse >= 0) {
                $boursier = 'OUI';
            } else {
                $boursier = 'NON';
            }
            if (Antenne::where('ant_lib', '=', $rowsValue['Antenne'])->first() == null) {
                $antenne = Antenne::create([
                    'ant_lib' => $rowsValue['Antenne'],
                ]);
            } else {
                $antenne = Antenne::where('ant_lib', '=', $rowsValue['Antenne'])->first();
            }
            $etudiant = Etudiant::create([
                'matricule_etd' => $rowsValue['Matricule'],
                'nom' => $rowsValue['Nom'],
                'prenoms' => $rowsValue['Prenoms'],
                'naissance' => $rowsValue['Dtn'],
                'lieu' => $rowsValue['Lieu'],
                'phone' => $rowsValue['Telephone'],
                'nationalite' => 'Ivoirienne', //il faudra exiger la nationalité des étudiants
                // 'sexe' => $rowsValue[6],
                // 'email' => $rowsValue[7],
                'boursier' => $boursier,
                'statut' => 'F1S',
                'antenne_id' => $antenne->id,
                'type_id' => $type->id,
            ]);

            if (Filiere::where('fil_lib', '=', $rowsValue['Filiere'])->first() == null) {
                $filiere = Filiere::create([
                    'fil_lib' => $rowsValue['Filiere'],
                ]);
            } else {
                $filiere = Filiere::where('fil_lib', '=', $rowsValue['Filiere'])->first();
            }

            Inscription::create([
                'date_insc' => date('Y-m-j'),
                'mont_insc' => $type->montant_ins,
                'mont_scol' => $type->montant_scol,
                'mont_bour' => $type->montant_bourse,
                'scol_verse' => 0,
                'niveau_etud' => $rowsValue['Niveau'],
                'cas_special' => false,
                'etudiant_id' => $etudiant->id,
                'filiere_id' => $filiere->id,
                'exercice_id' => 1,
                'antenne_id' => $antenne->id,
                'statut' => 'F1S',
            ]);
        });
        unlink($file);
        return back()->with('toast_success', 'Données chargées');
    }

    public function importerop()
    {
        return view('user.students.importerop');
    }

    public function postimporter(Request $request)
    {
        $file = $request->fichier->move(public_path(), $request->fichier->hashName());
        SimpleExcelReader::create($file)->getRows()->each(function (array $rowsValue) {
            $ordrepaiement = Ordrepaiement::firstOrCreate(
                ['num_ordre' => $rowsValue['N° Mandat/OP']],
                [
                    'objet' => $rowsValue['Objet de la dépense'],
                    'date_op' => date('Y-m-j'),
                    'user_id' => Auth::user()->id,
                    'bordereau_id' => 3,
                    'exercice_id' => 1,
                    'antenne_id' => 1,
                ],
            );
            $ordrepaiement->mont_ordre += $rowsValue['Montant'];
            $ordrepaiement->save();

            $nom = strstr($rowsValue['Nom bénéficiaires'], ' ', true);
            $prenoms = substr(strstr($rowsValue['Nom bénéficiaires'], ' '), 1);
            $etudiant = Etudiant::where('nom', '=', $nom)
                ->where('prenoms', '=', $prenoms)
                ->first();
            Detailop::create([
                'ordrepaiement_id' => $ordrepaiement->id,
                'etudiant_id' => $etudiant->id,
                'dop_benef' => 'Etudiants',
                'dop_mont' => $rowsValue['Montant'],
                'dop_bqe_code' => $rowsValue['Code banque'],
                'guichet' => $rowsValue['Code guichet'],
                'num_cpte' => $rowsValue['Numero de compte'],
                'rib' => $rowsValue['Clé RIB'],
            ]);
        });

        return back()->with('toast_success', 'Ordre de paiement importé');
    }
}
