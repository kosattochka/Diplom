<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alias',
        'img',
        'description',
        'parent_id',
        'page_description',
        'page_heading',
        'table_price',
        'page_text',
        'vis',
        'sort'
    ];

    public $timestamps = false;

    protected $casts = [
        'table_price' => 'array'
    ];

    public function child()
    {
        return $this->hasMany(Service::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }
}
