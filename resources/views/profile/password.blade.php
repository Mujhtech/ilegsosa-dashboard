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
                <form id="setting-form" action="{{ route('user.update.password') }}" method="post">
                    @csrf
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Change Your Password</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Update your password</p>
                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Old
                                    Password</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="password" name="old_password" class="form-control" id="old-password"
                                        placeholder="Enter Your Old password">
                                    @if ($errors->has('old_password'))
                                        <small>{!! $errors->get('old_password')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="site-description" class="form-control-label col-sm-3 text-md-right">New
                                    Password</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="password" class="form-control" name="new_password" id="new-password"
                                        placeholder="Enter New Password">
                                    @if ($errors->has('new_password'))
                                        <small>{!! $errors->get('new_password')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="site-description" class="form-control-label col-sm-3 text-md-right">Confirm New
                                    Password</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="password" class="form-control" name="new_password2" id="new-password2"
                                        placeholder="Re-enter new password">
                                    @if ($errors->has('new_password2'))
                                        <small>{!! $errors->get('new_password2')[0] !!}</small>
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
