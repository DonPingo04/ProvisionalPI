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
        Schema::create('detalle__pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('videojuego')
                ->constrained('videojuego', 'id_videojuego')
                ->onDelete('cascade');
            $table->foreignId('pedido')
                ->constrained('pedido', 'id_pedido')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle__pedidos');
    }
};
