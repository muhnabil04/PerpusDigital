<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        @if (Auth::user()->role === 'petugas')
            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.buku.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Data Buku</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.kategori.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Kategori Buku</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
            <a class="nav-link collapsed" href="{{ route('admin.buku.riwayat') }}">
                <i class="bi bi-people"></i>
                <span>Riwayat Peminjaman</span>
            </a>
        @endif

        @if (Auth::user()->role === 'admin')
            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.buku.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Data Buku</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.kategori.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Kategori Buku</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('user.index') }}">
                    <i class="bi bi-people"></i>
                    <span>User Manajemen</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
            <a class="nav-link collapsed" href="{{ route('admin.buku.riwayat') }}">
                <i class="bi bi-people"></i>
                <span>Riwayat Peminjaman</span>
            </a>
            </li><!-- End F.A.Q Page Nav -->
        @endif

        @if (Auth::user()->role === 'peminjam')
            <li class="nav-heading">Pages</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('peminjam.buku.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Pinjam Buku</span>
                </a>
                <a class="nav-link collapsed" href="{{ route('peminjam.buku.peminjam') }}">
                    <i class="bi bi-book"></i>
                    <span>Pinjaman Buku</span>
                </a>
                <a class="nav-link collapsed" href="{{ route('peminjam.koleksi.index') }}">
                    <i class="bi bi-book"></i>
                    <span>Koleksi Buku</span>
                </a>
            </li><!-- End Profile Page Nav -->
        @endif

    </ul>

</aside><!-- End Sidebar-->
