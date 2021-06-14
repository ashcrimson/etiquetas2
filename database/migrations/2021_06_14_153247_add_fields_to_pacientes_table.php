<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToPacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->string('direccion')->nullable();
            $table->string('familiar_responsable')->nullable();
            $table->string('telefono')->nullable();
            $table->string('telefono2')->nullable();
            $table->unsignedInteger('prevision_id')->nullable();

            $table->foreign('prevision_id', 'fk_pacientes_previsiones1')->references('id')->on('pacientes_previsiones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacientes', function (Blueprint $table) {
            //
        });
    }
}
