<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">readme</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li>
                    <div class="container-fluid">
                        <form method="GET" class="d-flex" action="/book">
                            <input class="form-control me-2" type="search" placeholder="Search Books" aria-label="Search" name="search" value="{{ request('search') }}" autocomplete="off">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="/bookmark">Bookmark</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Cart</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <a class="nav-link" id="logout-text">Log Out</a>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script>
    /*
    *
    * Submit logout form when logout-text is clicked
    */

    document.addEventListener('DOMContentLoaded', () => {
        const logoutForm = document.getElementById('logout-form')
        const logoutText = document.getElementById('logout-text')

        logoutText.addEventListener('click', () => {
            logoutForm.submit()
        })
    })
</script>
