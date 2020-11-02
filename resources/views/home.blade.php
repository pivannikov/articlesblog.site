@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in,
                    <strong>{{ ucfirst(Auth::user()->name) }}</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <h4>My posts:</h4>
            <div class="card-deck">
                @foreach(Auth::user()->posts as $post)
                    <div class="card">
                        <img src="{{ $post->image }}" class="card-img-top" width="250">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
{{--                            <p class="card-text">{{ $post->excerpt }}</p>--}}
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
