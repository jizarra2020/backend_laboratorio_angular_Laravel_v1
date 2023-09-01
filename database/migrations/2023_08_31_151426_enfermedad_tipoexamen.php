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
        Schema::create('enfermadad_tipoexamen', function (Blueprint $table) {
            $table->primary(["enfermedad_id","tipoexamen_id"]);

            $table->bigInteger("enfermedad_id")->unsigned();
            $table->bigInteger("tipoexamen_id")->unsigned();

            $table->foreign("enfermedad_id")->references("id")->on("enfermedads");
            $table->foreign("tipoexamen_id")->references("id")->on("tipoexamens");

            $table->timestamps();  //create_at , updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('enfermadad_tipoexamen');
    }
};
