<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Servicio;

class ServicioApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_servicio()
    {
        $servicio = factory(Servicio::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/servicios', $servicio
        );

        $this->assertApiResponse($servicio);
    }

    /**
     * @test
     */
    public function test_read_servicio()
    {
        $servicio = factory(Servicio::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/servicios/'.$servicio->id
        );

        $this->assertApiResponse($servicio->toArray());
    }

    /**
     * @test
     */
    public function test_update_servicio()
    {
        $servicio = factory(Servicio::class)->create();
        $editedServicio = factory(Servicio::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/servicios/'.$servicio->id,
            $editedServicio
        );

        $this->assertApiResponse($editedServicio);
    }

    /**
     * @test
     */
    public function test_delete_servicio()
    {
        $servicio = factory(Servicio::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/servicios/'.$servicio->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/servicios/'.$servicio->id
        );

        $this->response->assertStatus(404);
    }
}
