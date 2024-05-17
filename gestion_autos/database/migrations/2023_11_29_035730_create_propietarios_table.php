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
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('dni');
            $table->bigInteger('cuil');
            $table->string('telefono');
            $table->string('correo');
            $table->timestamps(); //crea 2 columnas: 
                                //created_at(guarda fecha y hora del ultimo registro)
                                //updated_at(guarda fecha y hora de la ultima actualizacion)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propietarios');
    }
};
