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
                        @include('home._menu')
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5 mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><span class="text-muted">Name: </span><strong>{{ ucfirst(Auth::user()->name) }}</strong></li>
                            <li class="list-group-item"><span class="text-muted">Privilege:</span><strong> {{ Auth::user()->id == 1 ? 'admin' : 'user' }}</strong></li>
                            <li class="list-group-item"><span class="text-muted">Email:</span><strong> {{ Auth::user()->email }}</strong></li>
                            <li class="list-group-item"><span class="text-muted">Registration date:</span><strong> {{ Auth::user()->created_at }}</strong></li>
                            <li class="list-group-item"><span class="text-muted">Posts quantity:</span><strong> {{ Auth::user()->posts->count() }}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
