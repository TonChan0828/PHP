<?php

declare(strict_types=1);

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>セッションの利用</title>
</head>

<body>
    <h2>お問い合わせ確認</h2>
    <h4>メールアドレス:</h4>
    <p><?= $_SESSION['data']['email'] ?></p>
    <h4>お問い合わせ内容:</h4>
    <p><?= nl2br($_SESSION['data']['message']) ?></p>

    <a href="thankyou.php">送信する</a>
    <a href="input.php">入力画面へ戻る</a>
</body>

</html>
