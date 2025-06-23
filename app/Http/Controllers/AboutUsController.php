<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('access-about-us');

        $aboutUs = AboutUs::orderBy('created_at', 'desc')->get();
        return view('admin.aboutUs.index')->with([
            'aboutUs' => $aboutUs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('access-about-us');

        return view('admin.aboutUs.form')->with([
            'aboutUs' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('access-about-us');

        $validated = $request->validate([
            'position' => 'required|in:atas,tengah,bawah',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'photo_kanan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'photo_kiri' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ], [
            'position.required' => 'Posisi wajib dipilih.',
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa teks.',
            'photo_kanan.image' => 'Foto kanan harus berupa gambar.',
            'photo_kanan.mimes' => 'Foto kanan harus berupa file dengan format jpeg, png, jpg, gif, atau svg.',
            'photo_kanan.max' => 'Foto kanan maksimal 10MB.',
            'photo_kiri.image' => 'Foto kiri harus berupa gambar.',
            'photo_kiri.mimes' => 'Foto kiri harus berupa file dengan format jpeg, png, jpg, gif, atau svg.',
            'photo_kiri.max' => 'Foto kiri maksimal 10MB.',
        ]);

        $aboutUs = AboutUs::create([
            'position' => $validated['position'],
            'title' => $validated['title'],
            'content' => $validated['content'],
            'photo_kiri' => $request->file('photo_kiri')?->store('about_us', 'public'),
            'photo_kanan' => $request->file('photo_kanan')?->store('about_us', 'public'),
        ]);

        if (!$aboutUs) {
            return back()->with(['error' => 'Gagal Membuat About Us Baru']);
        }

        return redirect()->route('admin.aboutUs.index')->with('success', 'About Us entry created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('access-about-us');

        $aboutUs = AboutUs::findOrFail($id);
        return view('admin.aboutUs.index')->with([
            'aboutUs' => $aboutUs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('access-about-us');

        $aboutUs = AboutUs::findOrFail($id);
        return view('admin.aboutUs.form')->with([
            'aboutUs' => $aboutUs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('access-about-us');

        $aboutUs = AboutUs::findOrFail($id);

        $validated = $request->validate([
            'position' => 'required|in:atas,tengah,bawah',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'photo_kanan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'photo_kiri' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ], [
            'position.required' => 'Posisi wajib dipilih.',
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul maksimal 255 karakter.',
            'content.required' => 'Konten wajib diisi.',
            'content.string' => 'Konten harus berupa teks.',
            'photo_kanan.image' => 'Foto kanan harus berupa gambar.',
            'photo_kanan.mimes' => 'Foto kanan harus berupa file dengan format jpeg, png, jpg, gif, atau svg.',
            'photo_kanan.max' => 'Foto kanan maksimal 10MB.',
            'photo_kiri.image' => 'Foto kiri harus berupa gambar.',
            'photo_kiri.mimes' => 'Foto kiri harus berupa file dengan format jpeg, png, jpg, gif, atau svg.',
            'photo_kiri.max' => 'Foto kiri maksimal 10MB.',
        ]);

        $aboutUs->update($validated);
        // Photo kiri
        if ($request->hasFile('photo_kiri')) {
            // Optional: hapus lama dulu
            if ($aboutUs->photo_kiri && Storage::disk('public')->exists($aboutUs->photo_kiri)) {
                Storage::disk('public')->delete($aboutUs->photo_kiri);
            }

            $aboutUs->photo_kiri = $request->file('photo_kiri')->store('about_us', 'public');
        }

        // Photo kanan
        if ($request->hasFile('photo_kanan')) {
            if ($aboutUs->photo_kanan && Storage::disk('public')->exists($aboutUs->photo_kanan)) {
                Storage::disk('public')->delete($aboutUs->photo_kanan);
            }

            $aboutUs->photo_kanan = $request->file('photo_kanan')->store('about_us', 'public');
        }
        $aboutUs->save();

        if (!$aboutUs) {
            return back()->with(['error' => 'Gagal Memperbarui About Us']);
        }
        return redirect()->route('admin.aboutUs.index')->with('success', 'About Us entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('access-about-us');
        
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->delete();

        if (!$aboutUs) {
            return back()->with(['error' => 'Gagal Menghapus About Us']);
        }
        return redirect()->route('admin.aboutUs.index')->with('success', 'About Us entry deleted successfully.');
    }
    public function deletePhoto($id, $side)
    {
        $aboutUs = AboutUs::findOrFail($id);

        if ($side === 'kiri' && $aboutUs->photo_kiri) {
            Storage::disk('public')->delete($aboutUs->photo_kiri);
            $aboutUs->photo_kiri = null;
        }

        if ($side === 'kanan' && $aboutUs->photo_kanan) {
            Storage::disk('public')->delete($aboutUs->photo_kanan);
            $aboutUs->photo_kanan = null;
        }

        $aboutUs->save();

        return back()->with('success', 'Foto berhasil dihapus.');
    }

}
