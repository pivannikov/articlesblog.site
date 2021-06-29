@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="alert alert-light" role="alert">
                            Welcome,
                            <strong>{{ ucfirst(Auth::user()->name) }}</strong>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active" href="{{ route('home.home') }}">Posts<span class="sr-only">(current)</span></a>
                                <a class="nav-link" href="{{ route('home.create') }}">Create post</a>
                                <a class="nav-link" href="{{ route('home.profile') }}">My profile</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="row row-cols-3">
                @foreach(Auth::user()->posts as $post)
                    <div class="col mt-3">
                        <div class="card">
                            <div id="pic_welcome_wrapper" class="shadow-sm p-3 mb-3 bg-white rounded">
                                <a href="{{ route('post.show', $post->id) }}">
                                    @isset($post->image)
                                        <img src="{{ $post->image }}" class="card-img-top" id="pic">
                                    @else
                                        <img src="{{ asset('images/no_image.jpg') }}" class="card-img-top" id="pic">
                                    @endisset
                                </a>
                            </div>
                                <div class="card-body">
                                    <a href="{{ route('post.show', $post->id) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                                    <p>{{ $post->excerpt }}...</p>
                                </div>

                            <div class="card-footer">
                                <small class="text-muted">Posted: {{ date('Y-m-d', $post->created_at) }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
