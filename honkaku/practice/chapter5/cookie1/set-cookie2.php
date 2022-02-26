<?php

declare(strict_types=1);

setcookie("name-as-array[1]", 'value0', time() + 60 * 60, '/', '', false, true);
setcookie("name-as-array[2]", 'value1', time() + 60 * 60, '/', '', false, true);
setcookie("name-as-array[3]", 'value2', time() + 60 * 60, '/', '', false, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クッキーの送出2</title>
</head>

<body>
    <p>PHPからクッキーを送出しました。</p>
</body>

</html>
