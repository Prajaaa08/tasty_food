<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('created_at', 'desc')->get();

        return view('roles.index')->with([
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:roles,name',
            'news_access' => 'boolean',
            'menu_access' => 'boolean',
            'about_us_access' => 'boolean',
            'about_us_gallery_access' => 'boolean',
            'slider_gallery_access' => 'boolean',
            'users_access' => 'boolean',
            'gallery_access' => 'boolean',
            'contact_access' => 'boolean',
            'business_information_access' => 'boolean',
        ], [
            'name.required' => 'Nama role wajib diisi.',
            'name.unique' => 'Nama role sudah digunakan.',
            'name.max' => 'Nama role maksimal 255 karakter.',
        ]);

        $role = Role::create($validated);

        if (!$role) {
            return back()->with(['error', 'Gagal Membuat Role Baru']);
        }

        return redirect()->route('roles.index')->with(['success' => 'Berhasil Membuat Role Baru']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $result = Role::findOrFail($id);
        return view('roles.form')->with([
            'role' => $result,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name' => [
            'required',
            'string',
            'max:255',
            'unique:roles,name,' . $role->id,
            ],
            'news_access' => 'boolean',
            'menu_access' => 'boolean',
            'about_us_access' => 'boolean',
            'about_us_gallery_access' => 'boolean',
            'slider_gallery_access' => 'boolean',
            'users_access' => 'boolean',
            'gallery_access' => 'boolean',
            'contact_access' => 'boolean',
            'business_information_access' => 'boolean',
        ], [
            'name.required' => 'Nama role wajib diisi.',
            'name.unique' => 'Nama role sudah digunakan.',
            'name.max' => 'Nama role maksimal 255 karakter.',
        ]);

        $role = $role->update($validated);

        if (!$role) {
            return back()->with(['error' => 'Gagal Mengupdate Role']);
        }

        return redirect()->route('roles.index')->with(['success' => 'Berhasil Mengupdate Role']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        if (!$role) {
            return back()->with(['error' => 'Gagal Menghapus Role']);
        }
        return redirect()->route('roles.index')->with(['success' => 'Berhasil Menghapus Role']);
    }
}
