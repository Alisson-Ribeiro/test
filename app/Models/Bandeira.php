<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bandeira extends Model
{
    use SoftDeletes; // Ativando Soft Deletes

    public function GrupoEconomico(){
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function Unidade(){
        return $this->hasMany(Unidade::class);
    }

    protected $dates = ['deleted_at']; // Define a coluna deleted_at como campo de data
}
