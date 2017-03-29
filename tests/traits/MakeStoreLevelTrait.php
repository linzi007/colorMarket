<?php

use Faker\Factory as Faker;
use App\Models\StoreLevel;
use App\Repositories\StoreLevelRepository;

trait MakeStoreLevelTrait
{
    /**
     * Create fake instance of StoreLevel and save it in database
     *
     * @param array $storeLevelFields
     * @return StoreLevel
     */
    public function makeStoreLevel($storeLevelFields = [])
    {
        /** @var StoreLevelRepository $storeLevelRepo */
        $storeLevelRepo = App::make(StoreLevelRepository::class);
        $theme = $this->fakeStoreLevelData($storeLevelFields);
        return $storeLevelRepo->create($theme);
    }

    /**
     * Get fake instance of StoreLevel
     *
     * @param array $storeLevelFields
     * @return StoreLevel
     */
    public function fakeStoreLevel($storeLevelFields = [])
    {
        return new StoreLevel($this->fakeStoreLevelData($storeLevelFields));
    }

    /**
     * Get fake data of StoreLevel
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStoreLevelData($storeLevelFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'store_type_class_id' => $fake->word,
            'weigh' => $fake->randomDigitNotNull,
            'total_num' => $fake->randomDigitNotNull,
            'security_deposit' => $fake->randomDigitNotNull,
            'system_use_fee' => $fake->randomDigitNotNull
        ], $storeLevelFields);
    }
}
