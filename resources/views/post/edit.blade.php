@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="mt-2 mb-3">Update post</h1>
                <form method="POST" action="{{ route('post.show', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $post->title }}" required>
                    </div>
                    {{--                    hidden user--}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_id" value="1" hidden>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Category</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            @foreach($categories as $category)
                                @if($post->category->name == $category->name)
                                    <option selected value="{{ $category->id }}">{{ $post->category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="summary-ckeditor">Text</label>
                        <textarea class="form-control" name="body" id="summary-ckeditor" placeholder="Content" rows="20" required>{!! $post->body !!}</textarea>
                    </div>
                    <h4 class="mt-5">Image:</h4>
                    <div class="mb-5 pb-3 shadow-sm p-3 mb-5 bg-white rounded" style="border-bottom: 1px solid lightgray;">
                        <img src="{{ $post->image }}" alt="" width="200">
                        <button type="button" class="btn btn-danger ml-5 " onclick="location.href='{{ route('post.edit', $post->id) }}'">delete</button>
                    </div>

                    <div class="form-group mb-5 pb-3 shadow-sm p-3 mb-5 bg-white rounded" style="border-bottom: 1px solid lightgray;">
                        <h5>New image</h5>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <div class="form-group mb-5">
                        <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
