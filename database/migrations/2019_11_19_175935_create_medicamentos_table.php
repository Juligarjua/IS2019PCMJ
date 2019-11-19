<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('nombreComercial');
            $table->increments('composicion');
            $table->increments('presentacion');
            $table->increments('enlaceOnline');
            $table->timestamps();

            $table->foreign('tratamiendo_id')->references('id')->on('tratamientos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamentos');
        $table->increments('id');
        $table->increments('nombreComercial');
        $table->increments('composicion');
        $table->increments('presentacion');
        $table->increments('enlaceOnline');
        $table->timestamps();
    }
}
