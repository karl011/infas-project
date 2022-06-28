<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReglementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reglements', function (Blueprint $table) {
            $table->id();
            $table->date('reg_date');
            $table->string('reg_num');
            $table->integer('reg_mont');
            $table->string('reg_mrg_code', 50);
            $table->string('reg_numREG', 50);
            $table->integer('reg_retenu')->nullable();
            $table->string('reg_op_num', 50);
            $table->string('type_acteur', 50);
            $table->string('reg_stat_code', 5);
            $table->foreignId('antenne_id')->constrained()->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId('exercice_id')->constrained()->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate("cascade");
            $table->foreignId('etudiant_id')->constrained()->onDelete('cascade')->onUpdate("cascade")->nullable();
            $table->foreignId('vacataire_id')->constrained()->onDelete('cascade')->onUpdate("cascade")->nullable();
            $table->foreignId('fournisseur_id')->constrained()->onDelete('cascade')->onUpdate("cascade")->nullable();
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
        Schema::dropIfExists('reglements');
    }
}
