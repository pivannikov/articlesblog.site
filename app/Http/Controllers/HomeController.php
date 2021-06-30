<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.home');
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function report()
    {
        $users = User::all();

        return view('home.report', compact('users'));
    }
}
