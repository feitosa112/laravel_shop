<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $fillable = [
        'product_id',
        'order_id',
    ];

    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }
    use HasFactory;
}
