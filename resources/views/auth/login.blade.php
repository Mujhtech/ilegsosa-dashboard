@extends('layout.auth')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('auth.login.request') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    @if ($errors->has('email'))
                        <small style="color: red">{!! $errors->get('email')[0] !!}</small>
                    @endif
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    @if ($errors->has('password'))
                        <small style="color: red">{!! $errors->get('password')[0] !!}</small>
                    @endif
                    <p style="text-align: right"><a href="{{ route('auth.forgot') }}">Forgot Password</a>
                    </p>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>

                <p style="text-align: center">Don't have an account? <a href="{{ route('auth.register') }}">Register</a>
                </p>
            </form>

        </div>
    </div>

@endsection
