<?php

namespace App\Models;

use App\Models\Contract\BaseModel;
use App\Traits\SolarYear;

class User extends BaseModel
{
    use SolarYear;
    /**
     * Table name
     *
     * @var string
     */
    public static $table = 'users';

    
}