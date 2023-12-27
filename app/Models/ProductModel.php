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
        'subcategory_id',
        'product_image2',
        'product_image3',
        'product_image4',
        'product_image5',
        'product_image6',

    ];

    public function productCat(){
        return $this->hasMany(CategoryModel::class, 'id', 'category_id');

    }

    public function subcategories(){
        return $this->hasMany(SubcategoryModel::class,'id','subcategory_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItemModel::class);
    }
    use HasFactory;
}
