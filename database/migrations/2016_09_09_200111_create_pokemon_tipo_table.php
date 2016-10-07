<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_tipo', function (Blueprint $table) {
            $table->integer('pokemon_id')->unsigned();
            $table->integer('tipo_id')->unsigned();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');             
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pokemon_tipo');
    }
}
