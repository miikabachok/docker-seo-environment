<?php

namespace App\Models\MongoDB;

use MongoDB\Laravel\Eloquent\Model;

class ShowMeta extends Model
{
    protected $collection = 'meta';

    public $timestamps = false;
}
