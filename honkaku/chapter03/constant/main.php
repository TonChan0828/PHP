<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>オブジェクト定数 - honkaku</title>
</head>
<body>
<?php
    require_once dirname(__FILE__) . '/Task.php';
    $task = new Task();
    $task->priority = Task::PRIORITY_HIGH;
    echo '優先度：', $task->getPriorityAsString();
?>
</body>
</html>
