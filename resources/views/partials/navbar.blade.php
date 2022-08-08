<nav class="navbar navbar-dark sticky-top" style="background-color: var(--blue);">
    <div class="container-fluid pt-2 pb-2">
        <a class="navbar-brand fs-3 fw-bold" href="/">Beeverse</a>
        <div class="d-flex">
            <div class="navbar-nav d-flex flex-row">
                <a class="nav-link pr-4" href="/">Home</a>
                @if(Auth::check())
                    <a class="nav-link pr-4" href="/manage_office">Wishlist</a>
                    <a class="nav-link pr-4" href="/manage_estate">Friends</a>
                    <a class="nav-link pr-4" href="/manage_estate">Inventory</a>
                    <a class="nav-link pr-4" href="/manage_estate">Shop</a>
                    <a class="nav-link pr-4" href="/manage_estate">Settings</a>
                    <a class="nav-link" href="/logout">Logout</a>
                @else
                    <a class="nav-link pr-4" href="/login">Login</a>
                    <a class="nav-link" href="/register">Register</a>
                @endif
            </div>
        </div>
    </div>
</nav>
