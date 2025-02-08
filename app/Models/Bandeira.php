<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bandeira extends Model
{
    public function GrupoEconomico(){
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function Unidade(){
        return $this->hasMany(Unidade::class);
    }

}
