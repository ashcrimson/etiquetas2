<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPacientesAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes_atenciones', function (Blueprint $table) {
            $table->string('presion_arterial_pa')->nullable();
            $table->string('presion_arterial_ps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes_atenciones', function (Blueprint $table) {
            //
        });
    }
}
