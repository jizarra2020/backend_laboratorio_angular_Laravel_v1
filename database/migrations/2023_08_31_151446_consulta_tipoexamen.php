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
        Schema::create('consulta_tipoexamen', function (Blueprint $table) {
            $table->primary(["consulta_id","tipoexamen_id"]);

            $table->string("archivo")->nullable();
            $table->text("detalle")->nullable();

            $table->bigInteger("consulta_id")->unsigned();
            $table->bigInteger("tipoexamen_id")->unsigned();

            $table->foreign("consulta_id")->references("id")->on("consultas");
            $table->foreign("tipoexamen_id")->references("id")->on("tipoexamens");

            $table->timestamps();  //create_at , updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_tipoexamen');
    }
};
