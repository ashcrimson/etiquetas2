<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('cargos')->delete();

        \DB::table('cargos')->insert(array (
            0 =>
            array (
                'id' => null,
                'nombre' => 'MEDICO',
                'created_at' => '2021-07-06 12:48:20',
                'updated_at' => '2021-07-06 12:48:20',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => null,
                'nombre' => 'Químico farmacéutico',
                'created_at' => '2021-07-06 12:48:40',
                'updated_at' => '2021-07-06 12:48:40',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => null,
                'nombre' => 'TENS',
                'created_at' => '2021-07-06 12:48:40',
                'updated_at' => '2021-07-06 12:48:40',
                'deleted_at' => NULL,
            ),
        ));


    }
}
