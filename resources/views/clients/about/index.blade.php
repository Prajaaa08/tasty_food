@extends('components.header')
@push('styles')
    <link rel="stylesheet" href="{{ asset('client/about.css') }}">
@endpush
@section('title', 'TENTANG KAMI')
@section('content')
    {{-- <section class="tasty-food-section">
        <div class="container">
            <div class="tasty-food-grid">
                @if ($about_atas)
                    <div class="content">
                        <h2>{{ $about_atas->title }}</h2>
                        <p class="desc">
                            {{ $about_atas->content }}
                        </p>
                    </div>
                    <div
                        class="about-atas-wrapper {{ empty($about_atas->photo_kiri) ? 'no-photo' : '' }} {{ empty($about_atas->photo_kanan) ? 'no-photo' : '' }}">
                        @if ($about_atas->photo_kiri || $about_atas->photo_kanan)
                            <div class="images-grid">
                                @if ($about_atas->photo_kiri)
                                    <div class="image-item large-image">
                                        <img src="{{ asset('storage/' . $about_atas->photo_kiri) }}" alt="Foto Kiri">
                                    </div>
                                @endif
                                @if ($about_atas->photo_kanan)
                                    <div class="image-item large-image">
                                        <img src="{{ asset('storage/' . $about_atas->photo_kanan) }}" alt="Foto Kanan">
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section> --}}
    <section class="tasty-food-section">
        <div class="container">
            @if ($about_atas)
                <div
                    class="tasty-food-grid {{ empty($about_atas->photo_kiri) && empty($about_atas->photo_kanan) ? 'no-photo' : '' }}">
                    <div class="content">
                        <h2>{{ $about_atas->title }}</h2>
                        <p class="desc">
                            {{ $about_atas->content }}
                        </p>
                    </div>

                    @php
                        $hasKiri = $about_atas->photo_kiri;
                        $hasKanan = $about_atas->photo_kanan;
                    @endphp

                    @if ($hasKiri || $hasKanan)
                        <div class="images-grid {{ ($hasKiri xor $hasKanan) ? 'single' : 'double' }}">
                            @if ($hasKiri)
                                <div class="image-item">
                                    <img src="{{ asset('storage/' . $hasKiri) }}" alt="Foto Kiri">
                                </div>
                            @endif
                            @if ($hasKanan)
                                <div class="image-item">
                                    <img src="{{ asset('storage/' . $hasKanan) }}" alt="Foto Kanan">
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <!-- Food Showcase Section -->
    <section class="food-showcase-section">
        <div class="container">
            {{-- TENGAH --}}
            {{-- TENGAH --}}
            @if ($about_tengah)
                <section class="tasty-food-section2">
                    <div class="container">
                        <div
                            class="tasty-food-grid align-center {{ empty($about_tengah->photo_kiri) && empty($about_tengah->photo_kanan) ? 'no-photo' : '' }}">

                            @php
                                $hasKiri = $about_tengah->photo_kiri;
                                $hasKanan = $about_tengah->photo_kanan;
                            @endphp

                            {{-- Gambar di kiri --}}
                            @if ($hasKiri || $hasKanan)
                                <div class="images-grid {{ ($hasKiri xor $hasKanan) ? 'single' : 'double' }}">
                                    @if ($hasKiri)
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . $hasKiri) }}" alt="Foto Kiri">
                                        </div>
                                    @endif
                                    @if ($hasKanan)
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . $hasKanan) }}" alt="Foto Kanan">
                                        </div>
                                    @endif
                                </div>
                            @endif

                            {{-- Teks di kanan --}}
                            <div class="content">
                                <h2>{{ $about_tengah->title }}</h2>
                                <p class="desc">
                                    {{ $about_tengah->content }}
                                </p>
                            </div>

                        </div>
                    </div>
                </section>
            @endif
            
            {{-- BAWAH --}}
            @if ($about_bawah)
                <section class="tasty-food-section2">
                    <div class="container">
                        <div
                            class="tasty-food-grid align-bottom {{ empty($about_bawah->photo_kiri) && empty($about_bawah->photo_kanan) ? 'no-photo' : '' }}">
                            <div class="content">
                                <h2>{{ $about_bawah->title }}</h2>
                                <p class="desc">
                                    {{ $about_bawah->content }}
                                </p>
                            </div>

                            @php
                                $hasKiri = $about_bawah->photo_kiri;
                                $hasKanan = $about_bawah->photo_kanan;
                            @endphp

                            @if ($hasKiri || $hasKanan)
                                <div class="images-grid {{ ($hasKiri xor $hasKanan) ? 'single' : 'double' }}">
                                    @if ($hasKiri)
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . $hasKiri) }}" alt="Foto Kiri">
                                        </div>
                                    @endif
                                    @if ($hasKanan)
                                        <div class="image-item">
                                            <img src="{{ asset('storage/' . $hasKanan) }}" alt="Foto Kanan">
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </section>

@endsection
