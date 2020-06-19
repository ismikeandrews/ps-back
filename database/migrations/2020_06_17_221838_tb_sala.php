<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbSala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbSala', function(Blueprint $table){
            $table->increments('codSala');
            $table->string('nomeSala', 50);
            $table->integer('privacidadeSala');
            $table->integer('qtdMaxParticipantes');
            $table->boolean('isAberta');
            $table->integer('codCriador')->unsigned();
            $table->integer('codAtividade')->unsigned();
            $table->timestamps();
        });

        Schema::table('tbSala', function($table){
            $table->foreign('codCriador')->references('codUsuario')->on('tbUsuario');
            $table->foreign('codAtividade')->references('codAtividade')->on('tbAtividade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbSala', function (Blueprint $table) {
            $table->dropForeign(['codUsuario', 'codAtividade']);
            $table->dropIfExists('tbSala');
        });
    }
}
