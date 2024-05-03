<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Show extends Model
{
    use HasFactory;

    protected $table = 'shows';

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class, 'show_id', 'id');
    }

    public function hall(): HasOne
    {
        return $this->hasOne(Hall::class, 'id', 'hall_id');
    }

    public function meta(): HasOne
    {
        return $this->hasOne(ShowMeta::class, 'show_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'show_id', 'id');
    }

    public function orderSeats(): HasMany
    {
        return $this->hasMany(OrderSeat::class, 'show_id', 'id');
    }
}
