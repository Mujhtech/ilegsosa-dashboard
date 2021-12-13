@extends('layout.main')

@push('css')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
@endpush

@section('content')
    <div class="section-body">
        <div class="row mt-5">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Discussion Thread Post</h4>
                    </div>
                    <form action="{{ route('user.discussion.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="title">
                                    @if ($errors->has('title'))
                                        <small>{!! $errors->get('title')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="category" class="form-control selectric">
                                        @if ($categories->count())
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>

                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('category'))
                                        <small>{!! $errors->get('category')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple" id="summernote-editor" name="content"></textarea>
                                    @if ($errors->has('content'))
                                        <small>{!! $errors->get('content')[0] !!}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-outline-info mr-3" type="submit">Save as draft</button>
                                    <button class="btn btn-primary" type="submit">Publish</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Must Read Posts</h4>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1 text-primary">Please read this rules before you start posting on the
                                        discussion thread</p>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">Our Constitution</p>
                                </div>
                            </a>
                        </div>
                        <div class="card-header mt-3">
                            <h4>Featured links</h4>
                        </div>

                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">Class of ’15 Reunion</p>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">Quick response to Dr. Bolupe Awe’s letter by the national
                                        president Ilegsosa, Dr. Obi Daramola.</p>
                                </div>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <p class="mb-1">Re: Appeal to Governor Oyetola by Dr Bolupe Awe.</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>

@endsection


@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script>
        $(document).ready(function() {

            // Define function to open filemanager window
            var lfm = function(options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
                    'width=900,height=600');
                window.SetUrl = cb;
            };

            // Define LFM summernote button
            var LFMButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Insert image with filemanager',
                    click: function() {

                        lfm({
                            type: 'image',
                            prefix: '/laravel-filemanager'
                        }, function(lfmItems, path) {
                            lfmItems.forEach(function(lfmItem) {
                                context.invoke('insertImage', lfmItem.url);
                            });
                        });

                    }
                });
                return button.render();
            };

            // Initialize summernote with LFM button in the popover button group
            // Please note that you can add this button to any other button group you'd like
            $('#summernote-editor').summernote({
                toolbar: [
                    ['popovers', ['lfm']],
                ],
                buttons: {
                    lfm: LFMButton
                }
            })
        });
    </script>
@endpush
