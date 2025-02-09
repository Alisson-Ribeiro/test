<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Unidade extends Model
{
    use SoftDeletes, HasFactory; // Ativando Soft Deletes          // HasFactory for fake data and tests

    protected $fillable = ['nome fantasia', 'razao social', 'cnpj', 'bandeira_id'];

    public function Colaborador(){
        return $this->hasMany(Colaborador::class);
    }

    public function Bandeira(){
        return $this->belongsTo(Bandeira::class);
    }

    protected $dates = ['deleted_at']; // Define a coluna deleted_at como campo de data
}
