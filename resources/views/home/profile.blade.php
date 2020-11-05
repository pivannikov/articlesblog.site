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
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><span class="text-muted">Name: </span><strong>{{ ucfirst(Auth::user()->name) }}</strong></li>
                            <li class="list-group-item"><span class="text-muted">Privilege:</span><strong> {{ Auth::user()->id == 1 ? 'admin' : 'user' }}</strong></li>
                            <li class="list-group-item"><span class="text-muted">Email:</span><strong> {{ Auth::user()->email }}</strong></li>
                            <li class="list-group-item"><span class="text-muted">Registration date:</span><strong> {{ Auth::user()->created_at }}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
