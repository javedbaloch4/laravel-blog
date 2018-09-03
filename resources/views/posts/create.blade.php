@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
        <h1>Create A Post</h1>
        <hr>

        <form method="POST" action="/posts">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                <span class="text-danger small">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="body" id="description" cols="30" rows="10" class="form-control"> {{ old('body') }}</textarea>
                <span class="text-danger small">{{ $errors->has('body') ? $errors->first('body') : '' }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Publish</button>
            </div>

        </form>
    </div>

@endsection