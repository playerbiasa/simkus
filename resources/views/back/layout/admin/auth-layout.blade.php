<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('back/library/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand"> </div>
                        <h4 class="text-dark font-weight-normal" style="text-align: center">Admin <span
                                class="font-weight-bold">Login</span>
                        </h4>
                        <hr>
                        @if (Session::get('fail'))
                            <div class="alert alert-danger alert-dismissible show fade">
                                {{ Session::get('fail') }}
                                <button class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.login-handler') }}"
                                    class="needs-validation" autocomplete="off">
                                    @csrf
                                    <div class="form-group">
                                        <input id="login_id" type="text" class="form-control" name="login_id"
                                            value="{{ old('login_id') }}" tabindex="1" placeholder="Email/Username"
                                            autofocus>
                                    </div>
                                    @error('login_id')
                                        <div class="d-block text-danger" style="margin-top: -25px;margin-bottom: 15px;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" placeholder="***************">
                                    </div>
                                    @error('password')
                                        <div class="d-block text-danger" style="margin-top: -25px;margin-bottom: 15px;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-group">
                                        <div class="d-block">
                                            <div class="float-right">
                                                <a href="#" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-muted text-center">
                            Sudah punya akun ? <a href="#">Aktivasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('back/library/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('back/library/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="{{ asset('back/js/scripts.js') }}"></script>
    <script src="{{ asset('back/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
</body>

</html>
