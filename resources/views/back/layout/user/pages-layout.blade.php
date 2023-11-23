<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>@yield('pagetitle')</title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendors/styles/core.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/vendors/styles/style.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('front/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css') }}" />

    <!-- CSS Libraries -->
    @stack('stylesheets')
</head>

<body class="sidebar-light">
    @include('back.components.user.navbar')
    @include('back.components.user.sidebar')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            @yield('content')
            @include('back.components.user.footer')
        </div>

    </div>

    <!-- js -->
    <script src="{{ asset('front/vendors/scripts/core.min.js') }}"></script>
    <script src="{{ asset('front/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('front/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('front/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('front/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js') }}"></script>

    <!-- Page Specific JS File -->
    @stack('scripts')

</body>

</html>
