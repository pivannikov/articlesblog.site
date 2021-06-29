<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->paginate(5);

        return view('category.show', compact('category', 'posts'));
    }

}
