<?php

declare(strict_types=1);

function connect(): PDO
{
    $pdo = new PDO('mysql:host=localhost; dbname=honkaku; charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
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
    <title>トランザクション</title>
</head>

<body>
    <?php
    $pdo->beginTransaction();

    try {
        $pdo->exec("INSERT INTO books(created,title) VALUES(CURRENT_TIMESTAMP, 'SAMPLE BOOK 1')");
        echo '* SAMPLE BOOK 1のレコード作成に成功しました', PHP_EOL;

        $pdo->exec("*** INVALID SQL! ***");
        echo '* INVALID SQLの実行に成功しました', PHP_EOL;

        $pdo->exec("INSERT INTO books(created, title) VALUESCURRENT_TIMESTAMP, 'SAMPLE BOOK 2')");
        echo '*SAMPLE BOOK 2のレコード作成に成功しました', PHP_EOL;

        $pdo->commit();
        echo '* すべてのデータベース処理が正しく完了しました', PHP_EOL;
    } catch (Exception $e) {
        $pdo->rollback();
        echo '* 例外が起こったため、データベース処理をロールバックしました';
    }
    ?>
</body>

</html>
