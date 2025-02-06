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
        Schema::table('clientes', function (Blueprint $table) {
            // Remove os campos 'cpf' e 'pasta'
            $table->dropColumn(['cpf', 'pasta']);
            
            // Adiciona o campo 'matricula'
            $table->string('matricula')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('clientes', function (Blueprint $table) {
            // Restaura os campos 'cpf' e 'pasta'
            $table->string('cpf')->unique();
            $table->text('pasta')->nullable();
            
            // Remove o campo 'matricula'
            $table->dropColumn('matricula');
        });
    }
};
