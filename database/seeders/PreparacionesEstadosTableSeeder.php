<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PreparacionesEstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('preparaciones_estados')->delete();

        \DB::table('preparaciones_estados')->insert(array (
            0 =>
            array (
                'id' => NULL,
                'nombre' => 'SOLICITADO',
                'created_at' => '2021-07-06 13:02:41',
                'updated_at' => '2021-07-06 13:02:41',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => NULL,
                'nombre' => 'PREPARANDO',
                'created_at' => '2021-07-06 13:03:06',
                'updated_at' => '2021-07-06 13:03:06',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => NULL,
                'nombre' => 'PREPARADO',
                'created_at' => '2021-07-06 13:03:15',
                'updated_at' => '2021-07-06 13:03:15',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => NULL,
                'nombre' => 'ADMINISTRADO',
                'created_at' => '2021-07-06 13:03:22',
                'updated_at' => '2021-07-06 13:03:22',
                'deleted_at' => NULL,
            ),
        ));


    }
}
