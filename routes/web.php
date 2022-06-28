<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\BourseController;
use App\Http\Controllers\User\TypeController;
use App\Http\Controllers\ImportationController;
use App\Http\Controllers\User\BanqueController;
use App\Http\Controllers\User\RecetteController;
use App\Http\Controllers\User\RecologController;
use App\Http\Controllers\Admin\AntenneController;
use App\Http\Controllers\Admin\FiliereController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\User\BorderauController;
use App\Http\Controllers\User\DetailopController;
use App\Http\Controllers\User\EtudiantController;
use App\Http\Controllers\User\ReglelogController;
use App\Http\Controllers\User\VacationController;
use App\Http\Controllers\Admin\ExerciceController;
use App\Http\Controllers\Admin\FonctionController;
use App\Http\Controllers\User\EtubanqueController;
use App\Http\Controllers\User\ReglementController;
use App\Http\Controllers\User\ScolariteController;
use App\Http\Controllers\User\VacataireController;
use App\Http\Controllers\Admin\FormationController;
use App\Http\Controllers\Admin\OperateurController;
use App\Http\Controllers\User\FournisseurController;
use App\Http\Controllers\User\InscriptionController;
use App\Http\Controllers\User\StatistiqueController;
use App\Http\Controllers\Admin\AssignationController;
use App\Http\Controllers\SimpleExcelController;
use App\Http\Controllers\User\RecouvrementController;
use App\Http\Controllers\User\DetailrecetteController;
use App\Http\Controllers\User\OrdrepaiementController;
use App\Http\Controllers\User\LigneReglementController;
use App\Http\Controllers\User\LigneRecouvrementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('operateurs', OperateurController::class);
    Route::resource('fonctions', FonctionController::class);
    Route::resource('assignations', AssignationController::class);
    Route::resource('exercices', ExerciceController::class);
    Route::resource('antennes', AntenneController::class); //interpretation de la ligne de retour du controleur de l'antenne
    Route::resource('formations', FormationController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('filieres', FiliereController::class);
});

Route::middleware(['auth'])->prefix('user')->group(function () {

    Route::get('inscriptions/validation', [InscriptionController::class, 'formValidation'])->name('inscriptions.validation'); //La validation
    Route::post('inscriptions/validation', [InscriptionController::class, 'updateValidation'])->name('inscriptions.valider'); //mise a jour de la validation
    Route::get('inscriptions/situation', [InscriptionController::class, 'formSituation'])->name('inscriptions.situation'); //situation
    Route::post('inscriptions/search', [InscriptionController::class, 'searchSituation'])->name('inscriptions.search'); //recherche
    Route::post('inscriptions/casSpecial', [InscriptionController::class, 'casSpecial'])->name('inscriptions.permission'); //recherche

    Route::get('bourses/validation', [BourseController::class, 'formValidation'])->name('bourses.validation');
    Route::post('bourses/validation', [BourseController::class, 'updateValidation'])->name('bourses.valider');
    Route::get('bourses/situation', [BourseController::class, 'formSituation'])->name('bourses.situation');
    Route::post('bourses/search', [BourseController::class, 'searchSituation'])->name('bourses.search');

    Route::get('vacations/validation', [VacationController::class, 'formValidation'])->name('vacations.validation');
    Route::post('vacations/validation', [VacationController::class, 'updateValidation'])->name('vacations.valider');
    Route::get('vacations/situation', [VacationController::class, 'formSituation'])->name('vacations.situation');
    Route::post('vacations/situation', [VacationController::class, 'searchSituation'])->name('vacations.search');

    Route::get('recouvrements/validation', [RecouvrementController::class, 'formValidation'])->name('recouvrements.validation');
    Route::post('recouvrements/validation', [RecouvrementController::class, 'updateValidation'])->name('recouvrements.valider');
    Route::get('recouvrements/situation', [RecouvrementController::class, 'formSituation'])->name('recouvrements.situation');
    Route::post('recouvrements/situation', [RecouvrementController::class, 'searchSituation'])->name('recouvrements.search');

    Route::get('reglements/validation', [ReglementController::class, 'formValidation'])->name('reglements.validation');
    Route::post('reglements/validation', [ReglementController::class, 'updateValidation'])->name('reglements.valider');
    Route::get('reglements/situation', [ReglementController::class, 'formSituation'])->name('reglements.situation');
    Route::post('reglements/situation', [ReglementController::class, 'searchSituation'])->name('reglements.search');

    Route::get('scolarites/validation', [ScolariteController::class, 'formValidation'])->name('scolarites.validation');
    Route::post('scolarites/validation', [ScolariteController::class, 'updateValidation'])->name('scolarites.valider');
    Route::get('scolarites/situation', [ScolariteController::class, 'formSituation'])->name('scolarites.situation');
    Route::post('scolarites/situation', [ScolariteController::class, 'searchSituation'])->name('scolarites.search');

    Route::get('recettes/validation', [RecetteController::class, 'formValidation'])->name('recettes.validation');
    Route::post('recettes/validation', [RecetteController::class, 'updateValidation'])->name('recettes.valider');
    Route::get('recettes/situation', [RecetteController::class, 'formSituation'])->name('recettes.situation');
    Route::post('recettes/situation', [RecetteController::class, 'searchSituation'])->name('recettes.search');

    Route::get('paiements/validation', [OrdrepaiementController::class, 'formValidation'])->name('paiements.validation');
    Route::post('paiements/validation', [OrdrepaiementController::class, 'updateValidation'])->name('paiements.valider');
    Route::get('paiements/situation', [OrdrepaiementController::class, 'formSituation'])->name('paiements.situation');
    Route::post('paiements/situation', [OrdrepaiementController::class, 'searchSituation'])->name('paiements.search');

    Route::get('fournissurs/validation', [FournisseurController::class, 'formValidation'])->name('fournissurs.validation');
    Route::post('fournissurs/validation', [FournisseurController::class, 'updateValidation'])->name('fournissurs.valider');
    Route::get('fournissurs/situation', [FournisseurController::class, 'formSituation'])->name('fournissurs.situation');
    Route::post('fournissurs/situation', [FournisseurController::class, 'searchSituation'])->name('fournissurs.search');

    Route::get('bordereaux/validation', [BorderauController::class, 'formValidation'])->name('bordereaux.validation');
    Route::post('bordereaux/validation', [BorderauController::class, 'updateValidation'])->name('bordereaux.valider');
    Route::get('bordereaux/situation', [BorderauController::class, 'formSituation'])->name('bordereaux.situation');
    Route::post('bordereaux/situation', [BorderauController::class, 'searchSituation'])->name('bordereaux.search');

    Route::get('stats/consultation', [StatistiqueController::class, 'consulte'])->name('stats.consultation');
    Route::get('stats/statut', [InscriptionController::class, 'statut'])->name('stats.statut');
    Route::get('paiements/fiche', [OrdrepaiementController::class, 'getPaiement'])->name('paiements.getPaiement');
    Route::get('paiements-pdf', [OrdrepaiementController::class, 'filePDF'])->name('paiements.filePDF');
    Route::get('recettes/fiche', [RecetteController::class, 'getPaiement'])->name('recettes.getPaiement');
    Route::get('recettes-pdf', [RecetteController::class, 'filePDF'])->name('recettes.filePDF');
    Route::get('recouvrements/fiche', [RecouvrementController::class, 'getPaiement'])->name('recouvrements.getPaiement');
    Route::get('recouvrements-pdf', [RecouvrementController::class, 'filePDF'])->name('recouvrements.filePDF');
    Route::get('reglements/fiche', [ReglementController::class, 'getPaiement'])->name('reglements.getPaiement');
    Route::get('reglements-pdf', [ReglementController::class, 'filePDF'])->name('reglements.filePDF');

    Route::resource('students', ImportationController::class);
    Route::post("simple-excel/export", [SimpleExcelController::class, 'export'])->name('excel.export');
    Route::post("simple-excel/exporti", [SimpleExcelController::class, 'inscitexport'])->name('excel.exporti');
    Route::get("etudiants", [EtudiantController::class, 'payer'])->name('scolarites.payer');


    Route::resource('etudiants', EtudiantController::class);
    Route::resource('inscriptions', InscriptionController::class);
    Route::resource('vacataires', VacataireController::class);
    Route::resource('bourses', BourseController::class);
    Route::resource('scolarites', ScolariteController::class);
    Route::resource('vacations', VacationController::class);
    Route::resource('recouvrements', RecouvrementController::class);
    Route::resource('ligneRecouvrement', LigneRecouvrementController::class);
    Route::resource('recologs', RecologController::class);
    Route::resource('reglements', ReglementController::class);
    Route::resource('ligneReglements', LigneReglementController::class);
    Route::resource('reglelogs', ReglelogController::class);
    Route::resource('stats', StatistiqueController::class);
    Route::resource('recettes', RecetteController::class);
    Route::resource('paiements', OrdrepaiementController::class);
    Route::resource('fournisseurs', FournisseurController::class);
    Route::resource('bordereaux', BorderauController::class);
    Route::resource('detailops', DetailopController::class);
    Route::resource('detailrecettes', DetailrecetteController::class);
    Route::resource('banques', BanqueController::class);
    Route::resource('types', TypeController::class);
    Route::resource('etubanques', EtubanqueController::class);
});
