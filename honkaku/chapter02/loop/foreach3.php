<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>foreachでリファレンス渡しを使ったループ - honkaku</title>
</head>
<body>
    <?php
        $numbers = [3, 5, -1, 2];
        foreach ($numbers as &$number) {
            if ($number < 0) {
                $number = 0;
            }
        }
        // ループ処理が終わった後は、必ずunset命令でリファレンスを消して下さい。
        unset($number);
    ?>
    <pre><?php print_r($numbers);?></pre>
</body>
</html>
