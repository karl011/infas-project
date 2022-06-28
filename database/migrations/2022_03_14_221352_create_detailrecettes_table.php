<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailrecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailrecettes', function (Blueprint $table) {
            $table->id();
            $table->string('drec_num', 20);
            $table->string('drec_benef', 50);
            $table->integer('drec_mont');
            $table->text('drec_objet', 400);
            $table->string('drec_bqe', 20);
            $table->string('drec_num_cpte', 50);
            // $table->string('drec_type', 50);
            $table->date('date_reg_drec')->nullable();
            $table->integer('mont_net_drec')->nullable();
            $table->text('drec_motif_diff', 300)->nullable();
            $table->text('drec_motif_rej', 300)->nullable();
            $table->string('drec_statut', 3);
            $table->foreignId('recette_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('antenne_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detailrecettes');
    }
}
