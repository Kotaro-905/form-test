<h1>お問い合わせフォーム</h1>


<h2>環境構築</h2>

## Dockerビルド
<ul>
　<li>1.origin  git@github.com:Kotaro-905/form-test.git</li>
  <li>2.ug docker-compose up -d --build</li>
  </ul>

※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください

## Laravel環境構築
<ul>
　<li>1．docker-compose exec php bash</li>
　<li>2.composer install</li>
　<li>3..env.exampleファイルからenvを作成し、環境変数を変更</li>
　<li>4.php artisan key:generate</li>
　<li>5.php artisan migrate</li>
　<li>6.php artisan db:seed</li>
</ul>

## 使用技術
<ul>
 <li>PHP 7.4.9</li>
 <li>Laravel 8.83.29</li>
 <li>MySQL　9.3.0</li>
  <li>Docker（開発環境</li>
  <li>Laravel Fortify（認証機能</li>
  <li>HTML/CSS（クラスベースのスタイリング</li>
</ul>

## ER図
<img width="1463" height="949" alt="スクリーンショット 2025-07-14 191514" src="https://github.com/user-attachments/assets/85463ba0-df35-4344-ae29-62518a9e4634" />


## URL
・開発環境：http://localhost/（お問い合わせフォーム）
　　　　　　http://localhost/register　（登録画面）

・phpMyAdmin：http://localhost:8080/index.php?route=/database/structure&db=laravel_db

<h3>注意点</h3>

・登録画面でユーザー登録後、ログイン画面に遷移します。

・ログイン後、管理者画面（/admin/contacts）にリダイレクトされます。

・ログアウト後はログイン画面へ遷移します。



