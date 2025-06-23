@extends ('layouts.layout')

@section('title', isset($user) ? 'Edit User' : 'Tambah User')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ isset($user) ? 'Edit' : 'Tambah' }} User</h1>
        <div class="card shadow mb-4">
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                    @method(isset($user) ? 'PUT' : 'POST')
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="name" id="user" class="form-control"
                            value="{{ old('name', isset($user) ? $user->name : '') }}" placeholder="Masukkan nama user">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="user" class="form-control"
                            value="{{ old('email', isset($user) ? $user->email : '') }}" placeholder="Masukkan email user">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" id="user" class="form-control"
                            value="" placeholder="Masukkan password user">
                            @if (isset($user))
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id" id="user" class="form-control">
                            <option value="">Pilih Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ isset($user) && $user->role_id == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/users') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>


@endsection
