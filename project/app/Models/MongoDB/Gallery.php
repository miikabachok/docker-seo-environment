<?php

namespace App\Models\MongoDB;

use MongoDB\Laravel\Eloquent\Model;

class Gallery extends Model
{
    protected $collection = 'gallery';

    public $timestamps = false;
}
