<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Pokemon;
use App\Tipo;

class pokedexController extends Controller
{
    public function inicio()
    {
    	$pokemons = Pokemon::paginate(24);
        $tipos = Tipo::orderBy('nombre')->get();

    	return view('pokedex', compact('pokemons','tipos'));
    }

    public function filtrar_tipo($tipo_id)
    {
    	$pokemons = Tipo::find($tipo_id)->pokemons()->paginate(24);
        $tipos = Tipo::orderBy('nombre')->get();

    	return view('pokedex',compact('pokemons','tipos'));
    }

    public function busca_pokemon(Request $request)
    {
        $pokemons = Pokemon::where('nombre',$request->pokemon)->paginate(10);
        $tipos = Tipo::orderBy('nombre')->get();

        return view('pokedex',compact('pokemons','tipos'));
    }
}