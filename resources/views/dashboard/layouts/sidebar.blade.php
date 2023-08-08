<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Main</div>
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{ Request::is('dashboard/post*') ? 'active' : '' }}" href="/dashboard/post">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Postingan
                </a>
                <a class="nav-link {{ Request::is('dashboard/produk*') ? 'active' : '' }}" href="/dashboard/produk">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Produk
                </a>
                <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : '' }}" href="/dashboard/kategori">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Kategori
                </a>
                <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    User
                </a>
        </div>
    </nav>
</div>