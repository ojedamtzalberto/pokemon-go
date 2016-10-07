<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCaramelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caramelos', function (Blueprint $table) {
            $table->integer('id')->unsigned();
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
        Schema::drop('caramelos');
    }
}
