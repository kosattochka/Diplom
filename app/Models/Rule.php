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
        'description',
        'page_description',
        'vis',
        'sort'
    ];

    public $timestamps = false;

    public function paragraphs()
    {
        return $this->morphMany(Paragraph::class, 'parent', 'table', 'parent_id');
    }
}
