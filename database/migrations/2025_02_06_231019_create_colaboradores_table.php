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
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('cpf', 14)->unique();
            $table->foreignId('unidade_id')->constrained('unidades')->onDelete('cascade'); // FK para a tabela unidades
            $table->timestamps();
            $table->softDeletes();   // adiciona a coluna deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradores');
    }
};
