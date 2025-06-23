<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\SliderGallery;

class GalleryCLientController extends Controller
{
    public function index()
    {
        $gallerys = Gallery::latest()->get();

        $sliders = SliderGallery::latest()->take(3)->get();

        return view('clients.gallery.index', compact('gallerys', 'sliders'));
    }
}
