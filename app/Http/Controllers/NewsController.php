<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('news.index')->with([
            'news' => $news,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.form')->with([
            'news' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|string|max:255|unique:news,slug',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'created_by' => 'nullable|exists:users,id',
        ], [
            'photo.required' => 'Foto wajib diisi.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
            'slug.required' => 'Slug wajib diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'created_by.exists' => 'Pengguna yang membuat berita tidak ditemukan.',
        ]);

        $news = News::create([
            'photo' => $request->file('photo')->store('news', 'public'),
            'slug' => $validated['slug'],
            'title' => $validated['title'],
            'content' => $validated['content'], 
            'created_by' => $validated['created_by'] ?? auth()->user()->id,
        ]);

        if (!$news) {
            return back()->with(['error' => 'Gagal Membuat Berita Baru']);
        }

        return redirect()->route('news.index')->with(['success' => 'Berhasil Membuat Berita Baru']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('news.index')->with([
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = News::findOrFail($id);
        return view('news.form')->with([
            'news' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);

        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required|string|max:255|unique:news,slug,' . $news->id,
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'created_by' => 'nullable|exists:users,id',
        ], [
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
            'slug.required' => 'Slug wajib diisi.',
            'slug.unique' => 'Slug sudah digunakan.',
            'title.required' => 'Judul wajib diisi.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'created_by.exists' => 'Pengguna yang membuat berita tidak ditemukan.',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('new', 'public');
        }

        $news = $news->update($validated);

        if (!$news) {
            return back()->with(['error' => 'Gagal Memperbarui Berita']);
        }

        return redirect()->route('news.index')->with(['success' => 'Berhasil Memperbarui Berita']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        if (!$news) {
            return back()->with(['error' => 'Gagal Menghapus Berita']);
        }

        return redirect()->route('news.index')->with(['success' => 'Berhasil Menghapus Berita']);
    }
}
