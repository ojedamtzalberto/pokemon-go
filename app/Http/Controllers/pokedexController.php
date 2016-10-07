<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Pokemon;
use App\Tipo;
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
        $usuario = $request->input('email');
        $pwd = $request->input('pwd');
        exec('/usr/bin/python /var/www/html/pokemon-go/public/scripts/demo.py -a "google" -u "'.$usuario.'" -p "'.$pwd.'"', $output, $ret_code);
        $file = getcwd().'/json/'.$output[0].'.json';
        $data = json_decode(file_get_contents($file));

        echo ($file);

        foreach($data->{'pokemon'} as $pokemon) {            
            echo ($pokemon->pokemon_id).'<br>';
            echo ($pokemon->cp).'<br>';
            echo ($pokemon->individual_attack).'<br>';
            echo ($pokemon->individual_defense).'<br>';
            echo ($pokemon->individual_stamina).'<br>';
            echo ($pokemon->cp_multiplier).'<br>';
        }

        unlink($file);
        return $ret_code;
    }

    public function owned()
    {
        $pokzemon = Pokemon::find($id);
        $pdf = PDF::loadHTML(view('pf', compact('pokemon')));        
        return $pdf->stream();
    }


}

