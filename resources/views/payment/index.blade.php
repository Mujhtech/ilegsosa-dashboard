@extends('layout.main')

@section('content')

    <div class="section-body">
        <div class="row mt-5">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills">
                            <div class="card-header-action section-header-button float-right ml-5">
                                <button id="modal-2" data-toggle="modal" data-target="#newPaymentTypeModal"
                                    class="btn btn-primary">+ Add new</button>
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
                        <h4>Payment Type</h4>
                    </div>
                    <div class="card-body">
                        <div class="float-left">
                            <form action="{{ route('user.payment.type.update') }}" method="post" id="action-form">
                                @csrf
                                <input type="hidden" name="selected" id="selected">
                                <select class="form-control selectric" name="action" id="action-selection">
                                    <option>Action For Selected</option>
                                    <option value="enable">Enable</option>
                                    <option value="disable">Disable</option>
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
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>

                                @if ($payment_types->count() > 0)
                                    @foreach ($payment_types as $item)
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
                                            <td>{{ $item->name }}
                                            </td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <div class="badge badge-primary">Enabled</div>
                                                @else
                                                    <div class="badge badge-primary">Disabled</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center">No payment type found</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        @if ($payment_types->count() > 0)
                            <div class="float-right">
                                {{ $payment_types->links('vendor.pagination.default') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="newPaymentTypeModal">
        <div class="modal-dialog" role="document">
            <form action="{{ route('user.payment.type.store') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Payment Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="name">
                                @if ($errors->has('name'))
                                    <small>{!! $errors->get('name')[0] !!}</small>
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
