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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->enum('estado', ['pendiente', 'pagado', 'entregado'])
                ->default('pendiente');
            $table->decimal('total', 10, 2);
            $table->timestamp('fecha_pedido');
            $table->foreignId('cliente')
                ->constrained('usuario', 'user_id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
