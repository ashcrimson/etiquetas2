<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_atenciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('rema_id');
            $table->text('motivo_consulta');
            $table->string('clasificacion_triaje');
            $table->string('presion_arterial');
            $table->string('frecuencia_cardiaca');
            $table->string('frecuencia_respiratoria');
            $table->integer('temperatura');
            $table->integer('saturacion_oxigeno');
            $table->text('atencion_enfermeria');
            $table->text('antecedentes_morbidos');
            $table->text('alergias');
            $table->text('medicamentos_habituales');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('rema_id', 'fk_atenciones_remas1')->references('id')->on('remas');
            $table->foreign('paciente_id', 'fk_atenciones_pacientes1')->references('id')->on('pacientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes_atenciones');
    }
}
