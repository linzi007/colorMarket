<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreLevelApiTest extends TestCase
{
    use MakeStoreLevelTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStoreLevel()
    {
        $storeLevel = $this->fakeStoreLevelData();
        $this->json('POST', '/api/v1/storeLevels', $storeLevel);

        $this->assertApiResponse($storeLevel);
    }

    /**
     * @test
     */
    public function testReadStoreLevel()
    {
        $storeLevel = $this->makeStoreLevel();
        $this->json('GET', '/api/v1/storeLevels/'.$storeLevel->id);

        $this->assertApiResponse($storeLevel->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStoreLevel()
    {
        $storeLevel = $this->makeStoreLevel();
        $editedStoreLevel = $this->fakeStoreLevelData();

        $this->json('PUT', '/api/v1/storeLevels/'.$storeLevel->id, $editedStoreLevel);

        $this->assertApiResponse($editedStoreLevel);
    }

    /**
     * @test
     */
    public function testDeleteStoreLevel()
    {
        $storeLevel = $this->makeStoreLevel();
        $this->json('DELETE', '/api/v1/storeLevels/'.$storeLevel->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/storeLevels/'.$storeLevel->id);

        $this->assertResponseStatus(404);
    }
}
