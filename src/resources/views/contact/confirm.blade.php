<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>

<body>
    <header class="header">
        <h1 class="logo">FashionablyLate</h1>
    </header>

    <main class="main">
        <div class="confirm-container">
            <h2 class="form-title">Confirm</h2>

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                @foreach ($inputs as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach

                <table class="confirm-table">
                    <tr>
                        <th>お名前</th>
                        <td>{{ $inputs['first_name'] }}　{{ $inputs['last_name'] }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            @switch($inputs['gender'])
                            @case(1) 男性 @break
                            @case(2) 女性 @break
                            @case(3) その他 @break
                            @default 不明
                            @endswitch
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $inputs['email'] }}</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>{{ $inputs['tel'] }}</td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>{{ $inputs['address'] }}</td>
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <td>{{ $inputs['building'] ?? '（未入力）' }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせの種類</th>
                        <td>{{ $categories->firstWhere('id', $inputs['category_id'])->content }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容</th>
                        <td>{!! nl2br(e($inputs['content'])) !!}</td>
                    </tr>
                </table>

                <div class="button-group">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        @foreach ($inputs as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        <button type="submit" class="btn-submit">送信</button>
                    </form>

                    <form action="{{ route('contact.confirm') }}" method="POST">
                        @csrf
                        @foreach ($inputs as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                        <button type="submit" name="back" value="true" class="btn-back">修正</button>
                    </form>
                </div>

        </div>
    </main>
</body>

</html>