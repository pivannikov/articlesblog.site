@extends ('layouts.layout', ['title' => $category->name])

@section ('content')
    <div class="container">
        @include('post.cards')
    </div>


@endsection
