<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'phone', 'address', 'postal_code', 'cart_details', 'total_price', 'payment_method',
    ];
}
