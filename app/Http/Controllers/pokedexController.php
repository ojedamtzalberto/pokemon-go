<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use DB;
use App\Pokemon;
use App\Tipo;
use App\Trainer;
use App\Owned;
use App\Caramelo;
use App\PokemonTipo;
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

    public function login()
    {                    
        return view('login');
    }

    public function logout()
    {
        DB::table('users')->truncate();     
        DB::table('owned_pokemon')->truncate();

        return Redirect::route('login');
    }

    public function ownedPDF($id) {
        $pokemon = Owned::find($id);
        $vista=view('pdf_owned', compact('pokemon'));
        $dompdf=\App::make('dompdf.wrapper');
        $dompdf->loadHTML($vista);
        return $dompdf->stream();
    }

    public function eliminarTipo(Request $request)
    {
        $tipo_id = $request->input('tipo_id');
        $pokemon_id = $request->input('pokemon_id');

        DB::table('pokemon_tipo')
                    ->where('pokemon_tipo.tipo_id', '=', $tipo_id)
                    ->where('pokemon_tipo.pokemon_id', '=', $pokemon_id)
                    ->delete();          

        return Redirect::route('lista');
    }

    public function poder(Request $request)
    {        
        $helper = new PokemonHelper;
        $owned_id = $request->input('owned_id');
        $pokemon_id = $request->input('pokemon_id');
        $pokemon_family = $request->input('pokemon_family');
        $pokemon = Owned::find($owned_id);
        $trainer = Trainer::first();
        $caramelos = Caramelo::find($pokemon_family);
        
        if($caramelos->cantidad < $pokemon->caramelos) {
            return Redirect::route('lista')->with('error', 'caramelos')
                                   ->with('id', $owned_id);
        }
        elseif($trainer->polvos < $pokemon->polvos) {
            return Redirect::route('lista')->with('error', 'caramelos')
                                   ->with('id', $owned_id);
        }

        //Se quitan caramelos y polvos
        $trainer->polvos = $trainer->polvos - $pokemon->polvos;
        $caramelos->cantidad = $caramelos->cantidad - $pokemon->caramelos;
        $trainer->save();
        $caramelos->save();

        $cp_mult_format = floor($pokemon->cp_mult * 1000) / 1000;
        $cp_mult_format = floatval(number_format($cp_mult_format, 3, '.', ''));

        $nuevo_cp_mult = $helper->getLevel($cp_mult_format)[1];        

        //Calcula ataque, defensa, stamina para obtener CP
        $atq = ($pokemon->ataque_individual + $pokemon->pokemanz->ataque_base);
        $def = ($pokemon->defensa_individual + $pokemon->pokemanz->defensa_base);
        $sta = ($pokemon->stamina_individual + $pokemon->pokemanz->stamina_base);
        // CP = (Attack * Defense^0.5 * Stamina^0.5 * CP_Multiplier^2) / 10
        $cp = ($atq * pow($def, 0.5) * pow($sta, 0.5) * pow($nuevo_cp_mult, 2)) / 10;                
        $pokemon->cp = (int)$cp;
        $pokemon->cp_mult = $nuevo_cp_mult;
        $pokemon->nivel = $pokemon->nivel + 0.5;
        $pokemon->polvos = $helper->getPolvos($pokemon->nivel);
        $pokemon->caramelos = $helper->getCaramelos($pokemon->nivel);
        $pokemon->save();        

        return Redirect::back()->with('id', $owned_id);
    }

    public function filtrar_tipo_pokemon($tipo_id)
    {     
        $trainer = Trainer::first();
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

        return view('pokemons', compact('pokemons', 'tipos', 'trainer'));
    }

    public function login_success(Request $request)
    {   
        $helper = new PokemonHelper;
        //Borra toda la informacion de las tablas
        DB::table('users')->truncate();     
        DB::table('owned_pokemon')->truncate();      
        DB::table('caramelos')->truncate(); 

        //Informacion de login
        $usuario = $request->input('email');
        $pwd = $request->input('pwd');

        //Cosos para ejecutar el script y guardar la info en un archivo json
        $python = '/usr/bin/python';
        //$python = 'turutawindowsera';
        $script = '/var/www/html/pokemon-go/public/scripts/demo.py';
        //$script = 'turutawindowsera';

        exec($python. ' '.$script.' -a "google" -u "'.$usuario.'" -p "'.$pwd.'"', $output, $ret_code);
        $file = getcwd().'/'.$output[0].'.json';
        $data = @json_decode(file_get_contents($file, true));

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
            $nivel = $helper->getLevel($cp_mult_format);
            $owned->nivel = $nivel[0];            
            $owned->polvos = $helper->getPolvos($nivel[0]);
            $owned->caramelos = $helper->getCaramelos($nivel[0]);
            $owned->ataque_individual = $pok->ataque_individual;
            $owned->defensa_individual = $pok->defensa_individual;
            $owned->stamina_individual = $pok->stamina_individual;
            $owned->pokemon_family = $helper->pokemonFamily($pok->id);
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

        unlink($file);

        return redirect()->action('pokedexController@owned_pokemon');
    }

    public function owned_pokemon()
    {
        $pokemons = Owned::orderBy('pokemon_id')->get();

        if($pokemons->isEmpty()) {
            return Redirect::route('login');
        }

        $tipos = Tipo::orderBy('nombre')->get();        
        $trainer = Trainer::first();
        return view('pokemons', compact('pokemons', 'tipos', 'trainer'));
    }



}

