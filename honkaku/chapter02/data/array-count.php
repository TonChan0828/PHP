<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>配列の要素数を得る - honkaku</title>
</head>
<body>
<pre>
<?php
    // 配列の要素数を得る
    $chars = ['a', 'b', 'c'];
    echo count($chars), PHP_EOL;    // 結果：3

    // 連想配列の要素数を得る
    $chars = [
        'a' => 'あ',
        'i' => 'い',
        'u' => 'う',
        'e' => 'え',
        'o' => 'お'
    ];
    echo count($chars), PHP_EOL;    // 結果：5
?>
</pre>
</body>
</html>
