<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DilucionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('diluciones')->delete();

        \DB::table('diluciones')->insert(array (
            0 =>
            array (
                'id' => null,
                'nombre' => 'S.F. 0,9%',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => null,
                'nombre' => 'S.G 5%',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => null,
                'nombre' => 'Sin Dilución',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => null,
                'nombre' => 'Jeringa',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));


    }
}
