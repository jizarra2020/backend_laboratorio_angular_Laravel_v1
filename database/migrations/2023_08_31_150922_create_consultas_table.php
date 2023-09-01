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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            //paciente_id
            $table->bigInteger("paciente_id")->unsigned();
            $table->foreign("paciente_id")->references("id")->on("personas");
             //profesional_id
             $table->bigInteger("profesional_id")->unsigned();
             $table->foreign("profesional_id")->references("id")->on("personas");
            //sucursal_id
            $table->bigInteger("sucursal_id")->unsigned();
            $table->foreign("sucursal_id")->references("id")->on("sucursals");
            //fecha
             $table->dateTime("fecha_consulta");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
