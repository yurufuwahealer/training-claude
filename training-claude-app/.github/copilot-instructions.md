# GitHub Copilot 向けコンテキスト（training-claude-app）

Laravel + Inertia.js + React + TypeScript による SPA アプリ。
Claude Code を極めるための学習・実験用プロジェクト。

---

## 技術スタック

| レイヤー | 技術 |
|---------|------|
| バックエンド | PHP 8.3+ / Laravel 13 |
| フロントエンド | React 19 / TypeScript / Inertia.js 3 |
| スタイル | Tailwind CSS 4 / Radix UI |
| ビルド | Vite 8 |
| 認証 | Laravel Fortify |
| DB | SQLite（デフォルト）/ MySQL 8.4（Docker） |
| テスト | Pest |
| インフラ | Docker Compose（Laravel Sail）|

---

## 開発環境

- PHP・Node.js・Composer はローカルにインストールされていない
- すべてのコマンドは `sail` 経由で実行する（`php`・`composer`・`npm` を直接使わない）
- 実行前に Docker が起動していること

---

## よく使うコマンド

```bash
sail up -d                    # コンテナ起動
sail down                     # コンテナ停止
sail npm run dev              # フロント開発サーバー（別ターミナル）
sail npm run build            # フロントビルド
sail vendor/bin/pest          # テスト実行
sail composer lint            # PHP フォーマット（Pint）
sail npm run lint:check       # JS/TS Lint チェック
sail npm run lint             # JS/TS Lint 自動修正
sail npm run format           # Prettier フォーマット
sail npm run types:check      # TypeScript 型チェック
sail artisan migrate          # マイグレーション実行
```

---

## コーディング規約

規約の詳細は以下のファイルを参照すること：

- `pint.json` — PHP フォーマット規約（Laravel Pint）
- `eslint.config.js` — JavaScript / TypeScript 規約
- `.prettierrc` — フロントエンドフォーマット規約
- `.editorconfig` — インデント・改行コード設定

### Controller のルール

- 1つの Controller には1つのメソッドのみ定義する（シングルアクション Controller）
- メソッド名は `__invoke` を使う
- クラスやファサードの参照は絶対パスではなく、必ず `use` 宣言を使う

```php
// Good
use Illuminate\Http\Request;

class ShowUserController
{
    public function __invoke(Request $request) {}
}

// Bad
class UserController
{
    public function index(\Illuminate\Http\Request $request) {}
    public function show(\Illuminate\Http\Request $request) {}
}
```

---

## コミットメッセージ

```
{ブランチ名} {タイトル}

{修正内容の説明}
```

例：

```
TASK-123 ユーザー認証機能を追加

- ログイン・ログアウト処理を実装
- セッション管理を追加
```

---

## ブランチ戦略

ブランチ名はタスク管理ツールの ID を使う。

```
{タスク管理ツールのID}
```

例：`TASK-123`、`APP-456`

---

## ⚠️ やってはいけないこと

- **本番 DB への直接接続・操作は禁止**
- **main / master への直接 push は禁止**（必ずブランチを切って PR 経由でマージ）

---

## テスト方針

TDD（テスト駆動開発）を採用。**実装と同時にテストを書く**。

- テストフレームワーク：Pest
- テストファイル：`tests/` ディレクトリ
- 実行：`sail vendor/bin/pest`

---

## ディレクトリ構成

```
training-claude-app/
├── app/
│   ├── Models/          # Eloquent モデル
│   ├── Providers/       # サービスプロバイダー
│   └── Concerns/        # トレイト
├── config/              # 設定ファイル
├── database/
│   ├── migrations/      # マイグレーション
│   ├── seeders/         # シーダー
│   └── factories/       # ファクトリー
├── resources/
│   ├── js/              # React コンポーネント・ページ
│   │   ├── pages/       # Inertia ページコンポーネント
│   │   ├── components/  # 共通コンポーネント
│   │   └── layouts/     # レイアウト
│   └── css/             # スタイル
├── routes/              # ルーティング定義
├── tests/               # Pest テスト
└── compose.yaml         # Docker Compose（Sail）
```
