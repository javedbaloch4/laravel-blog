
<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link {{ Request::path() == '/' ? 'active' : '' }}" href="/">Home</a>
            <a class="nav-link {{ Request::path() == 'posts/create' ? 'active' : '' }}" href="/posts/create">Create</a>
            <a class="nav-link" href="#">New hires</a>
            <a class="nav-link" href="#">About</a>


            @if (auth()->check())
                <a class="nav-link ml-auto" href="#">{{ auth()->user()->name }}</a>
                <a class="nav-link pull-right" href="/logout">Logout</a>
            @else
                <a class="nav-link ml-auto {{ Request::path() == 'register' ? 'active' : '' }}" href="/register">Register</a>
                <a class="nav-link pull-right {{ Request::path() == 'login' ? 'active' : '' }}" href="/login">Login</a>
            @endif
        </nav>
    </div>
</div>