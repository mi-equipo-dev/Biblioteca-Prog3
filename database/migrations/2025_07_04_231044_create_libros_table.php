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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('ISBN')->unique();
            $table->string('titulo');
            $table->string('autor');
            $table->string('editorial');
            $table->year('anio_publicacion');
            $table->integer('cantidad');
            

            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
        
            $table->unsignedBigInteger('id_procedencia');
            $table->foreign('id_procedencia')->references('id')->on('procedencias')->onDelete('cascade');

            $table->unsignedBigInteger('id_destino')->nullable();
            $table->foreign('id_destino')->references('id')->on('destinos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
