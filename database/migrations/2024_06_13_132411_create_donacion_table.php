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
        Schema::create('donacion', function (Blueprint $table) {
            $table->id();
            $table->decimal('monto',7,2)->nullable();
            $table->date('fecha');
            $table->timestamps();
            $table->foreignId('usuarios_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donacion');
    }
};
