@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-post">
        <h1>Login</h1>
        <hr>

        <form action="/login" method="post">

            {{ csrf_field() }}

            <div class="error">
                @if(session()->has('message'))
                    <div class="alert alert-danger">{{ session()->get('message') }}</div>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email">
                <span class="text-danger small">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password">
                <span class="text-danger small">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>

            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>

        </form>

    </div>
@endsection