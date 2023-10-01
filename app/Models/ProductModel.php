<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'product_name',
        'product_image',
        'price',
        'category_id',
        'subcategory_id'
    ];
    use HasFactory;
}
