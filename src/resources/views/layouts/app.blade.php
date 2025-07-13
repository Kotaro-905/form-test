<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="logo">FashionablyLate</div>
        <nav class="nav">
            @if (request()->routeIs('login'))
            <a href="{{ route('register') }}" class="nav-link">register</a>
            @elseif (request()->routeIs('register'))
            <a href="{{ route('login') }}" class="nav-link">login</a>
            @endif
        </nav>
    </header>


    <main>
        @yield('content')
    </main>
</body>

</html>