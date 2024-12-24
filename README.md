# Laravel プロジェクト

## Laravel

1. php の dockerfile で不要な部分をコメントアウト
2. docker compose run --no-deps --rm php bash
3. php コンテナに入り composer create-project laravel/laravel src
4. cp -a ./src/. . # コピーする src/.の.を忘れずに
5. rm -rf ./src/ # いらなくなった空の src を消す
6. exit で抜ける
7. git 系のいらないやつ消す
8. Laravel 側の設定として src/.env の設定 # Laravel は root の.env を自動で読み込む
9. docker compose build
10. docker compose up -d
11. open http://localhost:8080

## Laravel 側の設定 (.env)

```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=test
DB_PASSWORD=test
```
