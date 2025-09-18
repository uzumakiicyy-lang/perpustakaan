<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">

        {{-- Ganti SVG lama dengan logo baru --}}
        <a href="{{ route('home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" width="32" height="32">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Litera Space</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Daftar Pengunjung -->
        <li class="menu-item">
             <a href="{{ route('buku.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-books"></i>
                <div>Daftar Buku</div>
            </a>
        </li>


        <!-- Pengunjung -->
        <li class="menu-item">
            <a href="{{ route('pengunjung.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-apps-off"></i>
                <div>Pengunjung</div>
            </a>
        </li>

        <!-- Admin -->
        <li class="menu-item">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-user-cog"></i>
                <div>Admin</div>
            </a>
        </li>

    </ul>
</aside>
