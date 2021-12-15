@extends('layout.main')

@section('content')

    <div class="section-body">
        <div class="section-body">

            <div class="row mt-4">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>System Setting</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.setting.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="site_title"
                                            value="{{ get_setting('site_title') }}" required>
                                        @if ($errors->has('site_title'))
                                            <small>{!! $errors->get('site_title')[0] !!}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site
                                        Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="site_description"
                                            value="{{ get_setting('site_description') }}">
                                        @if ($errors->has('site_description'))
                                            <small>{!! $errors->get('site_description')[0] !!}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Mail</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="author_mail"
                                            value="{{ get_setting('author_mail') }}">
                                        @if ($errors->has('author_mail'))
                                            <small>{!! $errors->get('author_mail')[0] !!}</small>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Phone
                                        Number</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="author_phone_number"
                                            value="{{ get_setting('author_phone_number') }}">
                                        @if ($errors->has('author_phone_number'))
                                            <small>{!! $errors->get('author_phone_number')[0] !!}</small>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Logo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" class="form-control" name="site_logo">
                                        @if ($errors->has('site_logo'))
                                            <small>{!! $errors->get('site_logo')[0] !!}</small>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site
                                        Favicon</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" class="form-control" name="site_favicon">
                                        @if ($errors->has('site_favicon'))
                                            <small>{!! $errors->get('site_favicon')[0] !!}</small>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">New User
                                        Verification</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="new_user_verification" class="form-control selectric" required>

                                            <option value="1" @if (get_setting('new_user_verification') == 1) selected @endif>Enable</option>
                                            <option value="0" @if (get_setting('new_user_verification') == 0) selected @endif>Disable</option>


                                        </select>
                                        @if ($errors->has('new_user_verification'))
                                            <small>{!! $errors->get('new_user_verification')[0] !!}</small>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Auto Connect</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="auto_connect" class="form-control selectric" required>

                                            <option value="1" @if (get_setting('auto_connect') == 1) selected @endif>Enable</option>
                                            <option value="0" @if (get_setting('auto_connect') == 0) selected @endif>Disable</option>


                                        </select>
                                        @if ($errors->has('auto_connect'))
                                            <small>{!! $errors->get('auto_connect')[0] !!}</small>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary" type="submit" name="publish">Save Setting</button>
                                    </div>
                                </div>




                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" card">
                        <div class="card-header">
                            <h4>Backups</h4>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary" type="submit" name="publish">Generate System Backup</button>
                            {{-- <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>

                                </table>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
