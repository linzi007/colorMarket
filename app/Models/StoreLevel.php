<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="StoreLevel",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="store_type_class_id",
 *          description="store_type_class_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="weigh",
 *          description="weigh",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="total_num",
 *          description="total_num",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="security_deposit",
 *          description="security_deposit",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="system_use_fee",
 *          description="system_use_fee",
 *          type="number",
 *          format="float"
 *      )
 * )
 */
class StoreLevel extends Model
{
    use SoftDeletes;

    public $table = 'store_level';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'store_type_class_id',
        'weigh',
        'total_num',
        'security_deposit',
        'system_use_fee'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'store_type_class_id' => 'string',
        'weigh' => 'integer',
        'total_num' => 'integer',
        'security_deposit' => 'float',
        'system_use_fee' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
