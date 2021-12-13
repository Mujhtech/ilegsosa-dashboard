@extends('layout.main')

@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
            <form action="{{ route('user.vote.store') }}" method="POST">
                <div class="card">

                    @csrf
                    <div class="card-header">
                        <h4>Board of Directors Election</h4>
                    </div>
                    @if ($designations->count() > 0)
                        @foreach ($designations as $item)
                            <div class="card-body">
                                <div class="section-title">For {{ $item->title }}</div>

                                @if ($item->nominations()->count() > 0)
                                    @foreach ($item->nominations as $nominee)
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="candidate{{ $nominee->id }}"
                                                name="{{ str_replace(' ', '_', strtolower($item->title)) }}" class="custom-control-input"
                                                value="{{ $nominee->id }}">
                                            <label class="custom-control-label"
                                                for="candidate{{ $nominee->id }}">{{ $nominee->user->full_name }} (
                                                {{ $nominee->votes }} Votes )</label>
                                        </div>
                                    @endforeach

                                @else
                                    No nomination found for this position
                                @endif
                            </div>
                        @endforeach
                    @endif
                    <button class="btn btn-primary mt-3" type="submit">Submit Vote</button>

                </div>
            </form>
        </div>
    </div>


@endsection
