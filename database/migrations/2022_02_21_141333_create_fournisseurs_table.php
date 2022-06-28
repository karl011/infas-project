<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('code_four', 50);//generer automatiquement
            $table->string('nom_four', 200);
            $table->string('adresse_four', 200);
            $table->string('rib_four', 15);
            // $table->string('compte_four', 15);
            $table->string('tel_four', 50);
            $table->foreignId('banque_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('antenne_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('fournisseurs');
    }
}
