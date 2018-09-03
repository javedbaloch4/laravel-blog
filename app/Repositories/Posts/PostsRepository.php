<?php

namespace App\Repositories\Posts;

use App\Post;

class PostsRepository {

    public function all() {
        return Post::latest()
            ->filter(request()->only(['month', 'year']))
            ->get();
    }

}
