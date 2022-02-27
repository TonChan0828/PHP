<?php

declare(strict_types=1);

require_once dirname(__FILE__) . '/EventData.php';
require_once dirname(__FILE__) . '/functions.php';

if (isset($_GET['eventId']) && isset($eventData[$_GET['eventId']])) {
    setcookie('recentItems[' . escape($_GET['eventId']) . ']', date('Y-m-d H:i'), time() + 60 * 240, '/', '', false, true);
} else {
    die('イベントIDを指定してください');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クッキーの実用</title>
</head>

<body>
    <h2>「<?= escape($eventData[$_GET['eventId']]) ?>」</h2>
    イベント本文<br>
    イベント本文<br>
    イベント本文<br>
    イベント本文<br>
    <br>
    <a href="event-list.php">一覧へ戻る</a>
</body>

</html>
