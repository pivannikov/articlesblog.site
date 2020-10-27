@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1 class="mt-2 mb-3">Search results:</h1>
        @if (isset($posts) && count($posts))
            <div class="row mt-2">

                <div class="col-md-12">
                    @foreach ($posts as $post)
                        <div class="card mt-2">
                            <div class="card-header bg-dark text-white">
                                Posted: {{ date('Y-m-d', $post->created_at) }} | Author: {{ $post->user->name }}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h5>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="{{ route('post.show', $post->id) }}" class="btn btn-light">read more...</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    {{ $posts->links() }}
                </div>
            </div>
        @else
            <p>Nothing found by your request!</p>
        @endif
    </div>
@endsection

