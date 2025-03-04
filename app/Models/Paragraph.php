<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'table',
        'title',
        'text',
        'sort',
        'vis'
    ];

    public function parent() {
        return $this->morphTo(__FUNCTION__, 'table', 'parent_id');
    }
}
