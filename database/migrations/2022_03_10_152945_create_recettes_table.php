<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
            $table->string('titre_num', 20)->nullable();
            $table->integer('mont_titre')->nullable();
            $table->date('date_emission')->nullable();
            $table->string('type_titre', 50)->nullable();
            $table->text('objet', 400)->nullable();
            $table->string('lire_code', 50)->nullable();
            $table->string('num_declar', 20)->nullable();
            $table->date('date_saisie')->nullable();
            $table->date('date_pec')->nullable();
            $table->date('date_diff')->nullable();
            $table->date('date_rej')->nullable();
            $table->string('bord_numR', 20)->nullable(); //clé primaire de (rejet) bordereau
            // $table->string('titre_fonc_code_pec', 50)->nullable();
            // $table->string('titre_fonc_code_rejet', 50)->nullable();
            $table->string('titre_num_annule', 20)->nullable();
            $table->string('statut', 3)->nullable();
            $table->string('gest_code')->nullable();
            $table->text('motif_diff', 200)->nullable();
            $table->text('motif_rej', 200)->nullable();
            $table->string('cpte_code', 50)->nullable();
            $table->foreignId('fournisseur_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('exercice_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable(); //a revoir 
            $table->foreignId('bordereau_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('antenne_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recettes');
    }
}
