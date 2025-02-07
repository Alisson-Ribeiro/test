<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\GrupoEconomico;
use Illuminate\Database\Seeder;

class GrupoEconomicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GrupoEconomico::factory()->count(5)->create(); // cria 50 registros no banco
    }
}
