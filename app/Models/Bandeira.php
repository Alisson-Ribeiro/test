<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bandeira extends Model
{
    use SoftDeletes, HasFactory; // Ativando Soft Deletes              // HasFactory for fake data and tests

    protected $fillable = ['nome', 'grupo_economico_id'];

    public function GrupoEconomico(){
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function Unidade(){
        return $this->hasMany(Unidade::class);
    }

    protected $dates = ['deleted_at']; // Define a coluna deleted_at como campo de data
}
