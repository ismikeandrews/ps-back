<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbPassoAtividade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbPassoAtividade', function(Blueprint $table){
            $table->increments('codPassoAtividade');
            $table->integer('numeroPassoAtividade');
            $table->string('imagemPassoAtividade');
            $table->string('descricaoPassoAtividade');
            $table->integer('codAtividade')->unsigned();
            $table->timestamps();
        });

        Schema::table('tbPassoAtividade', function($table){
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
        Schema::table('tbPassoAtividade', function (Blueprint $table) {
            $table->dropForeign(['codAtividade']);
            $table->dropIfExists('tbPassoAtividade');
        });
    }
}
