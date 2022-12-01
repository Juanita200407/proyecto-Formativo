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
        Schema::create('comprars', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users');
            // $table->string('nombreCliente');
            // $table->string('apellido');
            // $table->string('telefono');
            // $table->string('direccion');
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
        Schema::dropIfExists('comprars');
    }
};
