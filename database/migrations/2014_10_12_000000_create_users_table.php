<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('oper_code',50);
            $table->string('oper_nom',200);
            $table->string('oper_login',50);
            $table->string('oper_pwd');
            $table->string('oper_sexe',1)->nullable();
            $table->string('oper_statut',5);
            $table->string('oper_email',50)->unique();
            $table->foreignId('antenne_id')->constrained();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
