<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecouvrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recouvrements', function (Blueprint $table) {
            $table->id();
            $table->date('recouv_date', 50);
            $table->string('recouv_num', 50);
            $table->integer('recouv_mont');
            $table->string('recouv_mrg_code', 50);
            $table->string('recouv_numBCV', 50);
            $table->string('recouv_op_num', 50);
            $table->string('recouv_stat_code', 5);
            $table->string('recouv_fourn_code', 50)->nullable();
            $table->string('recouv_etex_mat', 50)->nullable();
            $table->string('recouv_vacex_mat', 50)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('exercice_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('antenne_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            // $table->string('recouv_num_bord_vert',50)->nullable();
            // $table->string('recouv_cpb_code',50)->nullable();
            // $table->foreignId('inscription_id')->constrained();//clé étrangère de la table inscription
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
        Schema::dropIfExists('recouvrements');
    }
}
