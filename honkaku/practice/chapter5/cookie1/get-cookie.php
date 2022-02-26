<?php

declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クッキー変数</title>
</head>

<body>
    Webブラウザから送信されたクッキーの内容は、以下の通りです。<br>
    <pre><?php print_r($_COOKIE) ?></pre>
</body>

</html>
