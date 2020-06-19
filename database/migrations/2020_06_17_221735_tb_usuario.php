<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbUsuario', function(Blueprint $table){
            $table->increments('codUsuario');
            $table->string('nomeUsuario', 100);
            $table->string('telefoneUsuario', 11);
            $table->string('imagemUsuario');
            $table->string('codSMSUsuario', 50);
            $table->integer('dataUsoSMSUsuario');
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
        Schema::dropIfExists('tbUsuario');
    }
}
