<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>関数の基本 - honkaku</title>
</head>
<body>
<pre>
<?php
    /* 2つの数値を足し算して返す関数 */
    function add($a, $b)
    {
        $total = $a + $b;
        return $total;
    }

    // メインルーチン
    $result = add(3, 10);
    echo '計算結果：', $result, PHP_EOL;

    $result = add(5, 2);
    echo '計算結果：', $result, PHP_EOL;
?>
</pre>
</body>
</html>
