<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>switch構文 - honkaku</title>
</head>
<body>
    <?php
        $message = '';
        $extension = 'gif';
        switch ($extension) {
            case 'jpg' :
                $message = 'jpg画像です。';
                break;
            case 'png' :
                $message = 'png画像です。';
                break;
            case 'gif' :
                $message = 'gif画像です。';
                break;
            case 'bmp' :
            case 'svg' :
                $message = 'bmpまたはsvg画像です。';
                break;
            default :
                $message = 'その他の形式です。';
        }
    ?>
    <p>メッセージ：<?=$message?></p>
</body>
</html>
