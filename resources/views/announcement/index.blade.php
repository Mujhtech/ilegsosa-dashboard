@extends('layout.main')

@section('content')
    <div class="section-body">
        @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
            <div class="row mt-5">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills">
                                <div class="card-header-action section-header-button float-right ml-5">
                                    <a href="{{ route('user.announcement.create') }}" class="btn btn-primary">+ Create
                                        New Announcement</a>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($announcements->count() > 0)
            @foreach ($announcements as $item)
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="70"
                                            src="{{ $item->user->profile_photo_url }}">
                                        <div class="media-body">
                                            <div class="media-right">
                                                <div class="text-primary">{{ $item->created_at->format('d M, Y') }}
                                                </div>
                                            </div>
                                            <div class="media-title mb-1">{{ $item->user->full_name }}</div>
                                            <!--<div class="text-info">NATIONAL PRESIDENT</div>-->
                                            <div class="text-primary mt-4">{{ $item->title }}</div>
                                            <div class="media-description text-muted">{!! $item->content !!}</div>
                                        </div>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-outline-primary disabled">MEMO</a>
                                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    <div class="float-right mt-sm-0 mt-3">
                                        <a href="{{ route('user.announcement.edit', $item->id) }}"
                                            class="btn">Edit
                                            Posts <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        @else

            <h2>No announcement</h2>

        @endif

        @if ($announcements->count() > 0)
            <div class="float-right">
                {{ $announcements->links('vendor.pagination.default') }}
            </div>
        @endif

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Posts</h4>
                    </div>
                    <div class="card-body">
                        <div class="float-left">
                            <form action="{{ route('user.announcement.group.update') }}" method="post" id="action-form">
                                @csrf
                                <input type="hidden" name="selected" id="selected">
                                <select class="form-control selectric" name="action" id="action-selection">
                                    <option>Action For Selected</option>
                                    <option value="publish">Move to publish</option>
                                    <option value="draft">Move to Draft</option>
                                    <option value="pending">Move to Pending</option>
                                    <option value="trash">Delete Pemanently</option>
                                </select>
                            </form>
                        </div>
                        <div class="float-right">
                            <form action="{{ route('user.announcement') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" placeholder="Search"
                                        value="{{ isset($keyword) ? $keyword : '' }}">
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
                                    <th>Title</th>
                                    <th>Posted By</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>

                                @if ($announcements->count() > 0)
                                    @foreach ($announcements as $item)
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
                                            <td>{{ $item->title }}
                                                <div class="table-links">
                                                    <a href="{{ route('user.announcement.edit', $item->id) }}">Edit</a>
                                                </div>
                                            </td>
                                            <td>{{ $item->user->full_name }}</td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <div class="badge badge-primary">Published</div>
                                                @elseif ($item->status == 2)
                                                    <div class="badge badge-primary">Pending</div>
                                                @else
                                                    <div class="badge badge-primary">Draft</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="text-align: center">No post found</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        @if ($announcements->count() > 0)
                            <div class="float-right">
                                {{ $announcements->links() }}
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
            if (selected != null && selected != "") {
                if ($(this).val() != 'trash') {
                    $("#action-form").submit();
                }
                if ($(this).val() == 'trash' && confirm('Are you sure you want to delete permanently?')) {
                    $("#action-form").submit();
                }
            }

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
