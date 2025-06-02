<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Categorias', function (Blueprint $table) {
            $table->id('idCategoria'); // Clave primaria autoincremental
            $table->string('Tipo');
            $table->string('Descripcion');
            $table->string('Caracteristicas_Generales');
            $table->string('Temperatura_Servicio_Recomendada');
            $table->string('Maridaje_General');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Categorias');
    }
};
