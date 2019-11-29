<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentoTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_tratamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->foreign('tratamiendo_id')->references('id')->on('medicamentos');
            $table->foreign('medicamento_id')->references('id')->on('tratamientos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamento_tratamientos');
    }
}
