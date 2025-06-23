@extends('components.header')
@push('styles')
    <link rel="stylesheet" href="{{ asset('client/galeri.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush
@section('title', 'GALERI KAMI')
@section('content')
    <section class="swiper-section">
        <div class="swiper galeri-slider">
            @if ($sliders->count())
                <div class="swiper-wrapper">
                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $slider->photo) }}" alt="Galeri Foto"
                                style="width: 100%; height: 60%; object-fit: cover;">
                        </div>
                    @endforeach
                </div>

                <!-- Navigasi -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            @else
                <div style="text-align: center; padding: 2rem;">
                    <p>Tidak ada foto slider.</p>
                </div>
            @endif
        </div>

    </section>
    <section class="galeri-foto-section">
        @if ($gallerys->count())
            <div class="galeri-grid" id="galeriGrid">
                @foreach ($gallerys as $index => $item)
                    <div class="galeri-item" style="{{ $index >= 12 ? 'display: none;' : '' }}">
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="Galeri Foto">
                    </div>
                @endforeach
            </div>

            @if ($gallerys->count() > 12)
                <div class="tombol-container" style="text-align: center; margin-top: 1rem;">
                    <button id="loadMoreBtn" class="btn-lihat">Tampilkan Lebih Banyak</button>
                    <button id="hideBtn" class="btn-lihat" style="display: none;">Sembunyikan Foto</button>
                </div>
            @endif
        @else
            <div style="text-align: center; padding: 2rem;">
                <p>Tidak ada foto galeri.</p>
            </div>
        @endif
    </section>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.galeri-slider', {
                loop: true,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
            });
        </script>

        <script>
            let currentShown = 12;
            const items = document.querySelectorAll('.galeri-item');
            const loadMoreBtn = document.getElementById('loadMoreBtn');
            const hideBtn = document.getElementById('hideBtn');

            loadMoreBtn.addEventListener('click', function() {
                let counter = 0;
                for (let i = currentShown; i < items.length && counter < 12; i++, counter++) {
                    items[i].style.display = 'block';
                }
                currentShown += counter;

                if (currentShown >= items.length) {
                    loadMoreBtn.style.display = 'none';
                }

                if (currentShown > 12) {
                    hideBtn.style.display = 'inline-block';
                }
            });

            hideBtn.addEventListener('click', function() {
                for (let i = 12; i < items.length; i++) {
                    items[i].style.display = 'none';
                }
                currentShown = 12;
                hideBtn.style.display = 'none';
                loadMoreBtn.style.display = 'inline-block';
            });
        </script>
    @endpush
@endsection
