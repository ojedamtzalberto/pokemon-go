<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMovimientoRapido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos_rapidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->decimal('dps', 3, 1);
            $table->integer('tipo_id')->unsigned();
        });                        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movimientos_rapidos');
    }
}
