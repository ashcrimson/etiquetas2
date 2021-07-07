<?php

namespace Database\Seeders;

use App\Models\Preparacion;
use Illuminate\Database\Seeder;

class PreparacionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('preparaciones')->delete();

        factory(Preparacion::class,50)->create();

    }
}
