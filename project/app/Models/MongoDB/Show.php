<?php

namespace App\Models\MongoDB;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Relations\EmbedsMany;
use MongoDB\Laravel\Relations\EmbedsOne;

class Show extends Model
{
    protected $collection = 'shows';

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function gallery(): EmbedsMany
    {
        return $this->embedsMany(Gallery::class, 'gallery');
    }

    public function hall(): EmbedsOne
    {
        return $this->embedsOne(Hall::class, 'hall');
    }

    public function meta(): EmbedsOne
    {
        return $this->embedsOne(ShowMeta::class, 'meta');
    }

    public function orderSeats(): EmbedsMany
    {
        return $this->embedsMany(OrderSeat::class, 'order_seats');
    }
}
