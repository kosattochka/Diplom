<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'img',
        'short_description',
        'page_description',
        'vis',
        'sort'
    ];
}
