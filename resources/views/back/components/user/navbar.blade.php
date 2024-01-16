<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
        <div class="header-search">
            <form>
                <div class="form-group mb-0">
                    <i class="dw dw-search2 search-icon"></i>
                    <input type="text" class="form-control search-input" placeholder="Search Here" />
                    <div class="dropdown">
                        <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                            <i class="ion-arrow-down-c"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control form-control-sm form-control-line" type="text" />
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="header-right">
        <div class="user-notification">
            <div class="dropdown">
                <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                    <i class="icon-copy dw dw-notification"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="notification-list mx-h-350 customscroll">
                        <ul></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ asset('front/src/images/photo2.jpg') }}" alt="" />
                    </span>
                    <span class="user-name">{{ Auth::user()->nama }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a>
                    @if (Auth::guard('mahasiswa')->check())
                        <a class="dropdown-item" href="{{ route('layanan.layanan-logout-handler') }}"
                            onclick="event.preventDefault();document.getElementById('layananLogout').submit();"><i
                                class="dw dw-logout"></i> Log Out</a>
                        <form action="{{ route('layanan.layanan-logout-handler') }}" id="layananLogout" method="POST">
                            @csrf
                        </form>
                    @elseif (Auth::guard('dosen')->check())
                        <a class="dropdown-item" href="{{ route('dosen.logout-handler') }}"
                            onclick="event.preventDefault();document.getElementById('dosenLogout').submit();"><i
                                class="dw dw-logout"></i> Log Out</a>
                        <form action="{{ route('dosen.logout-handler') }}" id="dosenLogout" method="POST">@csrf
                        </form>
                    @endif


                    {{-- logout dosen --}}

                </div>
            </div>
        </div>
    </div>
</div>
