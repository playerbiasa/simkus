<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('pagetitle')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('back/library/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    @stack('stylesheets')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/components.css') }}">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Main Navbar -->
            @include('back.components.admin.navbar')

            <!-- Main Sidebar -->
            @include('back.components.admin.sidebar')

            <!-- Main Content -->
            @yield('content')

            <!-- Main Footer -->
            @include('back.components.admin.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('back/library/jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('back/library/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('back/library/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back/js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('back/js/scripts.js') }}"></script>
    <script src="{{ asset('back/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    @stack('scripts')
    <script>
        if (navigator.userAgent.indexOf("Firefox") != -1) {
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function() {
                history.pushState(null, null, document.URL);
            });
        }
    </script>
</body>

</html>
