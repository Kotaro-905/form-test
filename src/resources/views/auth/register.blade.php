@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection


@section('content')
<div class="auth-card">
    <h2 class="auth-title">Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- 名前 --}}
        <div class="form-group">
            <label for="name">お名前</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="例: 山田　太郎" />
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- メールアドレス --}}
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" />
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- パスワード --}}
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" name="password" placeholder="例: coachtech1106" />
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- パスワード確認 --}}
        <div class="form-group">
            <label for="password_confirmation">パスワード確認</label>
            <input type="password" name="password_confirmation" placeholder="もう一度パスワードを入力" />
        </div>

        {{-- 登録ボタン --}}
        <div class="form-group">
            <button type="submit" class="form-button">登録</button>
        </div>
    </form>
</div>
@endsection