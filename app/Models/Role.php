<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'news_access',
        'menu_access',
        'about_us_access',
        'about_us_gallery_access',
        'users_access',
        'slider_gallery_access',
        'gallery_access',
        'contact_access',
        'business_information_access',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
