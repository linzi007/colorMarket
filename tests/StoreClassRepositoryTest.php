<?php

use App\Models\StoreClass;
use App\Repositories\StoreClassRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreClassRepositoryTest extends TestCase
{
    use MakeStoreClassTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StoreClassRepository
     */
    protected $storeClassRepo;

    public function setUp()
    {
        parent::setUp();
        $this->storeClassRepo = App::make(StoreClassRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStoreClass()
    {
        $storeClass = $this->fakeStoreClassData();
        $createdStoreClass = $this->storeClassRepo->create($storeClass);
        $createdStoreClass = $createdStoreClass->toArray();
        $this->assertArrayHasKey('id', $createdStoreClass);
        $this->assertNotNull($createdStoreClass['id'], 'Created StoreClass must have id specified');
        $this->assertNotNull(StoreClass::find($createdStoreClass['id']), 'StoreClass with given id must be in DB');
        $this->assertModelData($storeClass, $createdStoreClass);
    }

    /**
     * @test read
     */
    public function testReadStoreClass()
    {
        $storeClass = $this->makeStoreClass();
        $dbStoreClass = $this->storeClassRepo->find($storeClass->id);
        $dbStoreClass = $dbStoreClass->toArray();
        $this->assertModelData($storeClass->toArray(), $dbStoreClass);
    }

    /**
     * @test update
     */
    public function testUpdateStoreClass()
    {
        $storeClass = $this->makeStoreClass();
        $fakeStoreClass = $this->fakeStoreClassData();
        $updatedStoreClass = $this->storeClassRepo->update($fakeStoreClass, $storeClass->id);
        $this->assertModelData($fakeStoreClass, $updatedStoreClass->toArray());
        $dbStoreClass = $this->storeClassRepo->find($storeClass->id);
        $this->assertModelData($fakeStoreClass, $dbStoreClass->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStoreClass()
    {
        $storeClass = $this->makeStoreClass();
        $resp = $this->storeClassRepo->delete($storeClass->id);
        $this->assertTrue($resp);
        $this->assertNull(StoreClass::find($storeClass->id), 'StoreClass should not exist in DB');
    }
}
