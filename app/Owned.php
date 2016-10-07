<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owned extends Model
{
    protected $table = 'pokemons';

    public function pokemanz()
    {
    	return $this->hasOne('App\Pokemon');
    }
}
