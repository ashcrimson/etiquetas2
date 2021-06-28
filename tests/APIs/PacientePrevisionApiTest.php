<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PacientePrevision;

class PacientePrevisionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_paciente_prevision()
    {
        $pacientePrevision = factory(PacientePrevision::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/paciente_previsions', $pacientePrevision
        );

        $this->assertApiResponse($pacientePrevision);
    }

    /**
     * @test
     */
    public function test_read_paciente_prevision()
    {
        $pacientePrevision = factory(PacientePrevision::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/paciente_previsions/'.$pacientePrevision->id
        );

        $this->assertApiResponse($pacientePrevision->toArray());
    }

    /**
     * @test
     */
    public function test_update_paciente_prevision()
    {
        $pacientePrevision = factory(PacientePrevision::class)->create();
        $editedPacientePrevision = factory(PacientePrevision::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/paciente_previsions/'.$pacientePrevision->id,
            $editedPacientePrevision
        );

        $this->assertApiResponse($editedPacientePrevision);
    }

    /**
     * @test
     */
    public function test_delete_paciente_prevision()
    {
        $pacientePrevision = factory(PacientePrevision::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/paciente_previsions/'.$pacientePrevision->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/paciente_previsions/'.$pacientePrevision->id
        );

        $this->response->assertStatus(404);
    }
}
