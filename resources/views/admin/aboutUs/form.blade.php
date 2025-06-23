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
                <form action="{{ isset($aboutUs) ? route('admin.aboutUs.update', $aboutUs->id) : route('admin.aboutUs.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method(isset($aboutUs) ? 'PUT' : 'POST')

                    <!-- Photo Kanan -->
                    <div class="form-group">
                        <label>Photo Kanan</label>
                        <input type="file" name="photo_kanan" id="photo_kanan" class="form-control">

                        @if (isset($aboutUs) && $aboutUs->photo_kanan)
                            <small class="form-text text-muted">Gambar sebelumnya. Kosongkan jika tidak ingin mengubah
                                photo.</small>
                            <div style="margin-top: 10px;">
                                <img src="{{ asset('storage/' . $aboutUs->photo_kanan) }}" width="150"
                                    style="display:block; margin-bottom: 5px;">
                            </div>
                        @endif
                    </div>

                    <!-- Photo Kiri -->
                    <div class="form-group">
                        <label>Photo Kiri</label>
                        <input type="file" name="photo_kiri" id="photo_kiri" class="form-control">

                        @if (isset($aboutUs) && $aboutUs->photo_kiri)
                            <small class="form-text text-muted">Gambar sebelumnya. Kosongkan jika tidak ingin mengubah
                                photo.</small>
                            <div style="margin-top: 10px;">
                                <img src="{{ asset('storage/' . $aboutUs->photo_kiri) }}" width="150"
                                    style="display:block; margin-bottom: 5px;">
                            </div>
                        @endif
                    </div>

                    <!-- Judul Konten -->
                    <div class="form-group">
                        <label>Judul Konten</label>
                        <input type="text" name="title" id="aboutUs$aboutUs" class="form-control"
                            value="{{ old('title', isset($aboutUs) ? $aboutUs->title : '') }}"
                            placeholder="Masukkan Judul Konten">
                    </div>

                    <!-- Isi Konten -->
                    <div class="form-group">
                        <label for="aboutUs{{ $aboutUs->id ?? '' }}">Isi Konten</label>
                        <textarea name="content" id="content" class="form-control" placeholder="Masukkan Isi Konten">{{ old('content', $aboutUs->content ?? '') }}</textarea>
                    </div>

                    <!-- Posisi -->
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

                    <!-- Tombol -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/aboutUs') }}" class="btn btn-secondary">Batal</a>
                </form>

                <!-- Form Hapus Foto Kanan -->
                @if (isset($aboutUs) && $aboutUs->photo_kanan)
                    <form action="{{ route('admin.aboutUs.deletePhoto', ['id' => $aboutUs->id, 'side' => 'kanan']) }}"
                        method="POST" onsubmit="return confirm('Yakin hapus foto kanan?')" style="margin-top: 10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus Foto Kanan</button>
                    </form>
                @endif

                <!-- Form Hapus Foto Kiri -->
                @if (isset($aboutUs) && $aboutUs->photo_kiri)
                    <form action="{{ route('admin.aboutUs.deletePhoto', ['id' => $aboutUs->id, 'side' => 'kiri']) }}"
                        method="POST" onsubmit="return confirm('Yakin hapus foto kiri?')" style="margin-top: 10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus Foto Kiri</button>
                    </form>
                @endif



                {{-- <div class="form-group">
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
                        <option value="atas" {{ old('position', $aboutUs->position ?? '') == 'atas' ? 'selected' : '' }}>
                            Atas</option>
                        <option value="tengah"
                            {{ old('position', $aboutUs->position ?? '') == 'tengah' ? 'selected' : '' }}>Tengah
                        </option>
                        <option value="bawah"
                            {{ old('position', $aboutUs->position ?? '') == 'bawah' ? 'selected' : '' }}>Bawah</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>

                <a href="{{ url('/aboutUs') }}" class="btn btn-secondary">Batal</a> --}}
                </form>
            </div>
        </div>
    </div>


@endsection
