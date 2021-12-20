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
                            <form action="{{ route('user.member.group.update') }}" method="post" id="action-form">
                                @csrf
                                <input type="hidden" name="selected" id="selected">
                                <select class="form-control selectric" name="action" id="action-selection">
                                    <option>Action For Selected</option>
                                    <option value="verify">Verify</option>
                                    <option value="unverify">Unverify</option>
                                    <option value="unblock">Unblock</option>
                                    <option value="block">Block</option>
                                </select>
                            </form>
                        </div>
                        <div class="float-right">
                            <form action="{{ route('user.member') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s"
                                        value="{{ isset($keyword) ? $keyword : '' }}" placeholder="Search">
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
                                                class="custom-control-input" id="checkbox-all" onclick="toggle(this);">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Year of matriculation</th>
                                    <th>Year of graduation</th>
                                    <th>Request Connect Access</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>

                                @if ($members->count() > 0)
                                    @foreach ($members as $item)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        class="custom-control-input filled-in"
                                                        id="checkbox-{{ $item->id }}" name="{{ $item->id }}">
                                                    <label for="checkbox-{{ $item->id }}"
                                                        class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{ $item->full_name }}
                                                <div class="table-links">
                                                    <a href="{{ route('user.member.edit', $item->id) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    @if ($item->active)
                                                        <a href="{{ route('user.member.status', $item->id) }}"
                                                            class="text-danger">Block</a>
                                                    @else
                                                        <a href="{{ route('user.member.status', $item->id) }}"
                                                            class="text-danger">Unblock</a>
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
                                            <td>
                                                @if (\App\Models\SetMember::where('user_id', $item->id)->exists())
                                                    @if (\App\Models\SetMember::where('user_id', $item->id)->first()->status == 0)
                                                        <a href="{{ route('user.member.grant.access', $item->id) }}"
                                                            class="btn btn-primary">Grant Access</a>
                                                    @else
                                                        Access granted
                                                    @endif
                                                @endif
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
                        @if ($members->count() > 0)
                            <div class="float-right">
                                {{ $members->links('vendor.pagination.default') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script>
        $("#action-selection").change(function() {
            var selected = $('#selected').val();
            if (selected != null && selected != "")
                $("#action-form").submit();
        });

        $('#selected').val = '';
        $(".filled-in").on('change', function() {
            var favorite = [];
            $.each($("tbody input[type='checkbox']:checked"), function() {
                favorite.push($(this).attr('name'));
                console.log(favorite);
            });
            if (favorite.length > 0) {
                $('#selected').val(favorite);
            } else {}
        });


        function toggle(source) {
            var favorite = [];
            checkboxes = document.querySelectorAll("tbody input[type='checkbox']");
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i] != source)
                    checkboxes[i].checked = source.checked;
                //
                if (checkboxes[i].getAttribute('name') != null && source.checked) {
                    favorite.push(checkboxes[i].getAttribute('name'));
                } else {
                    favorite = [];
                }
            }
            if (favorite.length > 0) {
                $('#selected').val(favorite);
            } else {
                $('#selected').val('');
            }
            console.log(favorite);
        }
    </script>
@endpush
