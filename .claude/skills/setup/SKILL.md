---
name: setup
description: 開発環境を初回セットアップする。何度実行しても同じ状態になる（冪等性あり）。DBをドロップ＆再作成してシーダーを実行する。
---

## 前提確認
1. Docker が起動しているか確認する。起動していない場合は「Dockerを起動してください」と伝えて終了する

## 手順

### 1. sail エイリアスの設定
- `~/.bashrc` に以下のエイリアスがすでに存在するか確認する
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
- 存在しない場合のみ追記して `source ~/.bashrc` を実行する
- すでに存在する場合はスキップする

### 2. .env の準備
- `.env` が存在しない場合は `.env.example` をコピーして `.env` を作成する
- `.env` がすでに存在する場合はスキップする

### 3. composer install
- `docker run --rm -v $(pwd):/app composer install` を実行する
- ※ この時点ではまだ sail が使えないため docker 直接実行する

### 4. コンテナの起動
- `sail up -d` を実行する
- コンテナが正常に起動したか確認する

### 5. APP_KEY の生成
- `.env` の `APP_KEY` が空の場合のみ `sail artisan key:generate` を実行する
- すでに値がある場合はスキップする

### 6. npm install
- `sail npm install` を実行する

### 7. DBのドロップ＆再作成（冪等）
- `sail artisan db:wipe` を実行して DB を全削除する
- `sail artisan migrate --seed` を実行してテーブル再作成とシーダーを実行する

### 8. 完了報告
以下を報告する：
- 実行したステップの一覧とそれぞれの結果
- `http://localhost` でアクセスできること
- 「フロント開発サーバーは別ターミナルで `sail npm run dev` を実行してください」と案内する

## 注意事項
- `db:wipe` は既存のデータをすべて削除する。本番環境では絶対に実行しないこと
- `.env` の APP_ENV が `local` または `testing` であることを確認してから実行すること
- `.env` の DB 接続情報が正しいことを前提とする
