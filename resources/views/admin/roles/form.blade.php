@extends ('layouts.layout')

@section('title', isset($role) ? 'Edit Role' : 'Tambah Role')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">{{ isset($role) ? 'Edit' : 'Tambah' }} Role</h1>
        <div class="card shadow mb-4">
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                    @method(isset($role) ? 'PUT' : 'POST')
                    <div class="form-group">
                        <label>Nama Role</label>
                        <input type="text" name="name" id="role" class="form-control"
                            value="{{ old('name', isset($role) ? $role->name : '') }}" placeholder="Masukkan nama role">
                    </div>
                    <div class="form-group">
                        <label>Akses Role</label>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    <input type="hidden" name="role_access" value="0">
                                    <input type="checkbox" name="role_access" value="1" class="form-check-input"
                                        id="news_access"
                                        {{ isset($role) && isset($role->role_access) && $role->role_access == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role_access">Akses Role</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="hidden" name="news_access" value="0">
                                    <input type="checkbox" name="news_access" value="1" class="form-check-input"
                                        id="news_access"
                                        {{ isset($role) && isset($role->news_access) && $role->news_access == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="news_access">Akses Berita</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="hidden" name="about_us_access" value="0">
                                    <input type="checkbox" name="about_us_access" value="1" class="form-check-input"
                                        id="about_us_access"
                                        {{ isset($role) && isset($role->about_us_access) && $role->about_us_access == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="about_us_access">Akses Tentang Kami</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    <input type="hidden" name="users_access" value="0">
                                    <input type="checkbox" name="users_access" value="1" class="form-check-input"
                                        id="users_access"
                                        {{ isset($role) && isset($role->users_access) && $role->users_access == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="users_access">Akses User</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="hidden" name="slider_gallery_access" value="0">
                                    <input type="checkbox" name="slider_gallery_access" value="1"
                                        class="form-check-input" id="slider_gallery_access"
                                        {{ isset($role) && isset($role->slider_gallery_access) && $role->slider_gallery_access == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="slider_gallery_access">Akses Slider Galeri</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="hidden" name="gallery_access" value="0">
                                    <input type="checkbox" name="gallery_access" value="1" class="form-check-input"
                                        id="gallery_access"
                                        {{ isset($role) && isset($role->gallery_access) && $role->gallery_access == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="gallery_access">Akses Galeri</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check mb-2">
                                    <input type="hidden" name="contact_access" value="0">
                                    <input type="checkbox" name="contact_access" value="1" class="form-check-input"
                                        id="contact_access"
                                        {{ isset($role) && isset($role->contact_access) && $role->contact_access == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="contact_access">Akses Kontak</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input type="hidden" name="business_information_access" value="0">
                                    <input type="checkbox" name="business_information_access" value="1"
                                        class="form-check-input" id="business_information_access"
                                        {{ isset($role) && isset($role->business_information_access) && $role->business_information_access == 1 ? 'checked' : '' }}>
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
