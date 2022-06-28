<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bourses', function (Blueprint $table) {
            $table->id();
            // $table->string('code',50);
            // $table->integer('montant');
            // $table->foreignId('etudiant_id')->constrained();
            $table->string('libelle',200);
            $table->string('statut',5);
            $table->foreignId('antenne_id')->constrained();
            $table->foreignId('ordrepaiement_id')->constrained();
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
        Schema::dropIfExists('bourses');
    }
}
