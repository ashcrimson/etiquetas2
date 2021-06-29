<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrogasTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drogas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('dosis');
            $table->string('suero_dilusion');
            $table->decimal('vol_agregado');
            $table->decimal('vol_final');
            $table->string('bajada');
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
        Schema::dropIfExists('drogas');
    }
}
