@extends('layout.main')

@section('content')
    <div class="section-body">
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="70"
                                    src="{{ $discussion->user->profile_photo_url }}">
                                <div class="media-body">
                                    <div class="media-right">
                                        <div class="text-primary">{{ $discussion->created_at->format('d M Y') }}</div>
                                    </div>
                                    <div class="media-title mb-1">{{ $discussion->user->full_name }}</div>
                                    <div class="text-info">{{ $discussion->user->role->name }}</div>
                                    <h6 class="text-primary mt-4">{{ $title }}</h6>
                                    <div class="media-description text-muted mt-4">{!! $discussion->content !!}</div>
                                </div>
                            </li>
                        </ul>
                        <div class="float-right mt-sm-0 mt-3">
                            <a href="{{ route('user.like.store', ['type' => 'post', 'id' => $discussion->id]) }}"
                                class="btn"><i class="far fa-thumbs-up">
                                    {{ $discussion->likes }}</i></a>
                            <a href="#" class="btn"><i class="far fa-comment">
                                    {{ $discussion->comments()->count() }}</i></a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Must Read Posts</h4>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @if ($most_reads->count() > 0)
                                @foreach ($most_reads as $item)
                                    <a href="{{ route('user.discussion.single', $item->slug) }}"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <p class="mb-1 text-primary">{{ $item->title }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                No discussion found
                            @endif

                        </div>
                    </div>

                    <div class="card-header mt-3">
                        <h4>Featured links</h4>
                    </div>
                    <div class="card-body">

                        <div class="list-group">

                            @if ($featureds->count() > 0)
                                @foreach ($featureds as $item)
                                    <a href="{{ route('user.discussion.single', $item->slug) }}"
                                        class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <p class="mb-1">{{ $item->title }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                No discussion found
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-12 col-lg-8" id="comment">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $discussion->comments()->count() }} Comments</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.comment.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $discussion->id }}">
                            <div class="form-group">
                                <label>Type in your comments</label>
                                <textarea type="text" class="form-control" name="content"></textarea>
                                @if ($errors->has('content'))
                                    <small>{!! $errors->get('content')[0] !!}</small>
                                @endif
                            </div>
                            <button class="btn btn-secondary mr-1" type="reset">Cancel</button>
                            <button class="btn btn-primary" type="submit">Comment</button>
                        </form>

                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder mt-4">
                            @if ($discussion->comments()->count() > 0)
                                @foreach ($discussion->comments as $item)
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="70"
                                            src="{{ $item->user->profile_photo_url }}">
                                        <div class="media-body">

                                            <div class="media-title mb-1">{{ $item->user->full_name }}</div>
                                            <div class="text-time">{{ $item->created_at->diffForHumans() }}</div>
                                            <div class="media-description text-muted">{!! $item->content !!}</div>
                                            <div class="media-links">
                                                <a href="{{ route('user.like.store', ['type' => 'comment', 'id' => $item->id]) }}"
                                                    class="btn"><i class="far fa-thumbs-up">
                                                        {{ $item->likes }}</i></a>
                                                <div class="media-right"><button type="button"
                                                        onClick="return displayReply({{ $item->id }})"
                                                        class="btn btn-outline-info text-info"><i class="fas fa-reply">
                                                            Reply</i></button></div>
                                                <br>
                                                <form action="{{ route('user.comment.store') }}" method="post"
                                                    id="reply-{{ $item->id }}" style="display:none">
                                                    @csrf
                                                    <input type="hidden" name="comment_id" value="{{ $item->id }}">
                                                    <div class="form-group">
                                                        <label>Reply this comment</label>
                                                        <textarea type="text" class="form-control"
                                                            name="content"></textarea>
                                                        @if ($errors->has('content'))
                                                            <small>{!! $errors->get('content')[0] !!}</small>
                                                        @endif
                                                    </div>
                                                    <button class="btn btn-secondary mr-1" type="button"
                                                        onClick="return hideReply({{ $item->id }})">Cancel</button>
                                                    <button class="btn btn-primary" type="submit">Comment</button>
                                                </form>

                                                <br><br>
                                                @if ($item->replys()->count() > 0)
                                                    @foreach ($item->replys as $reply)
                                                        <ul>

                                                            <li class="media">
                                                                <img alt="image" class="mr-3 rounded-circle" width="70"
                                                                    src="{{ $reply->user->profile_photo_url }}">
                                                                <div class="media-body">

                                                                    <div class="media-title mb-1">
                                                                        {{ $reply->user->full_name }}
                                                                    </div>
                                                                    <div class="text-time">
                                                                        {{ $reply->created_at->diffForHumans() }}</div>
                                                                    <div class="media-description text-muted">
                                                                        {!! $reply->content !!}</div>
                                                                    <div class="media-links">
                                                                        <a href="{{ route('user.like.store', ['type' => 'comment', 'id' => $reply->id]) }}"
                                                                            class="btn"><i
                                                                                class="far fa-thumbs-up">
                                                                                {{ $item->likes }}</i></a>
                                                                        {{-- <div class="media-right"><a href="#"
                                                                        class="btn btn-outline-info text-info"><i
                                                                            class="fas fa-reply">
                                                                            Reply</i></a></div> --}}
                                                                    </div>
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                Be the first to comment
                            @endif
                        </ul>
                    </div>
                </div>
            </div>




        </div>


    </div>

@endsection

@push('js')
    <script>
        function displayReply(id) {

            document.getElementById('reply-' + id).style.display = 'block';

        }
    </script>

    <script>
        function hideReply(id) {

            document.getElementById('reply-' + id).style.display = 'none';

        }
    </script>


@endpush
