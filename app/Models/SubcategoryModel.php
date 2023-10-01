<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoryModel extends Model
{
    protected $table = 'subcategories';

    protected $fillable = [
        'subcategory_name',
        'category_id',
    ];
    use HasFactory;
}
