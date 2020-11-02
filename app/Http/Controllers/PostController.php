<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required'
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->excerpt = strip_tags(substr($request->input('body'), 0, 298));
        $post->body = strip_tags($request->input('body'), ['p', 'i', 'b', 'h5']);
        $source = $request->file('image');

        if ($source) {
            $extension = $source->extension();
            $path = Storage::putFileAs('public/postsimg', $source, md5(time()) . '.' . $extension);
            $post->image = Storage::url($path);
        }

        $post->save();

        return redirect()->route('post.index')->with('success', 'New post has been created succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (!$this->checkRights($post)) {
            return redirect()->route('post.index')->withErrors('You have no permissions');
        }

//        if (Auth::id() != $post->user_id) {
//            return redirect()->route('post.index')->withErrors('You can edit only your posts');
//        }
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if (!$this->checkRights($post)) {
            return redirect()->route('post.index')->withErrors('You have no permissions');
        }

//        if (Auth::id() != $post->user_id) {
//            return redirect()->route('post.index')->withErrors('You can edit only your posts');
//        }

        $post->title = strip_tags($request->input('title'));
        $post->category_id = $request->input('category_id');
        $post->excerpt = strip_tags(substr($request->input('body'), 0, 298));
        $post->body = strip_tags($request->input('body'), '<p><i><b><h5><strong><em><s>');
        $source = $request->file('image');

        if ($source) {
            if (!empty($post->image)) {
                $name = basename($post->image);
                if (Storage::exists('public/postsimg/' . $name)) {
                    Storage::delete('public/postsimg/' . $name);
                }
                $post->image = null;
            }
            $extension = $source->extension();
            $path = Storage::putFileAs('public/postsimg', $source, md5(time()) . '.' . $extension);
            $post->image = Storage::url($path);
        }

        $post->update();

        return redirect()->route('post.show', $post->id)->with('success', 'Post has been updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (!$this->checkRights($post)) {
            return redirect()->route('post.index')->withErrors('You have no permissions');
        }

//        if (Auth::id() != $post->user_id) {
//            return redirect()->route('post.index')->withErrors('You can delete only your posts');
//        }

        if (!empty($post->image)) {
            $name = basename($post->image);
            if (Storage::exists('public/postsimg/' . $name)) {
                Storage::delete('public/postsimg/' . $name);
            }
            $post->image = null;
        }
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post has been deleted!');
    }

    private function checkRights(Post $post) {
        return Auth::id() == $post->user_id || Auth::id() == 1;
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $posts = Post::select('posts.*')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.title', 'like', '%' . $search . '%')
            ->orWhere('posts.body', 'like', '%' . $search . '%')
            ->orWhere('users.name', 'like', '%' . $search . '%')
            ->orWhere('categories.name', 'like', '%' . $search . '%')
            ->orWhere('categories.body', 'like', '%' . $search . '%')
            ->paginate(5);
    return view('post.search', compact('posts'));
    }
}
