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
        Schema::create('solicitudes', function (Blueprint $table) {
             $table->id('id_solicitud');
            $table->unsignedBigInteger('id_mascota');
            $table->unsignedBigInteger('id_usuario');
            $table->enum('estado',['Aprobado','Pendiente','Rechazada'])->nullable();
            $table->unsignedBigInteger('id_administrador');
            $table->foreign('id_mascota')->references('id')->on('mascotas')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_administrador')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
