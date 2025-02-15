<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable(); // ID do usuário que fez a alteração
            $table->string('model'); // Nome da entidade alterada
            $table->string('model_id'); // ID do registro alterado
            $table->string('event'); // Tipo de evento (created, updated, deleted)
            $table->json('old_values')->nullable(); // Dados antigos
            $table->json('new_values')->nullable(); // Dados novos
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('audits');
    }
};
