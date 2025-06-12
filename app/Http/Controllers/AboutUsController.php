<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutUs = AboutUs::orderBy('created_at', 'desc')->get();
        return view('aboutUs.index')->with([
            'aboutUs' => $aboutUs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('aboutUs.form')->with([
            'aboutUs' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => 'required|in:atas,tengah,bawah',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'position.required' => 'Posisi wajib dipilih.',
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa teks.',
        ]);

        $aboutUs= AboutUs::create([
            'position' => $validated['position'],
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        if (!$aboutUs) {
            return back()->with(['error' => 'Gagal Membuat About Us Baru']);
        }
        return redirect()->route('aboutUs.index')->with('success', 'About Us entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('aboutUs.index')->with([
            'aboutUs' => $aboutUs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('aboutUs.form')->with([
            'aboutUs' => $aboutUs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $aboutUs = AboutUs::findOrFail($id);

        $validated = $request->validate([
            'position' => 'required|in:atas,tengah,bawah',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'position.required' => 'Posisi wajib dipilih.',
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa teks.',
        ]);

        $aboutUs->update($validated);

        if (!$aboutUs) {
            return back()->with(['error' => 'Gagal Memperbarui About Us']);
        }
        return redirect()->route('aboutUs.index')->with('success', 'About Us entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->delete();

        if (!$aboutUs) {
            return back()->with(['error' => 'Gagal Menghapus About Us']);
        }
        return redirect()->route('aboutUs.index')->with('success', 'About Us entry deleted successfully.');
    }
}
