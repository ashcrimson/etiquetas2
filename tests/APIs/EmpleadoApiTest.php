<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Empleado;

class EmpleadoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_empleado()
    {
        $empleado = factory(Empleado::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/empleados', $empleado
        );

        $this->assertApiResponse($empleado);
    }

    /**
     * @test
     */
    public function test_read_empleado()
    {
        $empleado = factory(Empleado::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/empleados/'.$empleado->id
        );

        $this->assertApiResponse($empleado->toArray());
    }

    /**
     * @test
     */
    public function test_update_empleado()
    {
        $empleado = factory(Empleado::class)->create();
        $editedEmpleado = factory(Empleado::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/empleados/'.$empleado->id,
            $editedEmpleado
        );

        $this->assertApiResponse($editedEmpleado);
    }

    /**
     * @test
     */
    public function test_delete_empleado()
    {
        $empleado = factory(Empleado::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/empleados/'.$empleado->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/empleados/'.$empleado->id
        );

        $this->response->assertStatus(404);
    }
}
