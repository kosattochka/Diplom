<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'title',
        'alias',
        'slogan',
        'short_description',
        'description',
        'detailed',
        'limit_date',
        'active',
        'sort',
        'vis'
    ];

    public function paragraphs () {
        return $this -> morphMany(Paragraph::class, 'table', 'parent_id');
    }
}
