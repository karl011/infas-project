<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneReglementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_reglements', function (Blueprint $table) {
            $table->id();
            $table->string('lreg_num', 50);
            $table->text('lreg_lib', 200);
            $table->integer('lreg_mont');
            $table->integer('lreg_qte');
            $table->string('lreg_stat_code', 5);
            $table->foreignId('reglement_id')->constrained();// La clé étrangère issue de la table reglement
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
        Schema::dropIfExists('ligne_reglements');
    }
}
