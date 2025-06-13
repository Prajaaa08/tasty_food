<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'photo',
        'name',
        'description',
        'created_by',
    ];

    public function creator(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
