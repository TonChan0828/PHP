<?php

declare(strict_types=1);

function connect(): PDO
{
    $pdo = new PDO('mysql:host=localhost; dbname=honkaku; charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    return $pdo;
}

try {
    $pdo = connect();
} catch (PDOException $e) {
    echo '接続に失敗しました';
    return;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>オートコミット</title>
</head>

<body>
    <?php
    try {
        $pdo->exec("INSERT INTO books(created,title) VALUES(CURRENT_TIMESTAMP, 'ブランド牛図鑑 1巻')");
        $pdo->exec("INSERT INTO books(created,title) VALUES(CURRENT_TIMESTAMP, 'ブランド牛図鑑 2巻')");
        echo '本の登録に成功しました';
    } catch (Exception $e) {
        echo '例外が発生しました';
    }
    ?>
</body>

</html>
