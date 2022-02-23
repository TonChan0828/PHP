<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>配列 - honkaku</title>
</head>
<body>
    <?php
        $airports = ['Haneda', 'Narita', 'Chubu'];
        $airports[] = 'Kansai'; // 空港を追加
        $airports[] = 'Naha'; // 空港を追加

        // 以下のコメントアウトを外すとChubuがSendaiに上書きされます。
        //$airports[2] = 'Sendai'
    ?>
    <p><?=$airports[0]?></p>
    <p><?=$airports[1]?></p>
    <p><?=$airports[2]?></p>
    <p><?=$airports[3]?></p>
    <p><pre><?php print_r($airports);?></pre></p>
</body>
</html>
