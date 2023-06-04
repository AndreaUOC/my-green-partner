<!doctype html>
<html lang="ca">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title> My Green Partner</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">{{__('transLayout.Home')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('plantTable') }}">{{__('transLayout.Application')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('database') }}">{{__('transLayout.Database')}}</a>
                    </li>
                    <li class="nav-item" style="margin-left: auto;">
                        <a class="nav-link" href="{{ route('index') }}">{{__('transLayout.Community')}}</a>
                    </li>
                </ul>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <ul class="navbar-nav">
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="{{ route('about') }}">{{__('transLayout.About us')}}</a>
                    </li>
                </ul>
                @if (Auth::check())
                <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning">{{__('transLayout.Out')}}</button>
                    </form>
                @else
                    <a class="btn btn-secondary btn-sm pt-2" type="button" href="{{ route('login') }}">{{__('transLayout.Access')}}</a>
                @endif
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Footer line  -->
    </footer>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

</body>

</html>
