<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PacientesPrevisionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


//        \DB::table('pacientes_previsiones')->delete();

        \DB::table('pacientes_previsiones')->insert(array (
            0 =>
            array (
                'id' => 1,
                'nombre' => 'FONASA',
                'activo' => 1,
                'created_at' => '2021-06-14 15:43:56',
                'updated_at' => '2021-06-14 15:44:11',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'nombre' => 'ARMADA',
                'activo' => 1,
                'created_at' => '2021-06-14 15:44:06',
                'updated_at' => '2021-06-14 15:44:06',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'nombre' => 'ISAPRE',
                'activo' => 0,
                'created_at' => '2021-06-14 15:44:21',
                'updated_at' => '2021-06-14 15:44:21',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'nombre' => 'CAPREDENA',
                'activo' => 0,
                'created_at' => '2021-06-14 15:44:33',
                'updated_at' => '2021-06-14 15:44:44',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'nombre' => 'SISAN',
                'activo' => 0,
                'created_at' => '2021-06-14 15:44:50',
                'updated_at' => '2021-06-14 15:44:50',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'nombre' => 'SISAE',
                'activo' => 0,
                'created_at' => '2021-06-14 15:44:58',
                'updated_at' => '2021-06-14 15:44:58',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'nombre' => 'DIPRECA',
                'activo' => 0,
                'created_at' => '2021-06-14 15:45:06',
                'updated_at' => '2021-06-14 15:45:06',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'nombre' => 'SIN PREVISION',
                'activo' => 0,
                'created_at' => '2021-06-14 15:45:18',
                'updated_at' => '2021-06-14 15:45:18',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'nombre' => 'EJERCITO',
                'activo' => 0,
                'created_at' => '2021-06-14 15:45:27',
                'updated_at' => '2021-06-14 15:45:27',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'nombre' => 'FACH',
                'activo' => 0,
                'created_at' => '2021-06-14 15:45:35',
                'updated_at' => '2021-06-14 15:45:35',
                'deleted_at' => NULL,
            ),
        ));


    }
}
