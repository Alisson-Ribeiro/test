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
        Schema::create('bandeiras', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable(false);  // O campo não permite valores nulos
            $table->foreignId('grupo_economico_id')->constrained('grupo_economicos')->onDelete('cascade')->nullable(false); // FK para a tabela grupo_economicos;
            $table->timestamps();
            $table->softDeletes();   // adiciona a coluna deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bandeiras');
    }
};
