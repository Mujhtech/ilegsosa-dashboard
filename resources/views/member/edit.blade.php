@extends('layout.main')

@push('css')

@endpush

@section('content')
    <div class="section-body">
        <div class="row mt-5">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit member</h4>
                    </div>
                    <form action="{{ route('user.member.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $member->id }}" />
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="email" class="form-control" name="email" value="{{ $member->email }}">
                                    @if ($errors->has('email'))
                                        <small>{!! $errors->get('email')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Firstname</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="firstname"
                                        value="{{ $member->first_name }}">
                                    @if ($errors->has('firstname'))
                                        <small>{!! $errors->get('firstname')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lastname</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="lastname"
                                        value="{{ $member->last_name }}">
                                    @if ($errors->has('lastname'))
                                        <small>{!! $errors->get('lastname')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone Number</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="phone" value="{{ $member->phone }}">
                                    @if ($errors->has('phone'))
                                        <small>{!! $errors->get('phone')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="role" class="form-control selectric">
                                        @if ($roles->count())
                                            @foreach ($roles as $item)
                                                <option value="{{ $item->id }}" @if ($member->role_id == $item->id) selected @endif>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('role'))
                                        <small>{!! $errors->get('role')[0] !!}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Reset Password</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <small>{!! $errors->get('password')[0] !!}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-outline-info mr-3" type="submit" name="verify">Save as
                                        verify</button>
                                    <button class="btn btn-primary" type="submit" name="publish">Publish</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

@endsection


@push('js')

@endpush
