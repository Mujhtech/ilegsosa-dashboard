@extends('layout.main')

@section('content')

    <div class="section-body">
        <div class="section-body">
            <div class="row mt-5">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills">
                                <div class="card-header-action section-header-button float-right ml-5">
                                    <button id="modal-2" data-toggle="modal" data-target="#exampleModal"
                                        class="btn btn-primary">+ Add new
                                        nomination</button>
                                </div>
                                <div class="card-header-action section-header-button float-right ml-5">
                                    <a href="{{ route('user.member.create') }}" class="btn btn-primary">+ Add new
                                        designation</a>
                                </div>
                                <div class="card-header-action section-header-button float-right ml-5">
                                    <a href="{{ route('user.member.create') }}" class="btn btn-primary">+ Vote Setting</a>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Modal body text goes here.</p>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Nominations</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Designation</th>
                                        <th>Vote</th>
                                        <th>Winner</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>

                                    @if ($nominations->count() > 0)
                                        @foreach ($nominations as $item)
                                            <tr>
                                                <td>{{ $item->user->full_name }}</td>
                                                <td>{{ $item->designation->title }}</td>
                                                <td>{{ $item->votes }}</td>
                                                <td>
                                                    @if ($item->win)
                                                        <span class="badge badge-success">Winner</span>
                                                    @else
                                                        <span class="badge badge-info">Pending</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->year }}</td>
                                                <td>{{ $item->year }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" style="text-align: center">No nominations found</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                            @if ($nominations->count() > 0)
                                <div class="float-right">
                                    {{ $nominations->links('vendor.pagination.default') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" card">
                        <div class="card-header">
                            <h4>All Designations</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>

                                    @if ($designations->count() > 0)
                                        @foreach ($designations as $item)
                                            <tr>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->id }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="1" style="text-align: center">No designation found</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
