<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutClientController extends Controller
{
    public function index()
    {
        return view('clients.about.index', [
            'about_atas' => AboutUs::where('position', 'atas')->first(),
            'about_tengah' => AboutUs::where('position', 'tengah')->first(),
            'about_bawah' => AboutUs::where('position', 'bawah')->first(),
        ]);
    }
}
