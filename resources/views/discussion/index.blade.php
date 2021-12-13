@extends('layout.main')

@section('content')

    <div class="section-body">
        <div class="row mt-5">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('user.discussion.index') }}">All </a>
                            </li>
                            @if ($categories->count())
                                @foreach ($categories as $item)
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('user.discussion.index') }}?category={{ $item->slug }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                            <div class="card-header-action section-header-button float-right ml-5">
                                <a href="{{ route('user.discussion.create') }}" class="btn btn-primary">+ Create
                                    New Post</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-12 col-sm-12 col-lg-8">
                @if ($disucssions->count() > 0)
                    @foreach ($disucssions as $item)
                        <div class="card">
                            <a href="{{ route('user.discussion.single', $item->slug) }}">
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                        <li class="media">
                                            <img alt="image" class="mr-3 rounded-circle" width="70"
                                                src="{{ $item->user->profile_photo_url }}">
                                            <div class="media-body">
                                                <div class="media-right">
                                                    <div class="text-primary">{{ $item->created_at->format('d M Y') }}
                                                    </div>
                                                </div>
                                                <div class="media-title mb-1">{{ $item->user->full_name }}</div>
                                                <div class="text-info">NATIONAL PRESIDENT</div>
                                                <div class="text-primary mt-4">{{ $item->title }}
                                                </div>
                                                <div class="media-description text-muted">{!! $item->content !!}</div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="float-right mt-sm-0 mt-3">
                                        <a href="#" class="btn"><i class="far fa-thumbs-up">
                                                {{ $item->likes }}</i></a>
                                        <a href="#" class="btn"><i class="far fa-comment">
                                                {{ $item->comments()->count() }}</i></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
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


        </div>



        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All My Posts</h4>
                    </div>
                    <div class="card-body">
                        <div class="float-left">
                            <select class="form-control selectric">
                                <option>Action For Selected</option>
                                <option>Move to Draft</option>
                                <option>Move to Pending</option>
                                <option>Delete Pemanently</option>
                            </select>
                        </div>
                        <div class="float-right">
                            <form action="{{ route('user.discussion.index') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="s" placeholder="Search">
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
                                                class="custom-control-input" id="checkbox-all">
                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                </tr>

                                @if ($my_posts->count() > 0)
                                    @foreach ($my_posts as $item)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup"
                                                        class="custom-control-input" id="checkbox-2">
                                                    <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{ $item->title }}
                                                <div class="table-links">
                                                    <a href="{{ route('user.discussion.single', $item->slug) }}">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="{{ route('user.discussion.edit', $item->id) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#" class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('user.discussion.index') }}?category={{ $item->category->slug }}">{{ $item->category->name }}</a>
                                            </td>
                                            <td>{{ $item->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <div class="badge badge-primary">Published</div>
                                                @else
                                                    <div class="badge badge-primary">Draft</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center">No post found</td>
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
