<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>値のバインド</title>
</head>

<body>
    <?php
    require_once dirname(__FILE__) . '/functions.php';

    try {
        $pdo = connect();
    } catch (PDOException $e) {
        echo '接続に失敗しました';
        return;
    }

    $title = null;
    $statement = $pdo->prepare('INSERT INTO books(created,title) VALUES(CURRENT_TIMESTAMP, :title)');
    for ($i = 1; $i <= 3; $i++) {
        $title = 'TEST BOOK' . $i . '(bindValue)';
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->execute();
    }
    $title = null;
    $statement = $pdo->prepare('INSERT INTO books(created,title) VALUES(CURRENT_TIMESTAMP, :title)');
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    for ($i = 1; $i <= 3; $i++) {
        $title = 'TEST BOOK' . $i . '(bindParam)';
        $statement->execute();
    }
    echo '登録完了しました';
    ?>
</body>

</html>
