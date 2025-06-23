<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Tasty Food')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('client/footer.css') }}">
    @stack('styles')

    {{-- <link rel="stylesheet" href="{{ asset('client/galeri.css') }}"> --}}
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        /* Hero Section */
        .galeri-hero {
            position: relative;
            background: url('/images/Group 70.png') no-repeat center center/cover;
            height: 60vh;
            color: white;
        }

        .galeri-hero .overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .galeri-hero .hero-content {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 2rem 3rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        nav ul {
            display: flex;
            gap: 1.5rem;
            list-style: none;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: 500;
            border-bottom: 2px solid transparent;
        }

        nav ul li a.active,
        nav ul li a:hover {
            border-bottom: 2px solid orange;
        }

        /* Judul Tengah */
        .judul-hero {
            position: relative;
            z-index: 2;
            padding-left: 3rem;
            margin-top: 5rem;
        }

        .judul-hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        /* Hamburger menu - default hidden */
        .hamburger {
            display: none;
            font-size: 2rem;
            cursor: pointer;
            z-index: 99;
            color: white;
        }

        /* Nav menu default (desktop) */
        .nav-menu ul {
            display: flex;
            gap: 1.5rem;
            list-style: none;
        }

        /* Saat menu dibuka */

        .nav-menu {
            display: flex;
            z-index: 2;
        }

        .judul-hero {
            position: relative;
            /* z-index: 2; */
            padding-left: 3rem;
            margin-top: 5rem;
            max-width: 60%;
        }

        .judul-hero h1 {
            font-size: 3rem;
            font-weight: bold;
            line-height: 1.2;
            max-width: 100%;
            word-break: break-word;
        }

        /* RESPONSIF */
        @media screen and (max-width: 768px) {
            .judul-hero {
                padding-left: 1.5rem;
                margin-top: 3rem;
            }

            .judul-hero h1 {
                font-size: 2rem;
            }
        }

        @media screen and (max-width: 480px) {
            .judul-hero h1 {
                font-size: 1.5rem;
            }
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            .hamburger {
                display: block;
                /* position: absolute; */
                margin-left: 10rem;
            }

            .nav-menu ul {
                display: none;
                flex-direction: column;
                background-color: rgba(0, 0, 0, 0.8);
                position: absolute;
                top: 70px;
                right: 3rem;
                padding: 1rem;
                border-radius: 10px;
            }

            .nav-menu ul.show {
                display: flex;
            }

            nav ul li a {
                color: white;
            }
        }
    </style>
</head>

<body>

    <section class="galeri-hero">
        <div class="overlay"></div>

        <!-- Kiri: Logo, Kanan: Navbar -->
        <div class="hero-content">
            <div class="logo">TASTY FOOD</div>
            <div class="hamburger" onclick="toggleMenu()">☰</div>

            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ route('home.index')}}" class="{{ request()->is('/') ? 'active' : '' }}">HOME</a></li>
                    <li><a href="{{ route('about.index') }}" class="{{ request()->is('about*') ? 'active' : '' }}">TENTANG</a></li>
                    <li><a href="{{ route('berita.index') }}" class="{{ request()->is('berita*') ? 'active' : '' }}">BERITA</a></li>
                    <li><a href="{{ route('contact.index')}}" class="{{ request()->is('contact*') ? 'active' : '' }}">KONTAK</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="{{ request()->is('gallery*') ? 'active' : '' }}">GALERI</a></li>
                </ul>
            </nav>
        </div>
        <!-- Judul Besar -->
        <div class="judul-hero">
            <h1>@yield('title', 'Tasty Food')</h1>
        </div>
    </section>
    <section>
        @yield('content')
    </section>

    {{-- Footer --}}
    @include('components.footer')

    <!-- Swiper JS -->
    @stack('scripts')
    <script>
        function toggleMenu() {
            document.querySelector('.nav-menu ul').classList.toggle('show');
        }
    </script>

</body>

</html>
