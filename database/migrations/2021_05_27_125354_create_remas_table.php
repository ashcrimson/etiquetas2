<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_remas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_unidad');
            $table->string('nombres_conductor');
            $table->string('apellidos_conductor');
            $table->time('hora_de_llamada');
            $table->time('hora_de_salida');
            $table->time('hora_de_llegada');
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id', 'fk_remas_users1')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remas');
    }
}
