<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <h1>お問い合わせフォーム</h1>

    <form action="{{ route('contact.confirm') }}" method="POST">
        @csrf

        <div>
            <label>お名前 <span class="required">※</span></label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="姓">
            <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="名">
            @error('first_name')<p class="error">{{ $message }}</p>@enderror
            @error('last_name')<p class="error">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>性別 <span class="required">※</span></label>
            <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}>男性</label>
            <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>女性</label>
            <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>その他</label>
            @error('gender')<p class="error">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>メールアドレス <span class="required">※</span></label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')<p class="error">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>電話番号 <span class="required">※</span></label>
            <input type="text" name="tel" value="{{ old('tel') }}">
            @error('tel')<p class="error">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>住所 <span class="required">※</span></label>
            <input type="text" name="address" value="{{ old('address') }}">
            @error('address')<p class="error">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>建物名</label>
            <input type="text" name="building" value="{{ old('building') }}">
        </div>

        <div>
            <label>お問い合わせの種類 <span class="required">※</span></label>
            <select name="category_id">
                <option value="">選択してください</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
                @endforeach
            </select>
            @error('category_id')<p class="error">{{ $message }}</p>@enderror
        </div>

        <div>
            <label>お問い合わせ内容 <span class="required">※</span></label>
            <textarea name="content">{{ old('content') }}</textarea>
            @error('content')<p class="error">{{ $message }}</p>@enderror
        </div>

        <button type="submit">確認画面へ</button>
    </form>
</body>

</html>