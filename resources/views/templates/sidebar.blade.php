<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ Request::is('/*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Roles -->
    @can('access-role')
        <div class="sidebar-heading">Roles</div>
        <li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles"
                aria-expanded="{{ Request::is('roles*') ? 'true' : 'false' }}" aria-controls="collapseRoles">
                <i class="fa-solid fa-user-shield"></i>
                <span>Roles</span>
            </a>
            <div id="collapseRoles" class="collapse {{ Request::is('roles*') ? 'show' : '' }}">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Request::is('roles') ? 'active' : '' }}" href="/roles">Data Role</a>
                    <a class="collapse-item {{ Request::is('roles/create') ? 'active' : '' }}" href="/roles/create">Form
                        Role</a>
                </div>
            </div>
        </li>
    @endcan

    <!-- Users -->
    @can('access-users')
        <div class="sidebar-heading">Users</div>
        <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                aria-expanded="{{ Request::is('users*') ? 'true' : 'false' }}" aria-controls="collapseUsers">
                <i class="fa-solid fa-users"></i>
                <span>Users</span>
            </a>
            <div id="collapseUsers" class="collapse {{ Request::is('users*') ? 'show' : '' }}">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Request::is('users') ? 'active' : '' }}" href="/users">Data User</a>
                    <a class="collapse-item {{ Request::is('users/create') ? 'active' : '' }}" href="/users/create">Form
                        User</a>
                </div>
            </div>
        </li>
    @endcan

    <!-- Sliders -->
    @can('access-slider-gallery')
        <div class="sidebar-heading">Sliders Gallery</div>
        <li class="nav-item {{ Request::is('sliders*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSliders"
                aria-expanded="{{ Request::is('sliders*') ? 'true' : 'false' }}" aria-controls="collapseSliders">
                <i class="fa-solid fa-photo-film"></i>
                <span>Sliders</span>
            </a>
            <div id="collapseSliders" class="collapse {{ Request::is('sliders*') ? 'show' : '' }}">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Request::is('sliders') ? 'active' : '' }}" href="/sliders">Data Slider</a>
                    <a class="collapse-item {{ Request::is('sliders/create') ? 'active' : '' }}"
                        href="/sliders/create">Form Slider</a>
                </div>
            </div>
        </li>
    @endcan

    <!-- Galeri -->
    @can('access-gallery')
        <div class="sidebar-heading">Galeri</div>
        <li class="nav-item {{ Request::is('gallerys*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsegallery"
                aria-expanded="{{ Request::is('gallerys*') ? 'true' : 'false' }}" aria-controls="collapsegallery">
                <i class="fas fa-images"></i>
                <span>Galeri</span>
            </a>
            <div id="collapsegallery" class="collapse {{ Request::is('gallerys*') ? 'show' : '' }}">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Request::is('gallerys') ? 'active' : '' }}" href="/gallerys">Data Foto
                        Galeri</a>
                    <a class="collapse-item {{ Request::is('gallerys/create') ? 'active' : '' }}"
                        href="/gallerys/create">Tambah Foto Galeri</a>
                </div>
            </div>
        </li>
    @endcan

    <!-- About Us -->
    @can('access-about-us')
        <div class="sidebar-heading">About Us</div>
        <li class="nav-item {{ Request::is('aboutUs') ? 'active' : '' }}">
            <a class="nav-link" href="/aboutUs">
                <i class="fas fa-envelope"></i>
                <span>Konten Tentang Kami</span>
            </a>
        </li>
    @endcan

    <!-- News -->
    @can('access-news')
        <div class="sidebar-heading">News</div>
        <li class="nav-item {{ Request::is('news*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenews"
                aria-expanded="{{ Request::is('news*') ? 'true' : 'false' }}" aria-controls="collapsenews">
                <i class="fas fa-newspaper"></i>
                <span>News</span>
            </a>
            <div id="collapsenews" class="collapse {{ Request::is('news*') ? 'show' : '' }}">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ Request::is('news') ? 'active' : '' }}" href="/news">Konten Berita</a>
                    <a class="collapse-item {{ Request::is('news/create') ? 'active' : '' }}" href="/news/create">Tambah
                        Berita</a>
                </div>
            </div>
        </li>
    @endcan

    <!-- Contacts -->
    @can('access-contact')
        <div class="sidebar-heading">Contacts</div>
        <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}">
            <a class="nav-link" href="/contacts">
                <i class="fas fa-envelope"></i>
                <span>Contacts</span>
            </a>
        </li>
    @endcan

    <!-- Profil Bisnis -->
    @can('access-business-information')
        <div class="sidebar-heading">Profil Bisnis</div>
        <li class="nav-item {{ Request::is('admin/business*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.business.edit') }}">
                <i class="fas fa-envelope"></i>
                <span>Profil Bisnis</span>
            </a>
        </li>
    @endcan

</ul>
