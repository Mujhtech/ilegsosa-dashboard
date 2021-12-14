@extends('layout.main')

@section('content')
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
                                    <a href="{{ route('user.announcement.edit', $item->id) }}" class="btn">Edit
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


@endsection
