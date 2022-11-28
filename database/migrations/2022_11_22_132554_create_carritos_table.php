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
        Schema::create('carritos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->foreignId("user_id")->constant("users");
            $table->string("descripcion");
            $table->string("tamaño");
            $table->integer("precio");
            $table->integer("cantidad");
            $table->string("foto")->nullable();
            $table->integer('precioA')->nullable();
            $table->integer('precioT')->nullable();
            $table->integer('cantidadA')->nullable();
            $table->integer('cantidadT')->nullable();
            $table->foreignId("producto_id")->constant("productos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carritos');
    }
};
