@extends('layout.main')

@section('content')

    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Trasactions</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Transaction Type</th>
                                    @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)<th>Member</th>@endif
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                </tr>

                                @if ($transactions->count() > 0)
                                    @foreach ($transactions as $item)
                                        <tr>
                                            <td>{{ $item->payment_type->name }}</td>
                                            @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)<td>{{ $item->user->full_name }}</td>@endif
                                            <td>{{ $item->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <span class="badge badge-info">&#x20A6;{{ $item->amount }}</span>
                                            </td>
                                            <td>
                                                @if ($item->payment_status == 1)
                                                    <span class="badge badge-success">Confirmed</span>
                                                @elseif($item->payment_status == 2)
                                                    <span class="badge badge-success">Failed</span>
                                                @else
                                                    <span class="badge badge-info">Pending</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center">No transactions found</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        @if ($transactions->count() > 0)
                            <div class="float-right">
                                {{ $transactions->links('vendor.pagination.default') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
