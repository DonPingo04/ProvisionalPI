<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('videojuego_consola', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('id_videojuego')
                ->constrained('videojuegos', 'id_videojuego')
                ->onDelete('cascade');

            $table->foreignId('id_consola')
                ->constrained('consolas', 'id_consola')
                ->onDelete('cascade');

            $table->unique(['id_videojuego', 'id_consola']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videojuego_consola');
    }
};
