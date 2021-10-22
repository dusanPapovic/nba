<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            Teams
        </a>
        <a class="navbar-brand" href="/news">
            News
        </a>
        <a class="navbar-brand" href="/create/news">
            Create News
        </a>
        @auth
        <div>
            {{auth()->user()->name}}
        </div>
        <div>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
        @else
        <div>
            <a href="/login" class="nav-link">Login</a>
        </div>
        <div>
            <a href="/register" class="nav-link">Register</a>
        </div>
        @endauth

    </div>
</nav>