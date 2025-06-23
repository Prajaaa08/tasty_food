@extends ('layouts.layout')

@section('title', isset($slider) ? 'Edit Foto Slider' : 'Tambah Foto Slider')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ isset($slider) ? 'Edit' : 'Tambah' }} Foto Slider</h1>
        <div class="card shadow mb-4">
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method(isset($slider) ? 'PUT' : 'POST')
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" id="slider$slider" class="form-control">
                        @if (isset($slider) && $slider->photo)
                            <small class="form-text text-muted">Gambar sebelumnya. Kosongkan jika tidak ingin mengubah photo</small>
                            <img src="{{ asset('storage/' . $slider->photo) }}" width="150">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/sliders') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>


@endsection
