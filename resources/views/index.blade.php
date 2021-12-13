@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Quick Actions</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="wizard-steps">
                                <div class="wizard-step wizard-step-active">
                                    <a href="{{ route('user.connect') }}">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-mobile-alt"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Connect with Mates
                                        </div>
                                    </a>
                                </div>
                                <div class="wizard-step wizard-step-active">
                                    <a href="{{ route('user.due') }}">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-receipt"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Pay Dues
                                        </div>
                                    </a>
                                </div>
                                <div class="wizard-step wizard-step-active">
                                    <a href="{{ route('user.profile') }}">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-id-card"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Update Profile
                                        </div>
                                    </a>
                                </div>
                                <div class="wizard-step wizard-step-active">
                                    <a href="{{ route('user.vote') }}">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-vote-yea"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Cast Vote
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Due Payment Report</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Transaction Type</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (auth()->user()->payments->count() > 0)
                                    @foreach (auth()->user()->payments as $payment)
                                        <tr>
                                            <td>{{ $payment->payment_type->name }}</td>
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
                                        <td colspan="4" style="text-align: center">No payment found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Announcements</h4>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @if ($announcements->count())
                            @foreach ($announcements as $item)
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ $item->title }}</h5>
                                    </div>
                                    <p class="mb-1">{{ $item->content }}</p>
                                    <small class="text-muted">{{ $item->created_at->format('d M, Y') }}</small>
                                </a>
                            @endforeach
                        @else
                            No announcement found
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
