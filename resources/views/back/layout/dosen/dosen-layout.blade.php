<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Dosen | Login</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendors/styles/core.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendors/styles/style.min.css') }}" />
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="/">
                    <img src="{{ asset('front/src/images/deskapp-logo.svg') }}">
                </a>
            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="/">Kembali</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('front/vendors/images/login-page-img.png') }}">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Login Kaprodi</h2>
                        </div>
                        @if (Session::get('fail'))
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                {{ Session::get('fail') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        @include('back.components.dosen.form-login')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="{{ asset('front/vendors/scripts/core.min.js') }}"></script>
    <script src="{{ asset('front/vendors/scripts/script.min.js') }}"></script>
</body>

</html>
