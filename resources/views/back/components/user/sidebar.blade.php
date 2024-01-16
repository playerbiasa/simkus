<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="{{ asset('front/vendors/images/deskapp-logo.svg') }}" class="dark-logo" alt="logo" />
            <img src="{{ asset('front/vendors/images/deskapp-logo-white.svg') }}" class="light-logo" alt="logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                @if (Auth::guard('mahasiswa')->check())
                    <li>
                        <a href="/layanan/dashboard" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-house"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon bi bi-textarea-resize"></span><span class="mtext">Skripsi</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/layanan/sempro">Seminar Proposal</a></li>
                            <li><a href="/layanan/skripsi">Sidang Skripsi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('layanan.sempro.jadwal') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Jadwal Ujian</span>
                        </a>
                    </li>
                @elseif (Auth::guard('dosen')->check())
                    <li>
                        <a href="{{ route('dosen.dashboard') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-house"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dosen.sempro') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Seminar Proposal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dosen.skripsi') }}" class="dropdown-toggle no-arrow">
                            <span class="micon bi bi-calendar4-week"></span><span class="mtext">Sidang Skripsi</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
