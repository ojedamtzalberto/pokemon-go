<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owned extends Model
{
    protected $table = 'owned_pokemon';
    protected $primaryKey = 'owned_id';
    protected $fillable = ['owned_id', 'pokemon_id', 'usuario_id', 'apodo', 'peso', 'altura', 'cp', 'ataque_individual', 'defensa_individual', 'stamina_individual', 'cp_mult', 'movimiento_rapido_id', 'movimiento_cargado_id', 'updated_at', 'created_at', 'nivel'];

    public function pokemanz()
    {
    	return $this->belongsTo('App\Pokemon', 'pokemon_id');    	
    }

    public function caramelos_modelo()
    {
    	return $this->belongsTo('App\Caramelo', 'pokemon_family');
    }
}
