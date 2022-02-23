<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>同じ実体を指すインスタンス - honkaku</title>
</head>
<body>
<pre>
<?php
    class Task
    {
        public $name;
    }

    function changeTask(Task $task): void
    {
        $task->name = '散歩';
    }

    $task1 = new Task();
    $task1->name = 'パスポートの更新';
    $task2 = $task1;
    $task2->name = '買い物';

    // 「買い物」が出力される
    echo $task1->name, PHP_EOL; 

    changeTask($task2);

    // 「散歩」が出力される
    echo $task1->name, PHP_EOL;
    echo $task2->name, PHP_EOL;
?>
</pre>
</body>
</html>
