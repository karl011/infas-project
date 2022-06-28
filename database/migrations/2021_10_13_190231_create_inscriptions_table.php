<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->date('date_insc');
            $table->integer('mont_insc');
            $table->integer('mont_scol');
            $table->integer('mont_bour');
            $table->integer('scol_verse')->default(0);
            $table->string('niveau_etud');
            $table->boolean('cas_special')->default(0);
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('filiere_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('exercice_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('antenne_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('statut', 5);
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
        Schema::dropIfExists('inscriptions');
    }
}
