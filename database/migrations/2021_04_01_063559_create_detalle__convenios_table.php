<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle__convenios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('convenio_id')->unsigned();
            $table->foreign('convenio_id')->references('id')->on('convenios');
            $table->boolean('atencion_urgencia');
            $table->boolean('consulta_especialidad');
            $table->boolean('laboratorio');
            $table->boolean('rayos_x_e_imagenologia');
            $table->boolean('procedimiento');
            $table->boolean('endoscopia_urologica');
            $table->boolean('servicio_de_esterilizacion');
            $table->boolean('hospitalizacion');
            $table->boolean('ginecologia');
            $table->boolean('urologia');
            $table->boolean('cirugia_mediana_complejidad');
            $table->boolean('otorrinolaringologia');
            $table->boolean('medicina_nuclear');
            $table->boolean('hemodinamia');
            $table->boolean('medicina_complementaria');
            $table->boolean('esterilizacion');
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
        Schema::dropIfExists('detalle__convenios');
    }
}
