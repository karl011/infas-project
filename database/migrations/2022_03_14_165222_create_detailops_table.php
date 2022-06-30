<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailops', function (Blueprint $table) {
            $table->id();
            $table->string('dop_benef', 50)->nullable();
            $table->integer('dop_mont')->nullable();
            $table->text('dop_objet', 400)->nullable();
            $table->string('dop_bqe_code', 20)->nullable();
            $table->string('num_cpte', 50)->nullable();
            $table->string('guichet', 10)->nullable();
            $table->string('rib', 10)->nullable();
            $table->date('date_reg')->nullable();
            $table->integer('mont_net')->nullable();
            $table->text('dop_motif_diff', 300)->nullable();
            $table->text('dop_motif_rej', 300)->nullable();
            $table->string('dop_statut', 3)->nullable();
            $table->foreignId('ordrepaiement_id')->constrained()->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('antenne_id')->constrained()->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('etudiant_id')->constrained()->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vacataire_id')->constrained()->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fournisseur_id')->constrained()->nullable()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detailops');
    }
}
