@extends('components.header')
@push('styles')
    <link rel="stylesheet" href="{{ asset('client/berita.css') }}">
    <!-- Swiper CSS -->
@endpush
@section('title', 'BERITA KAMI')
@section('content')
    <section class="berita-section">
        <div class="berita-container">
            @if ($beritaBesar)
                <div class="berita-image">
                    <img src="{{ asset('storage/' . $beritaBesar->photo) }}" alt="Makanan Khas Nusantara">
                </div>
                <div class="berita-content">
                    <h2>{{ $beritaBesar->title }}</h2>

                    <div class="berita-text-scroll">
                        <p>{{ $beritaBesar->content }}</p>
                    </div>
                    <a href="{{ $beritaBesar->slug }}" target="_blank" class="berita-button">Baca Selengkapnya</a>
                </div>
            @else
                <p style="text-align: center; padding: 20px;">Tidak ada berita utama yang tersedia.</p>
            @endif
        </div>
    </section>

    <section class="berita-lainnya-section">
        <h2>Berita Lainnya</h2>
        <div class="berita-grid">
            @forelse ($beritaKecil as $item)
                <div class="berita-card">
                    <img src="{{ asset('storage/' . $item->photo) }}" alt="Berita Gambar">
                    <div class="card-body">
                        <h3>{{ $item->title }}</h3>
                        <p>{{ $item->content }}</p>
                        <div class="card-footer">
                            <a href="{{ $item->slug }}" class="card-link">Baca selengkapnya</a>
                            <span class="card-icon">⋯</span>
                        </div>
                    </div>
                </div>
            @empty
                <p style="text-align: center; padding: 20px;">Tidak ada berita lain yang tersedia.</p>
            @endforelse
        </div>
    </section>
@endsection

