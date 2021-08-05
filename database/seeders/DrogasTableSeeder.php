<?php

namespace Database\Seeders;

use App\Models\Droga;
use Illuminate\Database\Seeder;

class DrogasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('drogas')->delete();

        \DB::table('drogas')->insert(array (
            0 =>
            array (
                'id' => null,
                'nombre' => 'BENDAMUSTINA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => null,
                'nombre' => 'BLEOMICINA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => null,
                'nombre' => 'BORTEZOMIB',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => null,
                'nombre' => 'CARBOPLATINO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => null,
                'nombre' => 'CICLOFOSFAMIDA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => null,
                'nombre' => 'CISPLATINO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => null,
                'nombre' => 'CITARABINA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => null,
                'nombre' => 'DACARBAZINA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => null,
                'nombre' => 'DOCETAXEL',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => null,
                'nombre' => 'DOXORRUBICINA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => null,
                'nombre' => 'DOXORRUBICINA LIPOSOMAL',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            11 =>
            array (
                'id' => null,
                'nombre' => 'ETOPÓSIDO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            12 =>
            array (
                'id' => null,
                'nombre' => 'FLUORURACILO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            13 =>
            array (
                'id' => null,
                'nombre' => 'GEMCITABINA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            14 =>
            array (
                'id' => null,
                'nombre' => 'IFOSFAMIDA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            15 =>
            array (
                'id' => null,
                'nombre' => 'IRINOTECAN',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            16 =>
            array (
                'id' => null,
                'nombre' => 'METOTREXATO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            17 =>
            array (
                'id' => null,
                'nombre' => 'OXALIPLATINO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            18 =>
            array (
                'id' => null,
                'nombre' => 'PACLITAXEL',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            19 =>
            array (
                'id' => null,
                'nombre' => 'PEMETREXATO',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            20 =>
            array (
                'id' => null,
                'nombre' => 'TRASTUZUMAB-EMTANSINA ',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            21 =>
            array (
                'id' => null,
                'nombre' => 'VINBLASTINA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            22 =>
            array (
                'id' => null,
                'nombre' => 'VINCRISTINA',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            23 =>
            array (
                'id' => null,
                'nombre' => 'BEVACIZUMAB',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            24 =>
            array (
                'id' => null,
                'nombre' => 'CETUXIMAB',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            25 =>
            array (
                'id' => null,
                'nombre' => 'DARATUMUMAB',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            26 =>
            array (
                'id' => null,
                'nombre' => 'NAB-PACLITAXEL',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            27 =>
            array (
                'id' => null,
                'nombre' => 'NIVOLUMAB',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            28 =>
            array (
                'id' => null,
                'nombre' => 'PANITUMUMAB',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            29 =>
            array (
                'id' => null,
                'nombre' => 'PEMBROLIZUMAB',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            30 =>
            array (
                'id' => null,
                'nombre' => 'PERTUZUMAB',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            31 =>
            array (
                'id' => null,
            'nombre' => 'RITUXIMAB (MABTHERA) IV',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            32 =>
            array (
                'id' => null,
            'nombre' => 'RITUXIMAB (REDITUX) IV',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            33 =>
            array (
                'id' => null,
                'nombre' => 'RITUXIMAB SC',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            34 =>
            array (
                'id' => null,
            'nombre' => 'TRASTUZUMAB(HERCEPTIN) IV',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            35 =>
            array (
                'id' => null,
            'nombre' => 'TRASTUZUMAB(BISINTEX) IV',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            36 =>
            array (
                'id' => null,
                'nombre' => 'TRASTUZUMAB SC',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
        ));


    }
}
