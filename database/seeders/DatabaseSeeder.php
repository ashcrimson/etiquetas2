<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ConfigurationsTableSeeder::class);
        $this->call(OptionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DrogasTableSeeder::class);
        $this->call(DilucionesTableSeeder::class);
        $this->call(ProtocolosTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(PreparacionesEstadosTableSeeder::class);
        $this->call(ServiciosTableSeeder::class);

        if (app()->environment()=='local'){
//            $this->call(PacientesTableSeeder::class);
//            $this->call(EmpleadosTableSeeder::class);
//            $this->call(PreparacionesTableSeeder::class);
        }
    }
}
