<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'img',
        'short_description',
        'date'
    ];

    public $timestamps = false;

    public function paragraphs() {
        return $this->morphMany(Paragraph::class, 'parent', 'table', 'parent_id');
    }
}
