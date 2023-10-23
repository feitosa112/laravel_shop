<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageModel extends Model
{
    protected $table = 'message';

    protected $fillable = [
        'message',
        'user_id',
        'created_at',
        'product_id'
    ];
    use HasFactory;
}
