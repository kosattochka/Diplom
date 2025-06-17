<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'vk',
        'telegram',
        'email',
        'phone',
        'address_office',
        'address_place',
        'mail_index',
        'operator',
        'map',
        'map_route',
        'vis'
    ];

    public $timestamps = false;
}
