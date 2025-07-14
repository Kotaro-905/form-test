<h1>お問い合わせフォーム</h1>


<h2>環境構築</h2>

## Dockerビルド
　1.origin  git@github.com:Kotaro-905/form-test.git
  2.ug docker-compose up -d --build

※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください

## Laravel環境構築

　1．docker-compose exec php bash
　2.composer install
　3..env.exampleファイルからenvを作成し、環境変数を変更
　4.php artisan key:generate
　5.php artisan migrate
　6.php artisan db:seed

## 使用技術

  PHP 7.4.9
  Laravel 8.83.29
  MySQL　9.3.0
  Docker（開発環境）
  Laravel Fortify（認証機能）
  HTML/CSS（クラスベースのスタイリング）

## URL
・開発環境：http://localhost/（お問い合わせフォーム）
　　　　　　http://localhost/register　（登録画面）

・phpMyAdmin：http://localhost:8080/index.php?route=/database/structure&db=laravel_db

<h3>注意点</h3>

・登録画面でユーザー登録後、ログイン画面に遷移します。

・ログイン後、管理者画面（/admin/contacts）にリダイレクトされます。

・ログアウト後はログイン画面へ遷移します。



