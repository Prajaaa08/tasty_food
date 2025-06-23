<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SliderGallery;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $roleCount = Role::count();
        $galleryCount = Gallery::count();
        $sliderCount = SliderGallery::count();
        $totalGalleryItems = $galleryCount + $sliderCount;
        $newsCount = News::count();
        return view('admin.dashboard.index' , compact('userCount' , 'roleCount' , 'totalGalleryItems' , 'newsCount'));
    }
}
