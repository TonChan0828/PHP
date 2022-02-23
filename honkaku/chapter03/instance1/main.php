<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>インスタンスへのアクセス - honkaku</title>
</head>
<body>
<pre>
<?php
    require_once dirname(__FILE__) . '/Task.php';

    // TODOタスク「パスポートの更新」を作る
    $task1 = new Task();
    $task1->name = 'パスポートの更新';
    $task1->progress = 100;
    if ($task1->isCompleted() === true) {
        echo $task1->name, 'は完了しました。', PHP_EOL;
    } else {
        echo $task1->name, 'は未完了です。', PHP_EOL;
    }

    // TODOタスク「食材の買い出し」を作る
    $task2 = new Task();
    $task2->name = '食材の買い出し';
    $task2->progress = 50;
    if ($task2->isCompleted() === true) {
        echo $task2->name , 'は完了しました。', PHP_EOL;
    } else {
        echo $task2->name , 'は未完了です。', PHP_EOL;
    }
?>
</pre>
</body>
</html>