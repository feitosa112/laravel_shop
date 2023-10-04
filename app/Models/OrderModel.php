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

    public function orderItems()
{
    return $this->hasMany(OrderItemModel::class,'order_id');
}

    public function userOrder(){
        return $this->hasMany(User::class,'id','user_id');
    }
    use HasFactory;
}
