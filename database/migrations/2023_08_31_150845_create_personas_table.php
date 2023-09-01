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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string("nombres" , 50);
            $table->string("apellidos" , 50);
            $table->string("ci_dni", 15)->unique();
            $table->string("telefono", 15)->nullable();
            $table->date("fecha_nacimiento")->nullable();
            $table->string("direccion")->nullable();
            $table->string("ciudad")->nullable();
            $table->string("pais")->nullable();

            //relación(1 a 1) entres persona y user}
            $table->bigInteger("user_id")->unsigned()->nullable();
            $table->foreign("user_id")->references("id")->on("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
