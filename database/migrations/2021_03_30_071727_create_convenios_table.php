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
            $table->string('entidad');
            $table->boolean('atencion_urgencia');
            $table->boolean('consulta_especialidad');
            $table->boolean('laboratorio');
            $table->boolean('rayos_x_e_imagenologia');
            $table->boolean('procedimiento');
            $table->boolean('hospitalizacion');
            $table->boolean('urologia');
            $table->boolean('cirugia_mediana_complejidad');
            $table->boolean('otorrinolaringologia');
            $table->boolean('medicina_nuclear');
            $table->boolean('hemodinamia');
            $table->boolean('medicina_complementaria');
            $table->boolean('esterilizacion');
            $table->boolean('formalizado');
            $table->boolean('acuerdo_comercial');
            $table->boolean('tramite');
            $table->boolean('historico');
            $table->date('inicio_vigencia');
            $table->date('termino_vigencia');
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
