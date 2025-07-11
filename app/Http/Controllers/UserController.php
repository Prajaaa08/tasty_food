<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Laravel\SerializableClosure\Attributes\Middleware;
// #[Middleware('auth')]
// #[Middleware(\App\Http\Middleware\RoleAccessMiddleware::class)]

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('access-users');

        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.users.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('access-users');

        $roles = Role::orderBy('created_at', 'desc')->get();

        return view('admin.users.form')->with([
            'roles' => $roles,
            'user' => null,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('access-users');

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role_id' => 'required|exists:roles,id',
        ], [
            'name.required' => 'Nama pengguna wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'role_id.required' => 'Role pengguna wajib dipilih.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role_id' => $validated['role_id'],
        ]);

        if (!$user) {
            return back()->with(['error', 'Gagal Membuat Pengguna Baru']);
        }

        return redirect()->route('admin.users.index')->with(['success' => 'Berhasil Membuat Pengguna Baru']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('access-users');

        $user = User::findOrFail($id);

        return view('admin.users.index')->with([
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('access-users');

        $roles = Role::orderBy('created_at', 'desc')->get();
        $user = User::findOrFail($id);

        return view('admin.users.form')->with([
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('access-users');

        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'role_id' => 'required|exists:roles,id',
        ], [
            'name.required' => 'Nama pengguna wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'role_id.required' => 'Role pengguna wajib dipilih.',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role_id = $validated['role_id'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        $user->save();

        return redirect()->route('admin.users.index')->with(['success' => 'Berhasil Memperbarui Pengguna']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('access-users');
        
        $user = User::findOrFail($id);

        if ($user->delete()) {
            return redirect()->route('admin.users.index')->with(['success' => 'Berhasil Menghapus Pengguna']);
        }

        return back()->with(['error' => 'Gagal Menghapus Pengguna']);
    }
}
