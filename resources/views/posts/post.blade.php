<div class="blog-post">
    <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
    <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by {{ $post->user->name }} |
     @if (count($post->tags))
        @foreach ($post->tags as $tag)
            <a href="/posts/tags/{{ $tag->name }}"><label class="badge badge-primary">{{ $tag->name }}</label></a>
        @endforeach
     @endif
     </p>
    <p>{{ $post->body }}</p>
    <hr>
</div>

