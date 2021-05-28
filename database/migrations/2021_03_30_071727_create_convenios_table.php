<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->string('rut');
            $table->string('razon_social');
            $table->string('direccion');
            $table->boolean('formalizado');
            $table->boolean('acuerdo_comercial');
            $table->boolean('tramite');
            $table->boolean('historico');
            $table->date('inicio_vigencia');
            $table->date('termino_vigencia');
            $table->string('observacion_termino');
            $table->string('observaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convenios');
    }
}
