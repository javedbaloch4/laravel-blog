<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts\PostsRepository;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index(PostsRepository $posts)
    {
        $posts = $posts->all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        auth()->user()->publish(new Post(request(['title', 'body'])));

        session()->flash(
            'message' , 'Post has been published'
        );

        return redirect('/');

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

}
