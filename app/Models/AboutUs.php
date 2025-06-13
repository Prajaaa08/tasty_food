<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'title',
        'content',
        'position',
        'photo_kanan',
        'photo_kiri',
    ];
}
