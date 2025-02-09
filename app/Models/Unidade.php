<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidade extends Model
{
    use SoftDeletes; // Ativando Soft Deletes

    public function Colaborador(){
        return $this->hasMany(Colaborador::class);
    }

    public function Bandeira(){
        return $this->belongsTo(Bandeira::class);
    }

    protected $dates = ['deleted_at']; // Define a coluna deleted_at como campo de data
}
