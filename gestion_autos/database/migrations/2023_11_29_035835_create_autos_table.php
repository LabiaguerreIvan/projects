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
        
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->integer('rodado');
            $table->integer('modelo');
            $table->string('color');
            $table->string('patente');
            $table->string('chasis');
            $table->integer('propietarios_id_propietario');
            $table->integer('marcas_id_marca');
            $table->timestamps();
            $table->foreign('propietarios_id_propietario')->references('id')->on('propietarios');
            $table->foreign('marcas_id_marca')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
