<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>関数から別の関数をコール - honkaku</title>
</head>
<body>
    <?php
        /* 正の整数であれば真、そうでなければ偽を返す関数 */
        function checkNumber($value)
        {
            return is_numeric($value) && (int)$value > 0;
        }

        /* 2つの数値を足し算して返す関数 */
        function add($a, $b)
        {
            if (!checkNumber($a) || !checkNumber($b)) {
                return 'INVALID';
            }
            $total = $a + $b;
            return $total;
        }

        // メインルーチン
        $result = add(3, 10);
        echo "<p>計算結果：{$result}</p>";

        $result = add(5, -4);
        echo "<p>計算結果：{$result}</p>";
    ?>
</body>
</html>
