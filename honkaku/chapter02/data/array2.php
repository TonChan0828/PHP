<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>連想配列 - honkaku</title>
</head>
<body>
    <?php
        $user = [
            'name'  => '山下次郎',
            'age'   => 30,
            'place' => '有田',
        ];
        $user['job']    = '伝統工芸士'; // 職業を追加
        $user['hobby']  = 'パン作り';   // 趣味を追加
    ?>
    <p><?=$user['name']?></p>
    <p><?=$user['age']?></p>
    <p><?=$user['place']?></p>
    <p><?=$user['job']?></p>
    <p><?=$user['hobby']?></p>
    <p><pre><?php print_r($user);?></pre></p>
</body>
</html>
