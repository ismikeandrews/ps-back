<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbCategoria', function(Blueprint $table){
            $table->increments('codCategoria');
            $table->string('nomeCategoria', 50);
            $table->string('imagemCategoria');
            $table->integer('codAdmin')->unsigned();
        });

        Schema::table('tbCategoria', function($table){
            $table->foreign('codAdmin')->references('codAdmin')->on('tbAdmin');
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
            $table->dropForeign(['codAdmin']);
            $table->dropIfExists('tbCategoria');
        });
    }
}
