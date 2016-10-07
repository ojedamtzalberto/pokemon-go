<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePokedex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('imagen');
            $table->smallInteger('ataque_base')->unsigned();
            $table->smallInteger('defensa_base')->unsigned();
            $table->smallInteger('stamina_base')->unsigned();
            $table->tinyInteger('caramelos_evolucion')->unsigned();
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
        Schema::drop('pokemons');
    }
}
