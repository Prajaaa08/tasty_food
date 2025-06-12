@extends ('layouts.layout')

@section('title', isset($role) ? 'Edit Role' : 'Tambah Role')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ isset($role) ? 'Edit' : 'Tambah' }} Role</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" id="user-form" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nama Role</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Akses Role</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="news_access" class="news_access form-check-input"
                                        id="news_access">
                                    <label class="form-check-label" for="news_access">Akses Berita</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="menu_access" class="menu_access form-check-input"
                                        id="menu_access">
                                    <label class="form-check-label" for="menu_access">Akses Menu</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="about_us_access" class="about_us_access form-check-input"
                                        id="about_us_access">
                                    <label class="form-check-label" for="about_us_access">Akses Tentang Kami</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="about_us_gallery_access"
                                        class="about_us_gallery_access form-check-input" id="about_us_gallery_access">
                                    <label class="form-check-label" for="about_us_gallery_access">Akses Galeri Tentang
                                        Kami</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="users_access" class="users_access form-check-input"
                                        id="users_access">
                                    <label class="form-check-label" for="users_access">Akses User</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="slider_gallery_access"
                                        class="slider_gallery_access form-check-input" id="slider_gallery_access">
                                    <label class="form-check-label" for="slider_gallery_access">Akses Slider Galeri</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="gallery_access" class="gallery_access form-check-input"
                                        id="gallery_access">
                                    <label class="form-check-label" for="gallery_access">Akses Galeri</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="contact_access" class="contact_access form-check-input"
                                        id="contact_access">
                                    <label class="form-check-label" for="contact_access">Akses Kontak</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="checkbox" name="business_information_access"
                                        class="business_information_access form-check-input"
                                        id="business_information_access">
                                    <label class="form-check-label" for="business_information_access">Akses Bisnis
                                        Informasi</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ url('/roles') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
