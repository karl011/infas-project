<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneRecouvrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_recouvrements', function (Blueprint $table) {
            $table->id();
            $table->string('lrecouv_num',50);
            $table->text('lrecouv_lib',200);
            $table->integer('lrecouv_mont');
            $table->integer('lrecouv_qte');
            $table->string('lrecouv_stat_code',5);
            $table->foreignId('recouvrement_id')->constrained();//La clé étrangère de la table recouvrement
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
        Schema::dropIfExists('ligne_recouvrements');
    }
}
