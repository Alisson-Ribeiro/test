<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantasia')->nullable(false); // O campo não permite valores nulos
            $table->string('razao_social')->nullable(false); // O campo não permite valores nulos
            $table->string('cnpj')->unique()->nullable(false); // O campo não permite valores nulos
            $table->foreignId('bandeira_id')->constrained('bandeiras')->onDelete('cascade')->nullable(false); // FK para a tabela bandeiras;
            $table->timestamps();
            $table->softDeletes();   // adiciona a coluna deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
