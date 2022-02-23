<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>break・continueによるループ制御 - honkaku</title>
</head>
<body>
<pre>
<?php
    $total = 0;
    $numbers = [10, 2, -5, 3, 'abc', 6, 1];
    echo '正の整数を対象に配列の要素を足し算します...', PHP_EOL;
    foreach ($numbers as $number) {
        if (!is_numeric($number)) {
            echo "数値ではない値を検出したため計算を中断します...(対象値：{$number})", PHP_EOL;
            break;
        }
        if ($number < 0) {
            echo "マイナス値は計算しません...(対象値：{$number})", PHP_EOL;
            continue;
        }
        $total += $number;
    }
    echo "■合計：{$total}", PHP_EOL;
?>
</pre>
</body>
</html>
