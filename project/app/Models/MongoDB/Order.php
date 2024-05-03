<?php

namespace App\Models\MongoDB;

use MongoDB\Laravel\Eloquent\Model;

class Order extends Model
{
    protected $collection = 'orders';

    protected $fillable = [
        'show_id',
        'full_name',
        'phone',
        'email',
        'comment',
    ];
}
