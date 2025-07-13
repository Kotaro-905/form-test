@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="form-container">
    <h2 class="form-title">ログイン</h2>

    @if (session('status'))
    <p class="status-message">{{ session('status') }}</p>
    @endif
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label>パスワード</label>
            <input type="password" name="password">
            @error('password') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-submit">
            <button type="submit">ログイン</button>
        </div>
    </form>
</div>
@endsection