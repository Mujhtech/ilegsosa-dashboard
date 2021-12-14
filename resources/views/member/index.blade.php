@extends('layout.main')

@section('content')

    <div class="section-body">
        <div class="row mt-5">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('user.member') }}">All </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.member') }}?verify=1">Verified</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.member') }}?verify=1">Not Verified</a>
                            </li> --}}
                            <div class="card-header-action section-header-button float-right ml-5">
                                <a href="{{ route('user.member.create') }}" class="btn btn-primary">+ Add new member</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Members</h4>
                    </div>
                    <div class="card-body">
                        <div class="float-left">
                            <select class="form-control selectric">
                                <option>Action For Selected</option>
                                <option>Move to Draft</option>
                                <option>Move to Pending</option>
                                <option>Delete Pemanently</option>
                            </select>
                        </div>
                        <div class="float-right">
                            <form action="{{ route('user.discussion.index') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="clearfix mb-3"></div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th class="text-center pt-2">
                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Year of matriculation</th>
                                    <th>Year of graduation</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>

                                @if ($members->count() > 0)
                                    @foreach ($members as $item)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{ $item->full_name }}
                                                <div class="table-links">
                                                    <a href="{{ route('user.member.edit', $item->id) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    @if ($item->active)
                                                        <a href="{{ route('user.member.status', $item->id) }}" class="text-danger">Block</a>
                                                    @else
                                                        <a href="{{ route('user.member.status', $item->id) }}" class="text-danger">Unblock</a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                {{ $item->email }}
                                            </td>
                                            <td>
                                                {{ $item->phone }}
                                            </td>
                                            <td>
                                                {{ $item->year_of_matriculation }}
                                            </td>
                                            <td>
                                                {{ $item->year_of_graduation }}
                                            </td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($item->verified == 1)
                                                    <div class="badge badge-primary">Verified</div>
                                                @else
                                                    <div class="badge badge-primary">Not verify</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center">No members found</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <div class="float-right">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
