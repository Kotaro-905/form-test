<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>確認画面</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <h1>確認画面</h1>

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        @foreach ($inputs as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <table>
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

        <button type="submit">送信</button>
    </form>

    <form action="{{ route('contact.index') }}" method="GET">
        <button type="submit" name="back" value="true">修正</button>
    </form>
</body>

</html>