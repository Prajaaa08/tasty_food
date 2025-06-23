<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsClientController extends Controller
{
    public function index()
    {
        $beritaBesar = News::latest()->first();

        // Jika tidak ada berita sama sekali
        if (!$beritaBesar) {
            return view('clients.berita.index', [
                'beritaBesar' => null,
                'beritaKecil' => collect(), // koleksi kosong, supaya aman dipakai di @foreach
            ]);
        }

        // Kalau ada berita, ambil berita lainnya
        $beritaKecil = News::where('id', '!=', $beritaBesar->id)->get();

        return view('clients.berita.index', compact('beritaBesar', 'beritaKecil'));
    }
}
