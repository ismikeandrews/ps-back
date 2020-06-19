<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbParticipanteSala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbParticipanteSala', function(Blueprint $table){
            $table->increments('codParticipanteSala');
            $table->integer('codParticipante')->unsigned();
            $table->integer('codSala')->unsigned();
        });

        Schema::table('tbParticipanteSala', function($table){
            $table->foreign('codParticipante')->references('codUsuario')->on('tbUsuario');
            $table->foreign('codSala')->references('codSala')->on('tbSala');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbParticipanteSala', function (Blueprint $table) {
            $table->dropForeign(['codParticipante', 'codSala']);
            $table->dropIfExists('tbParticipanteSala');
        });
    }
}
