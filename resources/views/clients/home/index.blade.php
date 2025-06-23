<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food</title>
    <link rel="stylesheet" href="{{ asset('client/home.css') }}">
    <link rel="stylesheet" href="{{ asset('client/footer.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">TASTY FOOD</div>

            <div class="hamburger" onclick="toggleMenu()">
                &#9776;
            </div>

            <ul class="nav-links" id="navLinks">
                <li><a href="#">HOME</a></li>
                <li><a href="{{ route('about.index') }}">TENTANG</a></li>
                <li><a href="{{ route('berita.index')}}">BERITA</a></li>
                <li><a href="{{ route('gallery.index') }}">GALERI</a></li>
                <li><a href="{{ route('contact.index')}}">KONTAK</a></li>
            </ul>
            <script>
                function toggleMenu() {
                    document.getElementById("navLinks").classList.toggle("active");
                }
            </script>
            <img src="{{ asset('images/img-4.png') }}" alt="Tasty Food" class="hero-img">
        </nav>
        <div class="hero">
            <div class="hero-text">
                <hr>
                <h2>HEALTHY</h2>
                <h1>TASTY FOOD</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Est corrupti qui sequi. Numquam
                    reprehenderit possimus quo iure dolores molestiae accusantium voluptatum in tempore, qui quis
                    repellat dignissimos, alias, itaque distinctio!
                </p>
                <a href="#" class="btn">TENTANG KAMI</a>
            </div>
        </div>
    </header>
    {{-- <section class="about">
        <p class="about-title">
            TENTANG KAMI
        </p>
        <p class="about-text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero ducimus explicabo esse maiores, enim et aliquam iure, magni amet doloremque itaque molestias saepe voluptatem soluta facilis a consequuntur magnam perferendis!
        </p>
        <hr>
    </section> --}}
    <section class="tentang-kami">
        <h2 class="judul">TENTANG KAMI</h2>
        <p class="deskripsi">
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam
            convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit
            amet viverra ante.
        </p>
        <div class="garis"></div>
    </section>
    <section class="menu-section">
        <div class="menu-container">

            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="{{ asset('images/img-1.png') }}" alt="Food 1">
                </div>
                <div class="menu-card">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Phasellusornare, augue eu rutrum
                        commodo,</p>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="{{ asset('images/img-2.png') }}" alt="Food 2">
                </div>
                <div class="menu-card">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Phasellusornare, augue eu rutrum
                        commodo,</p>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="{{ asset('images/img-3.png') }}" alt="Food 3">
                </div>
                <div class="menu-card">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Phasellusornare, augue eu rutrum
                        commodo,</p>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-img-wrapper">
                    <img src="{{ asset('images/img-4.png') }}" alt="Food 4">
                </div>
                <div class="menu-card">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Phasellusornare, augue eu rutrum
                        commodo,</p>
                </div>
            </div>

        </div>
    </section>

    <section class="berita-section">
        <h2 class="berita-title">BERITA KAMI</h2>

        <div class="berita-wrapper">
            {{-- Kartu Besar di Kiri --}}
            <div class="berita-besar">
                <img src="{{ asset('storage/' . $beritaBesar->photo) }}" alt="Berita Besar">
                <div class="konten">
                    <h3>{{ $beritaBesar->title }}</h3>
                    <p>
                        {{ Str::limit($beritaBesar->content , 220) }}
                    </p>
                    <div class="button">
                        <a href="{{ $beritaBesar->slug }}" target="_blank" class="selengkapnya">Baca selengkapnya</a>
                        <a href=""><i class="fas fa-ellipsis dots"></i></a>
                    </div>
                </div>
            </div>

            {{-- 4 Kartu Kecil di Kanan --}}
            <div class="berita-kecil-wrapper">
                @foreach ($beritaKecil as $item)
                    <div class="berita-kecil">
                        <img src="{{ asset('storage/' . $item->photo) }}" alt="Berita Kecil">
                        <div class="konten">
                            <h4>{{ $item->title }}</h4>
                            <p>{{ Str::limit($item->content, 210) }}</p>
                            <div class="kecil">
                                <a href="{{ $item->slug }}" target="_blank" class="selengkapnya">Baca
                                    selengkapnya</a>
                                <a href=""><i class="fas fa-ellipsis dot"></i></a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="galeri">
        <h2 class="judul">GALERI KAMI</h2>
        <div class="galeri-grid">
            @foreach ($gallerys as $item)
                <div class="galeri-item">
                    <img src="{{ asset('storage/' . $item->photo) }}" alt="Galeri">
                </div>
            @endforeach
        </div>
        <div class="tombol-container">
            <a href="{{ route('gallery.index') }}" class="btn-lihat">LIHAT LEBIH BANYAK</a>
        </div>
    </section>
    @include('components.footer')
</body>

</html>
