<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCurtidaPublicacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbCurtidaPublicacao', function(Blueprint $table){
            $table->increments('codCurtidaPublicacao');
            $table->integer('codUsuario')->unsigned();
            $table->integer('codPublicacao')->unsigned();
        });

        Schema::table('tbCurtidaPublicacao', function($table){
            $table->foreign('codUsuario')->references('codUsuario')->on('tbUsuario');
            $table->foreign('codPublicacao')->references('codPublicacao')->on('tbPublicacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbCurtidaPublicacao', function (Blueprint $table) {
            $table->dropForeign(['codPublicacao', 'codUsuario']);
            $table->dropIfExists('tbCurtidaPublicacao');
        });
    }
}
