<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Pokemon;
use App\Tipo;
use App\Trainer;
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

    public function login_success(Request $request)
    {   
        //Borra toda la informacion de las tablas
        DB::table('users')->truncate();     
        DB::table('owned_pokemons')->truncate();

        $usuario = $request->input('email');
        $pwd = $request->input('pwd');

        //Cosos para ejecutar el script y guardar la info
        exec('/usr/bin/python /var/www/html/pokemon-go/public/scripts/demo.py -a "google" -u "'.$usuario.'" -p "'.$pwd.'"', $output, $ret_code);
        $file = getcwd().'/json/'.$output[0].'.json';
        $data = json_decode(file_get_contents($file));        

        //Aqui se agrega informacion de la base de datos que no captura el script de python
        foreach($data->pokemon as &$pok) {
            $pokedex_pokemon = Pokemon::find($pok->pokemon_id);
            $pok->nombre = $pokedex_pokemon->nombre;
            $pok->tipos = $pokedex_pokemon->tipos;
            $pok->ataque_base = $pokedex_pokemon->ataque_base;            
            $pok->defensa_base = $pokedex_pokemon->defensa_base;            
            $pok->stamina_base = $pokedex_pokemon->stamina_base;
        }


        
        $trainer = new Trainer;
        $trainer->usuario = $data->trainer->nombre;
        $trainer->save();
        

        unlink($file);
        return view('pokemons', compact('data'));
    }

    public function owned()
    {
        $pokemon = Owned::all();
        return view('actualpokemon',compact('pokemon'));
    }

    public function powerup($id)
    {
        $pokemon = Owned::find($id);
        return view('actualpokemon',compact('pokemon'));
        if ($a > $b) {
            echo "a is bigger than b";
            $b = $a;
        }

        $i=0;
        switch ($i) {
            case 0:
                echo "i=0";
                break;
            case 1:
                echo "i=1";
                break;
            case 2:
                echo "i=2";
                break;
        }

    }


}

