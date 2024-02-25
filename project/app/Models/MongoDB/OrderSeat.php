<?php

namespace App\Models\MongoDB;

use MongoDB\Laravel\Eloquent\Model;

class OrderSeat extends Model
{
    protected $collection = 'order_seats';

    public $timestamps = false;

    protected $fillable = [
        'seat',
        'order_id',
    ];

    protected $casts = [
        'seat' => 'integer',
    ];
}
