<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    public function Unidade(){
        return $this->belongsTo(Unidade::class);
    }
}
