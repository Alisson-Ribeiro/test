<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colaborador extends Model
{
    use SoftDeletes; // Ativando Soft Deletes

    public function Unidade(){
        return $this->belongsTo(Unidade::class);
    }

    protected $dates = ['deleted_at']; // Define a coluna deleted_at como campo de data
}
