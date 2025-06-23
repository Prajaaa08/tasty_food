<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $gallerys = Gallery::latest()->take(6)->get();

        // Ambil 1 berita paling terbaru
        $beritaBesar = News::latest()->first();

        // Ambil 4 berita selanjutnya
        $beritaKecil = News::latest()->skip(1)->take(4)->get();

        return view('clients.home.index', compact('gallerys', 'beritaBesar', 'beritaKecil'));
    }
}
