@extends ('layouts.layout')

@section ('content')
    <div class="container">

        <div class="row mt-5">

            <div class="col-md-9">
                @foreach ($posts as $post)
                    <div class="card mt-2">
                        <div class="card-header bg-dark text-white">
                            Posted: {{ date('Y-m-d', $post->created_at) }} | Author: {{ $post->user->name }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h5>
                            <div>
                                @isset($post->image)
                                    <div id="pic_cards_wrapper" class="shadow-sm p-3 mb-5 bg-white rounded">
                                        <img src="{{ $post->image }}" id="pic">
                                    </div>
                                    <div>
                                        <p class="card-text">{{ $post->excerpt }}...</p>
                                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-light">read more...</a>
                                    </div>
                                @else
                                    <div>
                                        <p class="card-text">{{ $post->excerpt }}...</p>
                                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-light">read more...</a>
                                    </div>
                                @endisset
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-3">
                @include('main.sidebar')
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                {{ $posts->links() }}
            </div>
        </div>

    </div>


@endsection

