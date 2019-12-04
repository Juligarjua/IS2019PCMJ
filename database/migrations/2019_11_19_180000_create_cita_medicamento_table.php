<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitaMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita_medicamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cita_id');
            $table->unsignedInteger('medicamento_id');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->String('descripcion');
            $table->Integer('unidades');
            $table->Integer('frecuencia');
            $table->timestamps();

            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
}
