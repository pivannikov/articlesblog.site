@extends ('layouts.layout')

@section ('content')
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                    <div class="card-header bg-dark text-white">
                        Posted: {{ date('Y-m-d', $post->created_at) }} Author: {{ $post->user->name }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        @isset($post->image)
                            <div id="pic_show_wrapper" class="shadow-sm p-3 mb-5 bg-white rounded">
                                <img src="{{ $post->image }}" id="pic">
                            </div>
                        @endisset
                        <p class="card-text">{!! $post->body !!}</p>
                        <div class="card-footer text-muted">
                            Category: <a href="{{ route('category.show', $post->category->slug) }}">{{ $post->category->name }}</a>
                        </div>
                    </div>

                </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-auto mr-auto">
                        <button type="button" class="btn btn-secondary btn-lg" onclick="location.href='{{ url()->previous() }}'">Back</button>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-success btn-lg" onclick="location.href='{{ route('post.edit', $post->id) }}'">Edit</button>
                    </div>
                    <div class="col-auto">
                        <form action="{{ route('post.delete', $post->id) }}"
                              method="post" onsubmit="return confirm('Are you sure?')"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-3">
                @include('main.sidebar')
            </div>

        </div>
    </div>

@endsection

