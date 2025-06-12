@extends ('layouts.layout')

@section('title', isset($menu) ? 'Edit Menu' : 'Tambah Menu')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ isset($menu) ? 'Edit' : 'Tambah' }} Menu</h1>
        <div class="card shadow mb-4">
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method(isset($menu) ? 'PUT' : 'POST')
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" id="menu" class="form-control">
                        @if (isset($menu) && $menu->photo)
                            <small class="form-text text-muted">Gambar sebelumnya. Kosongkan jika tidak ingin mengubah photo</small>
                            <img src="{{ asset('storage/' . $menu->photo) }}" width="150">
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Nama Makanan</label>
                        <input type="text" name="name" id="menu" class="form-control"
                            value="{{ old('name', isset($menu) ? $menu->name : '') }}" placeholder="Masukkan nama menu">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Makanan</label>
                        <input type="text" name="description" id="menu" class="form-control"
                            value="{{ old('description', isset($menu) ? $menu->description : '') }}"
                            placeholder="Masukkan deskripsi menu">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/menus') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>


@endsection
