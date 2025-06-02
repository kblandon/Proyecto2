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
        Schema::create('Producto_Vino', function (Blueprint $table) {
            $table->id('IdVino');
            $table->string('Nombre');
            $table->string('Bodega');
            $table->unsignedBigInteger('idCategoria'); // Clave foránea
            $table->string('Variedad_Uva');
            $table->string('Region');
            $table->integer('Anada')->nullable();
            $table->integer('Afrutado')->nullable();
            $table->integer('Acidez')->nullable();
            $table->integer('Taninos')->nullable();
            $table->integer('Cuerpo')->nullable();
            $table->string('Maridaje_Recomendado')->nullable();
            $table->decimal('Precio', 8, 2)->nullable();

            // Definir la clave foránea
            $table->foreign('idCategoria')->references('idCategoria')->on('Categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Producto_Vino');
    }
};
