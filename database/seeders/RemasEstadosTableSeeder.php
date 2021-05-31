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

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \DB::table('remas_estados')->truncate();

        RemaEstado::factory()->create(['nombre' => 'CREADA']);

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');


    }
}
