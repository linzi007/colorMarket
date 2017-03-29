<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $primaryKey = 'members';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $perPage = 15;



}
