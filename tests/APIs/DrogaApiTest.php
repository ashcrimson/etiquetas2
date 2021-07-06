<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Droga;

class DrogaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_droga()
    {
        $droga = factory(Droga::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/drogas', $droga
        );

        $this->assertApiResponse($droga);
    }

    /**
     * @test
     */
    public function test_read_droga()
    {
        $droga = factory(Droga::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/drogas/'.$droga->id
        );

        $this->assertApiResponse($droga->toArray());
    }

    /**
     * @test
     */
    public function test_update_droga()
    {
        $droga = factory(Droga::class)->create();
        $editedDroga = factory(Droga::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/drogas/'.$droga->id,
            $editedDroga
        );

        $this->assertApiResponse($editedDroga);
    }

    /**
     * @test
     */
    public function test_delete_droga()
    {
        $droga = factory(Droga::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/drogas/'.$droga->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/drogas/'.$droga->id
        );

        $this->response->assertStatus(404);
    }
}
