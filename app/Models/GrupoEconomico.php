<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoEconomico extends Model
{
    public function bandeiras(){
        return $this->hasMany(Bandeira::class);
    }

}
