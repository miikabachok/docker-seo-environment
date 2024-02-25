<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'show_id',
        'full_name',
        'phone',
        'email',
        'comment',
    ];

    public function orderSeats(): HasMany
    {
        return $this->hasMany(OrderSeat::class, 'order_id', 'id');
    }
}
