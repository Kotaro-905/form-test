@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection


@section('content')

<h2 class="page-title">Login</h2>

<section class="form-wrapper">
    <form action="#" method="post">
        <label for="email">メールアドレス</label>
        <input id="email" type="email" placeholder="例: test@example.com">

        <label for="password">パスワード</label>
        <input id="password" type="password" placeholder="例: coachtech1106">

        <button type="submit">ログイン</button>
    </form>
</section>
@endsection