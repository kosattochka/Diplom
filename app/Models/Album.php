<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'description',
        'vis',
        'sort',
        'imgs'
    ];

    public $timestamps = false;

    protected $casts = [
        'imgs' => 'array'
    ];
}
