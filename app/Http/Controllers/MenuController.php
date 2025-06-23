<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('created_at', 'desc')->get();

        return view('menus.index')->with([
            'menus' => $menus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */ 
    public function create()
    {
        return view('menus.form')->with([
            'menu' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_by' => 'nullable|exists:users,id',
        ], [
            'photo.required' => 'Foto menu wajib diisi.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
            'name.required' => 'Nama menu wajib diisi.',
            'name.max' => 'Nama menu maksimal 255 karakter.',
        ]);

        $menu = Menu::create([
            'photo' => $request->file('photo')->store('menus', 'public'),
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'created_by' => auth()->user()->id,
        ]);

        if (!$menu) {
            return back()->with(['error' => 'Gagal Membuat Menu Baru']);
        }
        return redirect()->route('menus.index')->with(['success' => 'Berhasil Membuat Menu Baru']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.index')->with([
            'menu' => $menu,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.form')->with([
            'menu' => $menu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menu = Menu::findOrFail($id);

        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ], [
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'photo.max' => 'Ukuran gambar maksimal 2MB.',
            'name.required' => 'Nama menu wajib diisi.',
            'name.max' => 'Nama menu maksimal 255 karakter.',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('menus', 'public');
        } else {
            unset($validated['photo']);
        }

        $menu->update($validated);

        if (!$menu) {
            return back()->with(['error' => 'Gagal Memperbarui Menu']);
        }
        return redirect()->route('menus.index')->with(['success' => 'Berhasil Memperbarui Menu']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        if (!$menu->delete()) {
            return back()->with(['error' => 'Gagal Menghapus Menu']);
        }
        return redirect()->route('menus.index')->with(['success' => 'Berhasil Menghapus Menu']);
    }
}
