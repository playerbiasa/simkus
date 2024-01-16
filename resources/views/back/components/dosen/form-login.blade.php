<form action="{{ route('dosen.login-handler') }}" method="POST">
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
    <div class="row">
        <div class="col-sm-12">
            <div class="input-group mb-0">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign in">
            </div>
        </div>
    </div>
</form>
