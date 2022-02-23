<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>引数の値渡し - honkaku</title>
</head>
<body>
    <?php
        function add($a)
        {
            $a += 10;
        }
        // メインルーチン
        $argument = 5;
        add($argument);
        echo '$argumentは', $argument, 'です。';
    ?>
</body>
</html>
