<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtubanquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etubanques', function (Blueprint $table) {
            $table->id();
            $table->string('code_banque');
            $table->string('numero_cpte_banque');
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('banque_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('etubanques');
    }
}
