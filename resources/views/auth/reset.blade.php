
<form action="{{ route('resetpwd') }}" method="POST" >
    @csrf
    <input type="hidden" name="email" value="{{$email}}">
    <input type="hidden" name="remember_token" value="{{$remember_token}}">
    <div class="form-group row">
        <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
        <div class="col-md-6">
            <input type="text" id="email_address" class="form-control" name="email" required autofocus value="{{$email}}disabled">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group row">
            <label for="new password" class="col-md-4 col-form-label text-md-right">New Password</label>
            <div class="col-md-6">
                <input type="text" id="new_password" class="form-control" name="new Password" required autofocus>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
    </div>
    </div>
    <div class="form-group row">
        <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
        <div class="col-md-6">
            <input type="submit" id="confirm_password" class="form-control" name="confirm password" required autofocus>
            @if ($errors->has('confirm password'))
                <span class="text-danger">{{ $errors->first('confirm password') }}</span>
            @endif
        </div>
    </div>
</form>
