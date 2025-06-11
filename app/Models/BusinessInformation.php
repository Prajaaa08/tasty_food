<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessInformation extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'location',
        'latitude',
        'longitude',
    ];
}
