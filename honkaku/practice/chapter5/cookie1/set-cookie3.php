<?php

declare(strict_types=1);

setcookie("name-asa-map[key1]", 'value1', time() + 60 * 60, '/', '', false, true);
setcookie("name-asa-map[key2]", 'value2', time() + 60 * 60, '/', '', false, true);
setcookie("name-asa-map[key3]", 'value3', time() + 60 * 60, '/', '', false, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クッキーの送出3</title>
</head>

<body>
    <p>PHPからクッキーを送出しました。</p>
</body>

</html>
