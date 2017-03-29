<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="StoreClass",
 *      required={"name"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="分类名称",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="desc",
 *          description="分类描述",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="weigh",
 *          description="排序",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="total_num",
 *          description="总档口数量",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class StoreClass extends Model
{
    use SoftDeletes;

    public $table = 'store_classes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'desc',
        'weigh',
        'total_num'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'desc' => 'string',
        'weigh' => 'integer',
        'total_num' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    
}
