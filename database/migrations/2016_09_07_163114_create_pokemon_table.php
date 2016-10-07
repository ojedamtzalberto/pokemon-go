<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owned_pokemons', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('pokemon_id')->unsigned();
            $table->integer('usuario_id')->unsigned();
            $table->string('apodo');
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 3, 2);            
            $table->smallInteger('cp')->unsigned();
            $table->integer('polvos');            
            $table->tinyInteger('ataque_individual')->unsigned();
            $table->tinyInteger('defensa_individual')->unsigned();
            $table->tinyInteger('stamina_individual')->unsigned();
            $table->tinyInteger('caramelos_nivel')->unsigned();
            $table->decimal('cp_mult', 10,9);
            $table->integer('movimiento_rapido_id')->unsigned();
            $table->integer('movimiento_cargado_id')->unsigned();
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
        Schema::drop('owned_pokemons');
    }
}
