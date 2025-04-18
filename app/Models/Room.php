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

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function paragraphs()
    {
        return $this->morphMany(Paragraph::class, 'parent', 'table', 'parent_id');
    }
}
