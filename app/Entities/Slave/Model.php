<?php

namespace App\Entities\Slave;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected $connection = 'mysql_slave';
}
