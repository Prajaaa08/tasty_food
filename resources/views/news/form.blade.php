@extends ('layouts.layout')

@section('title', isset($news) ? 'Edit Berita' : 'Tambah Berita')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ isset($news) ? 'Edit' : 'Tambah' }} Berita</h1>
        <div class="card shadow mb-4">
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method(isset($news) ? 'PUT' : 'POST')
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" id="news" class="form-control">
                        @if (isset($news) && $news->photo)
                            <small class="form-text text-muted">Gambar sebelumnya. Kosongkan jika tidak ingin mengubah photo</small>
                            <img src="{{ asset('storage/' . $news->photo) }}" width="150">
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" id="news" class="form-control"
                            value="{{ old('slug', isset($news) ? $news->slug : '') }}" placeholder="Masukkan URL berita">
                    </div>
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="title" id="news" class="form-control"
                            value="{{ old('title', isset($news) ? $news->title : '') }}" placeholder="Masukkan judul berita">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Berita</label>
                        <input type="text" name="content" id="news" class="form-control"
                            value="{{ old('content', isset($news) ? $news->content : '') }}"
                            placeholder="Masukkan deskripsi news">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/news') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>


@endsection
