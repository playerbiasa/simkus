<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="{{ route('admin.home') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Administrasi</li>
            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Pengajuan Surat</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Keterangan Aktif Kuliah</a></li>
                    <li><a class="nav-link" href="#">Dispensasi Pembayaran</a></li>
                    <li><a class="nav-link" href="#">Observasi Matakuliah</a></li>
                    <li><a class="nav-link" href="#">Observasi Skripsi</a></li>
                    <li><a class="nav-link" href="#">Penelitian Skripsi</a></li>
                </ul>
            </li> --}}
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Skripsi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.sempro.index') }}">Seminar Proposal</a></li>
                    <li><a class="nav-link" href="#">Sidang Skripsi</a></li>
                </ul>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i>
                    <span>Civitas Akademik</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.dosen.pimpinan') }}">Pimpinan</a></li>
                    <li><a class="nav-link" href="{{ route('admin.dosen.index') }}">Dosen</a></li>
                    <li><a class="nav-link" href="{{ route('admin.mhs.index') }}">Mahasiswa</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="/admin/prodi"><i class="fas fa-map-signs"></i>
                    <span>Program Studi</span></a></li>
            <li class="menu-header">Settings</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i>
                    <span>Setting</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="#">Profile</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
