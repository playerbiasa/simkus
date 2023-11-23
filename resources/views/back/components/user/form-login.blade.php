<form action="{{ route('layanan.layanan-login-handler') }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" name="login_id" class="form-control form-control-lg" placeholder="Username/Email"
            value="{{ old('login_id') }}" />
        @error('login_id')
            <div class="form-control-feedback has-warning">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-lg" placeholder="**********" />
        @error('password')
            <div class="form-control-feedback has-warning">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="row pb-30">
        <div class="col-6">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" />
                <label class="custom-control-label" for="customCheck1">Remember</label>
            </div>
        </div>
        <div class="col-6">
            <div class="forgot-password">
                <a href="#">Forgot Password</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="input-group mb-0">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign in">
            </div>
            <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">
                OR
            </div>
            <div class="input-group mb-0">
                <a class="btn btn-outline-primary btn-lg btn-block" href="#">Aktivasi Akun</a>
            </div>
        </div>
    </div>
</form>
