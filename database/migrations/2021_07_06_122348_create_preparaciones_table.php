<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preparaciones', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_admision');
            $table->date('fecha_validez');
            $table->date('fecha_elaboracion');
            
            $table->unsignedBigInteger('paciente_id')->index('preparaciones_pacientes1_idx');
            $table->string('profesional_a_cargo');
            $table->unsignedBigInteger('responsable_id')->index('preparaciones_empleados1_idx');
            $table->unsignedBigInteger('droga_id')->index('preparaciones_drogas1_idx');
            $table->decimal('dosis', 10);
            $table->unsignedBigInteger('dilucion_id')->index('preparaciones_diluciones_idx');
            $table->decimal('volumen_suero', 10);
            $table->decimal('volumen_agregado', 10)->default(0.00);
            $table->decimal('volumen_final', 10)->nullable();
            $table->string('bajada');
            $table->unsignedBigInteger('medico_id')->index('preparaciones_empleados2_idx');
            $table->unsignedBigInteger('ten_id')->index('preparaciones_empleados3_idx');
            $table->unsignedBigInteger('servicio_id')->index('preparaciones_servicios_idx');
            $table->unsignedBigInteger('protocolo_id')->index('preparaciones_protocolos1_idx');
            $table->string('ciclo')->nullable();
            $table->string('dia')->nullable();
            $table->text('control_producto_terminado')->nullable();
            $table->text('entrega_conforme_enfermeria')->nullable();
            $table->tinyInteger('refrigerar')->nullable()->default(0);
            $table->tinyInteger('proteger_luz')->nullable()->default(0);
            $table->unsignedBigInteger('user_id')->index('preparaciones_users1_idx');
            $table->unsignedBigInteger('estado_id')->index('preparaciones_estados1_idx');
            $table->boolean('cerrada')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preparaciones');
    }
}
