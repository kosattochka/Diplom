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
        'description',
        'parent_id',
        'short_description',
        'page_heading',
        'table_price',
        'page_text',
        'vis',
        'sort'
    ];

    public function child () {
        return $this -> hasMany(Service::class);
    }
    public function parent () {
        return $this -> belongsTo(Service::class);
    }

}
