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
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',50);
            $table->string('apellidos');
            $table->integer('ci');
            $table->integer('telefono');
            $table->date('fecha_nac');
            $table->string('direccion');

            $table->unsignedBigInteger('user_id')->unique()->nullable();
            //hacemos las referencias
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null') // no permite eliminar el registro, solo en la tabla usuarios se eliminara
                ->onUpdate('cascade'); // actualiza en ambas tablas los id 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miembros');
    }
};
