<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuarioCaramelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caramelo_usuario', function (Blueprint $table) {
            $table->integer('usuario_id')->unsigned();
            $table->integer('caramelo_id')->unsigned();
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
        Schema::drop('caramelo_usuario');
    }
}
