<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="{{ asset('front/vendors/images/deskapp-logo.svg') }}" class="dark-logo" />
            <img src="{{ asset('front/vendors/images/deskapp-logo-white.svg') }}" class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
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
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span><span class="mtext">Jadwal Ujian</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a href="calendar.html" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span><span class="mtext">Calendar</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
