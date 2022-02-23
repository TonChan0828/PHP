<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>foreachによる配列ループ - honkaku</title>
</head>
<body>
    <?php
        $colors = ['赤', '青', '黄'];
        foreach ($colors as $color) {
            echo "<p>{$color}</p>";
        }
    ?>
</body>
</html>
