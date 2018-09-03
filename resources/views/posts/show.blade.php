@extends('layouts.master')

@section('style')
    <style>
        .dangers {
            color: #c0392b;
        }

        .warnings {
            color: #f39c12;
        }
    </style>
@endsection

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>{{ $post->title }}</h1>
        <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by {{ $post->user->name }}</p>
        <p>{{ $post->body }}</p>

        <hr>
        <div class="comments">
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item"><strong>{{ $comment->created_at->diffForHumans() }}:</strong>
                        &nbsp; {{ $comment->body }}</li>
                @endforeach
            </ul>
        </div>

        @if(auth()->check())
        <hr>
        <div class="card">
            <div class="card-block">
                <form action="/comments/{{ $post->id }}/create" method="post">

                    {{ csrf_field() }}

                    <div id="app">
                        <div class="form-group">
                            <textarea name="body" id="field" v-model="comment" placeholder="Your comment here"
                                      class="form-control"></textarea>
                            <span :class="commentClass" class="small">@{{ comment.length }} out of 140</span>
                            <span class="text-danger small">{{ $errors->has('body') ? $errors->first('body') : '' }}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Add Comment</button>
                    </div>

                </form>
            </div>
        </div>
        @endif
    </div>
@endsection

@section('script')
    <script>

        let app = new Vue({
            el: '#app',
            data: {
                comment : '',
            },

            computed: {
                commentClass() {
                    return {
                        dangers: this.comment.length > 140
                    }
                }
            }

        });

    </script>
@endsection