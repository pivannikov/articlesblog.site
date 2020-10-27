<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        $posts = Post::orderByRaw('RAND()')->take(3)->get();
        return view('main.welcome', compact('posts'));
    }

    public function contact()
    {
        return view('main.contact');
    }


}




