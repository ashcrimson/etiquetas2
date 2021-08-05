<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('options')->delete();

        \DB::table('options')->insert(array (
            0 =>
            array (
                'id' => 1,
                'option_id' => NULL,
                'nombre' => 'Admin',
                'ruta' => '',
                'descripcion' => 'Libero blanditiis deleniti explicabo ullam dolorum dolor et. Qui ab sed temporibus blanditiis molestias aut. Placeat qui quam impedit rerum soluta iste maiores optio.',
                'icono_l' => 'fa-tools',
                'icono_r' => NULL,
                'orden' => 5,
                'color' => 'bg-warning',
                'created_at' => '2021-05-30 14:28:25',
                'updated_at' => '2021-07-06 12:59:27',
                'deleted_at' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'option_id' => 1,
                'nombre' => 'Usuarios',
                'ruta' => 'users.index',
                'descripcion' => 'Dolorem officia reprehenderit quo et voluptate dicta aliquid officiis. Facere ducimus quas eveniet quam. Expedita ut nesciunt qui et amet.',
                'icono_l' => 'fa-users',
                'icono_r' => NULL,
                'orden' => 6,
                'color' => 'bg-orange',
                'created_at' => '2021-05-30 14:28:25',
                'updated_at' => '2021-07-06 12:59:27',
                'deleted_at' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'option_id' => 1,
                'nombre' => 'Menu',
                'ruta' => 'options.index',
                'descripcion' => 'Sit perspiciatis voluptatem velit. Voluptas corporis rerum est soluta error. Expedita est quod autem ad cumque dicta ut. Dolores accusantium repudiandae aliquam.',
                'icono_l' => 'fa-list',
                'icono_r' => NULL,
                'orden' => 7,
                'color' => 'bg-teal',
                'created_at' => '2021-05-30 14:28:25',
                'updated_at' => '2021-07-06 12:59:27',
                'deleted_at' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'option_id' => 1,
                'nombre' => 'Roles',
                'ruta' => 'roles.index',
                'descripcion' => 'Illo quo consequatur quia inventore dicta aliquam voluptatem. Nam vitae in autem ea molestias. Voluptatem aut ut numquam omnis aperiam et eum. Quae dicta consequatur optio ea quia.',
                'icono_l' => 'fa-user-tag',
                'icono_r' => NULL,
                'orden' => 8,
                'color' => 'bg-info',
                'created_at' => '2021-05-30 14:28:25',
                'updated_at' => '2021-07-06 12:59:27',
                'deleted_at' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'option_id' => 1,
                'nombre' => 'Permisos',
                'ruta' => 'permissions.index',
                'descripcion' => 'Occaecati inventore repellat voluptatum incidunt. Iusto incidunt et dicta aut qui culpa qui. Maiores accusantium delectus sit aliquam.',
                'icono_l' => 'fa-key',
                'icono_r' => NULL,
                'orden' => 9,
                'color' => 'bg-purple',
                'created_at' => '2021-05-30 14:28:25',
                'updated_at' => '2021-07-06 12:59:27',
                'deleted_at' => NULL,
            ),
            5 =>
            array (
                'id' => 6,
                'option_id' => 1,
                'nombre' => 'Configuraciones',
                'ruta' => 'configurations.index',
                'descripcion' => 'Et architecto tempora quod maxime eos esse. Minima ut in consectetur laborum dolores quae consectetur. Tempore similique doloribus repellendus architecto dolores aut ab provident.',
                'icono_l' => 'fa-cogs',
                'icono_r' => NULL,
                'orden' => 10,
                'color' => 'bg-teal',
                'created_at' => '2021-05-30 14:28:25',
                'updated_at' => '2021-07-06 12:59:27',
                'deleted_at' => NULL,
            ),
            6 =>
            array (
                'id' => 7,
                'option_id' => NULL,
                'nombre' => 'Dashboard',
                'ruta' => 'dashboard',
                'descripcion' => 'Voluptatibus omnis porro qui ipsa. Sit corrupti voluptatem est laudantium quaerat voluptas. Explicabo corrupti nemo eum magnam expedita.',
                'icono_l' => 'fa-chart-line',
                'icono_r' => NULL,
                'orden' => 0,
                'color' => 'bg-warning',
                'created_at' => '2021-05-30 14:28:25',
                'updated_at' => '2021-07-06 12:55:13',
                'deleted_at' => NULL,
            ),
            7 =>
            array (
                'id' => 8,
                'option_id' => NULL,
                'nombre' => 'Preparación de Medicamento',
                'ruta' => 'preparaciones.index',
                'descripcion' => 'x',
                'icono_l' => 'fa-prescription-bottle',
                'icono_r' => NULL,
                'orden' => 1,
                'color' => NULL,
                'created_at' => '2021-05-30 14:38:31',
                'updated_at' => '2021-07-06 12:55:13',
                'deleted_at' => NULL,
            ),
            8 =>
            array (
                'id' => 9,
                'option_id' => NULL,
                'nombre' => 'Admin Drogas',
                'ruta' => 'drogas.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-pills',
                'icono_r' => NULL,
                'orden' => 3,
                'color' => NULL,
                'created_at' => '2021-07-06 12:55:26',
                'updated_at' => '2021-07-06 12:59:27',
                'deleted_at' => NULL,
            ),
            9 =>
            array (
                'id' => 10,
                'option_id' => NULL,
                'nombre' => 'Admin Pacientes',
                'ruta' => 'pacientes.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-user-injured',
                'icono_r' => NULL,
                'orden' => 4,
                'color' => NULL,
                'created_at' => '2021-07-06 12:55:48',
                'updated_at' => '2021-07-06 12:59:27',
                'deleted_at' => NULL,
            ),
            10 =>
            array (
                'id' => 11,
                'option_id' => NULL,
                'nombre' => 'Medicos o Profecioneles',
                'ruta' => 'empleados.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-user-md',
                'icono_r' => NULL,
                'orden' => 2,
                'color' => NULL,
                'created_at' => '2021-07-06 12:56:29',
                'updated_at' => '2021-07-06 12:59:27',
                'deleted_at' => NULL,
            ),
        ));

        setStartValSequence('OPTIONS_ID_SEQ',11);
    }
}
