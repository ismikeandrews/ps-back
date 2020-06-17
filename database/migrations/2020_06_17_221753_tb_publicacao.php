<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbPublicacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbPublicacao', function(Blueprint $table){
            $table->increments('codPublicacao');
            $table->string('legendaPublicacao', 250);
            $table->string('imagemPublicacao');
            $table->integer('codUsuario')->unsigned();
            $table->integer('codAtividade')->unsigned();
        });

        Schema::table('tbPublicacao', function($table){
            $table->foreign('codUsuario')->references('codUsuario')->on('tbUsuario');
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
        Schema::table('tbPublicacao', function (Blueprint $table) {
            $table->dropForeign(['codAtividade', 'codUsuario']);
            $table->dropIfExists('tbPublicacao');
        });
    }
}
