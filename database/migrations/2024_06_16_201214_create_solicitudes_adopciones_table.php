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
        Schema::create('solicitudes_adopciones', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->unsignedBigInteger('id_mascota');
            $table->integer('id_usuario');
            $table->enum('estado',['Aprobado','Pendiente','Rechazada'])->nullable();
            $table->integer('id_administrador');
            $table->foreign('id_mascota')->references('id')->on('mascotas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('solicitudes_adopciones');
    }
};
