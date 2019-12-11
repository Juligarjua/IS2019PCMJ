<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_hora');
            $table->enum('lugar', ['Doctor Fleming', 'Esperanza Macarena (María Auxiliadora)',
                'Policlínico Virgen Macarena','San Jerónimo','Virgen de los Reyes (Marqués de Paradas)',
                'H.U. Virgen del Rocío']);
            $table->unsignedInteger('medico_id'); // 11 digitos;
            $table->unsignedInteger('paciente_id');
            $table->timestamps();

            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');

    }
}