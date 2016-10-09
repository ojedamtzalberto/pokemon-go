<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Pokemon;
use App\Tipo;
use App\Trainer;
use App\Owned;
use App\Caramelo;
use App\PokemonHelper;
use PDF;

class pokedexController extends Controller
{
    public function mPDF($id) {
        $pokemon = Pokemon::find($id);
        $vista=view('pdf', compact('pokemon'));
        $dompdf=\App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream();
    }

    public function inicio()
    {
    	$pokemons = Pokemon::paginate(24);
        $tipos = Tipo::orderBy('nombre')->get();

    	return view('pokedex', compact('pokemons','tipos'));
    }

    public function filtrar_tipo_pokedex($tipo_id)
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

    public function pdf($id)
    {
        $pokemon = Pokemon::find($id);
        $pdf = PDF::loadHTML(view('pf', compact('pokemon')));        
        return $pdf->stream();
    }

    public function login()
    {                    
        return view('login');
    }


    public function filtrar_tipo_pokemon($tipo_id)
    {
        /*
        $pokemons = DB::table('pokemons')
                        ->leftjoin('pokemon_tipo', 'pokemons.id', '=', 'pokemon_tipo.pokemon_id')
                        ->leftjoin('tipos' , 'tipos.id', '=', 'pokemon_tipo.tipo_id')
                        ->join('owned_pokemon', 'pokemons.id', '=', 'owned_pokemon.pokemon_id')
                        ->select('owned_pokemon.*')
                        ->distinct()
                        ->get();        
        */        
        $pokedex_tipo = Tipo::find($tipo_id)->pokemons;        
        $tipos = Tipo::orderBy('nombre')->get();
        $pokemons = collect([]);
        
        foreach($pokedex_tipo as $po)
        {
            if(count($po->ownedpoke) > 0) {
                foreach($po->ownedpoke as $op) {
                    $pokemons->prepend($op);
                }                
            }
        }

        return view('pokemons', compact('pokemons', 'tipos'));
    }

    public function login_success(Request $request)
    {   
        $helper = new PokemonHelper;
        //Borra toda la informacion de las tablas
        DB::table('users')->truncate();     
        DB::table('owned_pokemon')->truncate();        

        //Informacion de login
        $usuario = $request->input('email');
        $pwd = $request->input('pwd');

        //Cosos para ejecutar el script y guardar la info en un archivo json
        $python = '/usr/bin/python';
        //$python = 'turutawindowsera';
        $script = '/var/www/html/pokemon-go/public/scripts/demo.py';
        //$script = 'turutawindowsera';

        exec($python. ' '.$script.' -a "google" -u "'.$usuario.'" -p "'.$pwd.'"', $output, $ret_code);
        $file = getcwd().'/json/'.$output[0].'.json';
        $data = @json_decode(file_get_contents($file, true));

        dd($data);

        //Carga del json a la base de datos               
        foreach($data->pokemon as &$pok) {
            //Se formatea a 3 digitos el cp_multiplier para hacer la comparacion de getLevel mas facil
            $cp_mult_format = floor($pok->cp_multiplier * 1000) / 1000;
            $cp_mult_format = floatval(number_format($cp_mult_format, 3, '.', ''));

            $owned = new Owned;
            $owned->owned_id = $pok->pokemon_id;
            $owned->pokemon_id = $pok->id;
            $owned->cp = $pok->cp;
            $owned->cp_mult = $pok->cp_multiplier;            
            $owned->nivel = $helper->getLevel($cp_mult_format);
            $owned->ataque_individual = $pok->ataque_individual;
            $owned->defensa_individual = $pok->defensa_individual;
            $owned->stamina_individual = $pok->stamina_individual;
            $owned->save();
        }

        foreach($data->caramelos as &$c) {
            $caramelo = new Caramelo;
            $caramelo->id = $c->id;
            $caramelo->cantidad = $c->cantidad;
            $caramelo->save();
        }
        
        $trainer = new Trainer;
        $trainer->nombre = $data->trainer->nombre;
        $trainer->polvos = $data->trainer->polvos;
        $trainer->save();

        $pokemons = Owned::orderBy('pokemon_id')->get();
        $tipos = Tipo::orderBy('nombre')->get();

        unlink($file);
        return view('pokemons', compact('pokemons', 'tipos'));
    }

}

