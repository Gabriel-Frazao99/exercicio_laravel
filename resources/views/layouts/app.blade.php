<html>

<head>
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-secondary mb-3" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Laravel Exercise</a>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ url('/contacts') }}">Contacts</a>
                </div>
            </div>
            @if (auth()->user())
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <form class="m-0" action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <li><button type="submit" class="dropdown-item">Logout</button></li>
                            </form>
                        </ul>
                    </li>
                </ul>
            @else
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </div>
            @endif
        </div>
    </nav>

    <div>
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
