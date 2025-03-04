<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'services',
        'name',
        'text',
        'date',
        'stars',
        'vis'
    ];

    public $timestamps = false;
}
