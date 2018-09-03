<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Controllers\CommentController;

class CommentsController extends Controller
{
    public function store(Post $post)
    {

        $this->validate(request(), [
            'body' => 'required|min:5|max:200'
        ]);

        $post->addComment(request('body'));

        return back();
    }
}
