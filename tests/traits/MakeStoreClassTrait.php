<?php

use Faker\Factory as Faker;
use App\Models\StoreClass;
use App\Repositories\StoreClassRepository;

trait MakeStoreClassTrait
{
    /**
     * Create fake instance of StoreClass and save it in database
     *
     * @param array $storeClassFields
     * @return StoreClass
     */
    public function makeStoreClass($storeClassFields = [])
    {
        /** @var StoreClassRepository $storeClassRepo */
        $storeClassRepo = App::make(StoreClassRepository::class);
        $theme = $this->fakeStoreClassData($storeClassFields);
        return $storeClassRepo->create($theme);
    }

    /**
     * Get fake instance of StoreClass
     *
     * @param array $storeClassFields
     * @return StoreClass
     */
    public function fakeStoreClass($storeClassFields = [])
    {
        return new StoreClass($this->fakeStoreClassData($storeClassFields));
    }

    /**
     * Get fake data of StoreClass
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStoreClassData($storeClassFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'desc' => $fake->word,
            'weigh' => $fake->randomDigitNotNull,
            'total_num' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'deleted_at' => $fake->word
        ], $storeClassFields);
    }
}
