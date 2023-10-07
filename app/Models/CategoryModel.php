<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'category_name',
    ];
    
    use HasFactory;

    public function subcategories()
    {
        return $this->hasMany(SubcategoryModel::class, 'category_id', 'id');
    }

    

    
}
