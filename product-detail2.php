<?php

// データベース接続情報

$host = 'mysql:host=mysql304.phy.lolipop.lan';

$dbname = 'dbname=LAA1557215-php2024';

$username = 'LAA1557215';

$password = 'Pass0308';
try {

    // データベース接続

    $pdo=new PDO('mysql:host=mysql304.phy.lolipop.lan;
    dbname=LAA1557215-php2024;charset=utf8','LAA1557215','Pass0308');
} catch (PDOException $e) {

    echo "データベース接続エラー: " . $e->getMessage();

    exit;

}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細</title>
</head>
<body>
    <!-- Header -->
    <div class="header">商品詳細</div>

    <!-- 商品詳細情報 -->
    <div class="product-detail-container">
        <img src="./ASOLI.img/ソファスク.png" alt="商品画像" class="product-image">
        <div class="product-info">
            <div>カテゴリー：XXXX</div>
            <div>商品名：XXXX</div>
            <div>価格：XXXX円</div>
            <div>商品説明：ここに商品の詳細な説明を入力してください。</div>
        </div>
        <button class="back-button" onclick="goToProductList()">商品一覧画面へ戻る</button>
        <button onclick="window.location.href='purchase.php'">購入する</button>    
    </div>
    <br>
    <div>お届け先：福岡県福岡市博多区 博多駅南1-11-11</div>
    <br>
    <div>お届け予定日 X月X日</div>
    <script>
        function goToProductList() {
            window.location.href = "product_list.php";
        }
    </script>
</body>
</html>
