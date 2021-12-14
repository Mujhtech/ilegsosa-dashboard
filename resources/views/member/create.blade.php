@extends('layout.main')

@push('css')

@endpush

@section('content')
    <div class="section-body">
        <div class="row mt-5">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>New member</h4>
                    </div>
                    <form action="{{ route('user.member.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="email" class="form-control" name="email">
                                    @if ($errors->has('email'))
                                        <small>{!! $errors->get('email')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Firstname</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="firstname">
                                    @if ($errors->has('firstname'))
                                        <small>{!! $errors->get('firstname')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lastname</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="lastname">
                                    @if ($errors->has('lastname'))
                                        <small>{!! $errors->get('lastname')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone Number</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="phone">
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
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('role'))
                                        <small>{!! $errors->get('role')[0] !!}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
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
