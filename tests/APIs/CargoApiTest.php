<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Cargo;

class CargoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_cargo()
    {
        $cargo = factory(Cargo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/cargos', $cargo
        );

        $this->assertApiResponse($cargo);
    }

    /**
     * @test
     */
    public function test_read_cargo()
    {
        $cargo = factory(Cargo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/cargos/'.$cargo->id
        );

        $this->assertApiResponse($cargo->toArray());
    }

    /**
     * @test
     */
    public function test_update_cargo()
    {
        $cargo = factory(Cargo::class)->create();
        $editedCargo = factory(Cargo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/cargos/'.$cargo->id,
            $editedCargo
        );

        $this->assertApiResponse($editedCargo);
    }

    /**
     * @test
     */
    public function test_delete_cargo()
    {
        $cargo = factory(Cargo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/cargos/'.$cargo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/cargos/'.$cargo->id
        );

        $this->response->assertStatus(404);
    }
}
