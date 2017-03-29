<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreClassApiTest extends TestCase
{
    use MakeStoreClassTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStoreClass()
    {
        $storeClass = $this->fakeStoreClassData();
        $this->json('POST', '/api/v1/storeClasses', $storeClass);

        $this->assertApiResponse($storeClass);
    }

    /**
     * @test
     */
    public function testReadStoreClass()
    {
        $storeClass = $this->makeStoreClass();
        $this->json('GET', '/api/v1/storeClasses/'.$storeClass->id);

        $this->assertApiResponse($storeClass->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStoreClass()
    {
        $storeClass = $this->makeStoreClass();
        $editedStoreClass = $this->fakeStoreClassData();

        $this->json('PUT', '/api/v1/storeClasses/'.$storeClass->id, $editedStoreClass);

        $this->assertApiResponse($editedStoreClass);
    }

    /**
     * @test
     */
    public function testDeleteStoreClass()
    {
        $storeClass = $this->makeStoreClass();
        $this->json('DELETE', '/api/v1/storeClasses/'.$storeClass->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/storeClasses/'.$storeClass->id);

        $this->assertResponseStatus(404);
    }
}
