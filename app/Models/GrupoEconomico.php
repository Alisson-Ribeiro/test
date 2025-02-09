<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoEconomico extends Model
{
    use SoftDeletes; // Ativando Soft Deletes

    public function bandeiras(){
        return $this->hasMany(Bandeira::class);
    }

    protected $dates = ['deleted_at']; // Define a coluna deleted_at como campo de data
}
