@extends('layouts.layout')

@section('title', 'Edit Informasi Bisnis')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Informasi Bisnis</h1>
        <div class="card shadow mb-4">
            <div class="mr-4 ml-4 mt-4 mb-0">
                @include('layouts.feedback')
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.business.update') }}">
                    @csrf

                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $info->phone) }}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $info->email) }}">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="location" id="location" class="form-control"
                            value="{{ old('location', $info->location) }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Lokasi Peta</label>
                        <div id="map" style="height: 300px;"></div>
                        <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $info->latitude) }}">
                        <input type="hidden" name="longitude" id="longitude"
                            value="{{ old('longitude', $info->longitude) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Leaflet JS + CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const lat = {{ $info->latitude ?? -6.2 }};
        const lng = {{ $info->longitude ?? 106.8 }};

        const map = L.map('map').setView([lat, lng], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        const marker = L.marker([lat, lng], {
            draggable: true
        }).addTo(map);

        // Set input & reverse geocode
        function updateLocation(lat, lng) {
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;

            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('location').value = data.display_name || '';
                })
                .catch(err => {
                    console.warn('Gagal mengambil alamat:', err);
                    document.getElementById('location').value = '';
                });
        }

        // Saat marker digeser
        marker.on('dragend', function(e) {
            const {
                lat,
                lng
            } = marker.getLatLng();
            updateLocation(lat, lng);
        });

        // Saat klik map
        map.on('click', function(e) {
            const {
                lat,
                lng
            } = e.latlng;
            marker.setLatLng([lat, lng]);
            updateLocation(lat, lng);
        });

        // Auto ambil lokasi saat halaman dibuka
        updateLocation(lat, lng);
    </script>
@endsection
