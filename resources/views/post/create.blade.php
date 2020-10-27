@extends('layouts.layout')

@section('content')
    <div class="container">
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

{{--                    hidden user--}}
                    <div class="form-group">
                        <input
                            type="text"
                            class="form-control"
                            name="user_id"
                            value="1"
                            hidden>
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
