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
            $table->string('name');
            $table->string('email');
            $table->string('nombre');
            $table->string('cantidad');
            $table->string('precio');
            $table->string('precioA');
            $table->string('foto');
            $table->foreignId('producto_id')->constrained('productos');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
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
        Schema::table('carritos', function (Blueprint $table) {
            $table->dropForeign('carritos_producto_id_foreign');
        });

        Schema::table('carritos', function (Blueprint $table) {
            $table->dropForeign('carritos_user_id_foreign');
        });
    }
};
