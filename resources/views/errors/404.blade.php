@extends('layouts.layout', ['title' => 'Page not found'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <h2>Page not found</h2>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('images/404.jpg') }}" alt="" class="img-fluid">
                        <p class="mt-3 mb-0">Request page not found. Go to the <a href="{{ route('main.welcome') }}"><span style="font-size: 20px">Main page</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
