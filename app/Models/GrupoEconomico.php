<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrupoEconomico extends Model
{
    use SoftDeletes, HasFactory; // Ativando Soft Deletes           // HasFactory for fake data and tests

    protected $fillable = ['nome'];

    public function bandeiras(){
        return $this->hasMany(Bandeira::class);
    }

    protected $dates = ['deleted_at']; // Define a coluna deleted_at como campo de data
}
