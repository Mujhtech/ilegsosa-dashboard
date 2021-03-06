@extends('layout.auth')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('auth.register.request') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input id="firstname" type="text" class="form-control" name="firstname"
                        value="{{ old('firstname') }}" tabindex="1" required autofocus>
                    @if ($errors->has('firstname'))
                        <small style="color: red">{!! $errors->get('firstname')[0] !!}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}"
                        tabindex="1" required autofocus>
                    @if ($errors->has('lastname'))
                        <small style="color: red">{!! $errors->get('lastname')[0] !!}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                        value="{{ old('email') }}" required autofocus>
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
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password2" class="control-label">Confirm Password</label>
                    </div>
                    <input id="password2" type="password" class="form-control" name="password2" tabindex="2" required>
                    @if ($errors->has('password2'))
                        <small style="color: red">{!! $errors->get('password2')[0] !!}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="matriculation">Year of Matriculation</label>
                    <input id="matriculation" type="text" class="form-control" name="matriculation"
                        value="{{ old('matriculation') }}" tabindex="1" placeholder="YYYY" required autofocus>
                    @if ($errors->has('matriculation'))
                        <small style="color: red">{!! $errors->get('matriculation')[0] !!}</small>
                    @endif
                </div>


                <div class="form-group">
                    <label for="graduation">Year of Gradulation</label>
                    <input id="graduation" type="text" class="form-control" name="graduation"
                        value="{{ old('graduation') }}" tabindex="1" placeholder="YYYY" required autofocus>
                    @if ($errors->has('graduation'))
                        <small style="color: red">{!! $errors->get('graduation')[0] !!}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="city">Current City</label>
                    <input id="city" type="text" class="form-control" name="city" tabindex="1"
                        value="{{ old('city') }}" autofocus>
                    @if ($errors->has('city'))
                        <small style="color: red">{!! $errors->get('city')[0] !!}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input id="country" type="text" class="form-control" name="country" tabindex="1"
                        value="{{ old('country') }}" autofocus>
                    @if ($errors->has('country'))
                        <small style="color: red">{!! $errors->get('country')[0] !!}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input id="phone_number" type="text" class="form-control" name="phone_number"
                        value="{{ old('phone_number') }}" tabindex="1" autofocus>
                    @if ($errors->has('phone_number'))
                        <small style="color: red">{!! $errors->get('phone_number')[0] !!}</small>
                    @endif
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me">I agree with terms & conditions</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Register
                    </button>
                </div>

                <p style="text-align: center">Already have an account? <a href="{{ route('auth.login') }}">Login</a></p>
            </form>

        </div>
    </div>

@endsection
