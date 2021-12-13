@extends('layout.auth')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h4>Verify Account</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('auth.verify.request') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="otp">OTP</label>
                    <input type="hidden" name="token" value="{{ $token }}" />
                    <input id="otp" type="text" class="form-control" name="otp" tabindex="1" placeholder="OTP" required autofocus>
                    @if ($errors->has('otp'))
                        <small>{!! $errors->get('otp')[0] !!}</small>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Verify
                    </button>
                </div>

                <p style="text-align: center">Already have an account? <a href="{{ route('auth.login') }}">Login</a>
                </p>
            </form>

        </div>
    </div>

@endsection
