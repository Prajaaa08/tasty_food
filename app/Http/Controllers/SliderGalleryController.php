<?php

namespace App\Http\Controllers;

use App\Models\SliderGallery;
use Illuminate\Http\Request;

class SliderGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = SliderGallery::orderBy('created_at', 'desc')->get();
        return view('sliders.index')->with([
            'sliders' => $sliders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sliders.form')->with([
            'sliders' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'photo.required' => 'Foto slider wajib diisi.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $slider = SliderGallery::create([
            'photo' => $request->file('photo')->store('sliders', 'public'),
        ]);

        if (!$slider) {
            return back()->with(['error' => 'Gagal Membuat Slider Baru']);
        }

        return redirect()->route('sliders.index')->with(['success' => 'Berhasil Membuat Slider Baru']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sliders = SliderGallery::findOrFail($id);
        return view('sliders.index')->with([
            'sliders' => $sliders,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result = SliderGallery::findOrFail($id);
        return view('sliders.form')->with([
            'slider' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = SliderGallery::findOrFail($id);

        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('sliders', 'public');
        }

        $slider = $slider->update($validated);

        if (!$slider) {
            return back()->with(['error' => 'Gagal Memperbarui Slider']);
        }

        return redirect()->route('sliders.index')->with(['success' => 'Berhasil Memperbarui Slider']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = SliderGallery::findOrFail($id);
        $slider->delete();

        if (!$slider) {
            return back()->with(['error' => 'Gagal Menghapus Slider']);
        }

        return redirect()->route('sliders.index')->with(['success' => 'Berhasil Menghapus Slider']);
    }
}
