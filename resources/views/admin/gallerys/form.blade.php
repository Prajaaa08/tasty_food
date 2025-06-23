@extends ('layouts.layout')

@section('title', isset($gallery) ? 'Edit Foto Galeri' : 'Tambah Foto Galeri')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ isset($gallery) ? 'Edit' : 'Tambah' }} Foto Galeri</h1>
        <div class="card shadow mb-4">
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method(isset($gallery) ? 'PUT' : 'POST')
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" id="gallery" class="form-control">
                        @if (isset($gallery) && $gallery->photo)
                            <small class="form-text text-muted">Gambar sebelumnya. Kosongkan jika tidak ingin mengubah photo</small>
                            <img src="{{ asset('storage/' . $gallery->photo) }}" width="150">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/gallerys') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>


@endsection
