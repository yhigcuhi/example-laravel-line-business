# example-laravel-line-business
Laravelによる LINE関連の ログインやらLINE Messaging APIのお試し

## 目的
- LINE ログイン の実装
- LINE Messaging API による メッセージやら リンクやら配信
- LINE リッチメニューをシステムから作る的なのができるかの実験

## 懸念
- LINEログインを行う プロバイダー(公式アカウント) と 違う公式アカウント間では LINE User ID異なる ... やりたいこと的に プラットフォームなアプリをやりたい ので検証
  → OpenID Connect でのSSOを目指すしかないか？

## 構成
### コンテナ...
    8080                  18080
    エンドユーザー ← ──── → 管理者 (Laravel + nginx WEB)
        ┗━━━━━━ DB(MySQL) ━━━━━━┛

### ミドル...
|項目|バージョン|
|:---|:---:|
|laravel|10|
|php|laravel にあわせ|
|nginx|とりあえず最新|
|mysql|とりあえず最新|

## その他 依存物 (特筆事項)
- Laravel Breeze ： 楽なので
- React + Typescript (viteでの) ： やりたいLINEへの操作とか画面はJSの方が良さそうな気が... TSなら残しておけば 忘れてもいいように
- Laravel Socialite ： LINEログインを簡易化できるか
- socialiteproviders/line ： Socialite LINEログイン用のドライバー

## 環境構築時での 手順 (プロジェクトを新規作成する時の手順)
1. Docker 用意
1. コンテナ起動
1. composer create-project laravel/laravel .
1. composer require laravel/breeze --dev
1. curl https://www.toptal.com/developers/gitignore/api/vim,react,node,linux,macos,laravel,windows,composer,intellij,sublimetext,visualstudio,visualstudiocode >> .gitignore
1. php artisan breeze:install react --typescript

## 参考
- [LaravelとLINEの連携：LINEでLaravelにログイン機能搭載](https://biz.addisteria.com/laravel_line_integration/)
- [Laravel9 Socialite LINEログイン実装](https://qiita.com/takahara_yuuki/items/6b84330582e69ed0b297)
- [composer socialiteproviders/line パッケージについて](https://packagist.org/packages/socialiteproviders/line)