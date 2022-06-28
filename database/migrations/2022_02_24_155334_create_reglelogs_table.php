<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReglelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglelogs', function (Blueprint $table) {
            $table->id();
            $table->date('relog_date');
            $table->string('relog_stat_code', 50);
            $table->foreignId('fonction_id')->constrained();
            $table->foreignId('ligne_reglement_id')->constrained();//La clé étrangère issue de la table LigneReglement
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
        Schema::dropIfExists('reglelogs');
    }
}
