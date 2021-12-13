@extends('layout.auth')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h4>Forgot Password</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('auth.forgot.request') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    @if ($errors->has('email'))
                        <small>{!! $errors->get('email')[0] !!}</small>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Forgot Password
                    </button>
                </div>

                <p style="text-align: center">Already have an account? <a href="{{ route('auth.login') }}">Login</a>
                </p>
            </form>

        </div>
    </div>

@endsection
