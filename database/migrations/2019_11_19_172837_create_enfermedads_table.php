<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnfermedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            //AÑADIR MIGRACION ESPECIALIDAD
            //$table->unsignedInteger('enfermedads_id');
            $table->unsignedInteger('paciente_id');
            $table->timestamps();

            //AÑADIR MIGRACION ESPECIALIDAD + atributo en App
            //$table->foreign('enfermedad_id')->references('id')->on('enfermedads')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');


            //Poner en migrations->pacientes
            //$table->foreign('enfermedad_id')->references('id')->on('enfermedades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfermedads');
    }
}
