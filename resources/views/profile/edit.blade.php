@extends('layout.main')

@section('content')

    <div class="section-body">

        <div id="output-status"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile Settings</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="{{ route('user.profile') }}"
                                    class="nav-link {{ Route::is('user.profile') ? 'active' : '' }}">Edit Profile</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('user.password') }}"
                                    class="nav-link {{ Route::is('user.password') ? 'active' : '' }}">Change your
                                    password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form id="setting-form" action="{{ route('user.update.profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Update your profile information</p>
                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">First Name</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="first_name" class="form-control" id="first-name"
                                        value="{{ auth()->user()->first_name }}">
                                    @if ($errors->has('first_name'))
                                        <small>{!! $errors->get('first_name')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="site-description" class="form-control-label col-sm-3 text-md-right">Last
                                    Name</label>
                                <div class="col-sm-6 col-md-9">
                                    <input class="form-control" name="last_name" id="last-name"
                                        value="{{ auth()->user()->last_name }}">
                                    @if ($errors->has('last_name'))
                                        <small>{!! $errors->get('last_name')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="site-description" class="form-control-label col-sm-3 text-md-right">Phone
                                    Number</label>
                                <div class="col-sm-6 col-md-9">
                                    <input class="form-control" name="phone_number" id="phone-number"
                                        value="{{ auth()->user()->phone }}">
                                    @if ($errors->has('phone_number'))
                                        <small>{!! $errors->get('phone_number')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="site-description" class="form-control-label col-sm-3 text-md-right">Email
                                    Address</label>
                                <div class="col-sm-6 col-md-9">
                                    <input class="form-control" name="email" id="email-address"
                                        value="{{ auth()->user()->email }}">
                                    @if ($errors->has('email'))
                                        <small>{!! $errors->get('email')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="form-control-label col-sm-3 text-md-right">Profile Picture</label>
                                <div class="col-sm-6 col-md-9">
                                    <div class="custom-file">
                                        <input type="file" name="avatar" class="custom-file-input" id="site-logo">
                                        <label class="custom-file-label">Choose File</label>
                                    </div>
                                    @if ($errors->has('avatar'))
                                        <small>{!! $errors->get('avatar')[0] !!}</small>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-secondary" type="button">Cancel</button>
                            <button class="btn btn-primary" id="save-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
