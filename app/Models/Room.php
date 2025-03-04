<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'imgs',
        'square',
        'capacity',
        'price',
        'price_extra_space',
        'description'
    ];
}
