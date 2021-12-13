@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Membership Dues</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('user.pay') }}" method="post">
                        @csrf
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
                        <input type="hidden" name="currency" value="NGN">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullname" class="form-control" required=""
                                    placeholder="Enter your first name and last name"
                                    value="{{ auth()->user()->full_name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required=""
                                    placeholder="Enter your email address" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="form-group">
                                <label for="paymentPurpose">Payment Purpose</label>
                                <select class="form-control" id="paymentPurpose" name="type">
                                    @foreach ($types as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="amount" id="amount" value="0"/>
                            
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" name="bill" class="form-control" id="bill" onKeyup="return updateAmount(event)"
                                    placeholder="Enter amount in figures">
                            </div>

                            
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="number" name="phone" class="form-control"
                                    placeholder="Type in your Phone number" value="{{ auth()->user()->phone }}">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    


@endsection

@push('js')
<script>
    function updateAmount(e){
        //alert(e.target.value);
        document.getElementById('amount').value = e.target.value * 100;
    }
</script>

@endpush
