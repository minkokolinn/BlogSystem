<!-- navbar -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
            <a href="/#blogs" class="nav-link">Blogs</a>
            @auth
                <a href="/" class="nav-link">Welcome {{ auth()->user()->name }}</a>
                <img src="{{ auth()->user()->avatar }}" alt="" class="rounded-circle" width="30" height="30">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link">Logout</button>
                </form>
            @else
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @endauth            
            <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>
