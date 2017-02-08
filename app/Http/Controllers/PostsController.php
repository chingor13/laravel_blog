<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        $permalink = preg_replace('/\W/', '-', request('title'));
        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'permalink' => $permalink
        ]);

        return redirect("/posts/{$post->permalink}");
    }
}
