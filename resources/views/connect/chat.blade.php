@extends('layout.main')

@push('css')
    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 40px;
            padding-bottom: 5px;
            /* border-bottom: 1px dotted #B3A9A9; */
            margin-top: 10px;
            width: 80%;
        }

        .chat li .chat-body p {
            margin: 0;
            /* color: #777777; */
        }

        .chat-care {
            overflow-y: scroll;
            height: 350px;
        }

        .chat-care .chat-img {
            width: 50px;
            height: 50px;
        }

        .chat-care .img-circle {
            border-radius: 50%;
        }

        .chat-care .chat-img {
            display: inline-block;
        }

        .chat-care .chat-body {
            display: inline-block;
            max-width: 80%;
            background-color: #fff;
            border-radius: 12.5px;
            padding: 15px;
        }

        .chat-care .chat-body strong {
            color: #0169da;
        }

        .chat-care .admin {
            text-align: right;
            float: right;
        }

        .chat-care .admin p {
            text-align: left;
        }

        .chat-care .agent {
            text-align: left;
            float: left;
        }

        .chat-care .left {
            float: left;
        }

        .chat-care .right {
            float: right;
        }

        .clearfix {
            clear: both;
        }

    </style>
@endpush

@section('content')

    <div class="row align-items-center justify-content-center">
        <div class="col-4 col-sm-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>{{ auth()->user()->set->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="mb-5">
                        <form action="{{ route('user.connect') }}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="s" placeholder="Search"
                                    value="{{ isset($keyword) ? $keyword : '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <ul class="list-unstyled list-unstyled-border">
                        @if ($members->count() > 0)
                            @foreach ($members as $item)

                                <li class="media">

                                    <img alt="image" class="mr-3 rounded-circle" width="50"
                                        src="{{ $item->user->profile_photo_url }}">
                                    <div class="media-body">
                                        <a href="{{ route('user.connect') }}?chat={{ $item->user->full_name }}">
                                            <div class="mt-0 mb-1 font-weight-bold">{{ $item->user->full_name }}</div>
                                            <div class="text-muted text-small font-600-bold"> Marketing Development Manager
                                            </div>
                                        </a>
                                    </div>
                                </li>

                            @endforeach
                        @else
                            No member found
                        @endif

                    </ul>
                </div>
            </div>
        </div>

        @if (isset($receiver))
            <div class="col-12 col-sm-6 col-lg-8">
                <div class="card chat-box" id="mychatbox">
                    <div class="card-header">
                        <h4>Chat with {{ $receiver->full_name }}</h4>
                    </div>
                    <div class="card-body chat-content">
                        <div class="card-body chat-care">
                            @if (isset($conversations) && $conversations->messages)

                                <ul class="chat">
                                    @foreach ($conversations->messages as $message)
                                        <li class="@if ($message->user_id == auth()->user()->id) admin @else agent @endif clearfix">
                                            <span class="chat-img @if ($message->user_id == auth()->user()->id) right @else left @endif clearfix mx-2">
                                                <img src="{{ $message->user->profile_photo_url }}" width="50"
                                                    alt="{{ $message->user->full_name }}" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header clearfix">
                                                    @if ($message->user_id == auth()->user()->id)
                                                        <strong class="primary-font">{{ $message->user->full_name }}
                                                        </strong>
                                                        <small class="right text-muted">
                                                            <span class="glyphicon glyphicon-time ml-3"></span>
                                                            {{ $message->created_at->diffForHumans() }} </small>
                                                    @else
                                                        <strong class="primary-font">
                                                            {{ $message->user->full_name }}
                                                        </strong>
                                                        <small class="right text-muted ml-3"><span
                                                                class="glyphicon glyphicon-time"></span>
                                                            {{ $message->created_at->diffForHumans() }} </small>


                                                    @endif
                                                </div>
                                                <p>{{ $message->content }}</p>
                                            </div>
                                        </li>

                                    @endforeach
                                </ul>
                            @else
                                <p style="text-align: center">Be the first to send message to {{ $receiver->full_name }}
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer chat-form">
                        <form id="chat-form" method="post" action="{{ route('user.message.store') }}">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{ $receiver->id }}" />
                            <input type="hidden" name="message_type" value="private" />
                            {{-- <input type="hidden" name="message_thread_id" value="{{ $conversations->id }}" /> --}}
                            <input type="text" class="form-control" name="content" placeholder="Type a message">
                            <button class="btn btn-primary">
                                <i class="far fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="col-12 col-sm-6 col-lg-8">
                <div class="card chat-box" id="mychatbox">
                    <div class="card-header">
                        <h4>Chat with {{ auth()->user()->set->name }} Forum</h4>
                    </div>
                    <div class="card-body chat-content">
                        <div class="card-body chat-care">
                            @if (isset($conversations) && $conversations->messages)

                                <ul class="chat">
                                    @foreach ($conversations->messages as $message)
                                        <li class="@if ($message->user_id == auth()->user()->id) admin @else agent @endif clearfix">
                                            <span class="chat-img @if ($message->user_id == auth()->user()->id) right @else left @endif clearfix mx-2">
                                                <img src="{{ $message->user->profile_photo_url }}" width="50"
                                                    alt="{{ $message->user->full_name }}" class="img-circle" />
                                            </span>
                                            <div class="chat-body clearfix">
                                                <div class="header clearfix">
                                                    @if ($message->user_id == auth()->user()->id)
                                                        <strong class="primary-font">{{ $message->user->full_name }}
                                                        </strong>
                                                        <small class="right text-muted">
                                                            <span class="glyphicon glyphicon-time ml-3"></span>
                                                            {{ $message->created_at->diffForHumans() }} </small>
                                                    @else
                                                        <strong class="primary-font">
                                                            {{ $message->user->full_name }}
                                                        </strong>
                                                        <small class="right text-muted ml-3"><span
                                                                class="glyphicon glyphicon-time"></span>
                                                            {{ $message->created_at->diffForHumans() }} </small>


                                                    @endif
                                                </div>
                                                <p>{{ $message->content }}</p>
                                            </div>
                                        </li>

                                    @endforeach
                                </ul>
                            @else
                                <p style="text-align: center">Be the first to send message to {{ auth()->user()->set->name }} Forum
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer chat-form">
                        <form id="chat-form" method="post" action="{{ route('user.message.store') }}">
                            @csrf
                            <input type="hidden" name="message_type" value="public" />
                            {{-- <input type="hidden" name="message_thread_id" value="{{ $conversations->id }}" /> --}}
                            <input type="text" class="form-control" name="content" placeholder="Type a message">
                            <button class="btn btn-primary">
                                <i class="far fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>


@endsection
