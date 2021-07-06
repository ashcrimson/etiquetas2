<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPreparacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('preparaciones', function (Blueprint $table) {
            $table->foreign('dilucion_id', 'fk_preparaciones_diluciones')->references('id')->on('diluciones')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('droga_id', 'fk_preparaciones_drogas1')->references('id')->on('drogas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('responsable_id', 'fk_preparaciones_empleados1')->references('id')->on('empleados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('medico_id', 'fk_preparaciones_empleados2')->references('id')->on('empleados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('paciente_id', 'fk_preparaciones_pacientes1')->references('id')->on('pacientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('estado_id', 'fk_preparaciones_preparaciones_estados1')->references('id')->on('preparaciones_estados')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('protocolo_id', 'fk_preparaciones_protocolos1')->references('id')->on('protocolos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id', 'fk_preparaciones_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('preparaciones', function (Blueprint $table) {
            $table->dropForeign('fk_preparaciones_diluciones');
            $table->dropForeign('fk_preparaciones_drogas1');
            $table->dropForeign('fk_preparaciones_empleados1');
            $table->dropForeign('fk_preparaciones_empleados2');
            $table->dropForeign('fk_preparaciones_pacientes1');
            $table->dropForeign('fk_preparaciones_preparaciones_estados1');
            $table->dropForeign('fk_preparaciones_protocolos1');
            $table->dropForeign('fk_preparaciones_users1');
        });
    }
}
