<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
        crossorigin="anonymous"
    >
    <style>
        *{
            margin: 0;
        }

        * a:link, a:visited{
            text-decoration: none;
        }

        /* ::-webkit-scrollbar {
            display: none;
        } */

        body{
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .mainContent{
            padding: 1vw;
        }

        .contentTitle{
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light shadow-sm">
            <div class="container-fluid">
                <h3 style="text-shadow: 1px 2px 12px rgba(0,0,0,0.33);">
                    <a class="navbar-brand" href="/home">Maiboutique</a>
                </h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/search">Search</a>
                        </li>
                        @auth
                        {{-- For MEMBER start --}}
                        @if (Auth::user()->role == 'member')
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/cart">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/history">History</a>
                            </li>
                        @endif
                        {{-- For MEMBER end --}}
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/profile">Profile</a>
                        </li>
                        @endauth
                    </ul>
                    @auth
                    <div>
                        {{-- For ADMIN start --}}
                        @if (Auth::user()->role == 'admin')
                            <a class="btn btn-primary" href="/add-item">Add Item</a>
                        @endif
                        {{-- For ADMIN end --}}
                        <a class="btn btn-primary" href="/sign-out">Sign Out</a>
                    </div>
                    @else
                    <div>
                        <a class="btn btn-primary" href="/sign-in">Sign In</a>
                    </div>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    @yield('content-1')

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"
    ></script>
</body>
@if (session()->has('homeSession'))
<script>
    alert('{{session('homeSession')}}');
</script>
@endif
</html>
