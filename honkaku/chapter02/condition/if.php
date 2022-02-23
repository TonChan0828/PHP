<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>if文 - honkaku</title>
</head>
<body>
    <?php
        $point = 90;
        $message = '通常スコアです。';
        if ($point >= 80) {
            $message = 'ハイスコアです。';
        }
    ?>
    <p>メッセージ：<?=$message?></p>
</body>
</html>
