<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>管理画面 - FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('css')
</head>

<body>
    <header class="admin-header">
        <div class="admin-header__inner">
            <div class="admin-logo">FashionablyLate 管理画面</div>
            <nav class="admin-nav">
                @auth
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="logout-button">ログアウト</button>
                </form>
                @endauth
            </nav>
        </div>
    </header>

    <main class="admin-main">
        <div class="admin-container">
            @yield('content')
        </div>
    </main>
</body>

</html>