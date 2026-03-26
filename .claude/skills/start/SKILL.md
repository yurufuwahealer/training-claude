---
name: start
description: 開発環境を起動する（Docker + Laravel Sail のコンテナのみ）
---

以下を順番に実行する：
1. Docker が起動しているか確認する。起動していない場合は「Dockerを起動してください」と伝えて終了する
2. `training-claude-app/` ディレクトリで `sail up -d` でコンテナを起動する
3. コンテナが正常に起動したか確認する
4. `http://localhost` にアクセスできるか確認する
5. 起動完了をユーザーに報告する
6. 「フロント開発サーバーは別ターミナルで `sail npm run dev` を実行してください」と案内する
