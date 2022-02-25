<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$_SERVER</title>
</head>

<body>
    <h3>以下のリンクをクリックすると、次の画面に移動します。</h3>
    <a href="second.php/some-key/some-value?date=<?= date('Y-m-d') ?>&time=<?= date('H:i:s') ?>">クリック</a>

</body>

</html>
