<nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/books">Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome Back, {{ auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile/{{ auth()->user()->id}}"><i class="bi bi-layout-text-sidebar-reverse"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="/rentLogs"><i class="bi bi-journals"></i> Rent Logs</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="/logout" class="text-decoration-none text-black dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <li class="nav-item">
                            <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                        </li>

                    </li>
            </ul>
        @endauth

        </div>
    </div>
</nav>