@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-9 mt-3">
                <h3>All categories</h3>
                @foreach($categories as $category)
                    <div class="card mb-4">
                        <div class="card-header bg-dark text-white">
                            <h5>{{ $category->name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $category->body }}</p>
                            <a href="{{  route('category.show', $category->slug ) }}" class="btn btn-light">Go to category</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-3 mt-5">
                @include('main.sidebar')
            </div>

        </div>
    </div>
@endsection
