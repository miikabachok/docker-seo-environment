<?php

namespace App\Models\MongoDB;

use MongoDB\Laravel\Eloquent\Model;

class Hall extends Model
{
    protected $collection = 'hall';

    public $timestamps = false;
}
