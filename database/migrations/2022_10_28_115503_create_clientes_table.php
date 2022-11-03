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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nombreCliente');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('direccion');
            $table->foreignId('productos_id')->constrained('productos');
            $table->integer('cantidad');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign('clientes_productos_id_foreign');
        });
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign('clientes_user_id_foreign');
        });
    }
};