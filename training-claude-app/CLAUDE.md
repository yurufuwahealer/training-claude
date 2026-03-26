# CLAUDE.md（training-claude-app）

Laravel アプリのコーディングルールを定義します。

## Controller

- 1つのControllerには1つのメソッドのみ定義する（シングルアクションController）
- メソッド名は `__invoke` を使う
- クラスやファサードの参照は絶対パス（`\Illuminate\...`）ではなく、必ず `use` 宣言を使う
