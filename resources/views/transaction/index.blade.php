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
                                    <th>Member</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                </tr>

                                @if ($transactions->count() > 0)
                                    @foreach ($transactions as $item)
                                        <tr>
                                            <td>{{ $payment->payment_type->name }}</td>
                                            <td>{{ $payment->user->full_name }}</td>
                                            <td>{{ $payment->updated_at->diffForHumans() }}</td>
                                            <td>
                                                <span class="badge badge-info">&#x20A6;{{ $payment->amount }}</span>
                                            </td>
                                            <td>
                                                @if ($payment->payment_status == 1)
                                                    <span class="badge badge-success">Confirmed</span>
                                                @elseif($payment->payment_status == 2)
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
