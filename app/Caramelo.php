<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caramelo extends Model
{
    public function pokemon()
    {
    	return $this->hasMany('App\Owned');
    }
}
