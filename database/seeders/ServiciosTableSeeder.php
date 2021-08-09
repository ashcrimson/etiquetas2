<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Seeder;

class ServiciosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('servicios')->delete();

        factory(Servicio::class,1)->create(['nombre' => '7 Norte']);
        factory(Servicio::class,1)->create(['nombre' => 'Pediatria']);
        factory(Servicio::class,1)->create(['nombre' => 'Pabellón']);
        factory(Servicio::class,1)->create(['nombre' => 'Cir.menor']);

    }
}
