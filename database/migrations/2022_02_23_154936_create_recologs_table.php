<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecologsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recologs', function (Blueprint $table) {
            $table->id();
            $table->date('reco_date');
            $table->string('reco_stat_code',50);
            $table->foreignId('fonction_id')->constrained();
            $table->foreignId('ligne_recouvrement_id')->constrained();//La clé étrangère issue de la table ligneRecouvrement
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
        Schema::dropIfExists('recologs');
    }
}