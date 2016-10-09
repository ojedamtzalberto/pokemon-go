<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owned extends Model
{
    protected $table = 'owned_pokemon';

    public function pokemanz()
    {
    	return $this->belongsTo('App\Pokemon', 'pokemon_id');    	
    }
}
