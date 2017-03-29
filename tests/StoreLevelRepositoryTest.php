<?php

use App\Models\StoreLevel;
use App\Repositories\StoreLevelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreLevelRepositoryTest extends TestCase
{
    use MakeStoreLevelTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var StoreLevelRepository
     */
    protected $storeLevelRepo;

    public function setUp()
    {
        parent::setUp();
        $this->storeLevelRepo = App::make(StoreLevelRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateStoreLevel()
    {
        $storeLevel = $this->fakeStoreLevelData();
        $createdStoreLevel = $this->storeLevelRepo->create($storeLevel);
        $createdStoreLevel = $createdStoreLevel->toArray();
        $this->assertArrayHasKey('id', $createdStoreLevel);
        $this->assertNotNull($createdStoreLevel['id'], 'Created StoreLevel must have id specified');
        $this->assertNotNull(StoreLevel::find($createdStoreLevel['id']), 'StoreLevel with given id must be in DB');
        $this->assertModelData($storeLevel, $createdStoreLevel);
    }

    /**
     * @test read
     */
    public function testReadStoreLevel()
    {
        $storeLevel = $this->makeStoreLevel();
        $dbStoreLevel = $this->storeLevelRepo->find($storeLevel->id);
        $dbStoreLevel = $dbStoreLevel->toArray();
        $this->assertModelData($storeLevel->toArray(), $dbStoreLevel);
    }

    /**
     * @test update
     */
    public function testUpdateStoreLevel()
    {
        $storeLevel = $this->makeStoreLevel();
        $fakeStoreLevel = $this->fakeStoreLevelData();
        $updatedStoreLevel = $this->storeLevelRepo->update($fakeStoreLevel, $storeLevel->id);
        $this->assertModelData($fakeStoreLevel, $updatedStoreLevel->toArray());
        $dbStoreLevel = $this->storeLevelRepo->find($storeLevel->id);
        $this->assertModelData($fakeStoreLevel, $dbStoreLevel->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteStoreLevel()
    {
        $storeLevel = $this->makeStoreLevel();
        $resp = $this->storeLevelRepo->delete($storeLevel->id);
        $this->assertTrue($resp);
        $this->assertNull(StoreLevel::find($storeLevel->id), 'StoreLevel should not exist in DB');
    }
}
