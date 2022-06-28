<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdrepaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordrepaiements', function (Blueprint $table) {
            $table->id();
            $table->string('num_ordre', 20)->nullable();
            $table->date('date_op')->nullable();
            $table->integer('mont_ordre')->nullable();
            $table->string('numero_cpte', 50)->nullable();
            $table->string('numero_liq', 50)->nullable();
            $table->text('objet', 400)->nullable();
            $table->string('mrg_code', 20)->nullable();
            $table->string('cpte_ordre', 50)->nullable();
            $table->string('statut', 3)->nullable();
            $table->date('date_pec')->nullable();
            $table->date('date_rej')->nullable();
            $table->date('date_emission')->nullable();
            $table->date('date_val_sgc')->nullable();
            $table->date('date_val_cds')->nullable();
            $table->date('date_saisie')->nullable();
            $table->date('date_ordre')->nullable();
            $table->integer('mont_net_ordre')->nullable();
            $table->string('motif_diff', 300)->nullable();
            $table->string('motif_rej', 300)->nullable();
            $table->string('ordre_bord_numR', 20)->nullable();
            $table->string('ordre_num_annule', 20)->nullable();
            $table->string('plc_gst',30)->nullable();
            $table->string('cpte_pec', 50)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('fournisseur_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('exercice_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('bordereau_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->foreignId('banque_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
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
        Schema::dropIfExists('ordrepaiements');
    }
}
