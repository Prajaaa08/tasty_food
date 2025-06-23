@extends('components.header')
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('client/contact.css') }}">
@endpush
@section('title', 'KONTAK KAMI')

@section('content')

    <section class="contact-container">
        <h2>KONTAK KAMI</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
            @csrf
            <div class="form-two-column">
                <div class="form-left">
                    <input type="text" name="subject" placeholder="Subject" required>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-right">
                    <textarea name="message" placeholder="Message" required></textarea>
                </div>
            </div>
            <button type="submit">KIRIM</button>
        </form>

        <div class="contact-info">
            <div class="info-block">
                <div class="icon">✉️</div>
                <strong>EMAIL</strong>
                <p>{{ $info->email }}</p>
            </div>
            <div class="info-block">
                <div class="icon">📞</div>
                <strong>PHONE</strong>
                <p>{{ $info->phone }}</p>
            </div>
            <div class="info-block">
                <div class="icon">📍</div>
                <strong>LOCATION</strong>
                <p>{{ $info->location }}</p>
            </div>
        </div>
    </section>

    {{-- Map section dipisah --}}
    <section class="map-section">
        <div class="map-wrapper">
            <div class="map-responsive">
                <iframe
                    src="https://www.openstreetmap.org/export/embed.html?bbox={{ $info->longitude }},{{ $info->latitude }},{{ $info->longitude }},{{ $info->latitude }}&layer=mapnik&marker={{ $info->latitude }},{{ $info->longitude }}"
                    width="100%" height="300" frameborder="0" allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
        <script>
            var map = L.map('map').setView([{{ $info->latitude }}, {{ $info->longitude }}], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            L.marker([{{ $info->latitude }}, {{ $info->longitude }}]).addTo(map)
                .bindPopup("{{ $info->location }}")
                .openPopup();
        </script>
    @endpush
@endsection
