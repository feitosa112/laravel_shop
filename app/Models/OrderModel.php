<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'shipping_address',
    ];
    use HasFactory;
}
