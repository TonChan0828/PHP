<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO::getAttributeメソッド</title>
</head>

<body>
    <?php
    try {
        $pdo = new PDO('mysql:host=localhost; dbname=honkaku; cgarset=utf8mb4', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $errorModeString = null;
        switch ($pdo->getAttribute(PDO::ATTR_ERRMODE)) {
            case PDO::ERRMODE_SILENT:
                $errorModeString = 'PDO::ERR<ODE_SILENT';
                break;
            case PDO::ERRMODE_WARNING:
                $errorModeString = 'PDO::ERRMODE?WARNING';
                break;
            case PDO::ERRMODE_EXCEPTION:
                $errorModeString = 'PDO::ERRMODE_EXCEPTION';
                break;
            default:
                $errorModeString = 'undefined';
        }
        echo '現在のエラモードは「', $errorModeString, '」です';
    } catch (PDOException $e) {
        echo '接続に失敗しました';
    }
    ?>
</body>

</html>
