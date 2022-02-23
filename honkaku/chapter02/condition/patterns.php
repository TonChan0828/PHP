<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>さまざまな条件式 - honkaku</title>
</head>
<body>
    <?php
        /* 単一の条件式 */
        $point = 90;
        if ($point >= 80) {
            $message = 'ハイスコアです。'; // このブロックに入ります
        } else {
            $message = '通常スコアです';
        }
    ?>
    <p>メッセージ：<?=$message?></p>

    <?php
        /* 論理演算子(&&や||など)を使った複合的な条件式 */
        $point = -30;
        if ($point < 0 || $point > 100) {
            $message = 'ポイント値が不正です。'; // このブロックに入ります
        } else {
            $message = 'ポイント値は正常です。';
        }
    ?>
    <p>メッセージ：<?=$message?></p>

    <?php
        /* 真偽値を返すPHPの命令を使った条件式 */
        $point = '90A';
        if (is_numeric($point)) {
            $message = 'ポイントは数値です。';
        } else {
            $message = 'ポイントが数値ではありません。'; // このブロックに入ります
        }
    ?>
    <p>メッセージ：<?=$message?></p>

    <?php
        /* 論理演算子の否定(!)を使って真偽値を逆転させる */
        $point = '90A';
        if (!is_numeric($point)) {
            $message = 'ポイントが数値ではありません。'; // このブロックに入ります
        } else {
            $message = 'ポイントは数値です。';
        }
    ?>
    <p>メッセージ：<?=$message?></p>

    <?php
        /* 数値を返すPHPの命令を使った条件式。数値は暗黙的に真偽値に型変換される。 */
        $places = ['東京', '京都', 'ニューヨーク'];
        if (count($places)) {
            $message = '場所が1つ以上存在します。'; // このブロックに入ります
        } else {
            $message = '場所が1つも存在しません。';
        }
    ?>
    <p>メッセージ：<?=$message?></p>
</body>
</html>
