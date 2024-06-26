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
        Schema::create('historias', function (Blueprint $table) {
            $table->id('id_historia');
            $table->unsignedBigInteger('id_usuario');
            $table->text('contenido');
            $table->date('fecha');
            $table->string('rutafoto')->nullable();
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historias');
    }
};
