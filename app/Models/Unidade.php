<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    public function Colaborador(){
        return $this->hasMany(Colaborador::class);
    }

    public function Bandeira(){
        return $this->belongsTo(Bandeira::class);
    }
}
