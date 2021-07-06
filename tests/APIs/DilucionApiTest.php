<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Dilucion;

class DilucionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dilucion()
    {
        $dilucion = factory(Dilucion::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dilucions', $dilucion
        );

        $this->assertApiResponse($dilucion);
    }

    /**
     * @test
     */
    public function test_read_dilucion()
    {
        $dilucion = factory(Dilucion::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/dilucions/'.$dilucion->id
        );

        $this->assertApiResponse($dilucion->toArray());
    }

    /**
     * @test
     */
    public function test_update_dilucion()
    {
        $dilucion = factory(Dilucion::class)->create();
        $editedDilucion = factory(Dilucion::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dilucions/'.$dilucion->id,
            $editedDilucion
        );

        $this->assertApiResponse($editedDilucion);
    }

    /**
     * @test
     */
    public function test_delete_dilucion()
    {
        $dilucion = factory(Dilucion::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dilucions/'.$dilucion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dilucions/'.$dilucion->id
        );

        $this->response->assertStatus(404);
    }
}
