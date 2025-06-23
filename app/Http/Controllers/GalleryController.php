<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('access-gallery');

        $gallerys = Gallery::orderBy('created_at', 'desc')->get();
        return view('admin.gallerys.index')->with([
            'gallerys' => $gallerys,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('access-gallery');

        return view('admin.gallerys.form')->with([
            'gallerys' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('access-gallery');

        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'photo.required' => 'Foto gallery wajib diisi.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $gallery = Gallery::create([
            'photo' => $request->file('photo')->store('gallerys', 'public'),
        ]);

        if (!$gallery) {
            return back()->with(['error' => 'Gagal Menambahkan Foto Baru Ke Galeri']);
        }

        return redirect()->route('admin.gallerys.index')->with(['success' => 'Berhasil Menambahkan Foto Baru Ke Galeri']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('access-gallery');

        $gallerys = Gallery::findOrFail($id);
        return view('admin.gallerys.index')->with([
            'gallerys' => $gallerys,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('access-gallery');

        $result = Gallery::findOrFail($id);
        return view('admin.gallerys.form')->with([
            'gallery' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('access-gallery');

        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('gallerys', 'public');
        }

        $gallery = $gallery->update($validated);

        if (!$gallery) {
            return back()->with(['error' => 'Gagal Memperbarui Foto Galeri']);
        }

        return redirect()->route('admin.gallerys.index')->with(['success' => 'Berhasil Memperbarui Foto Galeri']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('access-gallery');
        
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        if (!$gallery) {
            return back()->with(['error' => 'Gagal Menghapus Foto Galeri']);
        }

        return redirect()->route('admin.gallerys.index')->with(['success' => 'Berhasil Menghapus Foto Galeri']);
    }
}
