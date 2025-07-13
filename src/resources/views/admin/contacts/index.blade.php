<!-- 管理画面  -->
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<h2 class="header">Admin</h2>

<form method="GET" class="search-form">
    <input type="text" name="keyword" placeholder="お名前 or メール" value="{{ request('keyword') }}">

    <select name="gender">
        <option value="">性別</option>
        <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
        <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
        <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
    </select>

    <select name="category_id">
        <option value="">カテゴリー</option>
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->content }}
        </option>
        @endforeach
    </select>

    <input type="date" name="from" value="{{ request('from') }}">
    <input type="date" name="until" value="{{ request('until') }}">

    <button type="submit">検索</button>
    <a href="{{ route('admin.contacts.index') }}" class="reset-btn">リセット</a>
</form>

<form method="GET" action="{{ route('admin.contacts.export') }}">
    @foreach (['keyword', 'gender', 'category_id', 'from', 'until'] as $field)
    <input type="hidden" name="{{ $field }}" value="{{ request($field) }}">
    @endforeach
    <button type="submit" class="export-btn">エクスポート</button>
</form>

<div class="table-container">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>お名前</th>
                <th>性別</th>
                <th>メール</th>
                <th>お問い合わせの種類</th>
                <th>登録日</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->full_name }}</td>
                <td>{{ $contact->gender_label }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content ?? '' }}</td>
                <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                <td><button type="button" class="detail-button" data-id="{{ $contact->id }}">詳細</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $contacts->appends(request()->query())->links() }}
</div>

@include('admin.contacts.modal')
@endsection