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

        @if(Auth::user()->id == 6)
            <div class="row">
                <div class="col-md-12 mt-5 mb-5">
                    <h4>Users table:</h4>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Posts quantity</th>
                            <th scope="col">Registration date</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getPosts()->count() }}</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        @else
            <h4 class="mt-5 text-danger">Reports are only available to a user with administrator privileges</h4>
        @endif

    </div>
@endsection
