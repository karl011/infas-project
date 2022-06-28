<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScolaritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scolarites', function (Blueprint $table) {
            $table->id();
            $table->date('date_scol');
            $table->integer('montant_vers');
            $table->integer('montant_scol');
            $table->integer('montant_rest')->nullable();
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('exercice_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('antenne_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('statut_scol');
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
        Schema::dropIfExists('scolarites');
    }
}
