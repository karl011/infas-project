<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBordereausTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bordereaus', function (Blueprint $table) {
            $table->id();
            $table->string('num_bord', 20);// numéro à générer automatiquement
            $table->string('type_bord', 100);
            $table->string('direction_bord', 100);
            $table->date('date_trans_bord');
            $table->string('categorie_bord')->nullable();
            $table->integer('montant_bord');
            $table->string('statut_bord', 3);
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('bordereaus');
    }
}
