@extends ('layouts.layout')

@section('title', isset($aboutUs) ? 'Edit Konten' : 'Tambah Konten')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ isset($aboutUs) ? 'Edit' : 'Tambah' }} Konten</h1>
        <div class="card shadow mb-4">
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                    @method(isset($aboutUs) ? 'PUT' : 'POST')
                    <div class="form-group">
                        <label>Judul Konten</label>
                        <input type="text" name="title" id="aboutUs$aboutUs" class="form-control"
                            value="{{ old('title', isset($aboutUs) ? $aboutUs->title : '') }}"
                            placeholder="Masukkan Judul Konten">
                    </div>
                    <div class="form-group">
                        <label for="aboutUs{{ $aboutUs->id ?? '' }}">Isi Konten</label>
                        <textarea name="content" id="content" class="form-control" placeholder="Masukkan Isi Konten">
                            {{ old('content', $aboutUs->content ?? '') }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="position">Posisi</label>
                        <select name="position" id="position" class="form-control">
                            <option value="atas"
                                {{ old('position', $aboutUs->position ?? '') == 'atas' ? 'selected' : '' }}>Atas</option>
                            <option value="tengah"
                                {{ old('position', $aboutUs->position ?? '') == 'tengah' ? 'selected' : '' }}>Tengah
                            </option>
                            <option value="bawah"
                                {{ old('position', $aboutUs->position ?? '') == 'bawah' ? 'selected' : '' }}>Bawah</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/users') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>


@endsection
