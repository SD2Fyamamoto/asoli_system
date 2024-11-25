<!--ログイン画面のソースコード-->
<link rel="stylesheet" href="./CSS/style.css"/>
<?php
session_start();
require 'db_config.php'; // データベース接続ファイル
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   // 入力値を取得
   $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
   $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
   if ($email && $password) {
       try {
           // ユーザーを検索
           $stmt = $pdo->prepare('SELECT id, password FROM users WHERE email = :email');
           $stmt->bindValue(':email', $email, PDO::PARAM_STR);
           $stmt->execute();
           $user = $stmt->fetch();
           if ($user && password_verify($password, $user['password'])) {
               // セッションにユーザー情報を保存
               $_SESSION['user_id'] = $user['id'];
               header('Location: mypage.php'); // マイページにリダイレクト
               exit;
           } else {
               $error = 'メールアドレスまたはパスワードが間違っています。';
           }
       } catch (Exception $e) {
           $error = 'エラーが発生しました: ' . $e->getMessage();
       }
   } else {
       $error = 'すべての項目を入力してください。';
   }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css"/>
    <title>中央にフォームとボタンを表示</title>
</head>
<body>
    <div class="container">
        <div>メールアドレス・または管理者ID</div>
        <input type="text" placeholder="入力してください">
        
        <div>パスワード</div>
        <input type="password" placeholder="パスワードを入力してください">
        
        <button class="button login-button">ログイン</button>
        <button class="button register-button">新規登録</button>
        <button class="button admin-register-button">管理者新規登録</button>
        
        <div class="note">※一般ユーザーは使用できません</div>
    </div>
</body>
</html>
