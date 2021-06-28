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
            $table->date('fecha_admision');
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('rema_id');
            $table->string('qf');
            $table->string('droga');
            $table->decimal('dosis');
            $table->string('suero_dilucion');
            $table->string('vol_suero');
            $table->decimal('vol_agregado');
            $table->decimal('vol_final');
            $table->string('bajada');
            $table->string('medico');
            $table->text('servicio_solicitante');
            $table->text('control_producto_terminado');
            $table->text('entrega_conforme_enfermeria');
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
