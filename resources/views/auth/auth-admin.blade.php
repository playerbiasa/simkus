@extends('adlayouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="card card-primary">

        <div class="card-body">
            <form method="POST" action="#" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email or Username</label>
                    <input id="email" type="text" class="form-control" name="email" tabindex="1" required autofocus
                        autocomplete="off">
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Don't have an account? <a href="#">Aktivasi</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
