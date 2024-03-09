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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("cliente")->constraint();
            $table->foreignId("servico")->constraint();
            $table->float("valor_final");

            $table->foreign('cliente')->references('id')->on('clientes');
            $table->foreign('servico')->references('id')->on('servicos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
