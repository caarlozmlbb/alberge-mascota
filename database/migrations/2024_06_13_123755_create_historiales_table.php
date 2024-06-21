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
        Schema::create('historiales', function (Blueprint $table) {
            $table->id('id_historial');
            $table->foreignId('id')->constrained('mascotas')->onDelete('cascade');
            $table->date('fecha_consulta');
            $table->text('diagnostico')->nullable();
            $table->text('medicacion')->nullable();
            $table->enum('actitud', ['Agresivo', 'Docil', 'Nervioso'])->nullable();
            $table->enum('estado', ['Bueno', 'Regular', 'Malo'])->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->enum('hidratacion',['si','no'])->nullable();
            $table->decimal('temperatura', 4, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiales');
    }
};
