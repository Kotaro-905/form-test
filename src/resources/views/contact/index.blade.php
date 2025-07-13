<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
    </header>

    <main class="main">
        <div class="form-container">
            <h2 class="form-title">Contact</h2>

            <form action="{{ route('contact.confirm') }}" method="POST" class="form">
                @csrf

                <div class="form-group">
                    <label>お名前 <span class="required">※</span></label>
                    <div class="name-fields">
                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 山田">
                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 太郎">
                        @error('first_name')<p class="error">{{ $message }}</p>@enderror
                        @error('last_name')<p class="error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>性別 <span class="required">※</span></label>
                    <div class="gender-options">
                        <label><input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}>男性</label>
                        <label><input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>女性</label>
                        <label><input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>その他</label>
                        @error('gender')<p class="error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>メールアドレス <span class="required">※</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                    @error('email')<p class="error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label>電話番号 <span class="required">※</span></label>
                    <input type="text" name="tel" value="{{ old('tel') }}" placeholder="080-1234-5678">
                    @error('tel')<p class="error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label>住所 <span class="required">※</span></label>
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3">
                    @error('address')<p class="error">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label>建物名</label>
                    <input type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101">
                </div>

                <div class="form-group">
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

                <div class="form-group">
                    <label>お問い合わせ内容 <span class="required">※</span></label>
                    <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
                    @error('content')<p class="error">{{ $message }}</p>@enderror
                </div>

                <div class="form-footer">
                    <button type="submit" class="submit-btn">確認画面へ</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>