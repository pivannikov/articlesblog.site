@extends('layouts.layout', ['title' => 'Create new post'])

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

        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="mt-2 mb-3">Create post</h1>
                <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        @error('title')
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('title') }}
                        </div>
                        @enderror
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                     </div>

                    <div class="form-group">
                        <label for="summary-ckeditor">Text</label>
                        @error('body')
                            <div class="alert alert-danger" role="alert">
                                {{ $errors->first('body') }}
                            </div>
                        @enderror
                        <textarea
                            class="form-control"
                            name="body"
                            id="summary-ckeditor"
                            rows="20">
                            {{ old('body') }}
                        </textarea>
                    </div>

                    <div class="form-group mb-5 pb-3 shadow-sm p-3 mb-5 bg-white rounded" style="border-bottom: 1px solid lightgray;">
                        <h5>New image</h5>
                        <input
                            type="file"
                            class="form-control-file"
                            name="image">
                    </div>
                    <div class="form-group mb-5">
                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
