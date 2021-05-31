<?php

namespace Database\Seeders;

use App\Models\RemaEstado;
use Illuminate\Database\Seeder;

class RemasEstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

//        \DB::statement('ALTER TABLE remas DISABLE CONSTRAINT fk_remas_estados1');

        \DB::table('remas_estados')->delete();

        RemaEstado::factory()->create(['nombre' => 'CREADA']);

//        \DB::statement('ALTER TABLE remas ENABLE CONSTRAINT fk_remas_estados1');


    }
}
