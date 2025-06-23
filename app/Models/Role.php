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
        'role_access',
    ];

    protected $casts = [
        'news_access' => 'boolean',
        'menu_access' => 'boolean',
        'about_us_access' => 'boolean',
        'about_us_gallery_access' => 'boolean',
        'users_access' => 'boolean',
        'slider_gallery_access' => 'boolean',
        'gallery_access' => 'boolean',
        'contact_access' => 'boolean',
        'business_information_access' => 'boolean',
        'role_access' => 'boolean',
    ];
    
    public function user(){
        return $this->hasMany(User::class);
    }
}
