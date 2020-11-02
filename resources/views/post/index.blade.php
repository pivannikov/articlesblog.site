@extends ('layouts.layout' , ['title' => 'All posts'])

@section ('content')

    <div class="container">
        @include('post.cards')
    </div>

@endsection

