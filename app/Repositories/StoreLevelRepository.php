<?php

namespace App\Repositories;

use App\Models\StoreLevel;
use InfyOm\Generator\Common\BaseRepository;

class StoreLevelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'store_type_class_id',
        'weigh',
        'total_num',
        'security_deposit',
        'system_use_fee'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StoreLevel::class;
    }
}
