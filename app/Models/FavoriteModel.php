<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteModel extends Model
{
    protected $table = 'favorite';

    protected $fillable = [
       'product_id',
       'user_id',
    ];
    use HasFactory;
}
