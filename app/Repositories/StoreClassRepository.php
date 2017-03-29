<?php

namespace App\Repositories;

use App\Models\StoreClass;
use InfyOm\Generator\Common\BaseRepository;

class StoreClassRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'desc',
        'weigh',
        'total_num'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StoreClass::class;
    }
}
