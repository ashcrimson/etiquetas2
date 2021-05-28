<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cirugias', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_cirugia');
            $table->integer('especialidad');
            $table->string('diagnostico');
            $table->string('otros_diagnosticos');
            $table->string('intervencion');
            $table->integer('lateralidad');
            $table->string('otras_intervenciones');
            $table->integer('cma');
            $table->integer('clasificacion_asa');
            $table->integer('tiempo_quirurgico');
            $table->string('anestesia_sugerida');
            $table->integer('aislamiento');
            $table->integer('necesidad_cama_upc');
            $table->integer('evaluacion_preanestesica');
            $table->integer('alergia_latex');
            $table->integer('prioridad');
            $table->integer('equipo_rayos');
            $table->integer('usuario_taco');
            $table->integer('necesita_donantes_sangre');
            $table->integer('insumos_especificos');
            $table->integer('ex_preoperatorios');
            $table->integer('biopsia');
            $table->string('instrumental');
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
        Schema::dropIfExists('cirugias');
    }
}
