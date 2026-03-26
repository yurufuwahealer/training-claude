# CLAUDE.md

このファイルは、リポジトリ内で作業するClaude Code（claude.ai/code）へのガイダンスを提供します。

## 概要

Claude Codeを極めるための学習・実験用リポジトリです。

## リポジトリの現状

`training-claude-app/` に Laravel + Inertia.js + React + TypeScript アプリが存在します。

## training-claude-app の開発環境

### ルール
- Laravel Sail（Docker Compose のラッパー）で動作している
- PHP・Node.js・Composer はローカルにインストールされていない
- すべてのコマンドは必ず `sail` 経由で実行する（直接 `php` `composer` `npm` は使わない）
- sail は内部で docker compose を使うため、実行前に Docker が起動している必要がある

### よく使うコマンド（`training-claude-app/` で実行）

- コンテナ起動: `sail up -d`
- コンテナ停止: `sail down`
- フロント開発サーバー: `sail npm run dev`（別ターミナルで手動起動）
- フロントビルド: `sail npm run build`
- マイグレーション: `sail artisan migrate`
- Composer: `sail composer {コマンド}`
- Artisan: `sail artisan {コマンド}`

## コミットメッセージ規則

コミットメッセージは日本語で記述する。

例: `ユーザー認証機能を追加`

## プロジェクトローカル設定（`.claude/settings.local.json`）

- **許可コマンド**（確認プロンプトなし）: `~/.bashrc:*`、`jq:*`
- **PostToolUse フック**: `Edit` ツール実行後に `echo 'ファイル編集完了！'` を自動実行
