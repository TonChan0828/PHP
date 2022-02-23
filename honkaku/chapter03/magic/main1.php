<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>マジックメソッド1 - honkaku</title>
</head>
<body>
<pre>
<?php
    // タスククラス
    class Task
    {
        // タスク名
        public $name;

        // 付加的な情報
        private $extras = [];

        // プロパティをセットするマジックメソッド
        public function __set($name, $value)
        {
            $this->extras[$name] = $value;
        }

        // プロパティを取得するマジックメソッド
        public function __get($name)
        {
            return $this->extras[$name];
        }
    }

    $task = new Task();
    $task->name = '飛行機のチケット購入'; // __set()は呼ばれない
    $task->placeFrom = '羽田'; // __set()が呼ばれる
    $task->placeTo = '福岡'; // __set()が呼ばれる

    echo 'タスク名：', $task->name, PHP_EOL; // __get()は呼ばれない
    echo '出発：', $task->placeFrom, PHP_EOL; // __get()が呼ばれる
    echo '到着：', $task->placeTo, PHP_EOL; // __get()が呼ばれる
?>
</pre>
</body>
</html>
