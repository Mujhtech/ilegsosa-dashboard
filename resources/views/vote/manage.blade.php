@extends('layout.main')

@section('content')

    <div class="section-body">
        <div class="row mt-5">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills">
                            <div class="card-header-action section-header-button float-right ml-5">
                                <button id="modal-2" data-toggle="modal" data-target="#newNominateModal"
                                    class="btn btn-primary">+ Add new
                                    nomination</button>
                            </div>
                            <div class="card-header-action section-header-button float-right ml-5">
                                <button id="modal-2" data-toggle="modal" data-target="#newDesignationModal"
                                    class="btn btn-primary">+ Add new
                                    designation</button>
                            </div>
                            <div class="card-header-action section-header-button float-right ml-5">
                                <button id="modal-2" data-toggle="modal" data-target="#settingModal"
                                    class="btn btn-primary"> Vote Setting</button>
                            </div>
                        </ul>
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
                                            <td colspan="2">
                                                <a href="{{ route('user.vote.declare', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Declare Winner</a>
                                                <a href="{{ route('user.vote.destroy.nominate', $item->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
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
                            <p>Note: Delete any designation record will leads to delete all nomination records belong to the
                                particular designation</p>
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>

                                @if ($designations->count() > 0)
                                    @foreach ($designations as $item)
                                        <tr>
                                            <td>{{ $item->title }}</td>
                                            <td><a href="{{ route('user.vote.destroy.designate', $item->id) }}"
                                                    class="btn btn-danger">Delete</a></td>
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

@push('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="newNominateModal">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('user.vote.nominate') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Nomination</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Designation</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="designation" class="form-control selectric" required>
                                    @if ($designations->count() > 0)
                                        @foreach ($designations as $item)
                                            <option value="{{ $item->id }}">{{ $item->title }}</option>

                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('designation'))
                                    <small>{!! $errors->get('designation')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nominate</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="nominate" class="form-control selectric" required>
                                    @if ($users->count() > 0)
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('nominate'))
                                    <small>{!! $errors->get('nominate')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Year</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="year" class="form-control selectric" required>
                                    @php $year = date('Y'); @endphp
                                    @for ($i = 0; $i < 10; $i++)
                                        <option value="{{ $year + $i }}">{{ $year + $i }}</option>
                                    @endfor
                                </select>
                                @if ($errors->has('year'))
                                    <small>{!! $errors->get('year')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="newDesignationModal">
        <div class="modal-dialog" role="document">
            <form action="{{ route('user.vote.designate') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Designation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="title">
                                @if ($errors->has('title'))
                                    <small>{!! $errors->get('title')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="settingModal">
        <div class="modal-dialog" role="document">
            <form action="{{ route('user.setting.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Setting</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Election Start Date</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="date" class="form-control" name="election_start_date"
                                    value="{{ get_setting('election_start_date') }}" required>
                                @if ($errors->has('election_start_date'))
                                    <small>{!! $errors->get('election_start_date')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Election End Date</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="date" class="form-control" name="election_end_date"
                                    value="{{ get_setting('election_end_date') }}" required>
                                @if ($errors->has('election_end_date'))
                                    <small>{!! $errors->get('election_end_date')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start Election</label>
                            <div class="col-sm-12 col-md-7">
                                <select name="start_election" class="form-control selectric" required>

                                    <option value="1" @if (get_setting('start_election') == 1) selected @endif>Enable</option>
                                    <option value="0" @if (get_setting('start_election') == 0) selected @endif>Disable</option>


                                </select>
                                @if ($errors->has('start_election'))
                                    <small>{!! $errors->get('start_election')[0] !!}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endpush
