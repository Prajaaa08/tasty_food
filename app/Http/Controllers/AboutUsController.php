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
            'photo_kanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_kiri' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'position.required' => 'Posisi wajib dipilih.',
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa teks.',
            'photo_kanan.image' => 'Foto kanan harus berupa gambar.',
            'photo_kanan.mimes' => 'Foto kanan harus berupa file dengan format jpeg, png, jpg, gif, atau svg.',
            'photo_kanan.max' => 'Foto kanan maksimal 2MB.',
            'photo_kiri.image' => 'Foto kiri harus berupa gambar.',
            'photo_kiri.mimes' => 'Foto kiri harus berupa file dengan format jpeg, png, jpg, gif, atau svg.',
            'photo_kiri.max' => 'Foto kiri maksimal 2MB.',
        ]);

        $posisi = $validated['position'];
        $hasKiri = $request->hasFile('photo_kiri');
        $hasKanan = $request->hasFile('photo_kanan');

        if (in_array($posisi, ['atas', 'tengah'])) {
            if (!$hasKiri || !$hasKanan) {
                return back()->withInput()->withErrors([
                    'photo_kiri' => 'Kedua foto wajib diisi untuk posisi atas/tengah.',
                    'photo_kanan' => 'Kedua foto wajib diisi untuk posisi atas/tengah.',
                ]);
            }
        } elseif ($posisi === 'bawah') {
            if (!$hasKiri) {
                return back()->withInput()->withErrors([
                    'photo_kiri' => 'Foto kiri wajib diisi untuk posisi bawah.',
                ]);
            }

            if ($hasKanan) {
                return back()->withInput()->withErrors([
                    'photo_kanan' => 'Foto kanan tidak boleh diisi untuk posisi bawah.',
                ]);
            }
        }

        // Simpan foto jika ada
        $photoKiriPath = $hasKiri ? $request->file('photo_kiri')->store('about_us', 'public') : null;
        $photoKananPath = $hasKanan ? $request->file('photo_kanan')->store('about_us', 'public') : null;

        $aboutUs = AboutUs::create([
            'position' => $validated['position'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'photo_kiri' => $photoKiriPath,
            'photo_kanan' => $photoKananPath,
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
            'photo_kanan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo_kiri' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'position.required' => 'Posisi wajib dipilih.',
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa teks.',
            'photo_kanan.image' => 'Foto kanan harus berupa gambar.',
            'photo_kanan.mimes' => 'Foto kanan harus berupa file dengan format jpeg, png, jpg, gif, atau svg.',
            'photo_kanan.max' => 'Foto kanan maksimal 2MB.',
            'photo_kiri.image' => 'Foto kiri harus berupa gambar.',
            'photo_kiri.mimes' => 'Foto kiri harus berupa file dengan format jpeg, png, jpg, gif, atau svg.',
            'photo_kiri.max' => 'Foto kiri maksimal 2MB.',
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
