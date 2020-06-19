<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbAtividade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbAtividade', function(Blueprint $table){
            $table->increments('codAtividade');
            $table->string('nomeAtividade', 100);
            $table->string('imagemAtividade');
            $table->integer('qtdPassoAtividade');
            $table->boolean('isPublica');
            $table->boolean('isPrivada');
            $table->integer('codCategoria')->unsigned();
            $table->integer('codAdmin')->unsigned();
            $table->timestamps();
        });

        Schema::table('tbAtividade', function($table){
            $table->foreign('codAdmin')->references('codAdmin')->on('tbAdmin');
            $table->foreign('codCategoria')->references('codCategoria')->on('tbCategoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbCategoria', function (Blueprint $table) {
            $table->dropForeign(['codAdmin', 'codCategoria']);
            $table->dropIfExists('tbAtividade');
        });
    }
}
